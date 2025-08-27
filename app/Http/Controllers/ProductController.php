<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Eager load relasi untuk optimasi query (N+1 problem)
        $products = Product::with(['category', 'supplier'])->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
            'price_purchase' => 'required|numeric|min:0',
            'price_sell' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('product_image')) {
            $path = $request->file('product_image')->store('product-images', 'public');
            $data['product_image'] = $path;
        }

        Product::create($data);

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:products,sku,' . $product->id,
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'stock_min' => 'required|integer|min:0',
            'price_purchase' => 'required|numeric|min:0',
            'price_sell' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('product_image')) {
             // Opsional: Hapus gambar lama jika ada
            // if($product->product_image) { Storage::disk('public')->delete($product->product_image); }
            $path = $request->file('product_image')->store('product-images', 'public');
            $data['product_image'] = $path;
        }

        $product->update($data);

        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        // Pengecekan agar produk yang sudah punya transaksi tidak bisa dihapus
        if ($product->stockMovements()->count() > 0) {
            return redirect()->route('products.index')
                             ->with('error', 'Produk tidak dapat dihapus karena sudah memiliki riwayat transaksi.');
        }

        $product->delete();
        return redirect()->route('products.index')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}
