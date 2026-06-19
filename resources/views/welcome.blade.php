<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmikomEventHub - Temukan Event Seru!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght=300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900">

    <nav class="glass sticky top-8 z-40 mx-4 mt-4 px-6 py-4 rounded-2xl border border-white/20 shadow-lg flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl">
                AH
            </div>
            <span class="text-xl font-bold tracking-tight">AmikomEventHub</span>
        </div>

        <div class="hidden md:flex gap-8 font-medium ms-auto">
            <a href="{{ route('home') }}" class="text-indigo-600">Jelajahi</a>
            <a href="#categories-section" class="hover:text-indigo-600 transition">Kategori</a>
            <a href="#partners-section" class="hover:text-indigo-600 transition">Tentang Kami</a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12 text-left">
        <div class="flex-1 space-y-8">
            <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">#1 Event Platform</span>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                Temukan & Pesan <span class="text-indigo-600">Tiket Event</span> Impianmu.
            </h1>
            <p class="text-lg text-slate-500 max-w-lg leading-relaxed">
                Dari konser musik hingga workshop teknologi, semua ada di genggamanmu. Pesan aman & cepat dengan sistem Amikom.
            </p>
            <div class="flex gap-4">
                <a href="#events" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-200 hover:scale-105 transition-transform">
                    Mulai Jelajah
                </a>
                <a href="#" class="px-8 py-4 border-2 border-slate-200 rounded-2xl font-bold text-lg hover:border-indigo-600 hover:text-indigo-600 transition">
                    Cara Pesan
                </a>
            </div>
        </div>
        <div class="flex-1 relative">
            <div class="absolute -top-10 -left-10 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            
            <img src="{{ asset('assets/concert.png') }}" alt="Concert" class="rounded-[2rem] shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center" onerror="this.src='https://via.placeholder.com/500x600?text=EventHub'">

            <div class="absolute -bottom-6 -left-6 glass p-6 rounded-2xl shadow-xl z-20 border border-white">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-bold uppercase">Terverifikasi</p>
                        <p class="font-bold">Pembayaran Aman & Cepat</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="events" class="max-w-7xl mx-auto px-6 py-20">
        <div class="flex justify-between items-end mb-12">
            <div class="text-left">
                <h2 class="text-3xl font-extrabold mb-2">Event Terdekat</h2>
                <p class="text-slate-500 font-medium">Jangan sampai ketinggalan acara seru minggu ini!</p>
            </div>
            <div class="flex gap-2">
                <button class="p-3 border rounded-xl hover:bg-white hover:shadow-md transition">Semua Kategori</button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
            @forelse($events as $event)
                <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col">
                    
                    <div class="relative w-full aspect-[3/4] bg-slate-100 overflow-hidden">
                        
                        @php
                            // Logika dinamis VS Code: Mendukung panggil dari images/ (InfinityFree) maupun storage/ (Lokal & Laravel Cloud)
                            if (\Illuminate\Support\Str::startsWith($event->poster_path, 'images/')) {
                                $imagePath = asset($event->poster_path);
                            } else {
                                $imagePath = asset('storage/' . $event->poster_path);
                            }
                        @endphp

                        <img src="{{ $imagePath }}" 
                             alt="{{ $event->title }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                             onerror="this.onerror=null; this.src='https://via.placeholder.com/300x400?text=Poster+Not+Found';">
                        
                        <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600 z-10">
                            {{ $event->category->name ?? 'Event' }}
                        </div>
                    </div>

                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl font-bold mb-2 group-hover:text-indigo-600 transition">{{ $event->title }}</h3>
                            
                            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y') }}</span>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center pt-4 border-t mt-auto">
                            <span class="text-2xl font-black text-indigo-600">
                                {{ $event->price == 0 ? 'Gratis' : 'Rp ' . number_format($event->price, 0, ',', '.') }}
                            </span>
                            
                            <a href="{{ route('event.detail', $event->id) }}" class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-12 text-center text-slate-400 font-medium text-sm">
                    Belum ada event terdekat yang terdaftar.
                </div>
            @endforelse
        </div>
    </section>

    <div id="categories-section" class="py-16 bg-slate-100/50 border-t border-slate-200/60">
        <div class="max-w-7xl mx-auto px-6 text-left">
            
            <div class="mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-2 tracking-tight">Eksplor Kategori Event</h2>
                <p class="text-slate-500 font-medium mb-8">Temukan berbagai pilihan event menarik di AmikomEventHub berdasarkan kategorinya.</p>
                
                <div class="flex flex-wrap gap-3">
                    @forelse($categories as $category)
                        <span class="px-5 py-3 bg-white border border-slate-200 text-slate-700 font-bold text-sm rounded-2xl shadow-sm hover:border-indigo-500 hover:text-indigo-600 transition cursor-pointer">
                            # {{ $category->name }}
                        </span>
                    @empty
                        <p class="text-slate-400 font-medium text-sm">Belum ada kategori yang tersedia.</p>
                    @endforelse
                </div>
            </div>

            <div id="partners-section" class="pt-8 border-t border-slate-200/40">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-2 tracking-tight">Partner & Resmi Sponsor</h2>
                <p class="text-slate-500 font-medium mb-8">Aplikasi web AmikomEventHub didukung penuh oleh jajaran partner terbaik kami.</p>
                
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    @forelse($partners as $partner)
                        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex flex-col items-center justify-center gap-3 hover:shadow-md transition">
                            <img src="{{ $partner->logo_url }}" alt="Logo {{ $partner->name }}" class="w-16 h-16 object-contain p-1" onerror="this.src='https://via.placeholder.com/100?text=No+Logo'">
                            <span class="text-xs font-black text-slate-800 uppercase tracking-tight text-center">{{ $partner->name }}</span>
                        </div>
                    @empty
                        <div class="col-span-full py-6 text-center text-slate-400 font-medium text-sm">
                            Belum ada partner resmi yang terdaftar.
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-indigo-900 text-indigo-100 py-20 px-6 mt-20 text-left">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="space-y-4 col-span-2">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">
                        AH
                    </div>
                    <span class="text-2xl font-bold text-white">AmikomEventHub</span>
                </div>
                <p class="max-w-xs text-indigo-300">Platform reservasi tiket event online terbaik untuk mahasiswa Amikom.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6">Navigasi</h4>
                <ul class="space-y-4">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Home</a></li>
                    <li><a href="#" class="hover:text-white transition">Semua Event</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-12 mt-12 border-t border-indigo-800 text-center text-indigo-400 text-sm">
            &copy; 2026 AmikomEventHub. Built with Laravel.
        </div>
    </footer>

</body>

</html>