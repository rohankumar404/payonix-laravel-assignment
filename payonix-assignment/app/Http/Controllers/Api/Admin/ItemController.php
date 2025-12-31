<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ItemController extends Controller
{
    public function index(): JsonResponse
    {
        Gate::authorize('viewAny', Item::class);
        $items = Item::with('creator')->latest()->paginate(10);
        return response()->json($items);
    }

    public function store(StoreItemRequest $request): JsonResponse
    {
        $item = $request->user()->items()->create($request->validated());

        return response()->json([
            'message' => 'Item created successfully.',
            'data' => $item,
        ], 201);
    }

    public function show(Item $item): JsonResponse
    {
        Gate::authorize('view', $item);
        return response()->json($item->load('creator'));
    }

    public function update(UpdateItemRequest $request, Item $item): JsonResponse
    {
        $item->update($request->validated());

        return response()->json([
            'message' => 'Item updated successfully.',
            'data' => $item,
        ]);
    }

    public function destroy(Item $item): JsonResponse
    {
        Gate::authorize('delete', $item);
        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully.',
        ]);
    }
}
