@extends('layouts.admin')

@section('title', 'Manage Items')
@section('header', 'Items')

@section('content')
    <div class="card">
        <div class="flex-end" style="margin-bottom: 1rem;">
            <a href="{{ route('admin.items.create') }}" class="btn btn-primary">Create New Item</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created By</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <span style="padding: 0.25rem 0.5rem; border-radius: 9999px; font-size: 0.75rem; background: {{ $item->status === 'active' ? '#d1fae5; color: #065f46' : '#f3f4f6; color: #374151' }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>{{ $item->creator->name ?? 'Unknown' }}</td>
                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.items.edit', $item) }}" class="btn btn-secondary" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;">Edit</a>
                            <form action="{{ route('admin.items.destroy', $item) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 0.25rem 0.5rem; font-size: 0.75rem;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 1rem;">
            {{ $items->links() }}
        </div>
    </div>
@endsection