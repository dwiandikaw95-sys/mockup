@extends('layouts.app')

@section('content')
    <div class="checkout-page">
        <div class="page-header">
            <a href="/cart" class="icon-button">←</a>
            <span class="page-title">Checkout</span>
            <div class="icon-button">✓</div>
        </div>

        <div class="checkout-container">
            <div class="checkout-left">
                <div class="section-card">
                    <h3 class="section-title">Delivery Address</h3>
                    <p class="address-text">Deliver to Indonesia, Jakarta</p>
                    <p class="address-subtext">Home • Jl. Example No. 123</p>
                </div>

                <div class="section-card">
                    <h3 class="section-title">Order Items</h3>
                    <div class="order-items-list">
                        @forelse($cartItems as $item)
                            <div class="checkout-item">
                                <div class="item-thumb">
                                    <img src="{{ asset('Image/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                                </div>
                                <div class="item-details">
                                    <p class="item-title">{{ $item->product->name }}</p>
                                    <p class="item-qty">{{ $item->quantity }}x Rp{{ number_format($item->product->price, 0, ',', '.') }}</p>
                                </div>
                                <p class="item-total">Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</p>
                            </div>
                        @empty
                            <p>Tidak ada item di keranjang</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="checkout-right">
                <div class="section-card">
                    <h3 class="section-title">Payment Details</h3>
                    <div class="payment-summary">
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>Rp{{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="summary-row">
                            <span>Delivery Fee</span>
                            <span>Rp5.000</span>
                        </div>
                        <div class="summary-row">
                            <span>Tax (10%)</span>
                            <span>Rp{{ number_format(($subtotal * 0.1), 0, ',', '.') }}</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total Payment</span>
                            <span>Rp{{ number_format($subtotal + 5000 + ($subtotal * 0.1), 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>

                <form action="/checkout" method="POST" style="display: contents;">
                    @csrf
                    <input type="hidden" name="discount_code" value="">
                    <button type="submit" class="confirm-btn">Confirm Order</button>
                </form>

                <a href="/cart" class="back-to-cart-btn">Back to Cart</a>
            </div>
        </div>
    </div>

    <style>
        .checkout-page {
            background: #f5f5f5;
            min-height: 100vh;
        }

        .checkout-container {
            padding: 20px;
        }

        @media (min-width: 769px) {
            .checkout-container {
                display: grid;
                grid-template-columns: 1.8fr 1.2fr;
                gap: 40px;
                align-items: start;
                padding: 40px 0;
            }
        }

        .section-card {
            background: #ffffff;
            border-radius: 24px;
            padding: 20px;
            margin-bottom: 16px;
            box-shadow: 0 14px 34px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #1f1f1f;
            margin: 0 0 12px 0;
        }

        .address-text {
            font-size: 15px;
            font-weight: 700;
            color: #1f1f1f;
            margin: 0 0 4px 0;
        }

        .address-subtext {
            font-size: 13px;
            color: #8b8b8b;
            margin: 0;
        }

        .order-items-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .checkout-item {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 12px;
            background: #f9f9f9;
            border-radius: 16px;
        }

        .item-thumb {
            width: 60px;
            height: 60px;
            background: #ffffff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .item-thumb img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 12px;
        }

        .item-details {
            flex: 1;
        }

        .item-title {
            font-size: 14px;
            font-weight: 700;
            color: #1f1f1f;
            margin: 0 0 4px 0;
        }

        .item-qty {
            font-size: 12px;
            color: #8b8b8b;
            margin: 0;
        }

        .item-total {
            font-size: 14px;
            font-weight: 700;
            color: #1f1f1f;
            margin: 0;
            flex-shrink: 0;
        }

        .payment-summary {
            background: #f9f9f9;
            border-radius: 16px;
            padding: 16px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: #5f5f5f;
            margin-bottom: 8px;
        }

        .summary-row.total {
            font-weight: 700;
            color: #1f1f1f;
            font-size: 16px;
            border-top: 1px solid #e0e0e0;
            padding-top: 12px;
            margin-top: 12px;
            margin-bottom: 0;
        }

        .confirm-btn {
            width: 100%;
            min-height: 52px;
            border: none;
            border-radius: 30px;
            background: #F2721C;
            color: #ffffff;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 18px 40px rgba(242, 114, 28, 0.25);
            margin-bottom: 12px;
        }

        .back-to-cart-btn {
            display: block;
            text-align: center;
            padding: 14px;
            color: #F2721C;
            text-decoration: none;
            font-weight: 700;
            border-radius: 30px;
            border: 1px solid #F2721C;
        }
    </style>
@endsection
