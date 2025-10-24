@extends('admin.layouts.app')

@section('title', 'Kelola Testimoni')

@section('content')
<div class="space-y-6" x-data="{ 
    showCreateModal: false, 
    showEditModal: false,
    editTestimonial: null,
    openEdit(testimonial) {
        this.editTestimonial = testimonial;
        this.showEditModal = true;
    }
}">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Kelola Testimoni</h1>
            <p class="text-gray-600 mt-1">Manage testimoni customer</p>
        </div>
        <button @click="showCreateModal = true" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Testimoni
        </button>
    </div>

    <!-- Testimonials Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($testimonials as $testimonial)
            <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition">
                <!-- Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-3">
                        @if($testimonial->customer_photo)
                            <img src="{{ asset('storage/' . $testimonial->customer_photo) }}" alt="{{ $testimonial->customer_name }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-xl font-bold text-gray-600">{{ substr($testimonial->customer_name, 0, 1) }}</span>
                            </div>
                        @endif
                        <div>
                            <p class="font-bold text-gray-900">{{ $testimonial->customer_name }}</p>
                            @if($testimonial->customer_position && $testimonial->customer_company)
                                <p class="text-xs text-gray-600">{{ $testimonial->customer_position }} at {{ $testimonial->customer_company }}</p>
                            @elseif($testimonial->customer_company)
                                <p class="text-xs text-gray-600">{{ $testimonial->customer_company }}</p>
                            @endif
                        </div>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $testimonial->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                        {{ $testimonial->is_active ? 'Aktif' : 'Nonaktif' }}
                    </span>
                </div>

                <!-- Rating -->
                <div class="flex items-center gap-1 mb-3">
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
                <p class="text-gray-600 text-sm mb-4 line-clamp-4">{{ $testimonial->testimonial }}</p>

                <!-- Footer -->
                <div class="flex items-center justify-between pt-4 border-t">
                    <span class="text-xs text-gray-500">Order: {{ $testimonial->order }}</span>
                    <div class="flex items-center gap-2">
                        <button 
                            @click="openEdit({{ $testimonial->toJson() }})"
                            class="text-blue-600 hover:text-blue-900"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </button>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus testimoni ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full bg-white rounded-xl shadow-md p-12 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                </svg>
                <p class="mt-4 text-gray-500">Belum ada testimoni</p>
                <button @click="showCreateModal = true" class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                    Tambah Testimoni Pertama
                </button>
            </div>
        @endforelse
    </div>

    <!-- Create Modal -->
    <div x-show="showCreateModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" @keydown.escape.window="showCreateModal = false">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black bg-opacity-50" @click="showCreateModal = false"></div>
            
            <div class="relative bg-white rounded-xl shadow-xl max-w-2xl w-full p-6 max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Tambah Testimoni</h3>
                    <button @click="showCreateModal = false" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Customer <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="customer_name" id="customer_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="customer_company" class="block text-sm font-medium text-gray-700 mb-2">
                                Perusahaan
                            </label>
                            <input type="text" name="customer_company" id="customer_company" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="customer_position" class="block text-sm font-medium text-gray-700 mb-2">
                                Posisi/Jabatan
                            </label>
                            <input type="text" name="customer_position" id="customer_position" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="customer_photo" class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Customer
                            </label>
                            <input type="file" name="customer_photo" id="customer_photo" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label for="testimonial" class="block text-sm font-medium text-gray-700 mb-2">
                            Testimoni <span class="text-red-500">*</span>
                        </label>
                        <textarea name="testimonial" id="testimonial" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Tulis testimoni customer..."></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">
                                Rating <span class="text-red-500">*</span>
                            </label>
                            <select name="rating" id="rating" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="5">⭐⭐⭐⭐⭐ (5 Bintang)</option>
                                <option value="4">⭐⭐⭐⭐ (4 Bintang)</option>
                                <option value="3">⭐⭐⭐ (3 Bintang)</option>
                                <option value="2">⭐⭐ (2 Bintang)</option>
                                <option value="1">⭐ (1 Bintang)</option>
                            </select>
                        </div>

                        <div>
                            <label for="order" class="block text-sm font-medium text-gray-700 mb-2">
                                Urutan
                            </label>
                            <input type="number" name="order" id="order" value="0" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" value="1" checked class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is_active" class="ml-2 text-sm text-gray-700">Aktif (Tampil di website)</label>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4 border-t">
                        <button type="button" @click="showCreateModal = false" class="px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div x-show="showEditModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" @keydown.escape.window="showEditModal = false">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black bg-opacity-50" @click="showEditModal = false"></div>
            
            <div class="relative bg-white rounded-xl shadow-xl max-w-2xl w-full p-6 max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900">Edit Testimoni</h3>
                    <button @click="showEditModal = false" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form :action="`{{ route('admin.testimonials.index') }}/${editTestimonial?.id}`" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="edit_customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Customer <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="customer_name" id="edit_customer_name" :value="editTestimonial?.customer_name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="edit_customer_company" class="block text-sm font-medium text-gray-700 mb-2">
                                Perusahaan
                            </label>
                            <input type="text" name="customer_company" id="edit_customer_company" :value="editTestimonial?.customer_company" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="edit_customer_position" class="block text-sm font-medium text-gray-700 mb-2">
                                Posisi/Jabatan
                            </label>
                            <input type="text" name="customer_position" id="edit_customer_position" :value="editTestimonial?.customer_position" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label for="edit_customer_photo" class="block text-sm font-medium text-gray-700 mb-2">
                                Foto Customer
                            </label>
                            <input type="file" name="customer_photo" id="edit_customer_photo" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div>
                        <label for="edit_testimonial" class="block text-sm font-medium text-gray-700 mb-2">
                            Testimoni <span class="text-red-500">*</span>
                        </label>
                        <textarea name="testimonial" id="edit_testimonial" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" x-text="editTestimonial?.testimonial"></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="edit_rating" class="block text-sm font-medium text-gray-700 mb-2">
                                Rating <span class="text-red-500">*</span>
                            </label>
                            <select name="rating" id="edit_rating" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option :value="5" :selected="editTestimonial?.rating == 5">⭐⭐⭐⭐⭐ (5 Bintang)</option>
                                <option :value="4" :selected="editTestimonial?.rating == 4">⭐⭐⭐⭐ (4 Bintang)</option>
                                <option :value="3" :selected="editTestimonial?.rating == 3">⭐⭐⭐ (3 Bintang)</option>
                                <option :value="2" :selected="editTestimonial?.rating == 2">⭐⭐ (2 Bintang)</option>
                                <option :value="1" :selected="editTestimonial?.rating == 1">⭐ (1 Bintang)</option>
                            </select>
                        </div>

                        <div>
                            <label for="edit_order" class="block text-sm font-medium text-gray-700 mb-2">
                                Urutan
                            </label>
                            <input type="number" name="order" id="edit_order" :value="editTestimonial?.order" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="is_active" id="edit_is_active" value="1" :checked="editTestimonial?.is_active" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="edit_is_active" class="ml-2 text-sm text-gray-700">Aktif (Tampil di website)</label>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-4 border-t">
                        <button type="button" @click="showEditModal = false" class="px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition">
                            Batal
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
