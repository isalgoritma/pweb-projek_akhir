<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LostItemController extends Controller
{
    public function index()
    {
        $items = LostItem::orderBy('created_at','desc')->paginate(10);
        return view('lost.index', compact('items'));
    }

    private function convertSlugToCategory($slug)
    {
        return ucwords(str_replace('-', ' ', $slug));
    }


    public function create()
    {
        return view('lost.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:lost,found',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'date_lost' => 'nullable|date',
            'category' => 'required|string',
            'image' => 'nullable|image|max:2048'
        ]);

        $data['user_id'] = Auth::id();
        $data['status'] = 'open';

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images','public');
        }

        LostItem::create($data);

        return redirect()->route('lost.found.all')->with('success','Item berhasil ditambahkan');
    }

    public function allItems($kategori = null)
    {
        // daftar kategori tetap barang
        $categories = [
            'Elektronik',
            'Kendaraan',
            'Aksesoris',
            'Dokumen',
            'Lainnya'
        ];

        // data per kategori barang
        $data = [];

        foreach ($categories as $cat) {
            $data[$cat] = [
                'lost' => LostItem::where('type', 'lost')->where('category', $cat)->get(),
                'found' => LostItem::where('type', 'found')->where('category', $cat)->get(),
            ];
        }

        return view('lost.all', [
            'data' => $data,
            'categories' => $categories,
            'highlight' => $kategori ? ucwords(str_replace('-', ' ', $kategori)) : null
        ]);
    }



    public function show($id)
    {
        $item = LostItem::findOrFail($id);
        return view('lost.show', compact('item'));
    }

    public function hilangKategori($slug)
    {
        $category = $this->convertSlugToCategory($slug);

        $items = LostItem::where('type', 'lost')
                        ->where('category', $category)
                        ->orderBy('created_at','desc')
                        ->paginate(10);

        return view('lost.kategori', [
            'items' => $items,
            'category' => $category,
            'type' => 'lost'
        ]);
    }

    public function ditemukanKategori($slug)
    {
        $category = $this->convertSlugToCategory($slug);

        $items = LostItem::where('type', 'found')
                        ->where('category', $category)
                        ->orderBy('created_at','desc')
                        ->paginate(10);

        return view('lost.kategori', [
            'items' => $items,
            'category' => $category,
            'type' => 'found'
        ]);
    }

    public function createFound()
    {
        return view('found.create');
    }


    public function edit($id)
    {
        $item = LostItem::findOrFail($id);
        return view('lost.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = LostItem::findOrFail($id);

        $data = $request->validate([
            'title'=>'required|string|max:255',
            'type'=>'required|in:lost,found',
            'description'=>'nullable|string',
            'location'=>'nullable|string|max:255',
            'date_lost'=>'nullable|date',
            'status'=>'required|in:open,matched,closed',
            'image'=>'nullable|image|max:2048'
        ]);

        if($request->hasFile('image')){
            if($item->image_path) Storage::disk('public')->delete($item->image_path);
            $data['image_path'] = $request->file('image')->store('images','public');
        }

        $item->update($data);
        return redirect()->route('lost.index')->with('success','Item berhasil diperbarui');
    }

    public function destroy($id)
    {
        $item = LostItem::findOrFail($id);

        if ($item->image_path) {
            Storage::disk('public')->delete($item->image_path);
        }

        $item->delete();

        return redirect()
            ->route('lost.deletePage')
            ->with('success', 'Item berhasil dihapus');
    }


    public function deletePage()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {

            // admin dapat melihat SEMUA data
            $lostItems = LostItem::where('type', 'lost')->get();
            $foundItems = LostItem::where('type', 'found')->get();
        } else {
            // user hanya melihat data punya sendiri
            $lostItems = LostItem::where('type', 'lost')
                                ->where('user_id', $user->id)
                                ->get();

            $foundItems = LostItem::where('type', 'found')
                                ->where('user_id', $user->id)
                                ->get();
        }

        return view('lost.deletepage', [
            'lostItems' => $lostItems,
            'foundItems' => $foundItems,
        ]);

    }


}
