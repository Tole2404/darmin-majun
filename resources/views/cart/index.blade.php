@extends('layouts.app')

@section('title', 'Keranjang Belanja - Darmin Majun')

@section('content')
<!-- Navbar -->
@include('components.navbar')

<!-- Cart -->
<section class="pt-24 pb-20 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">🛒 Keranjang Belanja</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-4">
                    @foreach($cart as $id => $item)
                        <div class="bg-white rounded-xl shadow-md p-6 flex items-center gap-6">
                            <!-- Image -->
                            <div class="flex-shrink-0">
                                @if($item['image'])
                                    <img src="{{ asset('storage/' . $item['image']) }}" 
                                         alt="{{ $item['name'] }}" 
                                         class="w-24 h-24 object-cover rounded-lg">
                                @else
                                    <div class="w-24 h-24 bg-gray-200 rounded-lg flex items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <!-- Info -->
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">
                                    <a href="{{ route('products.show', $item['slug']) }}" class="hover:text-blue-600">
                                        {{ $item['name'] }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-2">Rp {{ number_format($item['price'], 0, ',', '.') }} / {{ $item['unit'] }}</p>
                                
                                <!-- Quantity Update -->
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-4">
                                    @csrf
                                    <div class="flex items-center gap-2">
                                        <label for="quantity_{{ $id }}" class="text-sm text-gray-600">Jumlah:</label>
                                        <input type="number" 
                                               name="quantity" 
                                               id="quantity_{{ $id }}" 
                                               value="{{ $item['quantity'] }}" 
                                               min="1"
                                               class="w-20 px-3 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                        <span class="text-sm text-gray-600">{{ $item['unit'] }}</span>
                                    </div>
                                    <button type="submit" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                        Update
                                    </button>
                                </form>
                            </div>

                            <!-- Price & Remove -->
                            <div class="text-right">
                                <p class="text-2xl font-bold text-gray-900 mb-4">
                                    Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                </p>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-semibold">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                    <!-- Clear Cart -->
                    <div class="text-right">
                        <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Yakin ingin mengosongkan keranjang?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-semibold">
                                Kosongkan Keranjang
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-md p-6 sticky top-24">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Ringkasan Pesanan</h2>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal ({{ count($cart) }} item)</span>
                                <span class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Ongkir</span>
                                <span class="font-semibold">Dihitung saat checkout</span>
                            </div>
                            <div class="border-t pt-4">
                                <div class="flex justify-between text-xl font-bold text-gray-900">
                                    <span>Total</span>
                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('checkout.index') }}" 
                           class="block w-full bg-blue-600 text-white text-center py-4 rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg mb-4">
                            Lanjut ke Checkout
                        </a>

                        <a href="{{ route('home') }}" 
                           class="block w-full bg-gray-200 text-gray-700 text-center py-4 rounded-lg font-semibold hover:bg-gray-300 transition">
                            Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart -->
            <div class="bg-white rounded-xl shadow-md p-12 text-center">
                <svg class="mx-auto h-24 w-24 text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Keranjang Kosong</h2>
                <p class="text-gray-600 mb-8">Belum ada produk di keranjang Anda</p>
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition shadow-lg">
                    Mulai Belanja
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Footer -->
@include('components.footer')
@endsection
