<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tambah Supplier Baru') }}</h2></x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('suppliers.store') }}">
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Nama Supplier')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="contact_person" :value="__('Kontak Person')" />
                            <x-text-input id="contact_person" class="block mt-1 w-full" type="text" name="contact_person" :value="old('contact_person')" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Nomor Telepon')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Alamat')" />
                            <textarea name="address" id="address" rows="3" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('address') }}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
