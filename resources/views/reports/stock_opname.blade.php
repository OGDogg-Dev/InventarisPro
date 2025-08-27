<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Laporan Stok Opname') }}
            </h2>
            <x-primary-button onclick="window.print()">
                {{ __('Cetak Laporan') }}
            </x-primary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        <p><strong>Tanggal Laporan:</strong> {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                        <p class="text-sm text-gray-600">Gunakan daftar ini untuk membandingkan stok yang tercatat di sistem dengan stok fisik di gudang.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-3 border-b text-left text-sm">No.</th>
                                    <th class="py-2 px-3 border-b text-left text-sm">SKU</th>
                                    <th class="py-2 px-3 border-b text-left text-sm">Nama Produk</th>
                                    <th class="py-2 px-3 border-b text-left text-sm">Kategori</th>
                                    <th class="py-2 px-3 border-b text-center text-sm">Stok Sistem</th>
                                    <th class="py-2 px-3 border-b text-center text-sm" style="width: 15%;">Stok Fisik</th>
                                    <th class="py-2 px-3 border-b text-right text-sm">Nilai Stok (Beli)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-3 border-b text-sm">{{ $loop->iteration }}</td>
                                        <td class="py-2 px-3 border-b text-sm">{{ $product->sku }}</td>
                                        <td class="py-2 px-3 border-b text-sm">{{ $product->name }}</td>
                                        <td class="py-2 px-3 border-b text-sm">{{ $product->category->name ?? 'N/A' }}</td>
                                        <td class="py-2 px-3 border-b text-center text-sm font-bold">{{ $product->stock }}</td>
                                        <td class="py-2 px-3 border-b text-sm">
                                            {{-- Kolom kosong untuk diisi manual saat cek fisik --}}
                                        </td>
                                        <td class="py-2 px-3 border-b text-right text-sm">
                                            Rp {{ number_format($product->stock * $product->price_purchase, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="py-4 px-3 text-center text-sm">Tidak ada data produk untuk ditampilkan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot class="font-bold bg-gray-100">
                                <tr>
                                    <td colspan="6" class="py-2 px-3 text-right text-sm">Total Nilai Inventaris:</td>
                                    <td class="py-2 px-3 text-right text-sm">
                                        Rp {{ number_format($products->sum(function($p) { return $p->stock * $p->price_purchase; }), 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
