@extends('layouts.app')

@section('content')
<div class="home-page">
    <div class="home-header">
        <div>
            <p class="label">Admin</p>
            <p class="location">Users</p>
        </div>
        <div class="header-actions">
            <a href="/admin/dashboard" class="icon-circle" title="Dashboard">⌂</a>
        </div>
    </div>

    <div class="section-card">
        <div class="section-header" style="margin-bottom:12px;">Daftar User</div>

        @if(session('success'))
            <div style="padding:10px 12px; background:#d1fae5; color:#065f46; border-radius:10px; margin-bottom:12px;">{{ session('success') }}</div>
        @endif

        <div style="display:flex; flex-direction:column; gap:12px;">
            @forelse($users as $u)
                <div style="background:#fff; border-radius:14px; padding:12px; display:flex; gap:12px; align-items:flex-start;">
                    <div style="width:44px; height:44px; border-radius:12px; background:#f3f4f6; display:flex; align-items:center; justify-content:center; font-weight:800;">{{ strtoupper(substr($u->name,0,1)) }}</div>
                    <div style="flex:1;">
                        <div style="font-weight:800;">{{ $u->name }} @if(($u->role ?? 'user') === 'admin') <span style="color:#b91c1c; font-size:12px; font-weight:900;">(admin)</span> @endif</div>
                        <div style="color:#666; font-size:13px; margin-top:4px;">{{ $u->email }}</div>
                        <div style="color:#666; font-size:13px; margin-top:4px;">Role: {{ $u->role ?? 'user' }}</div>
                    </div>
                    <div>
                        <a href="{{ route('admin.users.edit', $u->id) }}" class="checkout-btn" style="background:#2563eb; padding:10px 12px; display:inline-block;">Edit</a>
                    </div>
                </div>
            @empty
                <div style="color:#666;">Tidak ada user.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection

