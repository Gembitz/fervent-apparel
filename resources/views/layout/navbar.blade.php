<!-- Top Announcement Bar -->
<div class="bg-[#1B2A4A] text-white text-[11px] md:text-xs font-medium tracking-widest uppercase py-2 px-4 text-center border-b border-slate-700/40 relative z-30">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <span class="hidden sm:inline-block text-slate-300">CURATED EDITORIAL 2025</span>
        <div class="mx-auto text-center">
            <span>GRATIS ONGKIR SELURUH INDONESIA DENGAN BELANJA MIN. Rp500.000</span>
            <span class="mx-2 text-slate-400">|</span>
            <span class="text-amber-300 font-semibold">KODE: FERVENTVIP</span>
        </div>
        <div class="hidden sm:flex items-center space-x-4 text-slate-300">
            <a href="#" class="hover:text-white transition">Bantuan</a>
            <span>•</span>
            <a href="#" class="hover:text-white transition">Lacak Pesanan</a>
        </div>
    </div>
</div>

<!-- Main Navigation Bar -->
<header class="bg-white/95 backdrop-blur-md sticky top-0 z-40 border-b border-slate-200/80 shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-18">
            
            <!-- Left: Mobile Menu Toggle & Desktop Brand Navigation -->
            <div class="flex items-center space-x-6">
                <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden p-2 -ml-2 text-slate-700 hover:text-[#1B2A4A] focus:outline-hidden" aria-label="Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Desktop Nav Links -->
                <nav class="hidden lg:flex items-center space-x-8 text-[13px] font-semibold tracking-wider uppercase">
                    <a href="{{ route('products.index', ['category' => 'women']) }}" class="text-[#1B2A4A] hover:text-[#2563EB] transition py-1 relative after:absolute after:bottom-0 after:left-0 after:right-0 after:h-0.5 after:bg-[#1B2A4A] {{ request()->is('collections*') ? 'after:block text-[#2563EB]' : 'after:hidden' }}">
                        Women
                    </a>
                    <a href="{{ route('products.index', ['category' => 'men']) }}" class="text-slate-600 hover:text-[#1B2A4A] transition py-1">
                        Men
                    </a>
                    <a href="{{ route('products.index', ['category' => 'dresses']) }}" class="text-slate-600 hover:text-[#1B2A4A] transition py-1">
                        Dresses
                    </a>
                    <a href="{{ route('products.index') }}" class="text-slate-600 hover:text-[#1B2A4A] transition py-1">
                        Collections
                    </a>
                    <a href="{{ route('products.index') }}" class="text-[#DC2626] hover:text-red-700 font-bold transition py-1">
                        Sale
                    </a>
                </nav>
            </div>

            <!-- Center: Brand Logo -->
            <div class="flex-1 text-center lg:flex-none">
                <a href="{{ url('/') }}" class="inline-block group text-center">
                    <span class="block text-xl md:text-2xl font-extrabold tracking-[0.25em] text-[#1B2A4A] uppercase transition-colors group-hover:text-[#2563EB]">
                        FERVENT
                    </span>
                    <span class="block text-[9px] tracking-[0.45em] text-slate-500 uppercase -mt-1 font-semibold group-hover:text-slate-700">
                        APPAREL
                    </span>
                </a>
            </div>

            <!-- Right: Utility Icons (Search, Account, Wishlist, Cart) -->
            <div class="flex items-center space-x-3 sm:space-x-5">
                <!-- Search Button -->
                <button type="button" @click="searchOpen = !searchOpen" class="p-2 text-slate-700 hover:text-[#1B2A4A] transition rounded-full hover:bg-slate-100" title="Cari Produk">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                <!-- Account -->
                <a href="#" class="hidden sm:flex p-2 text-slate-700 hover:text-[#1B2A4A] transition rounded-full hover:bg-slate-100" title="Akun Saya">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </a>

                <!-- Wishlist -->
                <a href="#" class="hidden sm:flex p-2 text-slate-700 hover:text-[#1B2A4A] transition rounded-full hover:bg-slate-100 relative" title="Favorit">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-[#DC2626] rounded-full"></span>
                </a>

                <!-- Cart Bag -->
                <a href="{{ route('cart.index') }}" class="p-2 text-slate-800 hover:text-[#1B2A4A] transition rounded-full hover:bg-slate-100 relative flex items-center" title="Keranjang Belanja">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 bg-[#1B2A4A] text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center">
                        2
                    </span>
                </a>
            </div>
        </div>
    </div>

    <!-- Search Popdown Bar -->
    <div x-show="searchOpen" x-cloak @click.away="searchOpen = false" x-transition class="bg-white border-t border-slate-200 px-4 py-3 shadow-inner">
        <div class="max-w-3xl mx-auto flex items-center">
            <svg class="w-5 h-5 text-slate-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" placeholder="Cari koleksi blazer, dress poplin, celana palazzo..." class="w-full text-sm outline-hidden border-none focus:ring-0 text-slate-800 placeholder-slate-400 py-1 bg-transparent">
            <button type="button" @click="searchOpen = false" class="text-xs text-slate-500 hover:text-slate-800 uppercase font-semibold ml-2">Tutup</button>
        </div>
    </div>

    <!-- Mobile Drawer -->
    <div x-show="mobileMenuOpen" x-cloak class="lg:hidden fixed inset-0 z-50 bg-black/50 backdrop-blur-xs" @click="mobileMenuOpen = false"></div>
    <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="lg:hidden fixed inset-y-0 left-0 max-w-xs w-full bg-white shadow-xl z-50 p-6 flex flex-col justify-between overflow-y-auto">
        <div>
            <div class="flex items-center justify-between pb-4 border-b border-slate-200">
                <div>
                    <span class="text-lg font-black tracking-widest text-[#1B2A4A] uppercase">FERVENT</span>
                    <span class="text-[9px] block tracking-widest text-slate-500 uppercase -mt-1">APPAREL</span>
                </div>
                <button type="button" @click="mobileMenuOpen = false" class="p-2 text-slate-500 hover:text-slate-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <div class="mt-6 flex flex-col space-y-4 text-sm font-semibold tracking-wide uppercase">
                <a href="{{ route('products.index', ['category' => 'women']) }}" class="text-[#1B2A4A] hover:text-[#2563EB] py-2 border-b border-slate-100 flex items-center justify-between">
                    <span>Women's Collection</span>
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('products.index', ['category' => 'men']) }}" class="text-slate-700 hover:text-[#1B2A4A] py-2 border-b border-slate-100 flex items-center justify-between">
                    <span>Men's Collection</span>
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('products.index', ['category' => 'dresses']) }}" class="text-slate-700 hover:text-[#1B2A4A] py-2 border-b border-slate-100 flex items-center justify-between">
                    <span>Dresses & Gowns</span>
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('products.index') }}" class="text-slate-700 hover:text-[#1B2A4A] py-2 border-b border-slate-100 flex items-center justify-between">
                    <span>Curated Lookbook</span>
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                <a href="{{ route('products.index') }}" class="text-[#DC2626] hover:text-red-700 py-2 border-b border-slate-100 flex items-center justify-between">
                    <span>Sale / Clearance</span>
                    <span class="text-[10px] bg-red-100 text-[#DC2626] px-2 py-0.5 rounded-full font-bold">UP TO 50%</span>
                </a>
            </div>
        </div>

            <div class="pt-6 border-t border-slate-200 text-xs text-slate-500 space-y-3">
                <p class="font-medium text-slate-700">Layanan Pelanggan</p>
                <p>WhatsApp: +62 811-2345-6789</p>
                <p>Senin - Minggu (09:00 - 21:00 WIB)</p>
            </div>
    </div>
</header>
