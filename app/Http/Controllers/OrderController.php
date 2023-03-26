<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;

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
        $itemsPrice = 0;
        for ($i = 0; $i < count($request->cart); $i++) {
            $itemsPrice += $request->cart[$i]['price'] * $request->cart[$i]['quantity'];
            $verified = Product::find($request->cart[$i]['productId'])->decrement('countInStock', $request->cart[$i]['quantity']);
            if (!$verified) {
                return response()->json(['message' => 'Product out of stock'], 400);
            }
        }
        $totalPrice = $itemsPrice + $shippingPrice;
        $order = Order::create([
            'userId' => $request->userId,
            'status' => $status,
            'shippingAddress' => $request->shippingAddress,
            'paymentMethod' => $paymentMethod,
            'itemsPrice' => $itemsPrice,
            'shippingPrice' => $shippingPrice,
            'totalPrice' => $totalPrice,
            'isDelivered' => false,
        ]);
        for ($i = 0; $i < count($request->cart); $i++) {
            OrderItem::create([
                'title' => $request->cart[$i]['title'],
                'image' => $request->cart[$i]['image'],
                'price' => $request->cart[$i]['price'],
                'orderId' => $order->_id,
                'productId' => $request->cart[$i]['productId'],
                'quantity' => $request->cart[$i]['quantity'],
            ]);
        }
        return $order;
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
