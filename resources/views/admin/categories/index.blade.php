@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="mb-6">
    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-2xl bg-green-50 border border-green-100 font-medium flex justify-between items-center animate-fade-in">
            <span>✨ {{ session('success') }}</span>
            <button type="button" class="text-green-500 hover:text-green-700" onclick="this.parentElement.remove()">✕</button>
        </div>
    @endif
</div>

<div class="flex justify-between items-center mb-10">
    <div>
        <h1 class="text-3xl font-black italic text-indigo-900 underline underline-offset-8">Manajemen Kategori</h1>
        <p class="text-slate-500 mt-4 font-medium">Atur kategori event AmikomEventHub di sini.</p>
    </div>
    <button onclick="toggleModal('modalTambah', true)" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 active:scale-95 transition flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Kategori
    </button>
</div>

<div class="mb-6 flex gap-2">
    <form action="{{ route('admin.categories.index') }}" method="GET" class="flex gap-2 w-full max-w-md">
        <input type="text" name="search" placeholder="Cari nama kategori..." value="{{ $search ?? '' }}" 
            class="w-full px-4 py-2 border border-slate-200 rounded-xl font-medium text-sm focus:outline-none focus:border-indigo-500">
        <button type="submit" class="px-4 py-2 bg-slate-800 text-white rounded-xl font-bold text-sm hover:bg-slate-900 transition">Cari</button>
        @if($search)
            <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-xl font-bold text-sm hover:bg-slate-200 transition flex items-center">Reset</a>
        @endif
    </form>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
            <tr>
                <th class="px-8 py-4">No</th>
                <th class="px-8 py-4">Nama Kategori</th>
                <th class="px-8 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y border-t">
            @forelse($categories as $key => $category)
            <tr class="hover:bg-slate-50 transition">
                <td class="px-8 py-6 font-bold text-slate-400">#{{ $key + 1 }}</td>
                <td class="px-8 py-6 font-black text-slate-800 uppercase tracking-tight">{{ $category->name }}</td>
                <td class="px-8 py-6">
                    <div class="flex justify-center gap-3">
                        <button onclick="toggleModal('modalEdit{{ $category->id }}', true)" class="px-4 py-2 bg-amber-50 text-amber-600 rounded-xl font-bold text-xs hover:bg-amber-600 hover:text-white transition">EDIT</button>
                        
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-rose-50 text-rose-600 rounded-xl font-bold text-xs hover:bg-rose-600 hover:text-white transition">HAPUS</button>
                        </form>
                    </div>
                </td>
            </tr>

            <div id="modalEdit{{ $category->id }}" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden justify-center items-center z-50">
                <div class="bg-white p-8 rounded-[2rem] w-full max-w-md shadow-2xl border border-slate-100">
                    <h3 class="text-xl font-black text-indigo-900 mb-4">📝 Edit Kategori</h3>
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-6">
                            <label class="block text-xs font-black uppercase text-slate-400 tracking-wider mb-2">Nama Kategori</label>
                            <input type="text" name="name" value="{{ $category->name }}" required class="w-full px-4 py-3 border border-slate-200 rounded-xl font-medium focus:outline-none focus:border-indigo-500 text-slate-800">
                        </div>
                        <div class="flex justify-end gap-3">
                            <button type="button" onclick="toggleModal('modalEdit{{ $category->id }}', false)" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-xl font-bold text-xs hover:bg-slate-200">Batal</button>
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-xl font-bold text-xs hover:bg-indigo-700">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
            @empty
            <tr>
                <td colspan="3" class="px-8 py-10 text-center font-medium text-slate-400">
                    Data kategori belum ada atau tidak ditemukan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div id="modalTambah" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden justify-center items-center z-50">
    <div class="bg-white p-8 rounded-[2rem] w-full max-w-md shadow-2xl border border-slate-100">
        <h3 class="text-xl font-black text-indigo-900 mb-4">✨ Tambah Kategori Baru</h3>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-xs font-black uppercase text-slate-400 tracking-wider mb-2">Nama Kategori</label>
                <input type="text" name="name" required class="w-full px-4 py-3 border border-slate-200 rounded-xl font-medium focus:outline-none focus:border-indigo-500 text-slate-800" placeholder="Contoh: Web Programming">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="toggleModal('modalTambah', false)" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-xl font-bold text-xs hover:bg-slate-200">Batal</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-xl font-bold text-xs hover:bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleModal(modalId, show) {
        const modal = document.getElementById(modalId);
        if (show) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        } else {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    }
</script>
@endsection