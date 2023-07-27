<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = category::orderBy('nombre', 'asc')->get();
 
        return response()->json(['data' => $category], 200);
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = category::create($request->all());
        return response()->json(['data' => $category], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return response()->json(['data' => $category], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $category->update($request->all());
        return response()->json(['data' => $category], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return response(null, 204);
    }
}
