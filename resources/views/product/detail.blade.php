@extends('layouts.app')

@section('content')
    <div class="detail-page">
        <div class="page-header">
            <a href="/home" class="icon-button">←</a>
            <span class="page-title">{{ $product->name }}</span>
            <a href="/cart" class="icon-button">🛒</a>
        </div>

        <div class="detail-image">
            <img src="{{ asset('Image/' . $product->image) }}" alt="{{ $product->name }}">
        </div>

        <div class="detail-card">
            <div class="detail-card-top">
                <div>
                    <div class="product-name">{{ $product->name }}</div>
                    <div class="product-subtitle">{{ $product->description }}</div>
                </div>
                <button class="heart-button">♡</button>
            </div>

            <div class="stats-row">
                <div class="stat-item">⭐ {{ $product->rating }} Ratings</div>
                <div class="stat-item">⏱ 4 hrs Delivery</div>
                <div class="stat-item">📝 {{ $product->reviews_count }}+ Reviews</div>
            </div>

            <div class="description">{{ $product->description }}</div>

            <div class="price-row">
                @if($product->original_price > $product->price)
                    <span class="price-old">Rp{{ number_format($product->original_price, 0, ',', '.') }}</span>
                @endif
                <span class="price-new">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
            </div>

            <form action="/cart/add" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                
                <div class="quantity-control">
                    <button type="button" class="qty-btn" onclick="decreaseQty()">-</button>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="{{ $product->stock }}" style="width: 40px; text-align: center; border: none;">
                    <button type="button" class="qty-btn" onclick="increaseQty()">+</button>
                </div>

                <button type="submit" class="add-cart-btn">Add to Cart</button>
            </form>
        </div>
    </div>

    <script>
        function increaseQty() {
            const input = document.getElementById('quantity');
            input.value = parseInt(input.value) + 1;
        }

        function decreaseQty() {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
    </script>
@endsection
