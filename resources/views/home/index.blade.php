@extends('layouts.app')

@section('content')
    <div class="home-page">
        <div class="home-header">
            <div>
                <p class="label"><span style="margin-right: 4px;">📍</span>Deliver to</p>
                <p class="location" style="display: flex; align-items: center; gap: 4px;">Indonesia, Jakarta <span style="font-size: 10px; color: #8e8e93;">▼</span></p>
            </div>
            <div class="header-actions">
                <a href="#" class="icon-circle">🔍</a>
                <a href="/cart" class="icon-circle">🛒</a>
            </div>
        </div>

        <h1 class="main-title"><span style="color: #F2721C;">Bahan makanan</span> segar.<br>Tanpa ribet.</h1>

        <div class="hero-card">
            <div class="hero-card-top">
                <span class="hero-highlight">25% Discount</span>
            </div>
<div class="hero-card-body">
                <div>
                    <p class="hero-text">Belanja segar. Makan sehat. Hidup lebih baik.</p>
                    <a href="#" class="hero-button">Shop Now</a>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('Image/fruit-basket.png') }}" alt="Fruit discount">
                </div>
            </div>
        </div>

        <div class="category-scroll">
            <a href="/home?category=all" class="tab {{ $selectedCategory == 'all' ? 'active' : '' }}">All</a>
            @foreach($categories as $category)
                @if($category->slug !== 'all')
                    <a href="/home?category={{ $category->slug }}" class="tab {{ $selectedCategory == $category->slug ? 'active' : '' }}">
                        {{ $category->name }}
                    </a>
                @endif
            @endforeach
        </div>

        <div class="section-header">
            <span>Popular</span>
            <a href="#">View All</a>
        </div>

        <div class="product-grid">
            @forelse($products as $product)
                <a href="/product/{{ $product->id }}" class="product-card">
                    <img src="{{ asset('Image/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="product-name">{{ $product->name }}</div>
                    <div class="rating">⭐ {{ $product->rating }}</div>
                    <div class="product-bottom">
                        <span class="product-price">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                        <form action="/cart/add" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="add-circle" style="background: none; border: none; cursor: pointer; font-size: 1.2em;">+</button>
                        </form>
                    </div>
                </a>
            @empty
                <p>Tidak ada produk tersedia</p>
            @endforelse
        </div>

        <div class="bottom-nav">
            <a href="/home" class="nav-item active"><span>🏠</span><span>Home</span></a>
            <a href="#" class="nav-item"><span>📂</span><span>Category</span></a>
            <a href="#" class="nav-item"><span>❤️</span><span>Wishlist</span></a>
            <a href="#" class="nav-item"><span>👤</span><span>Profile</span></a>
        </div>
    </div>
@endsection