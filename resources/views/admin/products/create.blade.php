@extends('layouts.app')

@section('content')
<div class="home-page">
    <div class="home-header">
        <div>
            <p class="label">Admin</p>
            <p class="location">Tambah Produk</p>
        </div>
        <div class="header-actions">
            <a href="/admin/products" class="icon-circle" title="Kembali">←</a>
        </div>
    </div>

    <div class="section-card">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="display:flex; flex-direction:column; gap:12px;">
                <div>
                    <label>Nama Produk</label>
                    <input class="input" type="text" name="name" value="{{ old('name') }}" required>
                </div>

                <div>
                    <label>Deskripsi</label>
                    <textarea class="input" name="description" rows="4" required>{{ old('description') }}</textarea>
                </div>

                <div>
                    <label>Kategori</label>
                    <select class="input" name="category_id" required>
                        <option value="">-- pilih --</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div>
                        <label>Harga</label>
                        <input class="input" type="number" step="0.01" name="price" value="{{ old('price') }}" required>
                    </div>
                    <div>
                        <label>Harga Asli (opsional)</label>
                        <input class="input" type="number" step="0.01" name="original_price" value="{{ old('original_price') }}">
                    </div>
                </div>

                <div>
                    <label>Stok</label>
                    <input class="input" type="number" name="stock" value="{{ old('stock') }}" required>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                    <div>
                        <label>Rating</label>
                        <input class="input" type="number" step="0.1" name="rating" value="{{ old('rating') }}">
                    </div>
                    <div>
                        <label>Reviews Count</label>
                        <input class="input" type="number" name="reviews_count" value="{{ old('reviews_count') }}">
                    </div>
                </div>

                <div>
                    <label>Gambar (opsional)</label>
                    <input class="input" type="file" name="image" accept="image/*">
                </div>

                <button type="submit" class="checkout-btn">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

