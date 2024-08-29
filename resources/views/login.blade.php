@extends('layouts.layout')

@section('content')
<section id="login-section" class="sp-card-container">
    <div class="sp-card">
        <h1>Login</h1>
        <hr class="sp-card-line">
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
            </div>
            <p>Don't have an account? <a href="{{ route('auth.register') }}">Register</a>.</p>
            <button type="submit" class="btn btn-outline-dark">Login</button>
        </form>
    </div>
</section>
@endsection