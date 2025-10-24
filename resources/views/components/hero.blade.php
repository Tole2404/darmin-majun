<section id="home" class="pt-24 pb-20 min-h-screen flex items-center relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-20 right-10 w-96 h-1 bg-gradient-to-r from-transparent via-blue-400 to-transparent opacity-50 rotate-45"></div>
        <div class="absolute top-40 left-20 w-80 h-80 bg-blue-300 rounded-full filter blur-3xl opacity-20"></div>
        <svg class="absolute top-0 left-0 w-full h-64 opacity-30" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="none" stroke="#60a5fa" stroke-width="2" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,117.3C1248,117,1344,139,1392,149.3L1440,160"></path>
        </svg>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left: Text Content -->
            <div class="space-y-8">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 bg-white rounded-lg shadow-md mb-8">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                    <span class="text-sm font-medium text-gray-700">{{ $settings['hero_badge'] }}</span>
                </div>
                
                <!-- Main Heading -->
                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight">
                    {!! nl2br(e($settings['hero_title'])) !!}
                </h1>
                
                <!-- Subtitle -->
                <p class="text-lg md:text-xl text-gray-600">
                    {{ $settings['hero_subtitle'] }}
                </p>
                
                <!-- Price Badge -->
                <div class="inline-block bg-blue-600 text-white px-8 py-4 rounded-lg shadow-md">
                    <p class="text-sm font-medium mb-1">Harga Spesial</p>
                    <p class="text-3xl font-bold">Rp 8.000 - 25.000<span class="text-lg">/kg</span></p>
                </div>
                
                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/6287720912755?text=Halo%20Darmin%20Majun,%20saya%20ingin%20pesan%20kain%20majun" target="_blank" class="inline-flex items-center justify-center px-8 py-4 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition">
                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        <span>Pesan via WhatsApp</span>
                    </a>
                    <a href="#products" class="inline-flex items-center justify-center px-8 py-4 bg-white text-gray-700 font-semibold rounded-lg shadow-md border border-gray-200 hover:bg-gray-50 transition">
                        <span>Lihat Produk</span>
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Right: Image -->
            <div class="relative">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                    <img src="{{ $settings['hero_image'] }}" alt="Kain Majun Berkualitas" class="w-full h-auto object-cover">
                    <!-- Floating Badge on Image -->
                    <div class="absolute top-6 right-6 bg-white px-4 py-2 rounded-lg shadow-lg">
                        <p class="text-sm font-semibold text-gray-900">⭐ 4.9/5</p>
                        <p class="text-xs text-gray-600">1000+ Pelanggan</p>
                    </div>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute -bottom-6 -right-6 w-72 h-72 bg-blue-200 rounded-full filter blur-3xl opacity-30 -z-10"></div>
                <div class="absolute -top-6 -left-6 w-64 h-64 bg-purple-200 rounded-full filter blur-3xl opacity-30 -z-10"></div>
            </div>
        </div>
        
        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mt-20">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl font-bold text-blue-600 mb-2">
                        100+
                    </div>
                    <div class="text-gray-600 text-sm">Produk Tersedia</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl font-bold text-blue-600 mb-2">
                        500+
                    </div>
                    <div class="text-gray-600 text-sm">Klien Puas</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl font-bold text-blue-600 mb-2">
                        10+
                    </div>
                    <div class="text-gray-600 text-sm">Tahun Pengalaman</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-4xl font-bold text-blue-600 mb-2">
                        24/7
                    </div>
                    <div class="text-gray-600 text-sm">Layanan Support</div>
                </div>
            </div>
        </div>
    </div>
</section>
