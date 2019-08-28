<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Http\Resources\ProjectResource;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectResource::collection(Project::all());
    }
    /**
     * @param ProjectCreateRequest $request
     * @return ProjectResource
     */
    public function store(ProjectCreateRequest $request)
    {
        $create = Project::create($request->validated());
        return new ProjectResource($create);
    }
    /**
     * @param Request $request
     * @param Project $Project
     * @return ProjectResource
     */
    public function update(ProjectUpdateRequest $request, Project $Project)
    {
        $Project->update($request->validated());
        return new ProjectResource($Project->refresh());
    }
    /**
     * @param Project $Project
     * @return ProjectResource
     */
    public function show(Project $Project)
    {
        return new ProjectResource($Project);
    }

    /**
     * @param Project $Project
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Project $Project)
    {
        $Project->delete();
        return response([], 204);
    }
}
