<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>InventarisPro — Manajemen Stok Modern & Real-time</title>
    <meta name="description" content="Kelola stok masuk/keluar, pantau minimum, dan dapatkan laporan analitis—semuanya dalam satu platform cepat dan modern." />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- Font custom (opsional) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 text-gray-800 font-sans">
    <a href="#content" class="sr-only focus:not-sr-only focus:absolute focus:top-3 focus:left-3 bg-blue-600 text-white px-3 py-2 rounded-md">
        Skip to content
    </a>

    {{-- ===== Sticky Header ===== --}}
    <header class="sticky top-0 z-50 backdrop-blur bg-white/75 border-b border-gray-100">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
            <a href="#" class="flex items-center gap-2">
                <span class="inline-grid place-items-center w-9 h-9 rounded-lg bg-gradient-to-br from-blue-600 to-indigo-600 text-white font-bold">IP</span>
                <span class="text-xl font-extrabold tracking-tight text-gray-900">Inventaris<span class="text-blue-600">Pro</span></span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="#features" class="text-sm font-medium text-gray-600 hover:text-gray-900">Fitur</a>
                <a href="#how-it-works" class="text-sm font-medium text-gray-600 hover:text-gray-900">Cara Kerja</a>
                <a href="#pricing" class="text-sm font-medium text-gray-600 hover:text-gray-900">Harga</a>
                <a href="#faq" class="text-sm font-medium text-gray-600 hover:text-gray-900">FAQ</a>
            </div>

            <div class="hidden md:flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Masuk</a>
                    <a href="{{ route('register') }}"
                       class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow">
                        Coba Gratis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6"/></svg>
                    </a>
                @endauth
            </div>

            {{-- Mobile menu --}}
            <details class="md:hidden">
                <summary class="list-none cursor-pointer inline-flex items-center gap-2 text-gray-700">
                    Menu
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </summary>
                <div class="mt-3 bg-white rounded-xl shadow-lg border border-gray-100 p-3 flex flex-col gap-2">
                    <a href="#features" class="px-3 py-2 rounded-lg hover:bg-gray-50">Fitur</a>
                    <a href="#how-it-works" class="px-3 py-2 rounded-lg hover:bg-gray-50">Cara Kerja</a>
                    <a href="#pricing" class="px-3 py-2 rounded-lg hover:bg-gray-50">Harga</a>
                    <a href="#faq" class="px-3 py-2 rounded-lg hover:bg-gray-50">FAQ</a>
                    <div class="h-px bg-gray-100 my-1"></div>
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg hover:bg-gray-50">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-lg hover:bg-gray-50">Masuk</a>
                        <a href="{{ route('register') }}" class="px-3 py-2 rounded-lg bg-blue-600 text-white text-center">Coba Gratis</a>
                    @endauth
                </div>
            </details>
        </nav>
    </header>

    <main id="content">
        {{-- ===== Hero ===== --}}
        <section class="relative overflow-hidden">
            <div class="absolute -top-24 -right-16 w-[32rem] h-[32rem] bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full blur-3xl opacity-60"></div>
            <div class="absolute -bottom-24 -left-16 w-[28rem] h-[28rem] bg-gradient-to-tr from-blue-50 to-indigo-100 rounded-full blur-3xl opacity-70"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
                    <div>
                        <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700 ring-1 ring-blue-200">
                            🚀 Rilis v2.1 • Lebih cepat & stabil
                        </span>

                        <h1 class="mt-4 text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-900 leading-tight">
                            Kendalikan Stok Anda <span class="block bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">dengan Presisi & Mudah</span>
                        </h1>

                        <p class="mt-5 text-lg text-gray-600 max-w-xl">
                            Monitor pergerakan barang secara real-time, atur level minimum, dan ambil keputusan dengan laporan analitis yang rapi.
                        </p>

                        <div class="mt-8 flex flex-wrap items-center gap-3">
                            <a href="{{ route('register') }}"
                               class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow">
                                Coba Gratis
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6"/></svg>
                            </a>
                            <a href="{{ route('login') }}"
                               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50">
                                Lihat Demo
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 8h.01M12 12c1.5 0 3-1 3-3 0-1.657-1.343-3-3-3S9 7.343 9 9c0 2 1.5 3 3 3zm0 0v5m0 0H9m3 0h3"/></svg>
                            </a>
                        </div>

                        {{-- Trust / Stats --}}
                        <div class="mt-8 grid grid-cols-3 gap-4 max-w-lg">
                            <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm text-center">
                                <div class="text-2xl font-extrabold text-gray-900">99.9%</div>
                                <div class="text-xs text-gray-500 mt-1">Uptime Aplikasi</div>
                            </div>
                            <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm text-center">
                                <div class="text-2xl font-extrabold text-gray-900">Real-time</div>
                                <div class="text-xs text-gray-500 mt-1">Sinkronisasi</div>
                            </div>
                            <div class="bg-white rounded-xl border border-gray-100 p-4 shadow-sm text-center">
                                <div class="text-2xl font-extrabold text-gray-900">30%+</div>
                                <div class="text-xs text-gray-500 mt-1">Lebih Efisien</div>
                            </div>
                        </div>
                    </div>

                    {{-- Mockup / Screenshot Placeholder --}}
                    <div class="relative">
                        <div class="rounded-2xl border border-gray-200 shadow-2xl overflow-hidden bg-white">
                            <div class="bg-gray-900 text-gray-100 text-xs px-4 py-2 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-yellow-500"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                                <span class="ml-3 opacity-70">/inventaris/dashboard</span>
                            </div>
                            <div class="p-6">
                                <div class="h-64 sm:h-80 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border border-dashed border-blue-200 grid place-items-center text-blue-700">
                                    <div class="text-center">
                                        <svg class="w-10 h-10 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M7 13l3 3 7-7"/>
                                        </svg>
                                        <p class="font-semibold">Cuplikan Dashboard</p>
                                        <p class="text-sm text-blue-700/70">Letakkan preview dashboard di sini</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="absolute -bottom-6 -left-6 bg-white/70 backdrop-blur border border-gray-200 rounded-xl px-3 py-2 shadow">
                            🔒 Akses aman & role-based
                        </span>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== Features ===== --}}
        <section id="features" class="bg-white py-16 sm:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight text-gray-900">Fitur Unggulan</h2>
                    <p class="mt-3 text-lg text-gray-600">Semua yang Anda butuhkan—tanpa ribet.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $features = [
                            ['title' => 'Pelacakan Real-time', 'desc' => 'Pantau stok saat barang masuk/keluar dengan akurat.', 'icon' => 'M3.75 4.875v4.5A1.125 1.125 0 0 0 4.875 10.5h4.5A1.125 1.125 0 0 0 10.5 9.375v-4.5A1.125 1.125 0 0 0 9.375 3.75h-4.5z M3.75 14.625v4.5c0 .621.504 1.125 1.125 1.125h4.5a1.125 1.125 0 0 0 1.125-1.125v-4.5A1.125 1.125 0 0 0 9.375 13.5h-4.5a1.125 1.125 0 0 0-1.125 1.125z M13.5 4.875v4.5c0 .621.504 1.125 1.125 1.125h4.5a1.125 1.125 0 0 0 1.125-1.125v-4.5A1.125 1.125 0 0 0 19.125 3.75h-4.5A1.125 1.125 0 0 0 13.5 4.875z M13.5 14.625v4.5c0 .621.504 1.125 1.125 1.125h4.5a1.125 1.125 0 0 0 1.125-1.125v-4.5A1.125 1.125 0 0 0 19.125 13.5h-4.5a1.125 1.125 0 0 0-1.125 1.125z'],
                            ['title' => 'Peringatan Stok Minimum', 'desc' => 'Notifikasi otomatis saat stok menipis.', 'icon' => 'M12 9V3m0 0l-2 2m2-2l2 2M12 15a3 3 0 100-6 3 3 0 000 6zm0 0v6'],
                            ['title' => 'Laporan Analitis', 'desc' => 'Laporan stok opname & histori barang siap unduh.', 'icon' => 'M3 3v18h18M7 13l3 3 7-7'],
                            ['title' => 'Multi Gudang', 'desc' => 'Kelola banyak lokasi dengan visibilitas penuh.', 'icon' => 'M3 7h18M3 12h18M3 17h18'],
                            ['title' => 'Hak Akses & Audit', 'desc' => 'Pengaturan role, jejak audit, dan keamanan data.', 'icon' => 'M12 11V7a4 4 0 10-8 0v4m8 0v7H4v-7m8 0h4a2 2 0 012 2v5H8v-5a2 2 0 012-2h2z'],
                            ['title' => 'Integrasi Sheets', 'desc' => 'Export cepat ke Google Sheets untuk kolaborasi.', 'icon' => 'M14 2v6h6M14 2H6a2 2 0 00-2 2v16l4-4h10a2 2 0 002-2V8z'],
                        ];
                    @endphp

                    @foreach ($features as $f)
                        <div class="group p-6 rounded-2xl border border-gray-200 hover:border-blue-200 hover:shadow-md transition">
                            <div class="w-11 h-11 rounded-lg bg-blue-600/10 text-blue-700 grid place-items-center mb-4">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="{{ $f['icon'] }}" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $f['title'] }}</h3>
                            <p class="mt-1.5 text-gray-600">{{ $f['desc'] }}</p>
                            <div class="mt-3 text-sm text-blue-600 opacity-0 group-hover:opacity-100 transition">Pelajari lebih lanjut →</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===== How It Works ===== --}}
        <section id="how-it-works" class="py-16 sm:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-10">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Mulai Dalam 3 Langkah</h2>
                    <p class="mt-3 text-lg text-gray-600">Didesain agar onboarding tim jadi cepat.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @php
                        $steps = [
                            ['no'=>'1','title'=>'Buat Akun','desc'=>'Daftar & atur gudang, kategori, dan produk.'],
                            ['no'=>'2','title'=>'Impor / Input Data','desc'=>'Masukkan stok awal atau impor dari file/Sheets.'],
                            ['no'=>'3','title'=>'Pantau & Analisa','desc'=>'Gunakan dashboard & laporan untuk keputusan.'],
                        ];
                    @endphp
                    @foreach ($steps as $s)
                        <div class="p-6 bg-white rounded-2xl border border-gray-200 shadow-sm">
                            <div class="w-9 h-9 rounded-full bg-blue-600 text-white grid place-items-center font-bold">{{ $s['no'] }}</div>
                            <h3 class="mt-4 text-lg font-semibold text-gray-900">{{ $s['title'] }}</h3>
                            <p class="mt-1.5 text-gray-600">{{ $s['desc'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- ===== Pricing (Teaser) ===== --}}
        <section id="pricing" class="bg-white py-16 sm:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-10">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Harga Sederhana</h2>
                    <p class="mt-3 text-lg text-gray-600">Mulai gratis, upgrade kapan saja.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                    {{-- Starter --}}
                    <div class="p-6 rounded-2xl border border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900">Starter</h3>
                        <p class="text-gray-600 mt-1">Cocok untuk tim kecil.</p>
                        <div class="mt-4 text-3xl font-extrabold text-gray-900">Rp0<span class="text-base text-gray-500 font-medium">/bln</span></div>
                        <ul class="mt-4 space-y-2 text-sm text-gray-700">
                            <li>• 1 gudang, 500 SKU</li>
                            <li>• Pelacakan stok real-time</li>
                            <li>• Export ke Sheets</li>
                        </ul>
                        <a href="{{ route('register') }}" class="mt-6 inline-flex w-full justify-center bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2.5 rounded-xl">
                            Mulai Gratis
                        </a>
                    </div>

                    {{-- Pro --}}
                    <div class="p-6 rounded-2xl border-2 border-blue-600">
                        <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Rekomendasi</div>
                        <h3 class="mt-3 text-xl font-semibold text-gray-900">Pro</h3>
                        <p class="text-gray-600 mt-1">Untuk operasi yang berkembang.</p>
                        <div class="mt-4 text-3xl font-extrabold text-gray-900">Hubungi Kami</div>
                        <ul class="mt-4 space-y-2 text-sm text-gray-700">
                            <li>• Multi gudang & user</li>
                            <li>• Hak akses & audit log</li>
                            <li>• SLA & dukungan prioritas</li>
                        </ul>
                        <a href="{{ route('register') }}" class="mt-6 inline-flex w-full justify-center bg-gray-900 hover:bg-black text-white font-semibold px-4 py-2.5 rounded-xl">
                            Minta Penawaran
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== Testimonial ===== --}}
        <section class="py-16 sm:py-20">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-100 rounded-2xl p-8">
                    <blockquote class="text-xl leading-relaxed text-gray-800">
                        “Setelah pakai InventarisPro, stok kami rapi dan tim gudang hemat waktu sampai 35%. Notifikasi stok minimum benar-benar penyelamat.”
                    </blockquote>
                    <div class="mt-4 flex items-center gap-3">
                        <img class="w-10 h-10 rounded-full object-cover" src="https://i.pravatar.cc/80?img=12" alt="avatar">
                        <div>
                            <div class="font-semibold text-gray-900">Dara P.</div>
                            <div class="text-sm text-gray-500">Operations Lead, Nusantara Retail</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== FAQ ===== --}}
        <section id="faq" class="bg-white py-16 sm:py-20">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-10">
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Pertanyaan Umum</h2>
                    <p class="mt-3 text-lg text-gray-600">Kalau masih bingung, hubungi kami ya.</p>
                </div>

                <div class="space-y-3">
                    @php
                        $faqs = [
                            ['q'=>'Apakah InventarisPro gratis?','a'=>'Paket Starter gratis selamanya untuk tim kecil. Anda bisa upgrade kapan saja.'],
                            ['q'=>'Bisakah impor data lama?','a'=>'Bisa. Impor CSV/Excel atau sinkronkan ke Google Sheets.'],
                            ['q'=>'Apakah mendukung multi user?','a'=>'Ya. Paket Pro mendukung multi user dan pengaturan role/hak akses.'],
                            ['q'=>'Apakah datanya aman?','a'=>'Kami menerapkan praktik keamanan terbaik, enkripsi in-transit, dan kontrol akses berbasis peran.'],
                        ];
                    @endphp
                    @foreach ($faqs as $f)
                        <details class="group rounded-xl border border-gray-200 p-4 open:bg-gray-50">
                            <summary class="flex cursor-pointer list-none items-center justify-between">
                                <span class="font-semibold text-gray-900">{{ $f['q'] }}</span>
                                <svg class="w-5 h-5 text-gray-500 group-open:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </summary>
                            <p class="mt-2 text-gray-600 leading-relaxed">{{ $f['a'] }}</p>
                        </details>
                    @endforeach
                </div>

                <div class="text-center mt-10">
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl">
                        Mulai Sekarang
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6"/></svg>
                    </a>
                </div>
            </div>
        </section>
    </main>

    {{-- ===== Footer ===== --}}
    <footer class="border-t border-gray-200 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="text-sm text-gray-600">
                    © {{ date('Y') }} <span class="font-semibold">InventarisPro</span>. Semua hak cipta dilindungi.
                </div>
                <div class="flex items-center gap-5 text-sm">
                    <a href="#features" class="text-gray-600 hover:text-gray-900">Fitur</a>
                    <a href="#pricing" class="text-gray-600 hover:text-gray-900">Harga</a>
                    <a href="#faq" class="text-gray-600 hover:text-gray-900">FAQ</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900">Masuk</a>
                        <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
