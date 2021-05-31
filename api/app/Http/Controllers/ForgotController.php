<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;

use App\User;

class ForgotController extends Controller
{
    public function forgot(ForgotRequest $request) {
        $email = $request->input('email');

        if(User::where('email', $email)->doesntExist()){
            return response([
                'message' => 'Email does not exist'
            ], 404);
        }

        $token = Str::random(10);

        try {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token
            ]);
    
            //Send Email

            return response([
                'message' => 'Check your Email'
            ]);

        }catch(\Exception $e){
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function reset(ResetRequest $request) {
        $token = $request->input('token');

        if(!$passwordResets = DB::table('password_resets')->where('token', $token)->first()) {
            return response([
                'message' => 'Invalid token!'
            ], 400);
        }

        /** @var User $user */

        if(!$user = User::where('email', $passwordResets->email)->first()) {
            return response([
                'message' => 'User doesn\'t exist'
            ], 400);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response([
            'message' => 'success'
        ]);
    }
}
