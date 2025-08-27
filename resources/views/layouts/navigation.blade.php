<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" /><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" /></svg>
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @can('manage stock')
                        <x-nav-link :href="route('stock.in.create')" :active="request()->routeIs('stock.in.create')">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10.75 2.75a.75.75 0 00-1.5 0v8.586l-1.22-1.22a.75.75 0 00-1.06 1.06l2.5 2.5a.75.75 0 001.06 0l2.5-2.5a.75.75 0 10-1.06-1.06l-1.22 1.22V2.75z" /><path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" /></svg>
                            {{ __('Barang Masuk') }}
                        </x-nav-link>
                        <x-nav-link :href="route('stock.out.create')" :active="request()->routeIs('stock.out.create')">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M10.75 17.25a.75.75 0 001.5 0V8.664l1.22 1.22a.75.75 0 101.06-1.06l-2.5-2.5a.75.75 0 00-1.06 0l-2.5 2.5a.75.75 0 101.06 1.06l1.22-1.22v8.586z" /><path d="M3.5 7.25a.75.75 0 00-1.5 0v-2.5A2.75 2.75 0 014.75 2h10.5A2.75 2.75 0 0118 4.75v2.5a.75.75 0 00-1.5 0v-2.5c0-.69-.56-1.25-1.25-1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" /></svg>
                            {{ __('Barang Keluar') }}
                        </x-nav-link>
                    @endcan

                    @role('Admin')
                        <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
                             <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h13.5A2.25 2.25 0 0019 13.75v-7.5A2.25 2.25 0 0016.75 4H3.25zM16.5 6.75h-13v7h13v-7z" /></svg>
                            {{ __('Produk') }}
                        </x-nav-link>
                        <x-nav-link :href="route('suppliers.index')" :active="request()->routeIs('suppliers.*')">
                            <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M9 4.5a.75.75 0 01.75.75v1.513a4.502 4.502 0 013.166 4.437V12.5a.75.75 0 01-1.5 0v-1.25a3 3 0 00-6 0V12.5a.75.75 0 01-1.5 0v-1.25c0-1.655.787-3.123 2-4.042V5.25a.75.75 0 01.75-.75z" /><path d="M5.003 13.292a.75.75 0 01-.435.918l-1.93.81a.75.75 0 01-.918-.435l-.81-1.93a.75.75 0 01.435-.918l1.93-.81a.75.75 0 01.918.435l.81 1.93zM16.33 11.45a.75.75 0 01.435.918l-.81 1.93a.75.75 0 01-.918.435l-1.93-.81a.75.75 0 01-.435-.918l.81-1.93a.75.75 0 01.918-.435l1.93.81z" /></svg>
                            {{ __('Supplier') }}
                        </x-nav-link>
                    @endrole

                     @can('view reports')
                        <x-nav-link :href="route('reports.index')" :active="request()->routeIs('reports.*')">
                             <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M15.994 3.666a.75.75 0 01.832.22l.512.682a.75.75 0 01-.22.832l-2.433 1.825a.75.75 0 01-.976-.115l-.224-.3a.75.75 0 01.115-.976l2.4-1.8zM8.994 3.666a.75.75 0 01.832-.22l2.4 1.8a.75.75 0 01-.115.976l-.224.3a.75.75 0 01-.976-.115L8.48 4.57a.75.75 0 01-.22-.832l.512-.682a.75.75 0 01.22-.832zM12 7.875a4.125 4.125 0 100 8.25 4.125 4.125 0 000-8.25zM4.633 6.136a.75.75 0 01.22-.832l.512-.682a.75.75 0 01.832.22l1.8 2.4a.75.75 0 01-.115.976l-.3.224a.75.75 0 01-.976-.115l-1.8-2.4a.75.75 0 01-.173-.832z" clip-rule="evenodd" /></svg>
                            {{ __('Laporan') }}
                        </x-nav-link>
                    @endcan
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            {{-- Tambahkan link responsive lainnya di sini jika perlu --}}
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
