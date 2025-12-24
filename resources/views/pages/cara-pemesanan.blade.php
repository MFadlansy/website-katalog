@extends('layouts.app')

@section('title', 'Cara Pemesanan')

@section('content')
<section class="bg-brand-gray py-20">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="font-serif text-3xl md:text-4xl text-brand-black mb-12">Cara Pemesanan</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            {{-- Step 1 --}}
            <div class="space-y-4 px-4">
                <div class="w-16 h-16 mx-auto bg-brand-black text-white rounded-full flex items-center justify-center text-2xl font-bold">
                    1
                </div>
                <h3 class="font-serif text-xl tracking-wide">Pilih Produk</h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Temukan baju yang kamu sukai dari koleksi kami dan klik untuk melihat detail.
                </p>
            </div>

            {{-- Step 2 --}}
            <div class="space-y-4 px-4">
                <div class="w-16 h-16 mx-auto bg-brand-black text-white rounded-full flex items-center justify-center text-2xl font-bold">
                    2
                </div>
                <h3 class="font-serif text-xl tracking-wide">Tekan Order</h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Klik tombol <strong>"Order via WhatsApp"</strong> yang tersedia di halaman produk.
                </p>
            </div>

            {{-- Step 3 --}}
            <div class="space-y-4 px-4">
                <div class="w-16 h-16 mx-auto bg-brand-black text-white rounded-full flex items-center justify-center text-2xl font-bold">
                    3
                </div>
                <h3 class="font-serif text-xl tracking-wide">Chat & Konfirmasi</h3>
                <p class="text-gray-700 text-sm leading-relaxed">
                    Kamu akan diarahkan ke WhatsApp untuk melakukan pemesanan dan konfirmasi pembayaran dengan mudah.
                </p>
            </div>
        </div>

        <div class="mt-12">
            <a href="https://wa.me/{{ $shop->whatsapp_number ?? '6281234567890' }}" 
               target="_blank"
               class="bg-brand-black text-white px-10 py-4 rounded-md uppercase tracking-widest font-bold hover:bg-brand-gold hover:text-black transition duration-300">
                Order via WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection
