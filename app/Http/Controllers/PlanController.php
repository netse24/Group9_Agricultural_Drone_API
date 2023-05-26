<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResource;
use App\Http\Resources\ShowPlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plans = Plan::all();
        $plans = PlanResource::collection($plans);
        return response()->json(['status' => true, 'data' => $plans], 200);
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
    public function store(PlanRequest $request)
    {
        $plan = Plan::create([
            'type_job' => $request->type_job,
            'date_time' => $request->date_time,
            'area' => $request->area,
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'status' => 'create plan successfully',
            'data' => $plan
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($plan)
    {
        $plan = Plan::where('type_job', 'like', $plan)->first();
        $plan = new  ShowPlanResource($plan);
        return response()->json(['message' => 'Success', 'data' => $plan], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
