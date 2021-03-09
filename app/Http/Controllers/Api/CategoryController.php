<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CategoryController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $categories = Category::filter()->simplePaginate();

        return CategoryResource::collection($categories);
    }

    /**
     * Display the specified category.
     *
     * @param \App\Models\Category $category
     * @return \App\Http\Resources\CategoryResource
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $categories = Category::filter()->simplePaginate();

        return SelectResource::collection($categories);
    }
}
