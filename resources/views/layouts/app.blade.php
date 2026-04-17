<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmikomEventHub - Discover Amazing Events</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <nav class="glass sticky top-8 z-40 mx-4 mt-4 px-8 py-4 rounded-2xl border border-white/20 shadow-lg flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-200">
                AH
            </div>
            <span class="text-xl font-bold tracking-tighter text-slate-800">AmikomEventHub</span>
        </div>

        <div class="hidden md:flex gap-10 font-bold text-sm tracking-tight">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }} transition">
                Jelajahi
            </a>
            <a href="{{ route('katalog') }}" class="{{ request()->routeIs('katalog') ? 'text-indigo-600' : 'text-slate-600 hover:text-indigo-600' }} transition">
                Kategori
            </a>
            <a href="#" class="text-slate-800 cursor-default">
                Tentang Kami
            </a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-indigo-900 text-white py-16 px-6 mt-20">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
            <div class="space-y-4">
                <div class="flex items-center justify-center md:justify-start gap-2">
                    <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center text-indigo-900 font-bold text-xl">AH</div>
                    <span class="text-2xl font-bold">AmikomEventHub</span>
                </div>
                <p class="max-w-xs mx-auto md:mx-0 text-indigo-300 font-medium">Platform reservasi tiket event online terbaik untuk mahasiswa Universitas AMIKOM Yogyakarta.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6 italic text-lg">Navigasi</h4>
                <ul class="space-y-4 text-indigo-300 font-medium">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Jelajahi</a></li>
                    <li><a href="{{ route('katalog') }}" class="hover:text-white transition">Kategori</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-6 italic text-lg">Hubungi Kami</h4>
                <ul class="space-y-4 text-indigo-300 font-medium text-sm">
                    <li>📧 support@eventtiket.com</li>
                    <li>📞 +62 812 3456 7890</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto pt-12 mt-12 border-t border-indigo-800 text-center text-indigo-400 text-[10px] font-bold uppercase tracking-[0.3em]">
            &copy; 2026 AmikomEventHub • Melsindy Aulia Febiola
        </div>
    </footer>

</body>
</html>