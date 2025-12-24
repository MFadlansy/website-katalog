<footer class="bg-white border-t border-gray-100 mt-20 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-4 gap-8 text-sm text-gray-600">
        <div class="md:col-span-2 pr-8">
            <h3 class="font-serif text-lg text-black mb-4">Alamat</h3>
            <p class="leading-relaxed">{{ $shop->address ?? 'Deskripsi singkat brand Anda yang menceritakan tentang kualitas dan gaya.' }}</p>
        </div>
        <div>
            <h3 class="font-bold text-black uppercase tracking-widest mb-4 text-xs">Information</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('cara-pemesanan') }}" class="hover:underline">Cara Pemesanan</a></li>
                <li><a href="{{ route('kontak') }}" class="hover:underline">Kontak</a></li>
            </ul>
        </div>
        <div>
            <h3 class="font-bold text-black uppercase tracking-widest mb-4 text-xs">Social</h3>
            <ul class="space-y-2">
                <li><a href="{{ $shop->instagram_link ?? '#' }}" class="hover:underline">Instagram</a></li>
            </ul>
        </div>
    </div>
    <div class="text-center text-xs text-gray-400 mt-16">
        &copy; {{ date('Y') }} {{ $shop->shop_name ?? 'Brand' }}. All rights reserved.
    </div>
</footer>
