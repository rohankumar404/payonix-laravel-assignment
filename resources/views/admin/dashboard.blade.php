@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div style="margin-bottom: 2rem;">
        <h1>Dashboard</h1>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
        <div class="card">
            <h3>Total Users</h3>
            <div style="font-size: 2.25rem; font-weight: bold; color: #111827;">{{ $totalUsers }}</div>
        </div>
        <div class="card">
            <h3>Total Items</h3>
            <div style="font-size: 2.25rem; font-weight: bold; color: #111827;">{{ $totalItems }}</div>
        </div>
    </div>
@endsection