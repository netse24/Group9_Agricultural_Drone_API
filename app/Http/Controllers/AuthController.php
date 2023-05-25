<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;


// use App\Http\Requests\StoreUserAuthRequest;

class AuthController extends Controller
{
    //TODO register user table 

    
    public function register(AuthRequest $request)
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


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
