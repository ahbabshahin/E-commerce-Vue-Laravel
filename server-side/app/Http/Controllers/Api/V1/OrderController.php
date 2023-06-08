<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\V1\OrderCollection;
use App\Http\Resources\V1\OrderResource;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return new OrderCollection(Order::all());
    }

    public function store(StoreOrderRequest $request)
    {
        Order::create($request->validated());
        return response()->json('Order created');
    }

    public function show(Order $order)
    {
        return new OrderResource($order);
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return response()->json('Order Updated');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json('Order Deleted');
    }
}
