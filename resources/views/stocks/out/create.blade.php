<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaksi Barang Keluar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            {{-- Card Utama --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                {{-- Header Card dengan Ikon (warna oranye/merah) --}}
                <div class="p-6 bg-orange-500 text-white flex items-center space-x-4">
                    {{-- Ikon dari heroicons.com --}}
                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 11.25l-3-3m0 0l-3 3m3-3v7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h3 class="text-2xl font-bold">Form Barang Keluar</h3>
                        <p class="text-sm opacity-80">Catat setiap produk yang keluar dari stok.</p>
                    </div>
                </div>

                <div class="p-6 md:p-8 border-t border-gray-200">
                     @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
                           {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('stock.out.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="product_id" :value="__('Pilih Produk')" class="font-bold text-base"/>
                            <select name="product_id" id="product_id" class="block mt-2 w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" required>
                                <option value="" disabled selected>-- Pilih Produk yang Akan Dikurangi Stoknya --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" @if(old('product_id') == $product->id) selected @endif>{{ $product->name }} (Stok Tersedia: {{ $product->stock }})</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="quantity" :value="__('Jumlah Keluar')" class="font-bold text-base"/>
                            <x-text-input id="quantity" class="block mt-2 w-full" type="number" name="quantity" :value="old('quantity')" required min="1" placeholder="Contoh: 5"/>
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="remarks" :value="__('Keterangan / Catatan')" class="font-bold text-base"/>
                            <textarea name="remarks" id="remarks" rows="3" class="block mt-2 w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" required placeholder="Contoh: Penjualan INV/2025/06/123">{{ old('remarks') }}</textarea>
                            <x-input-error :messages="$errors->get('remarks')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t pt-6">
                             <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button>
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Simpan Transaksi') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
