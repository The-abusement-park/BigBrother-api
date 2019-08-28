<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RequestCreateRequest;
use App\Http\Requests\RequestUpdateRequest;
use App\Http\Resources\RequestResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Request as ModelRequest;

class RequestController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RequestResource::collection(ModelRequest::all());
    }
    /**
     * @param RequestCreateRequest $request
     * @return RequestResource
     */
    public function store(RequestCreateRequest $request)
    {
        $create = ModelRequest::create($request->validated());
        return new RequestResource($create);
    }
    /**
     * @param RequestUpdateRequest $request
     * @param ModelRequest $user
     * @return RequestResource
     */
    public function update(RequestUpdateRequest $request, ModelRequest $user)
    {
        $user->update($request->validated());
        return new RequestResource($user->refresh());
    }

    /**
     * @param ModelRequest $user
     * @return RequestResource
     */
    public function show(ModelRequest $user)
    {
        return new RequestResource($user);
    }

    /**
     * @param ModelRequest $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ModelRequest $user)
    {
        $user->delete();
        return response([], 204);
    }
}
