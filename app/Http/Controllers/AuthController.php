<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAuthRequest;
use App\Models\Farmer;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //TODO register user table 

    public function register(StoreUserAuthRequest $request)
    {
        $farmer = Farmer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $farmer->createToken('FARMER TOKEN')->plainTextToken;

        return response()->json([
            'farmer' => $farmer,
            'token' => $token,
        ]);
    }

}
