<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request){
        $userPassword = $request->only('email', 'password');
        try {
            if(! $token = JWTAuth::attempt($userPassword)):
                return response()->json(
                    [
                      'status' => false,
                      'message' => "Logim gagal, user atau password salah!"  
                    ],401
                );
            endif;

            $user = auth()->user();

            return response()->json([
                'status' => true,
                'message' => 'Login Berhasil',
                'user' => $user,
                'token' => $token
            ]);
        }catch(JWTException $e){

        }
    }
    //
    // public function auth(Request $request) {
    //     $userValidate = Validator::make($request->all(),
    //     $request->all(),
    //     [
    //         'username' => 'required',
    //         'password' => 'required'
    //         ]
    //     );

    //     if($userValidate->false()){
    //         return response()->json($userValidate->errors(),422);
    //     }
    //     $userPassword = $request->only('username', 'password');

    //     if(!$token = auth()->guard('api')->attempt($userPassword)):
    //         return response()->json([
    //             'success' => false,
    //             'message'=> 'username atau Password Anda Salah'
    //         ], 401);
    //     endif;

    //     return response()->json([
    //         'success' => true,
    //         'user' => auth()->guard('api')->user(),
    //         'token' => $token
    //     ], 200);
    // }

    public function logout(){

    }

    public function check(){

    }

    public function refresh(){

    }
}
