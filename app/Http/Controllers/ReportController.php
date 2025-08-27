<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Laporan Stok Opname: Menampilkan semua produk beserta stok terakhir.
     */
    public function index()
    {
        return view('reports.index');
    }
    public function stockOpname()
    {
        $products = Product::with('category')->orderBy('name')->get();
        return view('reports.stock_opname', compact('products'));
    }

    /**
     * Laporan Riwayat Produk: Menampilkan semua pergerakan untuk satu produk.
     */
    public function productHistory(Request $request)
    {
        $products = Product::orderBy('name')->get(); // Untuk dropdown filter
        $movements = collect(); // Default collection kosong
        $selectedProduct = null;

        if ($request->filled('product_id')) {
            $selectedProduct = Product::find($request->product_id);
            $movements = StockMovement::where('product_id', $request->product_id)
                                      ->with('user')
                                      ->latest()
                                      ->paginate(20);
        }

        return view('reports.product_history', compact('products', 'movements', 'selectedProduct'));
    }
}
