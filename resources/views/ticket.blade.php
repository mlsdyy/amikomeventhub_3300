<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Ticket - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-indigo-600 text-white min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full">
        <div class="text-center mb-8">
            <div
                class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-black">Pembayaran Berhasil!</h1>
            <p class="text-indigo-100 mt-2">Tiket Anda telah terbit dan siap digunakan.</p>
        </div>

        <div class="bg-white text-slate-900 rounded-[2.5rem] overflow-hidden shadow-2xl relative">
            <div class="p-8 bg-indigo-50 border-b-4 border-dashed border-indigo-100 text-center relative">
                <p class="text-indigo-600 font-bold uppercase tracking-widest text-xs mb-2">E-Ticket Resmi</p>
                <h2 class="text-2xl font-black leading-tight text-slate-800">Jazz Night 2024: A Celebration</h2>

                <div class="absolute -left-4 -bottom-4 w-8 h-8 bg-indigo-600 rounded-full"></div>
                <div class="absolute -right-4 -bottom-4 w-8 h-8 bg-indigo-600 rounded-full"></div>
            </div>

            <div class="p-8 space-y-8">
                <div class="grid grid-cols-2 gap-6 text-left">
                    <div>
                        <p class="text-slate-400 text-[10px] font-bold uppercase mb-1 tracking-widest">Nama Pembeli</p>
                        <p class="font-bold text-lg text-slate-800">Donni Prabowo</p>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] font-bold uppercase mb-1 tracking-widest">Tanggal & Waktu</p>
                        <p class="font-bold text-lg text-slate-800">16 Nov, 19:30</p>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] font-bold uppercase mb-1 tracking-widest">Order ID</p>
                        <p class="font-bold text-slate-800 uppercase">#TRX-99210</p>
                    </div>
                    <div>
                        <p class="text-slate-400 text-[10px] font-bold uppercase mb-1 tracking-widest">Lokasi</p>
                        <p class="font-bold text-slate-800">Blue Note Lounge</p>
                    </div>
                </div>

                <div class="bg-slate-50 p-6 rounded-3xl flex flex-col items-center border border-slate-100">
                    <p class="text-slate-400 text-[10px] font-bold uppercase mb-4 tracking-[0.2em]">Scan QR untuk Check-in</p>
                    <div class="w-48 h-48 bg-white p-4 rounded-2xl shadow-inner border border-slate-100 flex items-center justify-center">
                        <div class="w-full h-full border-4 border-slate-900 flex flex-wrap p-1 opacity-90">
                            <div class="w-1/4 h-1/4 bg-slate-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-slate-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-slate-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-slate-900"></div>
                            <div class="w-1/4 h-1/4 bg-slate-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-slate-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-slate-900"></div>
                            <div class="w-1/4 h-1/4 bg-white"></div>
                            <div class="w-1/4 h-1/4 bg-slate-900"></div>
                        </div>
                    </div>
                    <p class="mt-4 font-mono font-black text-indigo-600 tracking-wider">TKT-001293848</p>
                </div>
            </div>

            <div class="px-8 pb-8 space-y-3">
                <button onclick="window.print()"
                    class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-black shadow-xl shadow-indigo-100 hover:bg-indigo-700 transition-all active:scale-95">
                    Cetak / Simpan PDF
                </button>
                <a href="{{ route('home') }}"
                    class="block text-center py-2 text-slate-400 font-bold hover:text-indigo-600 transition-colors uppercase text-xs tracking-widest">Kembali ke Beranda</a>
            </div>
        </div>
    </div>

</body>

</html>