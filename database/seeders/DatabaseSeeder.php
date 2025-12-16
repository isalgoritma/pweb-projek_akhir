<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;


    public function run(): void
    {
        //pengguna default
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        //memanggil seeder lostitem
        $this->call([
            LostItemSeeder::class,
        ]);
    }
}
