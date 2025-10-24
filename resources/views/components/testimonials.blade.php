<section id="testimonials" class="py-20 bg-gradient-to-br from-blue-50 to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <span class="inline-block bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">TESTIMONI</span>
            <h2 class="text-4xl md:text-6xl font-bold text-gray-900 mb-4">
                Kata Pelanggan Kami
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Kepuasan pelanggan adalah prioritas kami
            </p>
        </div>

        @if($testimonials->count() > 0)
        <!-- Testimonials Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition">
                <!-- Rating Stars -->
                <div class="flex items-center gap-1 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $testimonial->rating)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @else
                            <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endif
                    @endfor
                </div>

                <!-- Testimonial Text -->
                <p class="text-gray-700 mb-6 leading-relaxed">
                    "{{ $testimonial->testimonial }}"
                </p>

                <!-- Customer Info -->
                <div class="flex items-center gap-4 pt-6 border-t">
                    @if($testimonial->customer_photo)
                        <img src="{{ asset('storage/' . $testimonial->customer_photo) }}" 
                             alt="{{ $testimonial->customer_name }}" 
                             class="w-12 h-12 rounded-full object-cover">
                    @else
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                            <span class="text-xl font-bold text-blue-600">{{ substr($testimonial->customer_name, 0, 1) }}</span>
                        </div>
                    @endif
                    
                    <div>
                        <p class="font-bold text-gray-900">{{ $testimonial->customer_name }}</p>
                        @if($testimonial->customer_position && $testimonial->customer_company)
                            <p class="text-sm text-gray-600">{{ $testimonial->customer_position }} - {{ $testimonial->customer_company }}</p>
                        @elseif($testimonial->customer_company)
                            <p class="text-sm text-gray-600">{{ $testimonial->customer_company }}</p>
                        @elseif($testimonial->customer_position)
                            <p class="text-sm text-gray-600">{{ $testimonial->customer_position }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-12">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
            </svg>
            <p class="text-gray-500 text-lg">Belum ada testimoni</p>
        </div>
        @endif
    </div>
</section>
