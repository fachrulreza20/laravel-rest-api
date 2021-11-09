<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){

        $user = User::where('email', $request->email)->first();


        if(!$user || !\Hash::check($request->password, $user->password)){ // jika user tidak ketemu atau password salah

            // return response()->json([
            //     'message' => 'Password Tidak Sesuai / Unauthorized'
            // ],401);
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect'],
            ]);
        }

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([

            'message' => 'login success',
            'user'    => $user,
            'token'    => $token,

        ],200);

    }

    public function logout(Request $request){

        $user = $request->user();
        $user->currentAccessToken()->delete();

        return response()->json([

            'message' => "Berhasil logout"
        ], 200);

    }
}
