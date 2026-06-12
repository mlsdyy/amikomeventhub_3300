@extends('layouts.app')
@section('title', 'Checkout - ' . $event->title)
@section('content')
<main class="max-w-3xl mx-auto px-6 py-20 relative">
    <div class="mb-12">
        <a href="{{ route('event.detail', $event->id) }}" class="text-indigo-600 font-bold flex items-center gap-2 mb-6">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Event
        </a>
        <h1 class="text-4xl font-extrabold">Checkout</h1>
        <p class="text-slate-500 mt-2">Lengkapi data Anda untuk mendapatkan tiket.</p>
    </div>

    <div class="grid grid-cols-1 gap-8">
        <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            <h3 class="text-xl font-bold mb-6 border-b pb-4">Pesanan Anda</h3>
            <div class="flex gap-6 items-start">
                <img src="{{ ($event->poster_path && Storage::disk('public')->exists($event->poster_path)) ? asset('storage/' . $event->poster_path) : 'https://placehold.co/200x200' }}" alt="Event" class="w-24 h-24 rounded-2xl object-cover">
                <div>
                    <h4 class="font-extrabold text-lg">{{ $event->title }}</h4>
                    <p class="text-slate-500">
                        {{ $event->date ? \Carbon\Carbon::parse($event->date)->translatedFormat('d M Y') : '-' }} • {{ $event->location }}
                    </p>
                    <p class="text-indigo-600 font-bold mt-2">1 x Rp {{ number_format($event->price, 0, ',', '.') }}</p>
                </div>
            </div>
            <div class="mt-8 pt-6 border-t space-y-3">
                <div class="flex justify-between text-slate-500">
                    <span>Harga Tiket</span>
                    <span>Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-slate-500">
                    <span>Biaya Layanan</span>
                    <span>Rp 5.000</span>
                </div>
                <div class="flex justify-between text-2xl font-black mt-4 pt-4 border-t">
                    <span>Total Bayar</span>
                    <span class="text-indigo-600">Rp {{ number_format($event->price + 5000, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            <h3 class="text-xl font-bold mb-6 italic text-indigo-600 underline underline-offset-8">📦 Data Pemesan (Tanpa Login)</h3>
            <form id="checkoutForm" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Nama Lengkap</label>
                    <input type="text" name="customer_name" id="c_name" placeholder="Masukkan nama sesuai identitas" class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium" required>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">Email Aktif</label>
                        <input type="email" name="customer_email" id="c_email" placeholder="contoh@gmail.com" class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium" required>
                        <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase tracking-tighter">*E-Ticket akan dikirim ke email ini</p>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">No. WhatsApp</label>
                        <input type="tel" name="customer_phone" id="c_phone" placeholder="08xxxxxxx" class="w-full px-5 py-4 bg-white border-2 border-slate-100 rounded-2xl focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600 outline-none transition font-medium" required>
                    </div>
                </div>
                <button type="submit" id="btnSubmit" class="w-full py-5 bg-indigo-600 text-white rounded-2xl font-black text-xl shadow-xl shadow-indigo-200 hover:bg-indigo-700 active:scale-95 transition-all">
                    Lanjut Pembayaran
                </button>
            </form>
        </div>
    </div>

    <div id="paymentModal" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center hidden opacity-0 transition-all duration-300">
        <div class="bg-white rounded-3xl w-full max-w-md p-8 shadow-2xl relative mx-4 transform scale-95 transition-all duration-300" id="modalContainer">
            <button onclick="closeModal()" class="absolute right-6 top-6 text-slate-400 hover:text-slate-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class="text-center mt-4">
                <div class="flex justify-center mb-4">
                    <span class="text-xl font-black tracking-tight text-blue-900 flex items-center gap-1">
                        <span class="w-3 h-3 bg-teal-400 rounded-full inline-block"></span> midtrans
                    </span>
                </div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Tagihan</p>
                <h2 class="text-4xl font-black text-blue-900 mt-1" id="modalTotalPay">Rp 0</h2>
                <p class="text-xs font-mono font-bold text-slate-400 mt-2" id="modalOrderId">#TRX-XXXXX</p>
            </div>

            <div class="mt-8 space-y-4">
                <button onclick="processSimulatedPayment()" class="w-full p-5 bg-slate-50 border-2 border-slate-100 rounded-2xl flex items-center justify-between hover:border-indigo-600 hover:bg-indigo-50/30 transition group text-left">
                    <div>
                        <p class="font-extrabold text-slate-800 text-base group-hover:text-indigo-600">GoPay / QRIS</p>
                        <p class="text-xs text-slate-400 mt-0.5">Bayar instan menggunakan e-wallet Anda</p>
                    </div>
                    <svg class="w-5 h-5 text-slate-400 group-hover:text-indigo-600 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <button onclick="processSimulatedPayment()" class="w-full p-5 bg-slate-50 border-2 border-slate-100 rounded-2xl flex items-center justify-between hover:border-indigo-600 hover:bg-indigo-50/30 transition group text-left opacity-60">
                    <div>
                        <p class="font-extrabold text-slate-800 text-base">Transfer Bank</p>
                        <p class="text-xs text-slate-400 mt-0.5">Virtual Account (Virtual Account Manual)</p>
                    </div>
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <div class="mt-8 pt-6 border-t text-center flex items-center justify-center gap-2 text-slate-400 text-xs font-bold uppercase tracking-wider">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                Secure Checkout
            </div>
        </div>
    </div>
</main>

<script>
    let activeOrderId = '';

    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const btn = document.getElementById('btnSubmit');
        btn.innerHTML = 'Memproses...';
        btn.disabled = true;

        let formData = new FormData(this);

        fetch("{{ route('checkout.store', $event->id) }}", {
            method: "POST",
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                activeOrderId = data.order_id;
                
                document.getElementById('modalTotalPay').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(data.total_price);
                document.getElementById('modalOrderId').innerText = '#' + data.order_id;

                const modal = document.getElementById('paymentModal');
                const container = document.getElementById('modalContainer');
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    container.classList.remove('scale-95');
                }, 20);
            } else {
                alert('Gagal membuat pesanan.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan sistem.');
        })
        .finally(() => {
            btn.innerHTML = 'Lanjut Pembayaran';
            btn.disabled = false;
        });
    });

    function closeModal() {
        const modal = document.getElementById('paymentModal');
        const container = document.getElementById('modalContainer');
        modal.classList.add('opacity-0');
        container.classList.add('scale-95');
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }

    function processSimulatedPayment() {
        const container = document.getElementById('modalContainer');
        container.innerHTML = `
            <div class="text-center py-12 space-y-6">
                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto text-emerald-600 animate-bounce">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-black text-slate-800">Pembayaran Sukses!</h3>
                <p class="text-sm text-slate-400">Sistem mendeteksi dana masuk. Mempersiapkan E-Ticket Anda...</p>
            </div>
        `;
        
        // 🛠️ REVISI KECIL: Menggunakan URL absolut dari helper Laravel agar anti-nyasar
        setTimeout(() => {
            window.location.href = "{{ url('/ticket') }}/" + activeOrderId;
        }, 2000);
    }
</script>
@endsection