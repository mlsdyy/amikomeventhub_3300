@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="flex justify-between items-center mb-10">
    <div>
        <h1 class="text-3xl font-black italic text-indigo-900 underline underline-offset-8">📦 Manajemen Kategori</h1>
        <p class="text-slate-500 mt-4 font-medium">Atur kategori event AmikomEventHub di sini.</p>
    </div>
    <button class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 active:scale-95 transition flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Kategori
    </button>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
            <tr>
                <th class="px-8 py-4">ID</th>
                <th class="px-8 py-4">Nama Kategori</th>
                <th class="px-8 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y border-t">
            <tr class="hover:bg-slate-50 transition">
                <td class="px-8 py-6 font-bold text-slate-400">#01</td>
                <td class="px-8 py-6 font-black text-slate-800 uppercase tracking-tight">Seminar & Workshop</td>
                <td class="px-8 py-6">
                    <div class="flex justify-center gap-3">
                        <button class="px-4 py-2 bg-amber-50 text-amber-600 rounded-xl font-bold text-xs hover:bg-amber-600 hover:text-white transition">EDIT</button>
                        <button class="px-4 py-2 bg-rose-50 text-rose-600 rounded-xl font-bold text-xs hover:bg-rose-600 hover:text-white transition">HAPUS</button>
                    </div>
                </td>
            </tr>
            <tr class="hover:bg-slate-50 transition">
                <td class="px-8 py-6 font-bold text-slate-400">#02</td>
                <td class="px-8 py-6 font-black text-slate-800 uppercase tracking-tight">Konser Musik</td>
                <td class="px-8 py-6 text-center">
                    <div class="flex justify-center gap-3">
                        <button class="px-4 py-2 bg-amber-50 text-amber-600 rounded-xl font-bold text-xs">EDIT</button>
                        <button class="px-4 py-2 bg-rose-50 text-rose-600 rounded-xl font-bold text-xs">HAPUS</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection