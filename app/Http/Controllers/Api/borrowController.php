<?php

namespace App\Http\Controllers\api;

use App\borrowRequest;
use App\Http\Resources\borrowResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class borrowController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return borrowResource::collection(borrowRequest::all());
    }

    /**
     * @param RequestCreateRequest $request
     * @return borrowResource
     */
    public function store(RequestCreateRequest $request)
    {
        $create = borrowRequest::create($request->validated());
        return new borrowResource($create);
    }

    /**
     * @param RequestUpdateRequest $request
     * @param borrowRequest $user
     * @return borrowResource
     */
    public function update(RequestUpdateRequest $request, borrowRequest $user)
    {
        $user->update($request->validated());
        return new borrowResource($user->refresh());
    }

    /**
     * @param borrowRequest $user
     * @return borrowResource
     */
    public function show(borrowRequest $user)
    {
        return new borrowResource($user);
    }

    /**
     * @param borrowRequest $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(borrowRequest $user)
    {
        $user->delete();
        return response([], 204);
    }
}
