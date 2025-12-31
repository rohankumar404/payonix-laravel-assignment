<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <style>
        body { font-family: system-ui, sans-serif; padding: 2rem; background: #f3f4f6; color: #1f2937; }
        .container { max-width: 1000px; margin: 0 auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .nav-links a { margin-right: 1rem; text-decoration: none; color: #4b5563; font-weight: 500; }
        .nav-links a:hover, .nav-links a.active { color: #2563eb; }
        .card { background: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 1.5rem; }
        .btn { display: inline-block; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem; cursor: pointer; border: none; }
        .btn-primary { background: #2563eb; color: white; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }
        .btn-secondary { background: #9ca3af; color: white; }
        .btn-secondary:hover { background: #6b7280; }
        .table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        .table th, .table td { text-align: left; padding: 0.75rem; border-bottom: 1px solid #e5e7eb; }
        .table th { background-color: #f9fafb; font-weight: 600; color: #374151; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 500; }
        .form-control { width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box; }
        .alert { padding: 1rem; border-radius: 0.375rem; margin-bottom: 1rem; }
        .alert-success { background-color: #d1fae5; color: #065f46; }
        .flex-end { display: flex; justify-content: flex-end; gap: 0.5rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>@yield('header', 'Admin Panel')</h1>
            <div class="nav-links">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('admin.items.index') }}" class="{{ request()->routeIs('admin.items.*') ? 'active' : '' }}">Items</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>