<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\JsonResponse;

class ItemController extends Controller
{
    public function index(): JsonResponse
    {
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
        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully.',
        ]);
    }
}