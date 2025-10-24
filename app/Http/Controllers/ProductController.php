<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display product detail
     */
    public function show($slug)
    {
        $product = Product::with('category')
            ->where('slug', $slug)
            ->active()
            ->firstOrFail();

        // Get related products (same category)
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->inStock()
            ->ordered()
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    /**
     * Display all products
     */
    public function index(Request $request)
    {
        $query = Product::with('category')->active()->inStock();

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sort
        $sortBy = $request->get('sort', 'order');
        if ($sortBy === 'price_low') {
            $query->orderBy('price_min', 'asc');
        } elseif ($sortBy === 'price_high') {
            $query->orderBy('price_min', 'desc');
        } elseif ($sortBy === 'name') {
            $query->orderBy('name', 'asc');
        } else {
            $query->ordered();
        }

        $products = $query->paginate(12);
        $categories = Category::active()->withCount('products')->ordered()->get();

        return view('products.index', compact('products', 'categories'));
    }
}
