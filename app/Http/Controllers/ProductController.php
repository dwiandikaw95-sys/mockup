<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('category') && $request->category != 'all') {
            $query->whereHas('category', function ($q) {
                $q->where('slug', request('category'));
            });
        }

        $products = $query->get();
        $categories = Category::all();

        return view('home.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $request->category ?? 'all'
        ]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.detail', ['product' => $product]);
    }
}
