<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // --- 1. Buat User Admin & Staf ---
        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $adminUser->assignRole('Admin');

        $stafUser = User::factory()->create([
            'name' => 'Staf Gudang',
            'email' => 'staf@example.com',
            'password' => Hash::make('password'),
        ]);
        $stafUser->assignRole('Staf Gudang');


        // --- 2. Buat Supplier & Kategori menggunakan Factory ---
        $this->command->info('Membuat data Supplier & Kategori...');
        Supplier::factory(10)->create();
        Category::factory(8)->create();


        // --- 3. Buat Produk menggunakan Factory ---
        // Dan untuk setiap produk, buat juga riwayat stok awalnya
        $this->command->info('Membuat data Produk beserta Riwayat Stok Awal...');
        Product::factory(50)->create()->each(function ($product) use ($adminUser) {
            StockMovement::create([
                'product_id' => $product->id,
                'user_id' => $adminUser->id, // Dicatat oleh Admin
                'type' => 'in',
                'quantity' => $product->stock, // Jumlah stok awal = stok saat ini
                'remarks' => 'Stok Awal',
            ]);
        });

        $this->command->info('Proses seeding data demo selesai!');
    }
}
