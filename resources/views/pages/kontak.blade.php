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
                <div class="w-24 h-24 rounded-full bg-green-600 flex items-center justify-center text-white text-4xl font-bold mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8 8 0 1118.879 6.196 8 8 0 015.12 17.804z"/>
                    </svg>
                </div>
                <div class="text-xl font-semibold text-gray-900">Admin – Fardhan</div>
                <div class="text-gray-700 mb-4">+62 811-4692-424‬</div>
                <a href="https://wa.me/628114692424" target="_blank"
                   class="flex items-center gap-3 bg-green-500 text-white px-10 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-green-600 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                        <path d="M20.5 3.5c-1.3-1.3-3-2-4.8-2s-3.5.7-4.8 2L2 13l1 5 5-1 9.9-9.9c.9-.9 2.2-1.4 3.5-1.4s2.6.5 3.5 1.5c1.9 1.9 2 4.9.1 6.8L21 20l2-2-2.5-14.5z"/>
                    </svg>
                    Chat Admin
                </a>
            </div>

            {{-- Owner --}}
            <div class="bg-white rounded-3xl shadow-2xl p-10 flex flex-col items-center space-y-6 transition-transform hover:scale-105 duration-300">
                <div class="w-24 h-24 rounded-full bg-blue-600 flex items-center justify-center text-white text-4xl font-bold mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8 8 0 1118.879 6.196 8 8 0 015.12 17.804z"/>
                    </svg>
                </div>
                <div class="text-xl font-semibold text-gray-900">Owner</div>
                <div class="text-gray-700 mb-4">+62 811-421-415</div>
                <a href="https://wa.me/62811421415" target="_blank"
                   class="flex items-center gap-3 bg-green-500 text-white px-10 py-3 rounded-full font-bold uppercase tracking-wider hover:bg-green-600 transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" stroke="none">
                        <path d="M20.5 3.5c-1.3-1.3-3-2-4.8-2s-3.5.7-4.8 2L2 13l1 5 5-1 9.9-9.9c.9-.9 2.2-1.4 3.5-1.4s2.6.5 3.5 1.5c1.9 1.9 2 4.9.1 6.8L21 20l2-2-2.5-14.5z"/>
                    </svg>
                    Chat Owner
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
