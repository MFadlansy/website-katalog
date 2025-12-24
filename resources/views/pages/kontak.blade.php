@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<section class="bg-gray-50 pt-24 pb-20">
    <div class="max-w-5xl mx-auto px-4 text-center">
        {{-- Judul --}}
        <h2 class="font-serif text-4xl md:text-5xl text-gray-900 mb-6">Kontak Kami</h2>
        <p class="text-gray-600 font-light mb-16 leading-relaxed text-lg md:text-xl">
            Silakan hubungi kami melalui WhatsApp untuk pertanyaan, pemesanan, atau bantuan lainnya. 
            Pilih kontak yang sesuai:
        </p>

        {{-- Kartu kontak --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            {{-- Admin --}}
            <div class="bg-white rounded-3xl shadow-2xl p-10 flex flex-col items-center space-y-6 transition-transform hover:scale-105 duration-300">

                {{-- Logo WhatsApp --}}
                <img 
                    src="{{ asset('assets/images/whatsapp.png') }}" 
                    alt="WhatsApp"
                    class="w-16 h-16 object-contain"
                >

                <div class="text-xl font-semibold text-gray-900">
                    Admin – Fardhan
                </div>

                <div class="text-gray-700">
                    +62 811-4692-424
                </div>

                <a href="https://wa.me/628114692424" target="_blank"
                class="flex items-center gap-3 bg-green-500 text-white px-10 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-green-600 transition duration-300">
                    <img src="{{ asset('assets/images/whatsapp.png') }}" class="w-5 h-5" alt="">
                    Chat Admin
                </a>
            </div>


            {{-- Owner --}}
            <div class="bg-white rounded-3xl shadow-2xl p-10 flex flex-col items-center space-y-6 transition-transform hover:scale-105 duration-300">

                {{-- Logo WhatsApp --}}
                <img 
                    src="{{ asset('assets/images/whatsapp.png') }}" 
                    alt="WhatsApp"
                    class="w-16 h-16 object-contain"
                >

                <div class="text-xl font-semibold text-gray-900">
                    Owner
                </div>

                <div class="text-gray-700">
                    +62 811-421-415
                </div>

                <a href="https://wa.me/62811421415" target="_blank"
                class="flex items-center gap-3 bg-green-500 text-white px-10 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-green-600 transition duration-300">
                    <img src="{{ asset('assets/images/whatsapp.png') }}" class="w-5 h-5" alt="">
                    Chat Owner
                </a>
            </div>


        </div>
    </div>
</section>
@endsection
