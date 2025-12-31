@extends('layouts.admin')

@section('title', 'Edit Item')
@section('header', 'Edit Item: ' . $item->name)

@section('content')
    <div class="card">
        <form action="{{ route('admin.items.update', $item) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $item->name) }}" required>
                @error('name') <span style="color: red; font-size: 0.875rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description', $item->description) }}</textarea>
                @error('description') <span style="color: red; font-size: 0.875rem;">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="active" {{ old('status', $item->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $item->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status') <span style="color: red; font-size: 0.875rem;">{{ $message }}</span> @enderror
            </div>

            <div class="flex-end">
                <a href="{{ route('admin.items.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Item</button>
            </div>
        </form>
    </div>
@endsection