<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: system-ui, sans-serif; padding: 2rem; background: #f3f4f6; }
        .container { max-width: 800px; margin: 0 auto; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; }
        .card { background: white; padding: 1.5rem; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .card h3 { margin: 0 0 0.5rem 0; color: #4b5563; font-size: 0.875rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .count { font-size: 2.25rem; font-weight: bold; color: #111827; }
        .btn-logout { background: #ef4444; color: white; border: none; padding: 0.5rem 1rem; border-radius: 0.375rem; cursor: pointer; }
        .btn-logout:hover { background: #dc2626; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Dashboard</h1>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>

        <div class="stats-grid">
            <div class="card">
                <h3>Total Users</h3>
                <div class="count">{{ $totalUsers }}</div>
            </div>
            <div class="card">
                <h3>Total Items</h3>
                <div class="count">{{ $totalItems }}</div>
            </div>
        </div>
    </div>
</body>
</html>