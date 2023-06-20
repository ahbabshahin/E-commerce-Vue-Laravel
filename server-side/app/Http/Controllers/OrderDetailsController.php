<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDetailsRequest;
use App\Http\Resources\V1\OrderDetailsCollection;
use App\Http\Resources\V1\OrderDetailsResource;
use App\Http\Resources\V1\OrderResource;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new OrderDetailsCollection(OrderDetail::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderDetailsRequest $request)
    {
        $order = $request->validated();
        $details = OrderDetail::create($order);
        return new OrderDetailsResource($details);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = OrderDetail::query()->where('id', $id)->get();
        return response()->json($order);
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
        OrderDetail::query()->where('id', $id)->delete();
        return response()->json('Order Details Deleted Successfully');
    }
}
