@extends('layouts.admin')

@section('title', 'Items')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Items Management</h2>
            <a href="{{ route('admin.items.create') }}" class="btn btn-primary">Create New Item</a>
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <span class="badge {{ $item->status === 'active' ? 'badge-success' : 'badge-secondary' }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td>{{ $item->creator->name ?? 'Unknown' }}</td>
                            <td>{{ $item->created_at->format('M d, Y') }}</td>
                            <td class="text-right">
                                <div class="flex-end">
                                    <a href="{{ route('admin.items.edit', $item) }}" class="btn btn-secondary btn-sm">Edit</a>
                                    <form action="{{ route('admin.items.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure?');" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: #6b7280; padding: 2rem;">No items found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 1.5rem;">
            {{ $items->links() }}
        </div>
    </div>
@endsection