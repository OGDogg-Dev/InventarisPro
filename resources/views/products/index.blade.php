<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-end mb-4">
                        <a href="{{ route('products.create') }}">
                            <x-primary-button>{{ __('Tambah Produk') }}</x-primary-button>
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif
                        @if (session('error'))
    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg" role="alert">
        {{ session('error') }}
    </div>
@endif
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                           <thead class="bg-primary-600 text-white">
                                <tr>
                                    <th class="py-2 px-4">Nama Produk</th>
                                    <th class="py-2 px-4">SKU</th>
                                    <th class="py-2 px-4">Kategori</th>
                                    <th class="py-2 px-4">Stok</th>
                                    <th class="py-2 px-4">Supplier</th>
                                    <th class="py-2 px-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr class="border-b">
                                        <td class="py-2 px-4">{{ $product->name }}</td>
                                        <td class="py-2 px-4">{{ $product->sku }}</td>
                                        <td class="py-2 px-4">{{ $product->category->name }}</td>
                                        <td class="py-2 px-4">{{ $product->stock }}</td>
                                        <td class="py-2 px-4">{{ $product->supplier->name}}</td>
                                        <td class="py-2 px-4">
    <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:text-blue-700">Edit</a>

    {{-- TAMBAHKAN LINK INI --}}
    <a href="{{ route('products.barcode', $product) }}" target="_blank" class="text-green-600 hover:text-green-800 ml-2">
        Barcode
    </a>

    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Anda yakin ingin menghapus produk ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500 hover:text-red-700 ml-2">Hapus</button>
    </form>
</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 px-4 text-center">Tidak ada data produk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
