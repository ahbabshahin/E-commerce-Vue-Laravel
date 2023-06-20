<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\V1\ProductResource;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\V1\ProductCollection;

class ProductController extends Controller
{

    public function index()
    {
        // $perPage = request('per_page', 10);
        // $search = request('search', '');
        // $sortField = request('sort_field', 'created_at');
        // $sortDirection = request('sort_direction', 'desc');

        // $query = Product::query()->where('title', 'like', "%{$search}%")->orderBy($sortField, $sortDirection)->paginate($perPage);

        return new ProductCollection(Product::all());
    }

    public function store(StoreProductRequest $request, $id)
    {
        // $data = $request->validated();
        // $data['created_by'] = User::query()->where('id', 1);
        // $data['updated_by'] = User::find(1)->first();
        // $id = DB::table('users')->select('id')->get();
        // $num = $id;
        // echo ($num);
        $product = DB::table('products')->insert([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'created_by' => $id,
            'updated_by' => $id,
        ]);
        // Product::create();
        // return new ProductResource($product);
        return response()->json('Created');
    }

    public function show($id)
    {
        $product = Product::query()->where('id', $id)->get(['id', 'title', 'description', 'price', 'created_by', 'updated_by']);
        return response()->json($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return response()->json('Product Updated');
    }

    public function destroy($id)
    {
        Product::query()->where('id', $id)->delete();

        return response()->json('Product deleted');
    }
}
