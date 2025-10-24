@extends('layouts.app')

@section('title', $product->name . ' - Darmin Majun')

@section('content')
<!-- Navbar -->
@include('components.navbar')

<!-- Product Detail -->
<section class="pt-24 pb-20 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('products.index') }}" class="ml-1 text-gray-700 hover:text-blue-600">Produk</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-gray-500">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Product Info -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
            <!-- Left: Image -->
            <div>
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden sticky top-24">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-auto object-cover">
                    @else
                        <div class="w-full h-96 flex items-center justify-center bg-gray-200">
                            <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right: Details -->
            <div class="space-y-6">
                <!-- Category Badge -->
                <div>
                    <span class="inline-block bg-blue-100 text-blue-600 px-4 py-2 rounded-full text-sm font-semibold">
                        {{ $product->category->name ?? 'Uncategorized' }}
                    </span>
                </div>

                <!-- Product Name -->
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900">
                    {{ $product->name }}
                </h1>

                <!-- Short Description -->
                @if($product->short_description)
                    <p class="text-xl text-gray-600">
                        {{ $product->short_description }}
                    </p>
                @endif

                <!-- Price -->
                <div class="bg-blue-50 rounded-xl p-6">
                    <p class="text-sm text-gray-600 mb-2">Harga</p>
                    <p class="text-4xl font-bold text-blue-600 mb-2">{{ $product->price_range }}</p>
                    <p class="text-gray-600">per {{ $product->unit }}</p>
                </div>

                <!-- Stock & Min Order -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 rounded-xl p-4">
                        <p class="text-sm text-gray-600 mb-1">Stok</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $product->stock }} {{ $product->unit }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4">
                        <p class="text-sm text-gray-600 mb-1">Min. Order</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $product->min_order }} {{ $product->unit }}</p>
                    </div>
                </div>

                <!-- Add to Cart Form -->
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">
                            Jumlah ({{ $product->unit }})
                        </label>
                        <input type="number" 
                               name="quantity" 
                               id="quantity" 
                               value="{{ old('quantity', $product->min_order) }}" 
                               min="{{ $product->min_order }}" 
                               max="{{ $product->stock }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg">
                        <p class="text-xs text-gray-500 mt-1">Min: {{ $product->min_order }} {{ $product->unit }}, Max: {{ $product->stock }} {{ $product->unit }}</p>
                    </div>

                    <div class="flex gap-4">
                        @if($product->stock > 0)
                            <button type="submit" 
                                    class="flex-1 bg-blue-600 text-white py-4 rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg">
                                🛒 Tambah ke Keranjang
                            </button>
                        @else
                            <button type="button" 
                                    disabled
                                    class="flex-1 bg-gray-400 text-white py-4 rounded-lg font-semibold cursor-not-allowed">
                                ❌ Stok Habis
                            </button>
                        @endif
                        <a href="https://wa.me/6287720912755?text=Halo, saya tertarik dengan {{ $product->name }}" 
                           target="_blank"
                           class="flex-1 bg-green-600 text-white py-4 rounded-lg font-semibold hover:bg-green-700 transition shadow-lg text-center">
                            💬 Pesan via WhatsApp
                        </a>
                    </div>
                </form>

                <!-- Features -->
                @if($product->features && count($product->features) > 0)
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Keunggulan Produk</h3>
                        <ul class="space-y-2">
                            @foreach($product->features as $feature)
                                <li class="flex items-center gap-2 text-gray-700">
                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <!-- Description -->
        @if($product->description)
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-20">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Deskripsi Produk</h2>
                <div class="prose prose-lg max-w-none text-gray-700">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>
        @endif

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Produk Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <a href="{{ route('products.show', $related->slug) }}" class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transition">
                            <div class="h-64 bg-gray-100">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" 
                                         alt="{{ $related->name }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <h3 class="font-bold text-gray-900 mb-2">{{ $related->name }}</h3>
                                <p class="text-blue-600 font-bold">{{ $related->price_range }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Footer -->
@include('components.footer')

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/6287720912755?text=Halo, saya tertarik dengan {{ $product->name }}" 
   target="_blank" 
   class="fixed bottom-6 right-6 bg-green-600 text-white p-4 rounded-full shadow-lg z-50 hover:bg-green-700 transition">
    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
    </svg>
</a>
@endsection
