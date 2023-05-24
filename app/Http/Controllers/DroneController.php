<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDroneRequest;
use App\Models\Drone;
use Illuminate\Http\Request;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Drone::all();
        return response()->json(['status' => true, 'data' => $drones], 200);
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
    public function store(StoreDroneRequest $request)
    {
        $drone = Drone::create([
            'drone_name' => $request->drone_name,
            'battery' => $request->battery,
            'payload' => $request->payload,
            'farmer_id' => $request->farmer_id,
            'location_id' => $request->location_id
        ]);
        return response()->json(['status' => true, 'message' => 'Created successfully', 'data'=>$drone], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($drone_name)
    {
        $drone = Drone::where('drone_name', 'like', $drone_name)->first();
        return response()->json(['status' => true, 'message' => $drone], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drone $drone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $drone = Drone::find($id);
        if($drone){
            $drone->update([
                'drone_name' => $request->drone_name,
                'battery' => $request->battery,
                'payload' => $request->payload,
                'farmer_id' => $request->farmer_id,
                'location_id' => $request->location_id
            ]);
            return response()->json(['status'=>true,'message'=>"Updated successfully", 'data'=>$drone],200);
        }
        return response()->json(['status'=>false,'message'=>'Not found!'],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drone $drone)
    {
        //
    }
}
