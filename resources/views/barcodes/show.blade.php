<!DOCTYPE html>
<html>
<head>
    <title>Barcode untuk {{ $product->name }}</title>
    <style>
        body {
            text-align: center;
            font-family: sans-serif;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <h3>{{ $product->name }}</h3>
    <p>SKU: {{ $product->sku }}</p>

    <div>
        {{-- Ganti baris lama dengan variabel ini --}}
        {!! $barcodeHtml !!}
    </div>
</body>
</html>
