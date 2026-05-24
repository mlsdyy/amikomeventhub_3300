@extends('layouts.admin')

@section('title', 'Manajemen Partner')

@section('content')
<div class="mb-6">
    @if(session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-2xl bg-green-50 border border-green-100 font-medium flex justify-between items-center">
            <span>✨ {{ session('success') }}</span>
            <button type="button" class="text-green-500 hover:text-green-700" onclick="this.parentElement.remove()">✕</button>
        </div>
    @endif
</div>

<div class="flex justify-between items-center mb-10">
    <div>
        <h1 class="text-3xl font-black italic text-indigo-900 border-b-4 border-indigo-900 pb-1 inline-block tracking-tight">Manajemen Partner</h1>
        <p class="text-slate-500 mt-4 font-medium">Atur partner / sponsor event AmikomEventHub di sini.</p>
    </div>
    <button onclick="toggleModal('modalTambahPartner', true)" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 active:scale-95 transition flex items-center gap-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Partner
    </button>
</div>

<div class="mb-6 flex gap-2">
    <form action="{{ route('admin.partners.index') }}" method="GET" class="flex gap-2 w-full max-w-md">
        <input type="text" name="search" placeholder="Cari nama partner..." value="{{ $search ?? '' }}" 
            class="w-full px-4 py-2 border border-slate-200 rounded-xl font-medium text-sm focus:outline-none focus:border-indigo-500">
        <button type="submit" class="px-4 py-2 bg-slate-800 text-white rounded-xl font-bold text-sm hover:bg-slate-900 transition">Cari</button>
        @if($search)
            <a href="{{ route('admin.partners.index') }}" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-xl font-bold text-sm hover:bg-slate-200 transition flex items-center">Reset</a>
        @endif
    </form>
</div>

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
            <tr>
                <th class="px-8 py-4">No</th>
                <th class="px-8 py-4">Logo</th>
                <th class="px-8 py-4">Nama Partner</th>
                <th class="px-8 py-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y border-t">
            @forelse($partners as $key => $partner)
            <tr class="hover:bg-slate-50 transition">
                <td class="px-8 py-6 font-bold text-slate-400">#{{ $key + 1 }}</td>
                <td class="px-8 py-6">
                    <div class="w-16 h-16 bg-slate-50 border border-slate-100 rounded-2xl flex items-center justify-center p-2 overflow-hidden shadow-sm">
                        <img src="{{ $partner->logo_url }}" alt="Logo {{ $partner->name }}" class="max-w-full max-h-full object-contain" onerror="this.src='https://via.placeholder.com/100?text=Error'">
                    </div>
                </td>
                <td class="px-8 py-6 font-black text-slate-800 uppercase tracking-tight">{{ $partner->name }}</td>
                <td class="px-8 py-6">
                    <div class="flex justify-center gap-3">
                        <button onclick="toggleModal('modalEditPartner{{ $partner->id }}', true)" class="px-4 py-2 bg-amber-50 text-amber-600 rounded-xl font-bold text-xs hover:bg-amber-600 hover:text-white transition">EDIT</button>
                        
                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus partner ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-rose-50 text-rose-600 rounded-xl font-bold text-xs hover:bg-rose-600 hover:text-white transition">HAPUS</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-8 py-10 text-center font-medium text-slate-400">
                    Data partner belum ada atau tidak ditemukan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@foreach($partners as $partner)
<div id="modalEditPartner{{ $partner->id }}" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden justify-center items-center z-50">
    <div class="bg-white p-8 rounded-[2rem] w-full max-w-md shadow-2xl border border-slate-100 text-left">
        <h3 class="text-xl font-black text-indigo-900 mb-4">📝 Edit Data Partner</h3>
        <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-xs font-black uppercase text-slate-400 tracking-wider mb-2">Nama Partner</label>
                <input type="text" name="name" value="{{ $partner->name }}" required class="w-full px-4 py-3 border border-slate-200 rounded-xl font-medium focus:outline-none focus:border-indigo-500 text-slate-800">
            </div>
            <div class="mb-6">
                <label class="block text-xs font-black uppercase text-slate-400 tracking-wider mb-2">Logo URL</label>
                <input type="text" name="logo_url" value="{{ $partner->logo_url }}" required class="w-full px-4 py-3 border border-slate-200 rounded-xl font-medium focus:outline-none focus:border-indigo-500 text-slate-800">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="toggleModal('modalEditPartner{{ $partner->id }}', false)" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-xl font-bold text-xs hover:bg-slate-200">Batal</button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-xl font-bold text-xs hover:bg-indigo-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endforeach

<div id="modalTambahPartner" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm hidden justify-center items-center z-50">
    <div class="bg-white p-8 rounded-[2rem] w-full max-w-md shadow-2xl border border-slate-100 text-left">
        <h3 class="text-xl font-black text-indigo-900 mb-4">✨ Tambah Partner Baru</h3>
        <form action="{{ route('admin.partners.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-xs font-black uppercase text-slate-400 tracking-wider mb-2">Nama Partner</label>
                <input type="text" name="name" required class="w-full px-4 py-3 border border-slate-200 rounded-xl font-medium focus:outline-none focus:border-indigo-500 text-slate-800" placeholder="Contoh: Google Inc">
            </div>
            <div class="mb-6">
                <label class="block text-xs font-black uppercase text-slate-400 tracking-wider mb-2">Logo URL</label>
                <input type="text" name="logo_url" required class="w-full px-4 py-3 border border-slate-200 rounded-xl font-medium focus:outline-none focus:border-indigo-500 text-slate-800" placeholder="Masukkan URL Gambar mentah...">
            </div>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="toggleModal('modalTambahPartner', false)" class="px-4 py-2 bg-slate-100 text-slate-600 rounded-xl font-bold text-xs hover:bg-slate-200">Batal</button>
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