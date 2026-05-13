@extends('layouts.app')

@section('content')
    <div class="login-page">
        <div class="login-box">
            <div class="status-bar">
                <div class="time">9:41</div>
            </div>

            <div class="logo">DAW FRESH</div>
            <div class="title">Register</div>

            <form method="POST" action="/register">
                @csrf

                @if($errors->any())
                    <div class="error-message">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="input-group">
                    <input
                        type="text"
                        name="name"
                        placeholder="Nama Lengkap"
                        class="input"
                        value="{{ old('name') }}"
                        required
                    >
                </div>

                <div class="input-group">
                    <input
                        type="email"
                        name="email"
                        placeholder="Email address"
                        class="input"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div class="input-group">
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="input"
                        required
                    >
                </div>

                <div class="input-group">
                    <input
                        type="password"
                        name="password_confirmation"
                        placeholder="Konfirmasi Password"
                        class="input"
                        required
                    >
                </div>

                <button class="btn" type="submit">Daftar</button>

                <p class="signup">Sudah punya akun? <a href="/login">Login di sini</a></p>
            </form>
        </div>
    </div>
@endsection
