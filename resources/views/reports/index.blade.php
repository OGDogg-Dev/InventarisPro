<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pilih Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <a href="{{ route('reports.stock_opname') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Laporan Stok Opname</h5>
                    <p class="font-normal text-gray-700">Lihat daftar lengkap semua produk beserta jumlah stok dan nilainya saat ini.</p>
                </a>

                <a href="{{ route('reports.product_history') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Laporan Riwayat Produk</h5>
                    <p class="font-normal text-gray-700">Lacak setiap pergerakan barang masuk dan keluar untuk satu produk spesifik.</p>
                </a>

                {{-- Tambahkan card laporan lainnya di sini jika ada --}}

            </div>
        </div>
    </div>
</x-app-layout>
