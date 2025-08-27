<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockInController extends Controller
{
    public function create()
    {
        $products = Product::orderBy('name')->get();
        return view('stocks.in.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'remarks' => 'required|string|max:255', // contoh: "Stok awal", "Pembelian dari Supplier X"
        ]);

        try {
            DB::transaction(function () use ($request) {
                // 1. Tambah stok di tabel products
                $product = Product::lockForUpdate()->find($request->product_id);
                $product->increment('stock', $request->quantity);

                // 2. Catat di tabel stock_movements
                StockMovement::create([
                    'product_id' => $request->product_id,
                    'user_id'    => Auth::id(),
                    'type'       => 'in',
                    'quantity'   => $request->quantity,
                    'remarks'    => $request->remarks,
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menambah stok: ' . $e->getMessage()]);
        }

        return redirect()->route('dashboard')->with('success', 'Stok berhasil ditambahkan.');
    }
}
