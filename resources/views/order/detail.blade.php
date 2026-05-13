@extends('layouts.app')

@section('content')
    <div class="order-detail-page">
        <div class="page-header">
            <a href="/orders" class="icon-button">←</a>
            <span class="page-title">Order #{{ $order->id }}</span>
            <div class="icon-button">📦</div>
        </div>

        <div class="order-detail-card">
            <div class="section">
                <h3>Order Status</h3>
                <div class="status-badge {{ $order->status }}">
                    {{ ucfirst($order->status) }}
                </div>
                <p class="order-date">{{ $order->created_at->format('d M Y, H:i') }}</p>
            </div>

            <div class="section">
                <h3>Order Items</h3>
                @foreach($order->items as $item)
                    <div class="order-item-detail">
                        <img src="{{ asset('Image/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                        <div class="item-info">
                            <p class="item-name">{{ $item->product->name }}</p>
                            <p class="item-qty">Quantity: {{ $item->quantity }}</p>
                            <p class="item-price">Rp{{ number_format($item->price, 0, ',', '.') }} x {{ $item->quantity }}</p>
                        </div>
                        <p class="item-total">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>

            <div class="section">
                <h3>Order Summary</h3>
                <div class="summary-detail">
                    <div class="summary-row">
                        <span>Subtotal</span>
                        <span>Rp{{ number_format($order->subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Discount</span>
                        <span>Rp{{ number_format($order->discount, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Delivery Fee</span>
                        <span>Rp{{ number_format($order->delivery_fee, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row">
                        <span>Tax</span>
                        <span>Rp{{ number_format($order->tax, 0, ',', '.') }}</span>
                    </div>
                    <div class="summary-row total">
                        <span>Total</span>
                        <span>Rp{{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            @if($order->status === 'pending')
                <form action="/orders/{{ $order->id }}/confirm" method="POST">
                    @csrf
                    <button type="submit" class="checkout-btn">Confirm Payment</button>
                </form>
            @endif
        </div>
    </div>

    <style>
        .order-detail-page {
            min-height: 100vh;
            background-color: #f5f5f5;
        }

        .order-detail-card {
            background: white;
            margin: 15px;
            border-radius: 12px;
            padding: 20px;
        }

        .section {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .section:last-child {
            border-bottom: none;
        }

        .section h3 {
            margin: 0 0 15px;
            color: #333;
            font-size: 16px;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .status-badge.pending {
            background-color: #FFF3CD;
            color: #856404;
        }

        .status-badge.confirmed {
            background-color: #D4EDDA;
            color: #155724;
        }

        .order-date {
            color: #999;
            font-size: 12px;
            margin: 0;
        }

        .order-item-detail {
            display: flex;
            gap: 15px;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .order-item-detail img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            object-fit: cover;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: bold;
            margin: 0;
            color: #333;
        }

        .item-qty,
        .item-price {
            font-size: 12px;
            color: #999;
            margin: 5px 0;
        }

        .item-total {
            font-weight: bold;
            color: #FF8C42;
            margin: 0;
            align-self: center;
        }

        .summary-detail {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            color: #666;
        }

        .summary-row.total {
            border-top: 2px solid #eee;
            padding-top: 15px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .checkout-btn {
            width: 100%;
            padding: 15px;
            background-color: #FF8C42;
            color: white;
            border: none;
            border-radius: 25px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
@endsection
