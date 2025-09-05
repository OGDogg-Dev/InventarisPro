<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $hasFilter = match ($filter) {
            'month' => $request->filled('month'),
            'year' => $request->filled('year'),
            default => $request->filled('date'),
        };

        $rawDate = null;
        $displayDate = null;
        $products = collect();
        $totalPurchase = 0;
        $totalSell = 0;

        if ($hasFilter) {
            $rawDate = match ($filter) {
                'month' => $request->input('month'),
                'year' => $request->input('year'),
                default => $request->input('date'),
            };

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

            // Hitung stok sistem per produk hingga akhir periode yang dipilih
            $stockByProduct = StockMovement::selectRaw(
                    'product_id, SUM(CASE WHEN type = "in" THEN quantity ELSE -quantity END) as qty'
                )
                ->where('created_at', '<=', $endDate)
                ->groupBy('product_id')
                ->pluck('qty', 'product_id');

            $products = Product::with('category')
                ->orderBy('name')
                ->get()
                ->map(function ($product) use ($stockByProduct) {
                    $product->stock_calc = (int) ($stockByProduct[$product->id] ?? 0);

                    return $product;
                });

            $totalPurchase = $products->sum(fn($p) => $p->stock_calc * $p->price_purchase);
            $totalSell = $products->sum(fn($p) => $p->stock_calc * $p->price_sell);
        }

        return view('reports.stock_opname', [
            'products' => $products,
            'filter' => $filter,
            'date' => $rawDate,
            'displayDate' => $displayDate,
            'hasFilter' => $hasFilter,
            'totalPurchase' => $totalPurchase,
            'totalSell' => $totalSell,
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
