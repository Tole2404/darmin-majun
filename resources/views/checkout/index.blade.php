@extends('layouts.app')

@section('title', 'Checkout - Darmin Majun')

@section('content')
<!-- Navbar -->
@include('components.navbar')

<!-- Checkout -->
<section class="pt-24 pb-20 min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-gray-900 mb-8">📦 Checkout</h1>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left: Form -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Customer Info -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Informasi Pembeli</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    Nama Lengkap <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="customer_name" 
                                       id="customer_name" 
                                       value="{{ old('customer_name') }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Nama lengkap Anda">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                        Nomor Telepon <span class="text-red-500">*</span>
                                    </label>
                                    <input type="tel" 
                                           name="customer_phone" 
                                           id="customer_phone" 
                                           value="{{ old('customer_phone') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="08xxxxxxxxxx">
                                </div>

                                <div>
                                    <label for="customer_email" class="block text-sm font-medium text-gray-700 mb-2">
                                        Email (Opsional)
                                    </label>
                                    <input type="email" 
                                           name="customer_email" 
                                           id="customer_email" 
                                           value="{{ old('customer_email') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="email@example.com">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Shipping Address -->
                    <div class="bg-white rounded-xl shadow-md p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Alamat Pengiriman</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label for="customer_address" class="block text-sm font-medium text-gray-700 mb-2">
                                    Alamat Lengkap <span class="text-red-500">*</span>
                                </label>
                                <textarea name="customer_address" 
                                          id="customer_address" 
                                          rows="3"
                                          required
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                          placeholder="Jalan, nomor rumah, RT/RW, kelurahan, kecamatan">{{ old('customer_address') }}</textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="city" class="block text-sm font-medium text-gray-700 mb-2">
                                        Kota/Kabupaten <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="city" 
                                           id="city" 
                                           value="{{ old('city') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Contoh: Jakarta Selatan">
                                </div>

                                <div>
                                    <label for="province" class="block text-sm font-medium text-gray-700 mb-2">
                                        Provinsi <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           name="province" 
                                           id="province" 
                                           value="{{ old('province') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="Contoh: DKI Jakarta">
                                </div>

                                <div>
                                    <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-2">
                                        Kode Pos
                                    </label>
                                    <input type="text" 
                                           name="postal_code" 
                                           id="postal_code" 
                                           value="{{ old('postal_code') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                           placeholder="12345">
                                </div>
                            </div>

                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                                    Catatan Pesanan (Opsional)
                                </label>
                                <textarea name="notes" 
                                          id="notes" 
                                          rows="3"
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                          placeholder="Catatan tambahan untuk pesanan Anda...">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-md p-6 sticky top-24">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Ringkasan Pesanan</h2>
                        
                        <!-- Items -->
                        <div class="space-y-4 mb-6 max-h-64 overflow-y-auto">
                            @foreach($cart as $item)
                                <div class="flex items-center gap-3 pb-4 border-b">
                                    @if($item['image'])
                                        <img src="{{ asset('storage/' . $item['image']) }}" 
                                             alt="{{ $item['name'] }}" 
                                             class="w-16 h-16 object-cover rounded-lg">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 rounded-lg"></div>
                                    @endif
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-900 text-sm">{{ $item['name'] }}</p>
                                        <p class="text-xs text-gray-600">{{ $item['quantity'] }} {{ $item['unit'] }} x Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                                        <p class="text-sm font-bold text-gray-900">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Totals -->
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-gray-600">
                                <span>Subtotal ({{ count($cart) }} item)</span>
                                <span class="font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-600">
                                <span>Ongkir</span>
                                <span class="font-semibold text-sm">Akan dihitung admin</span>
                            </div>
                            <div class="border-t pt-3">
                                <div class="flex justify-between text-xl font-bold text-gray-900">
                                    <span>Total</span>
                                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">*Belum termasuk ongkir</p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-blue-600 text-white py-4 rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg mb-4">
                            Buat Pesanan
                        </button>

                        <a href="{{ route('cart.index') }}" 
                           class="block w-full bg-gray-200 text-gray-700 text-center py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                            ← Kembali ke Keranjang
                        </a>

                        <!-- Info -->
                        <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                            <p class="text-xs text-gray-700">
                                <strong>📌 Catatan:</strong> Setelah pesanan dibuat, admin kami akan menghubungi Anda via WhatsApp untuk konfirmasi dan menghitung ongkir.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Footer -->
@include('components.footer')
@endsection
