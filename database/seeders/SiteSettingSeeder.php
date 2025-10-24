<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'Darmin Majun', 'type' => 'text', 'group' => 'general', 'label' => 'Nama Website'],
            ['key' => 'site_tagline', 'value' => 'Solusi Kebersihan Terpercaya', 'type' => 'text', 'group' => 'general', 'label' => 'Tagline'],
            ['key' => 'site_logo', 'value' => null, 'type' => 'image', 'group' => 'general', 'label' => 'Logo'],
            
            // Hero Section
            ['key' => 'hero_title', 'value' => 'Supplier Kain Majun Berkualitas', 'type' => 'text', 'group' => 'hero', 'label' => 'Hero Title'],
            ['key' => 'hero_subtitle', 'value' => 'Kain Lap Majun Putih & Warna untuk Industri, Bengkel, dan Rumah Tangga', 'type' => 'textarea', 'group' => 'hero', 'label' => 'Hero Subtitle'],
            ['key' => 'hero_image', 'value' => 'https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?w=800&h=800&fit=crop', 'type' => 'image', 'group' => 'hero', 'label' => 'Hero Image'],
            ['key' => 'hero_badge', 'value' => 'Stok Tersedia - Siap Kirim Seluruh Indonesia', 'type' => 'text', 'group' => 'hero', 'label' => 'Hero Badge'],
            
            // About Section
            ['key' => 'about_title', 'value' => 'Darmin Majun', 'type' => 'text', 'group' => 'about', 'label' => 'About Title'],
            ['key' => 'about_subtitle', 'value' => 'Supplier terpercaya kain majun berkualitas sejak 2014', 'type' => 'text', 'group' => 'about', 'label' => 'About Subtitle'],
            ['key' => 'about_description', 'value' => 'Kami adalah supplier terpercaya yang menyediakan berbagai jenis kain majun berkualitas tinggi untuk kebutuhan industri, bengkel, dan rumah tangga.', 'type' => 'textarea', 'group' => 'about', 'label' => 'About Description'],
            
            // Contact
            ['key' => 'contact_phone', 'value' => '087720912755', 'type' => 'text', 'group' => 'contact', 'label' => 'Telepon'],
            ['key' => 'contact_email', 'value' => 'info@darminmajun.com', 'type' => 'text', 'group' => 'contact', 'label' => 'Email'],
            ['key' => 'contact_address', 'value' => 'Jl. Industri No. 123, Jakarta, Indonesia', 'type' => 'textarea', 'group' => 'contact', 'label' => 'Alamat'],
            ['key' => 'contact_whatsapp', 'value' => '6287720912755', 'type' => 'text', 'group' => 'contact', 'label' => 'WhatsApp'],
            
            // Social Media
            ['key' => 'social_facebook', 'value' => '#', 'type' => 'text', 'group' => 'social', 'label' => 'Facebook'],
            ['key' => 'social_instagram', 'value' => '#', 'type' => 'text', 'group' => 'social', 'label' => 'Instagram'],
            ['key' => 'social_twitter', 'value' => '#', 'type' => 'text', 'group' => 'social', 'label' => 'Twitter'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::create($setting);
        }
    }
}
