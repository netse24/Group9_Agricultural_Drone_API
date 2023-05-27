<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProvinceRequest;
use App\Http\Resources\ProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Province::all();
        $provinces = ProvinceResource::collection($provinces);
        return response()->json(['status'=>true, 'data'=>$provinces],200);
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
    public function store(ProvinceRequest $request)
    {
        $province = Province::create([
            'name' => $request->name,
        ]);
        return response()->json(['status'=>true, 'message'=>'Created successfully', 'data'=>$province],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($province_name)
    {
        $province = Province::where('name','like', $province_name)->first();
        return response()->json(['status'=>true, 'data'=>$province],200);
    }

    /**
     * Display the specified province by id
     */
    public function showById($province_id){
        $province = Province::find($province_id);
        if ($province){
            $province = new ProvinceResource($province);
            return response()->json(['status'=>true, 'data'=>$province],200);
        }
        return response()->json(['status'=>false, 'message'=>'Province not found'],404);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Province $province)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProvinceRequest $request, string $id)
    {
        $province = Province::find($id);
        if ($province){
            $province->update([
                'name'=>$request->name,
            ]);
            return response()->json(['status'=>true, 'message'=>'Update successfully','data'=>$province],200);
        }
        return response()->json(['status'=>false, 'message'=>'Can not update !'],404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $province = Province::find($id);
        if ($province){
            $province->delete($province);
            return response()->json(['status'=>true, 'message'=>"Deleted successfully"],200);
        }
        return response()->json(['status'=>false, 'message'=>"Can not delete !"],404);
    }
}
