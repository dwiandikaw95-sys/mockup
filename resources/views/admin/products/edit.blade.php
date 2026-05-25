@extends('layouts.app')

@section('content')
<div class="home-page">
    <div class="home-header">
        <div>
            <p class="label">Admin</p>
            <p class="location">Edit Produk</p>
        </div>
        <div class="header-actions">
            <a href="/admin/products" class="icon-circle" title="Kembali">←</a>
        </div>
    </div>

    <div class="section-card">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="display:flex; flex-direction:column; gap:12px;">
                <div>
                    <label>Nama Produk</label>
                    <input class="input" type="text" name="name" value="{{ old('name', $product->name) }}" required>
                </div>

                <div>
                    <label>Deskripsi</label>
                    <textarea class="input" name="description" rows="4" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div>
                    <label>Kategori</label>
                    <select class="input" name="category_id" required>
                        <option value="">-- pilih --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @selected(old('category_id', $product->category_id) == $cat->id)>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div>
                        <label>Harga</label>
                        <input class="input" type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required>
                    </div>
                    <div>
                        <label>Harga Asli (opsional)</label>
                        <input class="input" type="number" step="0.01" name="original_price" value="{{ old('original_price', $product->original_price) }}">
                    </div>
                </div>

                <div>
                    <label>Stok</label>
                    <input class="input" type="number" name="stock" value="{{ old('stock', $product->stock) }}" required>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div>
                        <label>Rating</label>
                        <input class="input" type="number" step="0.1" name="rating" value="{{ old('rating', $product->rating) }}">
                    </div>
                    <div>
                        <label>Reviews Count</label>
                        <input class="input" type="number" name="reviews_count" value="{{ old('reviews_count', $product->reviews_count) }}">
                    </div>
                </div>

                <div>
                    <label>Gambar (opsional)</label>
                    @if($product->image)
                        <div style="margin-bottom:8px;">
                            <img src="{{ asset('Image/' . $product->image) }}" alt="{{ $product->name }}" style="width:80px; height:80px; object-fit:cover; border-radius:10px;">
                        </div>
                    @endif
                    <input class="input" type="file" name="image" accept="image/*">
                </div>

                <button type="submit" class="checkout-btn">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

