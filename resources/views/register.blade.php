@extends('layouts.layout')

@section('content')
<section id="register-section" class="sp-card-container">
    <div class="sp-card">
        <h1 class="card-label">Register</h1>
        <hr class="sp-card-line">
        <form action="{{ route('auth.register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error("name")
                    <p class="sp-error text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error("email")
                    <p class="sp-error text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label @error('password') is-invalid @enderror">Password</label>
                <input type="password" name="password" class="form-control">
                @error("password")
                    <p class="sp-error text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label @error('password') is-invalid @enderror">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <p class="sp-error text-danger mt-2">{{ $message }}</p>
                @enderror
            </div>
            <p>Already have an account? <a href="{{ route('auth.login') }}">Log in</a>.</p>
            <button type="submit" class="btn btn-outline-dark">Register</button>
        </form>
    </div>
</section>
@endsection