<?php

namespace App\Http\Controllers;

use App\Models\Product;
// 1. IMPORT CLASS DARI PACKAGE BARU
use Picqer\Barcode\BarcodeGeneratorHTML;

class BarcodeController extends Controller
{
    public function show(Product $product)
    {
        if (empty($product->sku)) {
            abort(404, 'Produk tidak memiliki SKU untuk dibuatkan barcode.');
        }

        // 2. Buat instance dari generator barcode yang baru
        $generator = new BarcodeGeneratorHTML();

        // 3. Generate HTML barcode menggunakan sintaks baru dan simpan ke variabel
        // Parameter: (data, tipe barcode)
        // Kita tetap menggunakan tipe CODE 128 yang umum
        $barcodeHtml = $generator->getBarcode($product->sku, $generator::TYPE_CODE_128);

        // 4. Kirim variabel yang sama ke view
        return view('barcodes.show', compact('product', 'barcodeHtml'));
    }
}
