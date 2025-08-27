<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockOutController extends Controller
{
    public function create()
    {
        $products = Product::where('stock', '>', 0)->orderBy('name')->get();
        return view('stocks.out.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'remarks' => 'required|string|max:255', // contoh: "Penjualan No. INV/123", "Barang Rusak"
        ]);

        try {
            DB::transaction(function () use ($request) {
                $product = Product::lockForUpdate()->find($request->product_id);

                // Validasi stok cukup
                if ($product->stock < $request->quantity) {
                    throw new \Exception('Stok produk tidak mencukupi.');
                }

                // 1. Kurangi stok di tabel products
                $product->decrement('stock', $request->quantity);

                // 2. Catat di tabel stock_movements
                StockMovement::create([
                    'product_id' => $request->product_id,
                    'user_id'    => Auth::id(),
                    'type'       => 'out',
                    'quantity'   => $request->quantity,
                    'remarks'    => $request->remarks,
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('dashboard')->with('success', 'Stok berhasil dikeluarkan.');
    }
}
