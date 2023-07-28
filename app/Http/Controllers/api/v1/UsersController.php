<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\api\v1\UsersStoreRequest;
use App\Http\Requests\api\v1\UsersUpdateRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('name', 'asc')->get();
 
        return response()->json(['data' => $user], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersStoreRequest $request)
    {
        $user = User::create($request->all());
 
        return response()->json(['data' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json(['data' => $user], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersUpdateRequest $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(null, 204);
    }
}
