<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Http\Resources\MapImageResource;
use App\Http\Resources\MapResource;
// use App\Http\Resources\ProvinceResource;
// use App\Http\Resources\ShowMapResource;
use App\Http\Resources\ShowProvinceResource;
use App\Models\Map;
use App\Models\Province;
use Illuminate\Http\Request;


class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maps = Map::all();
        $maps = MapImageResource::collection($maps);
        return response()->json(['status' => true, 'data' => $maps], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MapRequest $request)
    {
        $map = Map::create([
            'image' => $request->image,
            'drone_id' => $request->drone_id,
            'farm_id' => $request->farm_id
        ]);
        return response()->json(['status' => true, 'message' => 'Created successfully', 'data' => $map], 200);
    }

    /**
     * Display the specified resource.
     */
    public function download($province, $id)
    {
        $province = Province::where('name', 'like', $province)->first();
        $images =  (new ShowProvinceResource($province))->maps;
        foreach ($images as $image) {
            if ($image->id === intval($id)) {
                $new_image = new MapResource($image);
                return response()->json(['status' => true, 'message' => 'Downloaded successfully', 'data' => $new_image], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Not found'], 401);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Map $map)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($province, $id)
    {
        $province = Province::where('name', 'like', $province)->first();
        $images =  (new ShowProvinceResource($province))->maps;
        foreach ($images as $image) {
            if ($image->id === intval($id)) {
                $image->image = null;
                $image->save();
                return response()->json(['status' => true, 'message' => 'image has removed successfully', $image], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Not found'], 401);
            }
        }
    }
}
