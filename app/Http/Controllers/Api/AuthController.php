<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValodationException;

class AuthController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:6']);

        $user = User::create([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>Hash::make($validated['password'])
        ]);
    $token = $user->createToken('api-token')->plainTextToken;

    return response()->json([
        'message'=>'User registered successfully',
        'token'=>$token
    ],201);
    }
    
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = User::where('email',$request->email)->first();

        if(!$user || Hash::check($request->password,$user->password)){
            throw ValidationException::withMessages([
                'email'=>['Invalid credentials']
            ]);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message'=>'Login successful',
            'token' =>$token
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=>'Logged out successfully'
        ]);
    }
}
