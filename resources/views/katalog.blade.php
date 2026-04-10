<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Katalog Event</title>
</head>
<body class="bg-gray-50 p-10">
    <nav class="bg-white shadow-sm p-4 mb-10 flex justify-center gap-6 rounded-xl">
        <a href="/" class="text-indigo-600 font-bold">Home</a>
        <a href="/profil" class="text-gray-600">Profil</a>
        <a href="/katalog" class="font-bold text-indigo-600">Katalog</a>
        <a href="/bantuan" class="text-gray-600">Bantuan</a>
    </nav>

    <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-10 italic">Amikom Event Hub</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2 p-6 border-t-4 border-indigo-500">
            <span class="bg-indigo-100 text-indigo-700 text-xs font-bold px-2 py-1 rounded uppercase">Tech</span>
            <h3 class="font-bold text-xl mt-3 text-gray-800">Backend Workshop</h3>
            <p class="text-gray-500 text-sm mt-2">Belajar dasar-dasar Laravel 12 bersama instruktur AMCC.</p>
            <button class="mt-4 w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">Detail Event</button>
        </div>

        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2 p-6 border-t-4 border-green-500">
            <span class="bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded uppercase">Design</span>
            <h3 class="font-bold text-xl mt-3 text-gray-800">UI/UX Design Jam</h3>
            <p class="text-gray-500 text-sm mt-2">Membangun tampilan modern dengan Figma dan Tailwind CSS.</p>
            <button class="mt-4 w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition">Detail Event</button>
        </div>

        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-2 p-6 border-t-4 border-orange-500">
            <span class="bg-orange-100 text-orange-700 text-xs font-bold px-2 py-1 rounded uppercase">Talk</span>
            <h3 class="font-bold text-xl mt-3 text-gray-800">Career Talk 2026</h3>
            <p class="text-gray-500 text-sm mt-2">Persiapan masuk dunia kerja IT bersama para ahli.</p>
            <button class="mt-4 w-full bg-orange-600 text-white py-2 rounded-lg hover:bg-orange-700 transition">Detail Event</button>
        </div>
    </div>
</body>
</html>