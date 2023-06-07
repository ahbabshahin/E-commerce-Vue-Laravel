<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\V1\ProductResource;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\V1\ProductCollection;

class ProductController extends Controller
{

    public function index()
    {
        return new ProductCollection(Product::all());
    }

    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return response()->json('Product created');
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json('Product Updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json('Skill deleted');
    }
}
