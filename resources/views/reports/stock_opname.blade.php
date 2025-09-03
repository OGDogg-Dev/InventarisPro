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
                    <form action="{{ route('reports.stock_opname') }}" method="GET" class="mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                            <div>
                                <x-input-label for="filter" value="Filter" />
                                <select name="filter" id="filter" onchange="toggleInputs()" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="date" {{ $filter == 'date' ? 'selected' : '' }}>Tanggal</option>
                                    <option value="month" {{ $filter == 'month' ? 'selected' : '' }}>Bulan</option>
                                    <option value="year" {{ $filter == 'year' ? 'selected' : '' }}>Tahun</option>
                                </select>
                            </div>
                            <div id="input-date" class="{{ $filter != 'date' ? 'hidden' : '' }}">
                                <x-input-label for="date" value="Pilih Tanggal" />
                                <input type="date" id="date" name="date" value="{{ $filter == 'date' ? $date : '' }}" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div id="input-month" class="{{ $filter != 'month' ? 'hidden' : '' }}">
                                <x-input-label for="month" value="Pilih Bulan" />
                                <input type="month" id="month" name="month" value="{{ $filter == 'month' ? $date : '' }}" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div id="input-year" class="{{ $filter != 'year' ? 'hidden' : '' }}">
                                <x-input-label for="year" value="Pilih Tahun" />
                                <input type="number" id="year" name="year" min="2000" max="2100" value="{{ $filter == 'year' ? $date : '' }}" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" />
                            </div>
                            <div>
                                <x-primary-button>Filter</x-primary-button>
                            </div>
                        </div>
                    </form>

                    <div class="mb-4">
                        <p><strong>Tanggal Laporan:</strong> {{ $displayDate }}</p>
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
                                        <td class="py-2 px-3 border-b text-center text-sm font-bold">{{ $product->stock_calc }}</td>
                                        <td class="py-2 px-3 border-b text-sm">
                                            {{-- Kolom kosong untuk diisi manual saat cek fisik --}}
                                        </td>
                                        <td class="py-2 px-3 border-b text-right text-sm">
                                            Rp {{ number_format($product->stock_calc * $product->price_purchase, 0, ',', '.') }}
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
                                        Rp {{ number_format($products->sum(function($p) { return $p->stock_calc * $p->price_purchase; }), 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleInputs() {
            const type = document.getElementById('filter').value;
            const dateInput = document.getElementById('date');
            const monthInput = document.getElementById('month');
            const yearInput = document.getElementById('year');

            document.getElementById('input-date').classList.toggle('hidden', type !== 'date');
            document.getElementById('input-month').classList.toggle('hidden', type !== 'month');
            document.getElementById('input-year').classList.toggle('hidden', type !== 'year');

            dateInput.disabled = type !== 'date';
            monthInput.disabled = type !== 'month';
            yearInput.disabled = type !== 'year';
        }

        document.addEventListener('DOMContentLoaded', toggleInputs);
    </script>
</x-app-layout>
