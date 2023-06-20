<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartItemRequest;
use App\Http\Resources\V1\CartItemCollection;
use App\Http\Resources\V1\CartItemResource;
use App\Http\Resources\V1\ProductCollection;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = new CartItemCollection(CartItem::all());
        return response()->json($item);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CartItemRequest $request, $id)
    {
        // $product = Product::query()->where('id', $id)->exists();
        $item = CartItem::create([
            'product_id' => $id,
            'quantity' => $request->quantity
        ]);

        return new CartItemResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = CartItem::query()->where('id', $id)->get(['id', 'product_id', 'quantity']);
        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        CartItem::query()->where('id', $id)->delete();
        return response()->json('CartItem Deleted');
    }
}
