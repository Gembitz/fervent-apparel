<!-- Footer -->
<footer class="bg-[#1B2A4A] text-slate-300 mt-20 border-t border-slate-800">
    <!-- Brand Promise Row -->
    <div class="border-b border-slate-700/60 py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="flex flex-col items-center">
                <svg class="w-6 h-6 text-blue-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                </svg>
                <span class="text-xs font-semibold text-white tracking-wider uppercase">Pengiriman Gratis</span>
                <span class="text-[11px] text-slate-400 mt-0.5">Untuk pesanan di atas Rp500.000</span>
            </div>
            <div class="flex flex-col items-center">
                <svg class="w-6 h-6 text-blue-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                <span class="text-xs font-semibold text-white tracking-wider uppercase">14 Hari Pengembalian</span>
                <span class="text-[11px] text-slate-400 mt-0.5">Tukar ukuran & retur mudah</span>
            </div>
            <div class="flex flex-col items-center">
                <svg class="w-6 h-6 text-blue-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
                <span class="text-xs font-semibold text-white tracking-wider uppercase">100% Produk Asli</span>
                <span class="text-[11px] text-slate-400 mt-0.5">Kualitas bahan premium</span>
            </div>
            <div class="flex flex-col items-center">
                <svg class="w-6 h-6 text-blue-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <span class="text-xs font-semibold text-white tracking-wider uppercase">Pembayaran Aman</span>
                <span class="text-[11px] text-slate-400 mt-0.5">BCA, Mandiri, QRIS & Kartu</span>
            </div>
        </div>
    </div>

    <!-- Links & Newsletter -->
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">
        <div class="md:col-span-1">
            <span class="text-lg font-black tracking-widest text-white uppercase">FERVENT</span>
            <span class="text-[9px] block tracking-widest text-slate-400 uppercase -mt-1 font-semibold">APPAREL</span>
            <p class="mt-4 text-xs text-slate-400 leading-relaxed">
                Menyajikan busana kontemporer esensial berdesain modern, siluet presisi, dan material berkualitas tinggi untuk wanita dan pria urban.
            </p>
        </div>

        <div>
            <h4 class="text-xs font-bold text-white tracking-widest uppercase mb-4">Koleksi</h4>
            <ul class="space-y-2 text-xs text-slate-400">
                <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Women's Collection</a></li>
                <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Dresses & Wrap Blazers</a></li>
                <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Outerwear & Trenches</a></li>
                <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Tops & Blouses</a></li>
                <li><a href="{{ route('products.index') }}" class="hover:text-white transition">Palazzo Pants & Skirts</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-xs font-bold text-white tracking-widest uppercase mb-4">Layanan</h4>
            <ul class="space-y-2 text-xs text-slate-400">
                <li><a href="#" class="hover:text-white transition">Panduan Ukuran (Size Guide)</a></li>
                <li><a href="#" class="hover:text-white transition">Kebijakan Pengiriman</a></li>
                <li><a href="#" class="hover:text-white transition">Pengembalian & Penukaran</a></li>
                <li><a href="#" class="hover:text-white transition">Syarat & Ketentuan</a></li>
                <li><a href="#" class="hover:text-white transition">Hubungi Kami</a></li>
            </ul>
        </div>

        <div>
            <h4 class="text-xs font-bold text-white tracking-widest uppercase mb-4">Newsletter Eksklusif</h4>
            <p class="text-xs text-slate-400 mb-3">Dapatkan akses privat untuk rilisan kapsul dan penawaran spesial.</p>
            <form class="flex" onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan!');">
                <input type="email" placeholder="Alamat email Anda..." class="bg-slate-800/80 text-white text-xs px-3 py-2 border border-slate-700 rounded-l-md w-full focus:outline-hidden focus:border-[#2563EB]">
                <button type="submit" class="bg-[#2563EB] hover:bg-blue-600 text-white text-xs font-semibold px-4 py-2 rounded-r-md transition">DAFTAR</button>
            </form>
        </div>
    </div>

    <div class="border-t border-slate-800 py-6 px-4 sm:px-6 lg:px-8 text-center text-[11px] text-slate-500">
        <p>&copy; 2025 FERVENT APPAREL. Hak Cipta Dilindungi Undang-Undang.</p>
    </div>
</footer>
