<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of testimonials
     */
    public function index()
    {
        $testimonials = Testimonial::ordered()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Store a newly created testimonial
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_company' => 'nullable|string|max:255',
            'customer_position' => 'nullable|string|max:255',
            'customer_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle photo upload
        if ($request->hasFile('customer_photo')) {
            $photo = $request->file('customer_photo');
            $filename = time() . '_' . Str::slug($request->customer_name) . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('testimonials', $filename, 'public');
            $validated['customer_photo'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil ditambahkan!');
    }

    /**
     * Update the specified testimonial
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_company' => 'nullable|string|max:255',
            'customer_position' => 'nullable|string|max:255',
            'customer_photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'testimonial' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle photo upload
        if ($request->hasFile('customer_photo')) {
            // Delete old photo
            if ($testimonial->customer_photo && Storage::disk('public')->exists($testimonial->customer_photo)) {
                Storage::disk('public')->delete($testimonial->customer_photo);
            }

            $photo = $request->file('customer_photo');
            $filename = time() . '_' . Str::slug($request->customer_name) . '.' . $photo->getClientOriginalExtension();
            $path = $photo->storeAs('testimonials', $filename, 'public');
            $validated['customer_photo'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil diupdate!');
    }

    /**
     * Remove the specified testimonial
     */
    public function destroy(Testimonial $testimonial)
    {
        // Delete photo
        if ($testimonial->customer_photo && Storage::disk('public')->exists($testimonial->customer_photo)) {
            Storage::disk('public')->delete($testimonial->customer_photo);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimoni berhasil dihapus!');
    }
}
