<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Laporan Riwayat Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Filter Form --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <form action="{{ route('reports.product_history') }}" method="GET">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-center">
                            <div class="md:col-span-2">
                                <x-input-label for="product_id" value="Pilih Produk"/>
                                <select name="product_id" id="product_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">-- Semua Produk --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" @if(request('product_id') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-primary-button class="mt-5">Tampilkan</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Hasil Laporan --}}
            @if($selectedProduct)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Riwayat untuk: {{ $selectedProduct->name }} (Stok saat ini: {{ $selectedProduct->stock }})</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4">Tanggal</th>
                                    <th class="py-2 px-4">Tipe</th>
                                    <th class="py-2 px-4">Jumlah</th>
                                    <th class="py-2 px-4">Keterangan</th>
                                    <th class="py-2 px-4">Oleh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($movements as $movement)
                                    <tr class="border-b">
                                        <td class="py-2 px-4">{{ $movement->created_at->format('d M Y, H:i') }}</td>
                                        <td class="py-2 px-4 font-semibold {{ $movement->type == 'in' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $movement->type == 'in' ? 'Masuk' : 'Keluar' }}
                                        </td>
                                        <td class="py-2 px-4 text-center">{{ $movement->quantity }}</td>
                                        <td class="py-2 px-4">{{ $movement->remarks }}</td>
                                        <td class="py-2 px-4">{{ $movement->user->name }}</td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="py-4 px-4 text-center">Tidak ada riwayat pergerakan untuk produk ini.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     <div class="mt-4">
                        {{-- Penting untuk menjaga query string saat paginasi --}}
                        {{ $movements->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
