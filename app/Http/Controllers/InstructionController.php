<?php

namespace App\Http\Controllers;

use App\Http\Resources\DroneResource;
use App\Http\Resources\InstructionResource;
use App\Http\Resources\ShowDroneIntructionResource;
use App\Http\Resources\ShowOnlyIntructionResource;
use App\Models\Drone;
use App\Models\Instruction;
use Illuminate\Http\Request;

class InstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Instruction $instruction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instruction $instruction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, Instruction $instruction)
    {
        // $instruction  =  
    }
    public function updateInstruction($drone, $id, Request $request)
    {
        $drone  =  Drone::where('drone_name', 'like', $drone)->first();
        $instructions  =    (new ShowDroneIntructionResource($drone))->instructions;
        foreach ($instructions as $instruction) {
            if ($instruction->id === intVal($id)) {
                $instruction = (new ShowOnlyIntructionResource($instruction));
                $instruction['instruction'] = $request->instruction;
                $instruction->save();
                return $instruction;
            }
        }
        return $instructions;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instruction $instruction)
    {
        //
    }
}
