<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farms = Farm::all();
        $farms = FarmResource::collection($farms);
        return response()->json(['status'=>true,'message'=>'Get farms successfully!' ,'data'=>$farms],200);
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
    public function store(FarmRequest $request)
    {
        $farm = Farm::create([
            'name' => $request->name,
            'user_id' => $request->user_id,
            'province_id' =>$request->province_id,
        ]);
        return response()->json(['status'=>true,'message'=>'Created farm successfully!' ,'data'=>$farm],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $farm = Farm::find($id);
        if($farm){
            $farm= new FarmResource($farm);
            return response()->json(['status'=>true,'message'=>'Get specific farm successfully!' ,'data'=>$farm],200);
        }
        return response()->json(['status'=>false,'message'=>'Not found farm!'],404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farm $farm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FarmRequest $request, string $id)
    {
        $farm = Farm::find($id);
        if($farm){
            $farm->update([
                'name'=>$request->name,
                'province_id'=>$request->province_id,
                'user_id'=>$request->user_id
            ]);
            return response()->json(['status'=>true,'message'=>'Updated farm successfully!', 'data'=>$farm],200);
        }
        return response()->json(['status'=>false,'message'=>'Not found!'],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $farm = Farm::find($id);
        if($farm){
            $farm->delete($farm);
            return response()->json(['status'=>true,'message'=>'Deleted farm successfully!'],200);
        }
        return response()->json(['status'=>false,'message'=>'Not found!'],404);
    }
}
