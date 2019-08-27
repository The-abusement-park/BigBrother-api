<?php

namespace App\Http\Controllers\Api;

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
     * @param Request $request
     * @param Location $Location
     * @return LocationResource
     */
    public function update(Request $request, Location $Location)
    {
        $Location->update($request);
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
