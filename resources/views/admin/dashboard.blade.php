@extends('layouts.app')

@section('content')
<div class="home-page">
    <div class="home-header">
        <div>
            <p class="label">Admin</p>
            <p class="location">Dashboard</p>
        </div>
        <div class="header-actions">
            <a href="/logout" class="icon-circle" title="Logout">⏻</a>
        </div>
    </div>

    <div class="section-card">
        <h3 class="section-title">Selamat datang, {{ auth()->user()->name }}</h3>
        <p class="address-subtext">Kelola produk dan user dari menu di bawah.</p>

        <div style="display:flex; gap:12px; margin-top:16px; flex-wrap:wrap;">
            <a class="checkout-btn" style="display:inline-block; width:auto; padding:12px 18px;" href="/admin/products">Kelola Produk</a>
            <a class="checkout-btn" style="display:inline-block; width:auto; padding:12px 18px; background:#17a34a;" href="/admin/users">Kelola User</a>
        </div>
    </div>
</div>
@endsection

