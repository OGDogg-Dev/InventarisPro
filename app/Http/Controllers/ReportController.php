<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Laporan Stok Opname: Menampilkan semua produk beserta stok terakhir.
     */
    public function index()
    {
        return view('reports.index');
    }
    public function stockOpname(Request $request)
    {
        $filter = $request->input('filter', 'date');
        $rawDate = $request->input('date', now()->toDateString());

        switch ($filter) {
            case 'month':
                $endDate = Carbon::createFromFormat('Y-m', $rawDate)->endOfMonth();
                $displayDate = Carbon::createFromFormat('Y-m', $rawDate)->translatedFormat('F Y');
                break;
            case 'year':
                $endDate = Carbon::createFromFormat('Y', $rawDate)->endOfYear();
                $displayDate = $rawDate;
                break;
            default:
                $endDate = Carbon::parse($rawDate)->endOfDay();
                $displayDate = Carbon::parse($rawDate)->translatedFormat('d F Y');
                break;
        }

        $products = Product::with('category')
            ->withSum(['stockMovements as stock_in' => function ($query) use ($endDate) {
                $query->where('type', 'in')->where('created_at', '<=', $endDate);
            }], 'quantity')
            ->withSum(['stockMovements as stock_out' => function ($query) use ($endDate) {
                $query->where('type', 'out')->where('created_at', '<=', $endDate);
            }], 'quantity')
            ->orderBy('name')
            ->get()
            ->map(function ($product) {
                $product->stock_calc = ($product->stock_in - $product->stock_out);
                return $product;
            });

        return view('reports.stock_opname', [
            'products' => $products,
            'filter' => $filter,
            'date' => $rawDate,
            'displayDate' => $displayDate,
        ]);
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
