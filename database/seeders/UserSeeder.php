<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Gunakan updateOrCreate untuk menghindari duplikasi jika seeder dijalankan berulang kali
        // dan memastikan data tetap konsisten.

        // 1. Buat User Admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@example.com'], // Kunci untuk mencari user
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'), // Ganti 'password' dengan password yang aman
            ]
        );
        // Tetapkan peran 'Admin' ke user ini
        $admin->assignRole('Admin');


        // 2. Buat User Staf Gudang
        $staf = User::updateOrCreate(
            ['email' => 'staf@example.com'], // Kunci untuk mencari user
            [
                'name' => 'Staf Gudang',
                'password' => Hash::make('password'), // Ganti 'password' dengan password yang aman
            ]
        );
        // Tetapkan peran 'Staf Gudang' ke user ini
        $staf->assignRole('Staf Gudang');


        // (Opsional) Buat beberapa user staf tambahan jika perlu
        User::factory()->count(3)->create()->each(function ($user) {
            $user->assignRole('Staf Gudang');
        });
    }
}
