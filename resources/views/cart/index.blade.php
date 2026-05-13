@extends('layouts.app')

@section('content')
    <div class="cart-page">
        <div class="page-header">
            <a href="/home" class="icon-button">←</a>
            <span class="page-title">My Cart</span>
            <div class="icon-button">🛒</div>
        </div>

        @if($cartItems->count() > 0)
            <div class="cart-items">
                @foreach($cartItems as $item)
                    <div class="item-card">
                        <div class="item-image-vertical">
                            <img src="{{ asset('Image/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                        </div>
                        <div class="item-info-vertical">
                            <div class="item-name-row">
                                <h3>{{ $item->product->name }}</h3>
                                <form action="/cart/{{ $item->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-icon" style="background: none; border: none; cursor: pointer;">✕</button>
                                </form>
                            </div>
                            <span class="item-price">Rp{{ number_format($item->product->price, 0, ',', '.') }}</span>
                            <form action="/cart/{{ $item->id }}" method="POST" class="quantity-selector-form" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}" class="qty-btn">-</button>
                                <input type="number" value="{{ $item->quantity }}" readonly style="width: 30px; text-align: center; border: none; background: none;">
                                <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}" class="qty-btn">+</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="discount-row">
                <form action="/checkout" method="POST" style="display:contents;">
                    @csrf
                    <input type="text" name="discount_code" placeholder="Enter Discount Code">
                    <button type="submit">Apply</button>
                </form>
            </div>

            <div class="summary-card">
                <div class="summary-row"><span>Subtotal</span><span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span></div>
                <div class="summary-row"><span>Discount</span><span>Rp0.000</span></div>
                <div class="summary-row"><span>Delivery Fee</span><span>Rp5.000</span></div>
                <div class="summary-row"><span>PPN</span><span>Rp{{ number_format(($subtotal * 0.1), 0, ',', '.') }}</span></div>
                <div class="summary-row total"><span>Total</span><span>Rp{{ number_format($subtotal + 5000 + ($subtotal * 0.1), 0, ',', '.') }}</span></div>
            </div>

            <form action="/checkout" method="POST">
                @csrf
                <button type="submit" class="checkout-btn">Checkout (Rp{{ number_format($subtotal + 5000 + ($subtotal * 0.1), 0, ',', '.') }})</button>
            </form>
        @else
            <div style="text-align: center; padding: 50px 20px;">
                <p style="font-size: 18px; color: #666;">Keranjang Anda kosong</p>
                <a href="/home" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #FF8C42; color: white; text-decoration: none; border-radius: 25px;">Lanjut Belanja</a>
            </div>
        @endif
    </div>
@endsection
