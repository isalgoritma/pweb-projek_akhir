<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LostItem;
use App\Models\User;

class Verification extends Model
{
    protected $fillable = [
        'lost_item_id',
        'user_id',
        'keterangan_kriteria',
        'status',
    ];

    public function item()
    {
        return $this->belongsTo(LostItem::class, 'lost_item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lostItem()
    {
        return $this->belongsTo(LostItem::class);
    }

}
