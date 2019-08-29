<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\purchaseResource;
use App\purchaseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class purchaseController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return purchaseResource::collection(purchaseRequest::all());
    }

    /**
     * @param RequestCreateRequest $request
     * @return purchaseResource
     */
    public function store(RequestCreateRequest $request)
    {
        $create = purchaseRequest::create($request->validated());
        return new purchaseResource($create);
    }

    /**
     * @param RequestUpdateRequest $request
     * @param purchaseRequest $user
     * @return purchaseResource
     */
    public function update(RequestUpdateRequest $request, purchaseRequest $user)
    {
        $user->update($request->validated());
        return new purchaseResource($user->refresh());
    }

    /**
     * @param purchaseRequest $user
     * @return purchaseResource
     */
    public function show(purchaseRequest $user)
    {
        return new purchaseResource($user);
    }

    /**
     * @param purchaseRequest $user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(purchaseRequest $user)
    {
        $user->delete();
        return response([], 204);
    }
}
