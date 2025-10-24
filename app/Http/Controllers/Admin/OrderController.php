<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of orders
     */
    public function index(Request $request)
    {
        $query = Order::with('items.product')->latest();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                  ->orWhere('customer_name', 'like', "%{$search}%")
                  ->orWhere('customer_phone', 'like', "%{$search}%");
            });
        }

        $orders = $query->paginate(15);

        $stats = [
            'total' => Order::count(),
            'pending' => Order::pending()->count(),
            'confirmed' => Order::confirmed()->count(),
            'processing' => Order::processing()->count(),
            'shipped' => Order::shipped()->count(),
            'delivered' => Order::delivered()->count(),
        ];

        return view('admin.orders.index', compact('orders', 'stats'));
    }

    /**
     * Display the specified order
     */
    public function show(Order $order)
    {
        $order->load('items.product');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Update order status
     */
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,processing,shipped,delivered,cancelled',
        ]);

        $order->update(['status' => $validated['status']]);

        // Update timestamps based on status
        if ($validated['status'] === 'confirmed' && !$order->confirmed_at) {
            $order->update(['confirmed_at' => now()]);
        } elseif ($validated['status'] === 'shipped' && !$order->shipped_at) {
            $order->update(['shipped_at' => now()]);
        } elseif ($validated['status'] === 'delivered' && !$order->delivered_at) {
            $order->update(['delivered_at' => now()]);
        }

        return redirect()->back()->with('success', 'Status pesanan berhasil diupdate!');
    }

    /**
     * Update order notes
     */
    public function updateNotes(Request $request, Order $order)
    {
        $validated = $request->validate([
            'notes' => 'nullable|string',
        ]);

        $order->update(['notes' => $validated['notes']]);

        return redirect()->back()->with('success', 'Catatan berhasil diupdate!');
    }

    /**
     * Delete order
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index')
            ->with('success', 'Pesanan berhasil dihapus!');
    }
}
