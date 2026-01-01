<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ItemController extends Controller
{
    use AuthorizesRequests;

    public function index(): View
    {
        $this->authorize('viewAny', Item::class);
        $items = Item::with('creator')->latest()->paginate(10);
        return view('admin.items.index', compact('items'));
    }

    public function create(): View
    {
        $this->authorize('create', Item::class);
        return view('admin.items.create');
    }

    public function store(StoreItemRequest $request): RedirectResponse
    {
        $request->user()->items()->create($request->validated());

        return redirect()->route('admin.items.index')
            ->with('success', 'Item created successfully.');
    }

    public function edit(Item $item): View
    {
        $this->authorize('update', $item);
        return view('admin.items.edit', compact('item'));
    }

    public function update(UpdateItemRequest $request, Item $item): RedirectResponse
    {
        $item->update($request->validated());

        return redirect()->route('admin.items.index')
            ->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $this->authorize('delete', $item);

        $item->delete();

        return redirect()->route('admin.items.index')
            ->with('success', 'Item deleted successfully.');
    }
}