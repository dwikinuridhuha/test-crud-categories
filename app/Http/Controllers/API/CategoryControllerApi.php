<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cateogies = Category::all();
        return PostResource::collection($cateogies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cateogies = Category::create($request->all());

        return new PostResource($cateogies);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $cateogies
     * @return \Illuminate\Http\Response
     */
    public function show(Category $cateogies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $cateogies
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $cateogies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $cateogies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $cateogies)
    {
        $cateogies->update($request->all());

        return new PostResource($cateogies);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $cateogies)
    {
        $cateogies->delete();

        return response(null, 204);
    }
}
