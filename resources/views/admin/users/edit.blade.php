@extends('layouts.app')

@section('content')
<div class="home-page">
    <div class="home-header">
        <div>
            <p class="label">Admin</p>
            <p class="location">Edit User</p>
        </div>
        <div class="header-actions">
            <a href="/admin/users" class="icon-circle" title="Kembali">←</a>
        </div>
    </div>

    <div class="section-card">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="display:flex; flex-direction:column; gap:12px;">
                <div>
                    <label>Nama</label>
                    <input class="input" type="text" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div>
                    <label>Email</label>
                    <input class="input" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div>
                    <label>Role</label>
                    <select class="input" name="role" required>
                        <option value="user" @selected(old('role', $user->role ?? 'user') === 'user')>user</option>
                        <option value="admin" @selected(old('role', $user->role ?? 'user') === 'admin')>admin</option>
                    </select>
                </div>

                <div>
                    <label>Password Baru (opsional)</label>
                    <input class="input" type="password" name="password" placeholder="••••••••" >
                </div>

                <div>
                    <label>Konfirmasi Password</label>
                    <input class="input" type="password" name="password_confirmation" placeholder="••••••••" >
                </div>

                <button type="submit" class="checkout-btn">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

