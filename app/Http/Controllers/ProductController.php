<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if ($request->query('category') !== null) {
        //     return Product::where('category', $request->query('category'))->get()->load('images');
        // }
        return Product::all()->load('images');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $images = $request->images;
        $rating = 5;
        $newProduct = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'rating' => $rating,
            'price' => $request->price,
            'category' => $request->category,
            'countInStock' => $request->countInStock
        ]);
        foreach ($images as $image) {
            ProductImage::create([
                'imageUrl' => $image['imageUrl'],
                'isMain' => $image['isMain'],
                'productId' => $newProduct->_id
            ]);
        }
        return $newProduct;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Product::find($id)->load('images');
    }

    public function newProducts()
    {
        return Product::all()->sortByDesc('created_at')->take(8)->load('images');
    }

    public function ratingProducts()
    {
        return Product::all()->sortByDesc('rating')->take(8)->load('images');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        return Product::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Product::find($id)->delete();
    }
}
