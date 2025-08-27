<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Sukses!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
               <div class="bg-white overflow-hidden shadow-md rounded-xl border-t-4 border-primary-500">
    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium">Total Produk</h3>
                        <p class="text-3xl font-bold">{{ $totalProducts }}</p>
                    </div>
                </div>
             <div class="bg-white overflow-hidden shadow-md rounded-xl border-t-4 border-primary-500">
    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium">Total Supplier</h3>
                        <p class="text-3xl font-bold">{{ $totalSuppliers }}</p>
                    </div>
                </div>
               <div class="bg-white overflow-hidden shadow-md rounded-xl border-t-4 border-primary-500">
    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium">Nilai Inventaris</h3>
                        <p class="text-3xl font-bold">Rp {{ number_format($totalInventoryValue, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

          <div class="bg-white overflow-hidden shadow-md rounded-xl border-t-4 border-primary-500">
    <div class="p-6 text-gray-900">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-red-600">Produk Stok Menipis</h3>
                        @if($lowStockProducts->isNotEmpty())
                            <ul class="mt-4 space-y-2">
                                @foreach($lowStockProducts as $product)
                                    <li class="flex justify-between items-center text-sm">
                                        <span>{{ $product->name }}</span>
                                        <span class="font-bold text-red-500">Sisa: {{ $product->stock }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="mt-4 text-gray-500">Tidak ada produk dengan stok menipis.</p>
                        @endif
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-md rounded-xl border-t-4 border-primary-500">
    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-medium text-blue-600">5 Barang Paling Laris</h3>
                         @if($bestSellers->isNotEmpty())
                            <ul class="mt-4 space-y-2">
                                @foreach($bestSellers as $item)
                                    <li class="flex justify-between items-center text-sm">
                                        <span>{{ $item->product->name }}</span>
                                        <span class="font-bold text-blue-500">Terjual: {{ $item->total_sold }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="mt-4 text-gray-500">Belum ada data penjualan.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
