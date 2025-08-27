<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        // 1. Jumlah Produk
        $totalProducts = Product::count();

        // 2. Jumlah Supplier
        $totalSuppliers = Supplier::count();

        // 3. Nilai Total Inventaris (berdasarkan harga beli)
        $totalInventoryValue = Product::select(DB::raw('SUM(stock * price_purchase) as total_value'))->first()->total_value;

        // 4. Produk dengan Stok Menipis (untuk notifikasi)
        $lowStockProducts = Product::whereColumn('stock', '<=', 'stock_min')->get();

        // 5. Barang Paling Laris (Top 5)
        $bestSellers = StockMovement::where('type', 'out')
            ->select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderBy('total_sold', 'desc')
            ->with('product')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalSuppliers',
            'totalInventoryValue',
            'lowStockProducts',
            'bestSellers'
        ));
    }
}
