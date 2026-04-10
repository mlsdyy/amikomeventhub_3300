<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>AmikomEventHub</title>
</head>
<body class="bg-[#f8fafc] text-slate-800 font-sans min-h-screen">

    <nav class="p-6 flex justify-between items-center max-w-6xl mx-auto">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-indigo-600 rounded-lg"></div>
            <span class="font-bold text-xl tracking-tight">AmikomEventHub</span>
        </div>
        <div class="hidden md:flex gap-8 text-sm font-medium">
            <a href="/profil" class="hover:text-indigo-600">Profil</a>
            <a href="/katalog" class="hover:text-indigo-600">Katalog</a>
            <a href="/bantuan" class="hover:text-indigo-600">Bantuan</a>
            <a href="/kontak" class="hover:text-indigo-600">Kontak</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 pt-20 pb-12 flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2">
            <h1 class="text-5xl md:text-6xl font-extrabold leading-[1.1] mb-6">
                Temukan Event <br>
                <span class="text-indigo-600">Terbaik</span> di Kampus.
            </h1>
            <p class="text-lg text-slate-500 mb-10 max-w-md">
                Satu platform untuk semua informasi workshop, seminar, dan kompetisi di lingkungan Universitas Amikom Yogyakarta.
            </p>
            
            <div class="flex gap-4">
                <a href="/katalog" class="bg-slate-900 text-white px-8 py-4 rounded-xl font-semibold hover:bg-slate-800 transition shadow-lg">
                    Jelajahi Event
                </a>
                <a href="/bantuan" class="bg-white border border-slate-200 px-8 py-4 rounded-xl font-semibold hover:bg-slate-50 transition">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>

        <div class="md:w-1/2 grid grid-cols-2 gap-4 opacity-20 md:opacity-100">
            <div class="h-40 bg-indigo-100 rounded-3xl mt-12"></div>
            <div class="h-40 bg-indigo-600 rounded-3xl"></div>
            <div class="h-40 bg-slate-900 rounded-3xl"></div>
            <div class="h-40 bg-indigo-200 rounded-3xl -mt-12"></div>
        </div>
    </main>

    <footer class="mt-20 border-t border-slate-200 py-10 text-center text-sm text-slate-400">
        &copy; 2026 amikomeventhub_3300 • Dikembangkan oleh Melsindy Aulia
    </footer>

</body>
</html>