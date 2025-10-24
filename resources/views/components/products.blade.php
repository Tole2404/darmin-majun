<section id="products" class="py-20 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-1/4 left-10 w-96 h-1 bg-gradient-to-r from-transparent via-purple-400 to-transparent opacity-50 -rotate-12"></div>
        <div class="absolute bottom-20 right-20 w-72 h-72 bg-purple-300 rounded-full filter blur-3xl opacity-20"></div>
        <svg class="absolute bottom-0 right-0 w-full h-64 opacity-30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="none" stroke="#c084fc" stroke-width="2" d="M0,160L48,144C96,128,192,96,288,90.7C384,85,480,107,576,128C672,149,768,171,864,165.3C960,160,1056,128,1152,122.7C1248,117,1344,139,1392,149.3L1440,160"></path>
        </svg>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="inline-block bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">PRODUK KAMI</span>
            <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">
                Koleksi Kain Majun
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Swipe untuk melihat berbagai pilihan produk berkualitas
            </p>
        </div>
        
        <!-- Horizontal Scroll Products -->
        <div class="relative mb-16">
            <div class="flex gap-6 overflow-x-auto pb-8 snap-x snap-mandatory scrollbar-hide" style="scroll-behavior: smooth;">
                
                @forelse($products as $product)
                <!-- Product Card -->
                <div class="flex-none w-80 snap-start">
                    <a href="{{ route('products.show', $product->slug) }}" class="block bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition">
                        <!-- Image -->
                        <div class="relative h-80 bg-gray-100">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                    <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                            
                            @if($product->is_featured)
                                <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    ⭐ FEATURED
                                </div>
                            @endif
                            
                            @if($product->stock <= 10 && $product->stock > 0)
                                <div class="absolute top-4 right-4 bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    Stok Terbatas
                                </div>
                            @elseif($product->stock == 0)
                                <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold">
                                    Habis
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $product->category->name ?? 'Uncategorized' }}</p>
                            
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-sm text-gray-500">Harga</p>
                                    <p class="text-2xl font-bold text-blue-600">{{ $product->price_range }}</p>
                                    <p class="text-xs text-gray-500">per {{ $product->unit }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-gray-500">Min. Order</p>
                                    <p class="text-xl font-bold text-gray-900">{{ $product->min_order }} {{ $product->unit }}</p>
                                </div>
                            </div>
                            
                            @if($product->short_description)
                                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->short_description, 80) }}</p>
                            @endif
                            
                        </div>
                    </a>
                </div>
                @empty
                <div class="w-full text-center py-12">
                    <p class="text-gray-500">Belum ada produk tersedia</p>
                </div>
                @endforelse
                
            </div>
        </div>
        
        <!-- CTA Button -->
        <div class="text-center">
            <a href="https://wa.me/{{ $settings['contact_whatsapp'] }}?text=Halo%20Darmin%20Majun,%20saya%20ingin%20lihat%20katalog%20lengkap" 
               target="_blank"
               class="inline-flex items-center px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition shadow-lg">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                </svg>
                Lihat Semua Produk
            </a>
        </div>
    </div>
</section>
