@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <div class="hero">
        <h1>Admin Management System</h1>
        <p>A secure, robust, and scalable administration panel built with Laravel 12. Manage users, items, and permissions with ease.</p>
        
        <div style="margin-top: 2rem;">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Go to Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login to Admin Panel</a>
            @endauth
        </div>
    </div>

    <div class="features">
        <div class="feature-card">
            <h3>Role-Based Access</h3>
            <p>Secure authentication system with role-based access control (RBAC) to ensure only authorized users can perform administrative tasks.</p>
        </div>
        <div class="feature-card">
            <h3>Item Management</h3>
            <p>Full CRUD functionality for managing items. Create, read, update, and delete resources with a clean and intuitive interface.</p>
        </div>
        <div class="feature-card">
            <h3>RESTful API</h3>
            <p>Includes a fully functional REST API protected by Laravel Sanctum, allowing external applications to interact securely with your data.</p>
        </div>
    </div>
@endsection