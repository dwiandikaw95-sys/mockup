<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items.product')
            ->orderByDesc('created_at')
            ->get();

        return view('order.index', ['orders' => $orders]);
    }

    public function show($id)
    {
        $order = Order::where('user_id', auth()->id())
            ->with('items.product')
            ->findOrFail($id);

        return view('order.detail', ['order' => $order]);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'discount_code' => 'nullable|string'
        ]);

        $cartItems = Cart::where('user_id', auth()->id())
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Keranjang kosong');
        }

        // Calculate totals
        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $discount = 0; // TODO: Implement discount code logic
        $deliveryFee = 5000;
        $tax = ($subtotal - $discount) * 0.1; // 10% tax
        $total = $subtotal - $discount + $deliveryFee + $tax;

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'subtotal' => $subtotal,
            'discount' => $discount,
            'delivery_fee' => $deliveryFee,
            'tax' => $tax,
            'total' => $total,
            'status' => 'pending'
        ]);

        // Create order items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
                'subtotal' => $cartItem->product->price * $cartItem->quantity
            ]);
        }

        // Clear cart
        Cart::where('user_id', auth()->id())->delete();

        return redirect('/orders/' . $order->id)->with('success', 'Pesanan berhasil dibuat');
    }

    public function confirmPayment($id)
    {
        $order = Order::where('user_id', auth()->id())->findOrFail($id);
        $order->update(['status' => 'confirmed']);

        return back()->with('success', 'Pesanan dikonfirmasi');
    }
}
