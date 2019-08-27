<?php

namespace App\Http\Controllers\Api;

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
     * @param Request $request
     * @param ModelRequest $user
     * @return Request
     */
    public function update(Request $request, ModelRequest $user)
    {
        $user->update($request);
        return new Request($user->refresh());
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
