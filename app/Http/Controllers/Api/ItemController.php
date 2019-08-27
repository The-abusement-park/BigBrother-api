<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ItemResource;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ItemResource::collection(Item::all());
    }

    /**
     * @param Request $request
     * @param Item $Item
     * @return ItemResource
     */
    public function update(Request $request, Item $Item)
    {
        $Item->update($request);
        return new ItemResource($Item->refresh());
    }
    /**
     * @param Item $Item
     * @return ItemResource
     */
    public function show(Item $Item)
    {
        return new ItemResource($Item);
    }

    /**
     * @param Item $Item
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Item $Item)
    {
        $Item->delete();
        return response([], 204);
    }
}
