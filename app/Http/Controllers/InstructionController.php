<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstructionRequest;
use App\Http\Resources\ShowInstructionResource;
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
        $instructions = Instruction::all();
        $instructions = ShowInstructionResource::collection($instructions);
        return response()->json(['status' => true,'message'=>'Get instructions successfully!', 'data' => $instructions], 200);
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
    public function store(InstructionRequest $request)
    {
        $instruction = Instruction::create([
            'instruction'=>$request->instruction,
            'drone_id'=>$request->drone_id,
            'plan_id'=>$request->plan_id
        ]);
        return response()->json(['status' => true,'message'=>'Created instruction successfully!', 'data'=>$instruction],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instruction = Instruction::find($id);
        if($instruction){
            $instruction= new InstructionResource($instruction);
            return response()->json(['status' =>true,'message'=>'Get specific instruction successfully!', 'data'=>$instruction],200);
        }
        return response()->json(['status' =>false, 'message'=>'Not found instruction!'],404);
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
    public function update(InstructionRequest $request,string $id)
    {
        $instruction = Instruction::find($id);
        if($instruction){
            $instruction->update([
                'instruction'=>$request->instruction,
                'drone_id'=>$request->drone_id,
                'plan_id'=>$request->plan_id
            ]);
            return response()->json(['status'=>true, 'message'=>'Updated instruction successfully!'],200);
        } 
        return response()->json(['status'=>false, 'message'=>'Not found!'],404);
    }
    /**
     * Delete the specified resource
     */
    public function updateInstruction($drone, $id, Request $request)
    {
        $drone  =  Drone::where('drone_name', 'like', $drone)->first();
        $instructions  =    (new ShowDroneIntructionResource($drone))->instructions;
        foreach ($instructions as $instruction) {
            if ($instruction->id === intVal($id)) {
                $instruction = new ShowOnlyIntructionResource($instruction);
                $instruction['instruction'] = $request->instruction;
                $instruction->save();
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Updated instruction successfully!',
                        'data updated' => $instruction
                    ],
                    200
                );
            }
            return response()->json(['status' => false,'message' => 'Not found!',],401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instruction = Instruction::find($id);
        if($instruction){
            $instruction->delete();
            return response()->json(['status' =>true,'message' => 'Deleted instruction successfully!'],200);
        }
        return response()->json(['status' =>false,'message' => 'Not found!'],404);
    }
}
