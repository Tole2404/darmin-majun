@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Pengaturan Website</h1>
        <p class="text-gray-600 mt-1">Edit konten website tanpa coding</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        @foreach($settings as $group => $groupSettings)
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-6 pb-4 border-b">
                    {{ ucfirst($group) }} Settings
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($groupSettings as $setting)
                        <div class="{{ $setting->type == 'textarea' ? 'md:col-span-2' : '' }}">
                            <label for="{{ $setting->key }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $setting->label }}
                            </label>

                            @if($setting->type == 'text')
                                <input 
                                    type="text" 
                                    name="{{ $setting->key }}" 
                                    id="{{ $setting->key }}" 
                                    value="{{ old($setting->key, $setting->value) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                >

                            @elseif($setting->type == 'textarea')
                                <textarea 
                                    name="{{ $setting->key }}" 
                                    id="{{ $setting->key }}" 
                                    rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                >{{ old($setting->key, $setting->value) }}</textarea>

                            @elseif($setting->type == 'image')
                                @if($setting->value)
                                    <div class="mb-2">
                                        <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->label }}" class="w-32 h-32 object-cover rounded-lg border">
                                    </div>
                                @endif
                                <input 
                                    type="file" 
                                    name="{{ $setting->key }}" 
                                    id="{{ $setting->key }}" 
                                    accept="image/*"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                >
                                <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG, WEBP. Max: 2MB</p>

                            @elseif($setting->type == 'boolean')
                                <div class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        name="{{ $setting->key }}" 
                                        id="{{ $setting->key }}" 
                                        value="1"
                                        {{ old($setting->key, $setting->value) ? 'checked' : '' }}
                                        class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                    >
                                    <label for="{{ $setting->key }}" class="ml-2 text-sm text-gray-700">Aktifkan</label>
                                </div>
                            @endif

                            @error($setting->key)
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <!-- Submit Button -->
        <div class="flex items-center justify-end gap-4 bg-white rounded-xl shadow-md p-6">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition shadow-lg">
                💾 Simpan Semua Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection
