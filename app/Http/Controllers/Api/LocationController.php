<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LocationCreateRequest;
use App\Http\Requests\LocationUpdateRequest;
use App\Http\Resources\LocationResource;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return LocationResource::collection(Location::all());
    }
    /**
     * @param LocationCreateRequest $request
     * @return LocationResource
     */
    public function store(LocationCreateRequest $request)
    {
        $create = Location::create($request->validated());
        return new LocationResource($create);
    }
    /**
     * @param LocationUpdateRequest $request
     * @param Location $Location
     * @return LocationResource
     */
    public function update(LocationUpdateRequest $request, Location $Location)
    {
        $Location->update($request->validated());
        return new LocationResource($Location->refresh());
    }
    /**
     * @param Location $Location
     * @return LocationResource
     */
    public function show(Location $Location)
    {
        return new LocationResource($Location);
    }

    /**
     * @param Location $Location
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Location $Location)
    {
        $Location->delete();
        return response([], 204);
    }
}
