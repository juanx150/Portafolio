<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\comments;
use Illuminate\Http\Request;
use App\Http\Requests\api\v1\CommentsStoreRequest;
use App\Http\Requests\api\v1\CommentsUpdateRequest; 

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $commentss = comments::orderBy('mensaje', 'asc')->get();
        return response()->json(['data' => $commentss], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentsStoreRequest $request)
    {
        $comments = comments::create($request->all());
        return response()->json(['data' => $comments], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(comments $comments)
    {  
        return response()->json(['data' => $comments], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentsUpdateRequest $request, comments $comments)
    {
        $comments->update($request->all());
        return response()->json(['data' => $comments], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comments $comments)
    {
        $comments->delete();
        return response(null, 204);
    }
}
