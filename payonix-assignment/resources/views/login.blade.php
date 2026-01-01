@extends('layouts.public')

@section('title', 'Login')

@section('content')
<div class="auth-card">
    <h2 style="margin-top: 0; margin-bottom: 1.5rem; text-align: center;">Admin Login</h2>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
            @error('email')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" class="form-control" required>
            @error('password')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Log in</button>
    </form>
</div>
@endsection