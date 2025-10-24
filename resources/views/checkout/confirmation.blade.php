@extends('layouts.app')

@section('title', 'Pesanan Berhasil - Darmin Majun')

@section('content')
<!-- Navbar -->
@include('components.navbar')

<!-- Confirmation -->
<section class="pt-24 pb-20 min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success Message -->
        <div class="bg-white rounded-xl shadow-lg p-8 md:p-12 text-center mb-8">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                🎉 Pesanan Berhasil Dibuat!
            </h1>
            
            <p class="text-lg text-gray-600 mb-6">
                Terima kasih atas pesanan Anda. Kami akan segera menghubungi Anda via WhatsApp.
            </p>

            <div class="inline-block bg-blue-50 px-6 py-3 rounded-lg mb-8">
                <p class="text-sm text-gray-600 mb-1">Nomor Pesanan</p>
                <p class="text-2xl font-bold text-blue-600">{{ $order->order_number }}</p>
            </div>
        </div>

        <!-- Order Details -->
        <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Detail Pesanan</h2>
            
            <!-- Customer Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Informasi Pembeli</h3>
                    <div class="space-y-2 text-sm">
                        <p><span class="text-gray-600">Nama:</span> <span class="font-semibold">{{ $order->customer_name }}</span></p>
                        <p><span class="text-gray-600">Telepon:</span> <span class="font-semibold">{{ $order->customer_phone }}</span></p>
                        @if($order->customer_email)
                            <p><span class="text-gray-600">Email:</span> <span class="font-semibold">{{ $order->customer_email }}</span></p>
                        @endif
                    </div>
                </div>

                <div>
                    <h3 class="font-semibold text-gray-900 mb-3">Alamat Pengiriman</h3>
                    <div class="text-sm text-gray-700">
                        <p>{{ $order->customer_address }}</p>
                        <p>{{ $order->city }}, {{ $order->province }} {{ $order->postal_code }}</p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="mb-8">
                <h3 class="font-semibold text-gray-900 mb-4">Item Pesanan</h3>
                <div class="space-y-4">
                    @foreach($order->items as $item)
                        <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                            @if($item->product && $item->product->image)
                                <img src="{{ asset('storage/' . $item->product->image) }}" 
                                     alt="{{ $item->product_name }}" 
                                     class="w-20 h-20 object-cover rounded-lg">
                            @else
                                <div class="w-20 h-20 bg-gray-200 rounded-lg"></div>
                            @endif
                            
                            <div class="flex-1">
                                <p class="font-semibold text-gray-900">{{ $item->product_name }}</p>
                                <p class="text-sm text-gray-600">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            </div>
                            
                            <div class="text-right">
                                <p class="font-bold text-gray-900">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Totals -->
            <div class="border-t pt-6">
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal</span>
                        <span class="font-semibold">Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Ongkir</span>
                        <span class="font-semibold">{{ $order->shipping_cost > 0 ? 'Rp ' . number_format($order->shipping_cost, 0, ',', '.') : 'Akan dihitung admin' }}</span>
                    </div>
                </div>
                <div class="flex justify-between text-xl font-bold text-gray-900 pt-4 border-t">
                    <span>Total</span>
                    <span>Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                </div>
                @if($order->shipping_cost == 0)
                    <p class="text-xs text-gray-500 mt-2">*Belum termasuk ongkir</p>
                @endif
            </div>

            @if($order->notes)
                <div class="mt-6 p-4 bg-yellow-50 rounded-lg">
                    <p class="text-sm font-semibold text-gray-900 mb-1">Catatan:</p>
                    <p class="text-sm text-gray-700">{{ $order->notes }}</p>
                </div>
            @endif
        </div>

        <!-- Actions -->
        <div class="bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Langkah Selanjutnya</h2>
            
            <div class="space-y-4 mb-8">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 font-bold">1</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Tunggu Konfirmasi</p>
                        <p class="text-sm text-gray-600">Admin kami akan menghubungi Anda via WhatsApp untuk konfirmasi pesanan dan menghitung ongkir.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 font-bold">2</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Pembayaran</p>
                        <p class="text-sm text-gray-600">Lakukan pembayaran sesuai instruksi yang diberikan admin.</p>
                    </div>
                </div>

                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 font-bold">3</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900">Pengiriman</p>
                        <p class="text-sm text-gray-600">Pesanan Anda akan segera diproses dan dikirim.</p>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="https://wa.me/6287720912755?text=Halo, saya ingin konfirmasi pesanan {{ $order->order_number }}" 
                   target="_blank"
                   class="flex-1 bg-green-600 text-white text-center py-4 rounded-lg font-semibold hover:bg-green-700 transition shadow-lg">
                    💬 Hubungi via WhatsApp
                </a>
                <a href="{{ route('home') }}" 
                   class="flex-1 bg-blue-600 text-white text-center py-4 rounded-lg font-semibold hover:bg-blue-700 transition shadow-lg">
                    🏠 Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
@include('components.footer')
@endsection
