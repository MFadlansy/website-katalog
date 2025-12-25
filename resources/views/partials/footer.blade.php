<footer class="bg-[#f7f3ef] mt-20 pt-20 pb-10 border-t border-[#e5dfd6]">
    <div class="max-w-7xl mx-auto px-6 md:px-10
                grid grid-cols-1 md:grid-cols-4 gap-y-12 gap-x-16
                text-sm text-[#2a241b]">

        <!-- ALAMAT -->
        <div class="md:col-span-2 pr-0 md:pr-10">
            <h3 class="font-serif text-lg mb-4 tracking-wide">
                Alamat
            </h3>
            <p class="leading-relaxed text-[#2a241b]/80 max-w-md">
                {{ $shop->address ?? 'Deskripsi singkat brand Anda yang menceritakan tentang kualitas, filosofi, dan gaya yang elegan.' }}
            </p>
        </div>

        <!-- INFORMATION -->
        <div>
            <h3 class="font-bold uppercase tracking-[0.25em] mb-5 text-xs text-[#2a241b]/80">
                Information
            </h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ route('cara-pemesanan') }}"
                       class="hover:text-[#2a241b] transition">
                        Cara Pemesanan
                    </a>
                </li>
                <li>
                    <a href="{{ route('kontak') }}"
                       class="hover:text-[#2a241b] transition">
                        Kontak
                    </a>
                </li>
            </ul>
        </div>

        <!-- SOCIAL -->
        <div>
            <h3 class="font-bold uppercase tracking-[0.25em] mb-5 text-xs text-[#2a241b]/80">
                Social
            </h3>
            <ul class="space-y-3">
                <li>
                    <a href="{{ $shop->instagram_link ?? '#' }}"
                       class="hover:text-[#2a241b] transition">
                        Instagram
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="text-center text-xs text-[#2a241b]/50 mt-20 tracking-wide">
        &copy; {{ date('Y') }} {{ $shop->shop_name ?? 'Brand' }}. All rights reserved.
    </div>
</footer>
