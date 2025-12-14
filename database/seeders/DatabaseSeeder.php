<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ADMIN DEFAULT (AUTO LOGIN)
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name'     => 'Administrator',
                'email'    => 'admin@universe.com',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
                'status'   => 'aktif'
            ]
        );

        // // USER DUMMY (TIDAK DIHAPUS)
        // User::factory()->create([
        //     'name'  => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            LostItemSeeder::class,
        ]);
    }
}
