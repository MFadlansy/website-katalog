@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<section class="bg-[#f7f3ef] pt-28 pb-24">
    <div class="max-w-5xl mx-auto px-6 text-center">

        {{-- Judul --}}
        <h2 class="font-serif text-4xl md:text-5xl text-[#2a241b] mb-6">
            Kontak Kami
        </h2>

        <p class="text-[#6b6258] font-light mb-20 leading-relaxed
                  text-base md:text-lg max-w-2xl mx-auto">
            Silakan hubungi kami melalui WhatsApp untuk pertanyaan,
            pemesanan, atau bantuan lainnya.
            Pilih kontak yang sesuai:
        </p>

        {{-- Kartu kontak --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            {{-- Admin --}}
            <div class="bg-white rounded-3xl
                        border border-[#e5dfd6]
                        p-12 flex flex-col items-center
                        space-y-6
                        transition-transform duration-300
                        hover:-translate-y-1 hover:shadow-xl">

                {{-- Logo WhatsApp --}}
                <img
                    src="{{ asset('assets/images/whatsapp.png') }}"
                    alt="WhatsApp"
                    class="w-14 h-14 object-contain"
                >

                <div class="text-xl font-semibold text-[#2a241b]">
                    Admin – Fardhan
                </div>

                <div class="text-[#6b6258] text-sm tracking-wide">
                    +62 811-4692-424
                </div>

                <a href="https://wa.me/628114692424" target="_blank"
                   class="mt-6 inline-flex items-center gap-3
                          border border-[#2a241b]
                          text-[#2a241b]
                          px-10 py-3 rounded-full
                          text-xs font-bold uppercase tracking-widest
                          hover:bg-[#2a241b]
                          hover:text-[#f7f3ef]
                          transition">
                    <img src="{{ asset('assets/images/whatsapp.png') }}"
                         class="w-4 h-4" alt="">
                    Chat Admin
                </a>
            </div>

            {{-- Owner --}}
            <div class="bg-white rounded-3xl
                        border border-[#e5dfd6]
                        p-12 flex flex-col items-center
                        space-y-6
                        transition-transform duration-300
                        hover:-translate-y-1 hover:shadow-xl">

                {{-- Logo WhatsApp --}}
                <img
                    src="{{ asset('assets/images/whatsapp.png') }}"
                    alt="WhatsApp"
                    class="w-14 h-14 object-contain"
                >

                <div class="text-xl font-semibold text-[#2a241b]">
                    Owner
                </div>

                <div class="text-[#6b6258] text-sm tracking-wide">
                    +62 811-421-415
                </div>

                <a href="https://wa.me/62811421415" target="_blank"
                   class="mt-6 inline-flex items-center gap-3
                          border border-[#2a241b]
                          text-[#2a241b]
                          px-10 py-3 rounded-full
                          text-xs font-bold uppercase tracking-widest
                          hover:bg-[#2a241b]
                          hover:text-[#f7f3ef]
                          transition">
                    <img src="{{ asset('assets/images/whatsapp.png') }}"
                         class="w-4 h-4" alt="">
                    Chat Owner
                </a>
            </div>

        </div>
    </div>
</section>
@endsection
