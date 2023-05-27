<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        $locations = LocationResource::collection($locations);
        return response()->json(['status'=>true,'message'=>'Get locations successfully!', 'data'=>$locations],200);
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
    public function store(LocationRequest $request)
    {
        // 
        $location = Location::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return response()->json(['status'=>true, 'message'=>'Created location successfully!','data'=>$location],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $location = Location::find($id);
        if($location){
            $location = new LocationResource($location);
            return response()->json(['status'=>true,'message'=>'Get specific location successfully!', 'data'=>$location],200);
        }
        return response()->json(['status'=>false, 'message'=>'Not found location!'],404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LocationRequest $request, string $id)
    {
        $location = Location::find($id);
        if($location){
            $location->update([
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude
            ]);
            return response()->json(['status'=>true, 'message'=>'Updated location successfully!', 'data'=>$location],200);
        }
        return response()->json(['status'=>false, 'message'=>'Not found!'],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = Location::find($id);
        if($location){
            $location->delete($location);
            return response()->json(['status'=>true, 'message'=>'Deleted location successfully!'],200);
        }
        return response()->json(['status'=>false, 'message'=>'Not found!'],404);
    }
}
