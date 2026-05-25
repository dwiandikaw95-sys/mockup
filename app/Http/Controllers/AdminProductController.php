<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()->with('category');

        if ($request->has('category') && $request->category !== 'all') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->orderByDesc('created_at')->get();
        $categories = Category::all();

        return view('admin.products.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $request->category ?? 'all',
        ]);
    }

    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'rating' => 'nullable|numeric|min:0|max:5',
            'reviews_count' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . preg_replace('/\s+/', '-', $validated['name']) . '.' . $image->getClientOriginalExtension();

            $destDir = public_path('Image');
            if (!File::exists($destDir)) {
                File::makeDirectory($destDir, 0755, true);
            }
            $image->move($destDir, $imageName);
        }

        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'original_price' => $validated['original_price'] ?? null,
            'stock' => $validated['stock'],
            'image' => $imageName,
            'category_id' => $validated['category_id'],
            'rating' => $validated['rating'] ?? 0,
            'reviews_count' => $validated['reviews_count'] ?? 0,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product' => $product,
            'categories' => Category::all(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'original_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'rating' => 'nullable|numeric|min:0|max:5',
            'reviews_count' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $imageName = $product->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . preg_replace('/\s+/', '-', $validated['name']) . '.' . $image->getClientOriginalExtension();

            $destDir = public_path('Image');
            if (!File::exists($destDir)) {
                File::makeDirectory($destDir, 0755, true);
            }
            $image->move($destDir, $imageName);
        }

        $product->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'original_price' => $validated['original_price'] ?? null,
            'stock' => $validated['stock'],
            'image' => $imageName,
            'category_id' => $validated['category_id'],
            'rating' => $validated['rating'] ?? 0,
            'reviews_count' => $validated['reviews_count'] ?? 0,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus');
    }
}

