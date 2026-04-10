<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Pusat Bantuan - AmikomEventHub</title>
</head>
<body class="bg-gray-50 font-sans">
    <nav class="bg-white shadow-md p-4 mb-10 flex justify-center gap-6 sticky top-0 z-50">
        <a href="/" class="text-gray-600 hover:text-indigo-600 transition font-medium">Home</a>
        <a href="/profil" class="text-gray-600 hover:text-indigo-600 transition font-medium">Profil</a>
        <a href="/katalog" class="text-gray-600 hover:text-indigo-600 transition font-medium">Katalog</a>
        <a href="/bantuan" class="text-indigo-600 font-bold border-b-2 border-indigo-600">Bantuan</a>
        <a href="/kontak" class="text-gray-600 hover:text-indigo-600 transition font-medium">Kontak</a>
    </nav>

    <div class="max-w-3xl mx-auto px-4 pb-20">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">Ada yang bisa kami bantu?</h1>
            <p class="text-gray-600">Cari jawaban dari pertanyaan yang sering diajukan di bawah ini.</p>
        </div>

        <div class="space-y-4">
            <details class="group bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" open>
                <summary class="flex justify-between items-center p-5 cursor-pointer list-none font-semibold text-gray-800 hover:bg-gray-50 transition">
                    Apa itu AmikomEventHub?
                    <span class="transition group-open:rotate-180">
                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                    </span>
                </summary>
                <div class="p-5 text-gray-600 border-t border-gray-100 leading-relaxed">
                    AmikomEventHub adalah platform digital yang dirancang untuk memudahkan mahasiswa Universitas Amikom Yogyakarta dalam mencari, mengikuti, dan mengelola event-event kampus secara terintegrasi.
                </div>
            </details>

            <details class="group bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <summary class="flex justify-between items-center p-5 cursor-pointer list-none font-semibold text-gray-800 hover:bg-gray-50 transition">
                    Bagaimana cara mendaftar workshop yang diselenggarakan amikom?
                    <span class="transition group-open:rotate-180">
                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                    </span>
                </summary>
                <div class="p-5 text-gray-600 border-t border-gray-100 leading-relaxed">
                    Anda dapat menuju halaman <strong>Katalog</strong>, pilih event yang diinginkan, lalu klik tombol "Detail Event" untuk mendapatkan link pendaftaran resmi.
                </div>
            </details>

            <details class="group bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <summary class="flex justify-between items-center p-5 cursor-pointer list-none font-semibold text-gray-800 hover:bg-gray-50 transition">
                    Apakah layanan ini gratis?
                    <span class="transition group-open:rotate-180">
                        <svg fill="none" height="24" shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24"><path d="M6 9l6 6 6-6"></path></svg>
                    </span>
                </summary>
                <div class="p-5 text-gray-600 border-t border-gray-100 leading-relaxed">
                    Ya, akses informasi di AmikomEventHub sepenuhnya gratis bagi seluruh mahasiswa. Namun, beberapa event workshop mungkin memerlukan biaya registrasi sesuai kebijakan penyelenggara.
                </div>
            </details>
        </div>

        <div class="mt-16 bg-indigo-900 rounded-2xl p-8 text-center text-white">
            <h3 class="text-xl font-bold mb-2">Masih punya pertanyaan?</h3>
            <p class="text-indigo-200 mb-6 italic text-sm">"Tanyakan langsung kepada kami melalui halaman kontak."</p>
            <a href="/kontak" class="inline-block bg-white text-indigo-900 font-bold py-3 px-8 rounded-full hover:bg-indigo-100 transition shadow-lg">
                Hubungi Kami
            </a>
        </div>
    </div>
</body>
</html>