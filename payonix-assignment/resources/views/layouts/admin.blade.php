<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - @yield('title')</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --bg-body: #f3f4f6;
            --bg-sidebar: #111827;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border: #e5e7eb;
        }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: system-ui, -apple-system, sans-serif; background: var(--bg-body); color: var(--text-main); display: flex; min-height: 100vh; }
        
        /* Sidebar */
        .sidebar { width: 260px; background: var(--bg-sidebar); color: white; display: flex; flex-direction: column; flex-shrink: 0; }
        .sidebar-brand { padding: 1.5rem; font-size: 1.25rem; font-weight: 700; border-bottom: 1px solid #374151; letter-spacing: 0.05em; }
        .sidebar-nav { padding: 1rem 0; flex: 1; }
        .sidebar-nav a { display: block; padding: 0.75rem 1.5rem; color: #9ca3af; text-decoration: none; transition: all 0.2s; border-left: 3px solid transparent; }
        .sidebar-nav a:hover { background: #374151; color: white; }
        .sidebar-nav a.active { background: #374151; color: white; border-left-color: var(--primary); }
        .sidebar-user { padding: 1rem 1.5rem; border-top: 1px solid #374151; background: #1f2937; }
        .sidebar-user small { display: block; color: #9ca3af; font-size: 0.75rem; margin-bottom: 0.25rem; }
        .sidebar-user strong { display: block; font-weight: 500; }

        /* Main Content */
        .main { flex: 1; display: flex; flex-direction: column; min-width: 0; }
        .topbar { background: white; padding: 1rem 2rem; display: flex; justify-content: flex-end; align-items: center; border-bottom: 1px solid var(--border); }
        .content { padding: 2rem; max-width: 1200px; width: 100%; margin: 0 auto; }

        /* Components */
        .btn { display: inline-flex; align-items: center; justify-content: center; padding: 0.5rem 1rem; border-radius: 0.375rem; text-decoration: none; font-size: 0.875rem; font-weight: 500; cursor: pointer; border: 1px solid transparent; transition: background-color 0.2s; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-hover); }
        .btn-danger { background: #ef4444; color: white; }
        .btn-danger:hover { background: #dc2626; }
        .btn-secondary { background: white; color: var(--text-main); border-color: var(--border); }
        .btn-secondary:hover { background: #f9fafb; }
        .btn-sm { padding: 0.25rem 0.75rem; font-size: 0.75rem; }

        .card { background: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 1.5rem; border: 1px solid var(--border); }
        .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
        .card-title { margin: 0; font-size: 1.25rem; font-weight: 600; }

        .table-container { overflow-x: auto; }
        .table { width: 100%; border-collapse: collapse; text-align: left; }
        .table th { padding: 0.75rem 1rem; background: #f9fafb; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; color: var(--text-muted); border-bottom: 1px solid var(--border); }
        .table td { padding: 0.75rem 1rem; border-bottom: 1px solid var(--border); vertical-align: middle; }
        .table tr:last-child td { border-bottom: none; }

        .badge { display: inline-flex; padding: 0.125rem 0.625rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 500; }
        .badge-success { background: #d1fae5; color: #065f46; }
        .badge-secondary { background: #f3f4f6; color: #374151; }

        .alert { padding: 1rem; margin-bottom: 1.5rem; border-radius: 0.375rem; border-left: 4px solid transparent; }
        .alert-success { background-color: #ecfdf5; color: #065f46; border-left-color: #10b981; }
        .alert-error { background-color: #fef2f2; color: #991b1b; border-left-color: #ef4444; }

        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 500; font-size: 0.875rem; }
        .form-control { width: 100%; padding: 0.5rem 0.75rem; border: 1px solid var(--border); border-radius: 0.375rem; font-size: 0.875rem; transition: border-color 0.2s; }
        .form-control:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1); }
        textarea.form-control { font-family: inherit; }
        
        .text-right { text-align: right; }
        .flex-end { display: flex; justify-content: flex-end; gap: 0.5rem; }
        .error { color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem; }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-brand">Payonix Admin</div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
            <a href="{{ route('admin.items.index') }}" class="{{ request()->routeIs('admin.items.*') ? 'active' : '' }}">
                Items
            </a>
        </nav>
        <div class="sidebar-user">
            <small>Signed in as</small>
            <strong>{{ Auth::user()->name }}</strong>
        </div>
    </aside>

    <main class="main">
        <header class="topbar">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Sign Out</button>
            </form>
        </header>

        <div class="content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</body>
</html>