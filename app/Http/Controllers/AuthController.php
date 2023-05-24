<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAuthRequest;
use App\Models\Farmer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login(StoreUserAuthRequest $request)
    {
        $credentials = $request->only('name', 'email', 'password');
        if (Auth::attempt($credentials)) {
            $farmer = Auth::user();

            $token = $farmer->createToken('FARMER Token')->plainTextToken;
            return response()->json([
                'farmer' => $farmer,
                'token' => $token
            ]);
        };
        return response()->json([
            'message' => 'Invalid field'
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
}
