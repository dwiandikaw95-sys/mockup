@extends('layouts.app')

@section('content')
    <div class="login-page">
        <div class="login-box">
            <div class="status-bar">
                <div class="time">9:41</div>
            </div>

            <div class="logo">DAW FRESH</div>
            <div class="title">Login</div>

            <form method="POST" action="/login">
                @csrf

                @if(session('error'))
                    <p class="error-message">{{ session('error') }}</p>
                @endif

                <div class="input-group">
                    <input
                        type="email"
                        name="email"
                        placeholder="Email address"
                        class="input"
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
                    <span class="input-icon">👁</span>
                </div>

                <p class="forgot">forget password?</p>

                <button class="btn" type="submit">Login in</button>

                <p class="signup">Belum punya akun? <a href="/register" style="color: #FF8C42; text-decoration: none;">Sign up</a></p>

                <div class="social">
                    <div class="circle">G</div>
                    <div class="circle">f</div>
                </div>
            </form>
        </div>
    </div>
@endsection