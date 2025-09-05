<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Manajemen Kategori') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">{{ session('error') }}</div>
                    @endif

                    <div class="flex justify-end mb-4">
                        <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md">Tambah Kategori</a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr class="border-b">
                                        <td class="py-2 px-4">{{ $category->name }}</td>
                                        <td class="py-2 px-4 text-right">
                                            {{-- Sebaiknya dibuat halaman edit terpisah atau menggunakan modal (JS) --}}
                                            {{-- <a href="#" class="text-blue-500">Edit</a> --}}
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Yakin?');" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-500">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td class="py-4 px-4 text-center">Tidak ada data.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
