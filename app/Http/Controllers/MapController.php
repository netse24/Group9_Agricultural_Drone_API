<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Http\Resources\MapImageResource;
use App\Http\Resources\MapResource;
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
        return response()->json(['status' => true, 'message' => 'Get images successfully!', 'data' => $maps], 200);
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
            'farm_id' => $request->farm_id,
            'province_id' => $request->province_id,
        ]);
        return response()->json(['status' => true, 'message' => 'Created map successfully!', 'data' => $map], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $map = Map::find($id);
        if ($map) {
            $map = new MapResource($map);
            return response()->json(['status' => true, 'message' => 'Get specific map successfully!', 'data' => $map], 200);
        }
        return response()->json(['status' => false, 'message' => 'Not found map!'], 404);
    }

    /**
     * 
     */
    public function download($province, $id)
    {
        $province = Province::where('name', 'like', $province)->first();
        $images =  (new ShowProvinceResource($province))->maps;
        foreach ($images as $image) {
            if ($image->id === intval($id) && $image->image !== null) {
                $new_image = new MapResource($image);
                return response()->json(['status' => true, 'message' => 'Downloaded image successfully!', 'data' => $new_image], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Not found field!'], 401);
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
    public function addDroneImage($province,  $img_id, Request $request)
    {
        $province = Province::where('name', 'like', $province)->first();
        $images =  (new ShowProvinceResource($province))->maps;
        foreach ($images as $image) {
            if ($image->id === intval($img_id) && $image->image === null) {
                $image->image = $request->image;
                $image->save();
                return response()->json(['status' => true, 'message' => 'Image has created successfully!', 'data' => $image], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Field not found  or cannot add new image!'], 401);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyImage($province, $id)
    {
        $province = Province::where('name', 'like', $province)->first();
        $images =  (new ShowProvinceResource($province))->maps;
        foreach ($images as $image) {
            if ($image->id === intval($id) &&  $image->image !== null) {
                $image->image = null;
                $image->save();
                return response()->json(['status' => true, 'message' => 'Image has removed successfully!', 'data' => $image], 200);
            } else {
                return response()->json(['status' => false, 'message' => 'Not found or Nothig to delete'], 401);
            }
        }
    }
}
