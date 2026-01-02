<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payonix - @yield('title', 'Welcome')</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --bg-body: #f9fafb;
            --border: #e5e7eb;
        }
        body { margin: 0; font-family: system-ui, -apple-system, sans-serif; background: var(--bg-body); color: var(--text-main); line-height: 1.5; display: flex; flex-direction: column; min-height: 100vh; }
        
        /* Header */
        .header { background: white; border-bottom: 1px solid var(--border); padding: 1rem 0; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }
        .nav-wrapper { display: flex; justify-content: space-between; align-items: center; }
        .brand { font-size: 1.5rem; font-weight: 700; color: var(--primary); text-decoration: none; }
        .nav-links { display: flex; gap: 1.5rem; align-items: center; }
        .nav-link { color: var(--text-main); text-decoration: none; font-weight: 500; transition: color 0.2s; }
        .nav-link:hover { color: var(--primary); }
        .btn { display: inline-block; padding: 0.5rem 1.25rem; border-radius: 0.375rem; text-decoration: none; font-weight: 500; transition: background 0.2s; cursor: pointer; border: none; font-size: 1rem; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-hover); }
        
        /* Main Content */
        .main { flex: 1; padding: 3rem 0; }
        
        /* Footer */
        .footer { background: white; border-top: 1px solid var(--border); padding: 2rem 0; text-align: center; color: var(--text-muted); font-size: 0.875rem; }
        
        /* Utilities */
        .hero { text-align: center; padding: 4rem 0; }
        .hero h1 { font-size: 3rem; margin-bottom: 1rem; color: #111827; }
        .hero p { font-size: 1.25rem; color: var(--text-muted); max-width: 600px; margin: 0 auto 2rem; }
        
        .features { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem; margin-top: 4rem; }
        .feature-card { background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 1px solid var(--border); }
        .feature-card h3 { margin-top: 0; color: #111827; }
        
        .auth-card { max-width: 400px; margin: 0 auto; background: white; padding: 2rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border: 1px solid var(--border); }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 500; }
        .form-control { width: 100%; padding: 0.5rem; border: 1px solid #d1d5db; border-radius: 0.375rem; box-sizing: border-box; }
        .error-msg { color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem; }
    </style>
</head>
<body>
    <header class="header">
        <div class="container nav-wrapper">
            <a href="{{ url('/') }}" class="brand">Payonix</a>
            <nav class="nav-links">
                <a href="{{ url('/') }}" class="nav-link">Home</a>
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="nav-link" style="background: none; border: none; padding: 0;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="main">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Payonix Assignment. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>