<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDroneRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\InstructionDroneResource;
use App\Http\Resources\ShowDroneLocationResource;
use App\Http\Resources\ShowDroneResource;
use App\Models\Drone;


class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        return response()->json(['status' => true,'message'=>'Get drones succesfully! ', 'data' => $drones], 200);
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
            'user_id' => $request->user_id,
            'location_id' => $request->location_id
        ]);
        return response()->json(['status' => true, 'message' => 'Created drone successfully', 'data' => $drone], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($drone_name)
    {
        $find = Drone::where('drone_name', 'like', $drone_name)->first();
        $drone = new ShowDroneResource($find);
        return response()->json(['status' => true, 'data' => $drone], 200);
    }
    /**
     * Display instructions by drone id 
     */
    public function showInstructions(string $id){
        $drone = Drone::find($id);
        if ($drone){
            $drone = new InstructionDroneResource($drone);
            return response()->json(['status' => true,'message'=>'Get instructions by drone id', 'data' =>$drone], 200);
        }
        return response()->json(['status' => false, 'message' =>'Not found!'], 404);
    }
    /**
     * Display location of drone
     */
    public function showDroneLocation($drone_name)
    {
        $find = Drone::where('drone_name', 'like', $drone_name)->first();
        $drone = new ShowDroneLocationResource($find);
        return response()->json(['message' => 'Get location of drone successfully!', 'data' => $drone], 200);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drone $drone)
    {
        //
    }
    /**
     * Show the form for updating the specified resource
     */
    public function update(StoreDroneRequest $request, $drone_name)
    {
        $drone = Drone::where('drone_name', 'like', $drone_name)->first();
        if ($drone) {
            $drone->update([
                'drone_name' => $request->drone_name,
                'battery' => $request->battery,
                'payload' => $request->payload,
                'farmer_id' => $request->farmer_id,
                'location_id' => $request->location_id
            ]);
            return response()->json(['status' => true, 'message' => "Updated drone successfully!", 'data' => $drone], 200);
        }
        return response()->json(['status' => false, 'message' => 'Not found!'], 404);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drone = Drone::find($id);
        if($drone){
            $drone->delete($drone);
            return response()->json(['status' => true, 'message' =>'Deleted drone successfully!'], 200);
        }
        return response()->json(['status' => false, 'message' =>'Not found!'], 404);
    }
}
