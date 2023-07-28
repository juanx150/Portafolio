<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\project;
use Illuminate\Http\Request;
// use App\Http\Requests\api\v1\ProjectStoreRequest;
// use App\Http\Requests\api\v1\ProjectUpdateRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = project::orderBy('nombre', 'asc')->get();
 
        return response()->json(['data' => $projects], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = project::create($request->all());
 
 return response()->json(['data' => $project], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
        return response()->json(['data' => $project], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project $project)
    {
        $project->update($request->all());
        return response()->json(['data' => $project], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        $project->delete();
        return response(null, 204);

    }
}
