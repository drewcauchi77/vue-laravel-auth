<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        try{
            if(Auth::attempt($request->only('email', 'password'))){
                /** @var User $user; */
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;
                
                return response([
                    'message' => 'success',
                    'token' => $token,
                    'user' => $user
                ], 200);
            }
    
            return response([
                'message' => 'Invalid username/password'
            ], 401);
        }catch(\Exception $e){
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function user() {
        return Auth::user();
    }

    public function register(RegisterRequest $request) {
        try{
            $user = User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
    
            return $user;
        }catch(\Exception $e){
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
