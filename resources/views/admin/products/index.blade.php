@extends('layouts.app')

@section('content')
<div class="home-page">
    <div class="home-header">
        <div>
            <p class="label">Admin</p>
            <p class="location">Produk</p>
        </div>
        <div class="header-actions">
            <a href="/admin/dashboard" class="icon-circle" title="Dashboard">⌂</a>
        </div>
    </div>

    <div class="section-card">
        <div class="section-header" style="margin-bottom:12px; display:flex; align-items:center; justify-content:space-between; gap:12px;">
            <span>Daftar Produk</span>
            <a href="{{ route('admin.products.create') }}" class="checkout-btn" style="display:inline-block; width:auto; padding:10px 14px;">+ Tambah Produk</a>
        </div>

        @if(session('success'))
            <div style="padding:10px 12px; background:#d1fae5; color:#065f46; border-radius:10px; margin-bottom:12px;">{{ session('success') }}</div>
        @endif

        <div style="margin-bottom:12px;">
            <form method="GET" action="{{ route('admin.products.index') }}" style="display:flex; gap:10px; align-items:center;">
                <select name="category" class="input" style="max-width:220px;" onchange="this.form.submit()">
                    <option value="all" @selected($selectedCategory === 'all')>Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}" @selected($selectedCategory === $cat->slug)>{{ $cat->name }}</option>
                    @endforeach
                </select>
                <noscript><button type="submit" class="checkout-btn">Filter</button></noscript>
            </form>
        </div>

        <div class="products-list" style="display:flex; flex-direction:column; gap:12px;">
            @forelse($products as $product)
                <div style="background:#fff; border-radius:14px; padding:12px; display:flex; gap:12px; align-items:flex-start;">
                    <div>
                        @if($product->image)
                            <img src="{{ asset('Image/' . $product->image) }}" alt="{{ $product->name }}" style="width:70px; height:70px; object-fit:cover; border-radius:12px;">
                        @else
                            <div style="width:70px; height:70px; border-radius:12px; background:#f3f4f6;"></div>
                        @endif
                    </div>
                    <div style="flex:1;">
                        <div style="font-weight:800;">{{ $product->name }}</div>
                        <div style="color:#666; font-size:13px; margin-top:4px;">Kategori: {{ optional($product->category)->name ?? '-' }}</div>
                        <div style="margin-top:6px; font-weight:700;">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                        <div style="color:#666; font-size:13px; margin-top:2px;">Stok: {{ $product->stock }}</div>
                    </div>
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="checkout-btn" style="background:#2563eb; padding:10px 12px;">Edit</a>

                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="checkout-btn" style="background:#ef4444; padding:10px 12px; border:none;">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div style="color:#666;">Belum ada produk.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection

