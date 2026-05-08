@extends('layouts.admin') {{-- Baris ini buat manggil kerangka admin.blade.php di atas --}}

@section('content')
    {{-- Di sini kamu cuma tulis isi tabelnya aja --}}
    <header class="flex justify-between items-center mb-10">
        <h1 class="text-3xl font-black italic">Kelola Event</h1>
        <button class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold">+ Tambah Event</button>
    </header>

    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
        {{-- Masukkan kodingan TABLE kamu di sini --}}
        <table class="w-full text-left">
            </table>
    </div>
@endsection