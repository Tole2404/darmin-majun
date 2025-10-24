<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display cart
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart.index', compact('cart', 'total'));
    }

    /**
     * Add to cart
     */
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Check if product is active and in stock
        if (!$product->is_active) {
            return redirect()->back()->with('error', 'Produk tidak tersedia!');
        }

        if ($product->stock <= 0) {
            return redirect()->back()->with('error', 'Stok produk habis!');
        }

        $validated = $request->validate([
            'quantity' => 'required|integer|min:' . $product->min_order . '|max:' . $product->stock,
        ], [
            'quantity.required' => 'Jumlah harus diisi!',
            'quantity.integer' => 'Jumlah harus berupa angka!',
            'quantity.min' => 'Jumlah minimal ' . $product->min_order . ' ' . $product->unit,
            'quantity.max' => 'Jumlah maksimal ' . $product->stock . ' ' . $product->unit . ' (stok tersedia)',
        ]);

        $cart = session()->get('cart', []);

        // If product already in cart, update quantity
        if (isset($cart[$id])) {
            $newQuantity = $cart[$id]['quantity'] + $validated['quantity'];
            
            // Check if new quantity exceeds stock
            if ($newQuantity > $product->stock) {
                return redirect()->back()->with('error', 'Jumlah melebihi stok tersedia! Stok: ' . $product->stock . ' ' . $product->unit);
            }
            
            $cart[$id]['quantity'] = $newQuantity;
        } else {
            // Add new product to cart
            $cart[$id] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price_min,
                'unit' => $product->unit,
                'quantity' => $validated['quantity'],
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Update cart item
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $validated['quantity'];
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diupdate!');
    }

    /**
     * Remove from cart
     */
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    /**
     * Clear cart
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan!');
    }
}
