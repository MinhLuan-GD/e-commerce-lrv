<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($order)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $shippingPrice = 0;
        $status = 'created';
        $paymentMethod = 'stripe';
        $itemsPrice = $request->cart->sum(fn ($item) => $item->price * $item->quantity);
        $totalPrice = $itemsPrice + $shippingPrice;
        for ($i = 0; $i < count($request->cart); $i++) {
            $verified = Product::find($request->cart[$i]['productId'])->decrement('quantity', $request->cart[$i]['quantity']);
            if (!$verified) {
                return response()->json(['message' => 'Product out of stock'], 400);
            }
        }
        return Order::create([
            'userId' => $request->userId,
            'status' => $status,
            'shippingAddress' => $request->shippingAddress,
            'paymentMethod' => $paymentMethod,
            'itemsPrice' => $itemsPrice,
            'shippingPrice' => $shippingPrice,
            'totalPrice' => $totalPrice,
            'isDelivered' => false,
            'cart' => $request->cart,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Order::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        return Order::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Order::find($id)->delete();
    }
}
