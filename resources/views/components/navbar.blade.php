<nav class="bg-white shadow-lg fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600 hover:text-blue-700 transition">
                    Darmin Majun
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">
                    Beranda
                </a>
                <a href="{{ route('home') }}#products" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">
                    Produk
                </a>
                <a href="{{ route('home') }}#about" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">
                    Tentang
                </a>
                <a href="{{ route('home') }}#contact" class="text-gray-700 hover:text-blue-600 px-3 py-2 text-sm font-medium transition">
                    Kontak
                </a>
            </div>
            
            <!-- Cart & CTA -->
            <div class="hidden md:flex items-center gap-4">
                <!-- Cart Icon -->
                <a href="{{ route('cart.index') }}" class="relative text-gray-700 hover:text-blue-600 transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    @php
                        $cartCount = count(session()->get('cart', []));
                    @endphp
                    @if($cartCount > 0)
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>
                
                <!-- WhatsApp Button -->
                <a href="https://wa.me/6287720912755?text=Halo%20Darmin%20Majun" target="_blank" class="bg-green-600 text-white px-6 py-2 rounded-lg text-sm font-medium inline-flex items-center gap-2 shadow-md hover:bg-green-700 transition">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    WhatsApp
                </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white shadow-lg">
            <a href="{{ route('home') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium">
                Beranda
            </a>
            <a href="{{ route('home') }}#products" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium">
                Produk
            </a>
            <a href="{{ route('home') }}#about" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium">
                Tentang
            </a>
            <a href="{{ route('home') }}#contact" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium">
                Kontak
            </a>
            <a href="{{ route('cart.index') }}" class="block text-gray-700 hover:text-blue-600 px-3 py-2 text-base font-medium">
                🛒 Keranjang
                @php
                    $cartCount = count(session()->get('cart', []));
                @endphp
                @if($cartCount > 0)
                    <span class="ml-2 bg-red-500 text-white text-xs font-bold rounded-full px-2 py-1">{{ $cartCount }}</span>
                @endif
            </a>
            <a href="https://wa.me/6287720912755?text=Halo%20Darmin%20Majun" target="_blank" class="block bg-green-600 text-white px-3 py-2 rounded-lg text-base font-medium text-center">
                WhatsApp Kami
            </a>
        </div>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
