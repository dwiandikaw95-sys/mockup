@extends('layouts.app')

@section('content')
    <div class="orders-page">
        <div class="page-header">
            <a href="/home" class="icon-button">←</a>
            <span class="page-title">My Orders</span>
            <div class="icon-button">📦</div>
        </div>

        @if ($orders->count() > 0)
            <div class="orders-list">
                @foreach ($orders as $order)
                    <a href="/orders/{{ $order->id }}" class="order-card">
                        <div class="order-header">
                            <div>
                                <p class="order-id">Order #{{ $order->id }}</p>
                                <p class="order-date">{{ $order->created_at->format('d M Y') }}</p>
                            </div>
                            <div class="order-status {{ $order->status }}">
                                {{ ucfirst($order->status) }}
                            </div>
                        </div>
                        <div class="order-items">
                            @foreach ($order->items as $item)
                                <p class="order-item">{{ optional($item->product)->name ?? 'Product Unavailable' }}
                                    x{{ $item->quantity }}</p>
                            @endforeach
                        </div>
                        <div class="order-footer">
                            <p class="order-total">Total: Rp{{ number_format($order->total, 0, ',', '.') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div style="text-align: center; padding: 50px 20px;">
                <p style="font-size: 18px; color: #666;">Anda belum membuat pesanan</p>
                <a href="/home"
                    style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #FF8C42; color: white; text-decoration: none; border-radius: 25px;">Mulai
                    Belanja</a>
            </div>
        @endif
    </div>

    <style>
        .orders-list {
            padding: 15px;
        }

        .order-card {
            display: block;
            background: white;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 15px;
            margin-bottom: 15px;
            text-decoration: none;
            color: inherit;
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .order-id {
            font-weight: bold;
            margin: 0;
            color: #333;
        }

        .order-date {
            font-size: 12px;
            color: #999;
            margin: 5px 0 0;
        }

        .order-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .order-status.pending {
            background-color: #FFF3CD;
            color: #856404;
        }

        .order-status.confirmed {
            background-color: #D4EDDA;
            color: #155724;
        }

        .order-items {
            margin: 10px 0;
            padding: 10px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .order-item {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }

        .order-footer {
            margin-top: 10px;
            text-align: right;
        }

        .order-total {
            font-weight: bold;
            color: #FF8C42;
            margin: 0;
        }
    </style>
@endsection
