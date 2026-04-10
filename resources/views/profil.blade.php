<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Profil Melsindy</title>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <nav class="bg-white shadow-md p-4 mb-10 flex justify-center gap-6 sticky top-0 z-50">
        <a href="/" class="text-indigo-600 font-bold hover:text-indigo-800 transition">Home</a>
        <a href="/profil" class="text-gray-600 hover:text-indigo-600 transition">Profil</a>
        <a href="/katalog" class="text-gray-600 hover:text-indigo-600 transition">Katalog</a>
        <a href="/bantuan" class="text-gray-600 hover:text-indigo-600 transition">Bantuan</a>
        <a href="/kontak" class="text-gray-600 hover:text-indigo-600 transition">Kontak</a>
    </nav>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row border border-gray-200">
            <div class="md:w-1/3 bg-indigo-600 p-8 text-white flex flex-col items-center justify-center">
                <div class="w-32 h-32 bg-white rounded-full mb-4 flex items-center justify-center text-4xl text-indigo-600 font-bold">M</div>
                <h2 class="text-xl font-bold uppercase tracking-wide">Melsindy Aulia</h2>
                <p class="text-indigo-200 text-sm">Information Systems</p>
            </div>
            <div class="md:w-2/3 p-8">
                <h3 class="text-2xl font-bold text-gray-800 border-b pb-2 mb-4">About Me</h3>
                <p class="text-gray-600 mb-6">Mahasiswa Sistem Informasi Amikom Yogyakarta yang berfokus pada Web Proggramming. Memiliki ketertarikan kuat dalam membangun infrastruktur web yang efisien.</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-indigo-50 rounded-lg">
                        <span class="block font-bold text-indigo-700 uppercase text-xs">Skills</span>
                        <span class="text-gray-700">PHP, Laravel, HTML, CSS</span>
                    </div>
                    <div class="p-4 bg-indigo-50 rounded-lg">
                        <span class="block font-bold text-indigo-700 uppercase text-xs">Location</span>
                        <span class="text-gray-700">Yogyakarta, ID</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>