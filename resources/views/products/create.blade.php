<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name" :value="__('Nama Produk')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="sku" :value="__('SKU (Kode Unik)')" />
                                <x-text-input id="sku" class="block mt-1 w-full" type="text" name="sku" :value="old('sku')" required />
                                <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <x-input-label for="category_id" :value="__('Kategori')" />
                                <select name="category_id" id="category_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div>
                                <x-input-label for="supplier_id" :value="__('Supplier')" />
                                <select name="supplier_id" id="supplier_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <x-input-label for="stock" :value="__('Stok Awal')" />
                                <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock', 0)" required />
                                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="stock_min" :value="__('Stok Minimum (Alert)')" />
                                <x-text-input id="stock_min" class="block mt-1 w-full" type="number" name="stock_min" :value="old('stock_min', 0)" required />
                                <x-input-error :messages="$errors->get('stock_min')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <x-input-label for="price_purchase" :value="__('Harga Beli')" />
                                <x-text-input id="price_purchase" class="block mt-1 w-full" type="number" name="price_purchase" :value="old('price_purchase')" required />
                                <x-input-error :messages="$errors->get('price_purchase')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="price_sell" :value="__('Harga Jual')" />
                                <x-text-input id="price_sell" class="block mt-1 w-full" type="number" name="price_sell" :value="old('price_sell')" required />
                                <x-input-error :messages="$errors->get('price_sell')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Deskripsi')" />
                            <textarea name="description" id="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description') }}</textarea>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="product_image" :value="__('Gambar Produk')" />
                            <input type="file" name="product_image" id="product_image" class="block mt-1 w-full">
                            <x-input-error :messages="$errors->get('product_image')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Simpan Produk') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
