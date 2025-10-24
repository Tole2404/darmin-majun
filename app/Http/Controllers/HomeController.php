<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display homepage
     */
    public function index()
    {
        // Get featured products
        $featuredProducts = Product::with('category')
            ->active()
            ->featured()
            ->inStock()
            ->ordered()
            ->take(6)
            ->get();

        // Get all active products for products section
        $products = Product::with('category')
            ->active()
            ->inStock()
            ->ordered()
            ->take(12)
            ->get();

        // Get active categories
        $categories = Category::active()
            ->withCount('products')
            ->ordered()
            ->get();

        // Get active testimonials
        $testimonials = Testimonial::active()
            ->ordered()
            ->take(6)
            ->get();

        // Get site settings
        $settings = [
            'hero_title' => SiteSetting::get('hero_title', 'Supplier Kain Majun Berkualitas'),
            'hero_subtitle' => SiteSetting::get('hero_subtitle', 'Kain Lap Majun Putih & Warna untuk Industri, Bengkel, dan Rumah Tangga'),
            'hero_image' => SiteSetting::get('hero_image', 'https://images.unsplash.com/photo-1610557892470-55d9e80c0bce?w=800&h=800&fit=crop'),
            'hero_badge' => SiteSetting::get('hero_badge', 'Stok Tersedia - Siap Kirim Seluruh Indonesia'),
            'about_title' => SiteSetting::get('about_title', 'Darmin Majun'),
            'about_subtitle' => SiteSetting::get('about_subtitle', 'Supplier terpercaya kain majun berkualitas sejak 2014'),
            'contact_phone' => SiteSetting::get('contact_phone', '087720912755'),
            'contact_whatsapp' => SiteSetting::get('contact_whatsapp', '6287720912755'),
        ];

        return view('landing', compact('featuredProducts', 'products', 'categories', 'testimonials', 'settings'));
    }
}
