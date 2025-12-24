@extends('layouts.app')

@section('title', 'Cara Pemesanan')

@section('content')
<section class="bg-brand-gray pt-32 pb-28">
    <div class="max-w-7xl mx-auto px-4">

        {{-- Header --}}
        <div class="text-center mb-20">
            <h2 class="font-serif text-4xl md:text-5xl text-brand-black mb-6">
                Cara Pemesanan
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto font-light leading-relaxed">
                Proses pemesanan yang sederhana dan cepat, dirancang agar Anda dapat berbelanja dengan nyaman.
            </p>
        </div>

        {{-- Steps --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            {{-- Step 1 --}}
            <div class="bg-white rounded-3xl shadow-md hover:shadow-xl transition p-10 text-center space-y-6">
                <div class="w-14 h-14 mx-auto flex items-center justify-center border border-brand-black text-brand-black rounded-full font-semibold text-lg">
                    01
                </div>
                <h3 class="font-serif text-xl tracking-wide">
                    Pilih Produk
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Temukan produk favorit Anda dari koleksi kami dan buka halaman detail untuk melihat informasi lengkap.
                </p>
            </div>

            {{-- Step 2 --}}
            <div class="bg-white rounded-3xl shadow-md hover:shadow-xl transition p-10 text-center space-y-6">
                <div class="w-14 h-14 mx-auto flex items-center justify-center border border-brand-black text-brand-black rounded-full font-semibold text-lg">
                    02
                </div>
                <h3 class="font-serif text-xl tracking-wide">
                    Tekan Order
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Klik tombol <strong>“Order via WhatsApp”</strong> yang tersedia di halaman produk pilihan Anda.
                </p>
            </div>

            {{-- Step 3 --}}
            <div class="bg-white rounded-3xl shadow-md hover:shadow-xl transition p-10 text-center space-y-6">
                <div class="w-14 h-14 mx-auto flex items-center justify-center border border-brand-black text-brand-black rounded-full font-semibold text-lg">
                    03
                </div>
                <h3 class="font-serif text-xl tracking-wide">
                    Chat & Konfirmasi
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    Anda akan diarahkan ke WhatsApp untuk konfirmasi pesanan dan pembayaran dengan mudah dan cepat.
                </p>
            </div>

        </div>

    </div>
</section>
@endsection
