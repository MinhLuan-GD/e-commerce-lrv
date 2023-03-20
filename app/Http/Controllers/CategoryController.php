<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function getThreeCategories()
    {
        return Category::all()->take(3);
    }

    public function store(StoreCategoryRequest $request)
    {
        return Category::create($request->all());
    }

    public function show($id)
    {
        return Category::find($id);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        return Category::find($id)->update($request->all());
    }

    public function destroy($id)
    {
        return Category::find($id)->delete();
    }
}
