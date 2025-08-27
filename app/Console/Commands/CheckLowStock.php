<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\User;
use App\Notifications\LowStockNotification;
use Illuminate\Support\Facades\Notification;

class CheckLowStock extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'inventory:check-low-stock';

    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Periksa produk dengan stok menipis dan kirim notifikasi ke admin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Memeriksa stok produk...');

        // Ambil produk di mana stok saat ini kurang dari atau sama dengan stok minimumnya
        $lowStockProducts = Product::whereColumn('stock', '<=', 'stock_min')->where('stock', '>', 0)->get();

        if ($lowStockProducts->isEmpty()) {
            $this->info('Tidak ada produk dengan stok menipis. Pekerjaan selesai.');
            return;
        }

        $this->warn("Ditemukan {$lowStockProducts->count()} produk dengan stok menipis.");

        // Ambil semua user dengan peran 'Admin'
        $admins = User::role('Admin')->get();

        if ($admins->isEmpty()) {
            $this->error('Tidak ada user Admin yang ditemukan untuk dikirimi notifikasi.');
            return;
        }

        // Kirim notifikasi ke semua admin
        Notification::send($admins, new LowStockNotification($lowStockProducts));

        $this->info('Notifikasi stok menipis berhasil dikirim ke admin.');
    }
}
