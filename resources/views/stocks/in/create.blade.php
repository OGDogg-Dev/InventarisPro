<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaksi Barang Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            {{-- Card Utama --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                {{-- Header Card dengan Ikon --}}
                <div class="p-6 bg-blue-600 text-white flex items-center space-x-4">
                    {{-- Ikon dari heroicons.com --}}
                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3v11.25" />
                    </svg>
                    <div>
                        <h3 class="text-2xl font-bold">Form Barang Masuk</h3>
                        <p class="text-sm opacity-80">Catat setiap produk yang masuk ke dalam stok.</p>
                    </div>
                </div>

                <div class="p-6 md:p-8 border-t border-gray-200">
                     @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg">
                           {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('stock.in.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="product_id" :value="__('Pilih Produk')" class="font-bold text-base"/>
                            <select name="product_id" id="product_id" class="block mt-2 w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" required>
                                <option value="" disabled selected>-- Pilih Produk yang Akan Ditambah Stoknya --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" @if(old('product_id') == $product->id) selected @endif>{{ $product->name }} (Stok Saat Ini: {{ $product->stock }})</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="quantity" :value="__('Jumlah Masuk')" class="font-bold text-base"/>
                            <x-text-input id="quantity" class="block mt-2 w-full" type="number" name="quantity" :value="old('quantity')" required min="1" placeholder="Contoh: 100"/>
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="remarks" :value="__('Keterangan / Catatan')" class="font-bold text-base"/>
                            <textarea name="remarks" id="remarks" rows="3" class="block mt-2 w-full border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm" required placeholder="Contoh: Pembelian dari PT Sejahtera Abadi">{{ old('remarks') }}</textarea>
                            <x-input-error :messages="$errors->get('remarks')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-8 border-t pt-6">
                             <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button>
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.75-11.25a.75.75 0 00-1.5 0v2.5h-2.5a.75.75 0 000 1.5h2.5v2.5a.75.75 0 001.5 0v-2.5h2.5a.75.75 0 000-1.5h-2.5v-2.5z" clip-rule="evenodd" />
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
