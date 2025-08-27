<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk: ') . $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Metode untuk update --}}

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name" :value="__('Nama Produk')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $product->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="sku" :value="__('SKU (Kode Unik)')" />
                                <x-text-input id="sku" class="block mt-1 w-full" type="text" name="sku" :value="old('sku', $product->sku)" required />
                                <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <x-input-label for="category_id" :value="__('Kategori')" />
                                <select name="category_id" id="category_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                             <div>
                                <x-input-label for="supplier_id" :value="__('Supplier')" />
                                <select name="supplier_id" id="supplier_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <x-input-label for="stock" :value="__('Stok Saat Ini')" />
                                <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" :value="old('stock', $product->stock)" required />
                                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="stock_min" :value="__('Stok Minimum (Alert)')" />
                                <x-text-input id="stock_min" class="block mt-1 w-full" type="number" name="stock_min" :value="old('stock_min', $product->stock_min)" required />
                                <x-input-error :messages="$errors->get('stock_min')" class="mt-2" />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <x-input-label for="price_purchase" :value="__('Harga Beli')" />
                                <x-text-input id="price_purchase" class="block mt-1 w-full" type="number" name="price_purchase" :value="old('price_purchase', $product->price_purchase)" required />
                                <x-input-error :messages="$errors->get('price_purchase')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="price_sell" :value="__('Harga Jual')" />
                                <x-text-input id="price_sell" class="block mt-1 w-full" type="number" name="price_sell" :value="old('price_sell', $product->price_sell)" required />
                                <x-input-error :messages="$errors->get('price_sell')" class="mt-2" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Deskripsi')" />
                            <textarea name="description" id="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="product_image" :value="__('Ganti Gambar Produk')" />
                            @if($product->product_image)
                                <img src="{{ asset('storage/' . $product->product_image) }}" alt="{{ $product->name }}" class="h-24 w-24 object-cover rounded-md mb-2">
                            @endif
                            <input type="file" name="product_image" id="product_image" class="block mt-1 w-full">
                            <small class="text-gray-500">Kosongkan jika tidak ingin mengubah gambar.</small>
                            <x-input-error :messages="$errors->get('product_image')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('products.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <x-primary-button>
                                {{ __('Update Produk') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
