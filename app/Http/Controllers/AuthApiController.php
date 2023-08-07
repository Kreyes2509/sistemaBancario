<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthApiController extends Controller
{
    public function loginApp(Request $request){
        //Array that takes the user's email and password
        $credentials = $request->only('email', 'password');
        //get user information
        $user = User::where('email','=',$request->email)->first();
        try
        {
            //create token in case the credentials are valid
            $token = JWTAuth::attempt($credentials);

            if (!$token)
            {
                //if the credentials are false, it returns that the token was not created successfully
                return response()->json(['status'=>400,'message' => 'invalid_credentials']);
            }
            //If everything goes well, it will create the session toke
            return response()->json(['status'=>200,'message'=>$user,'token'=>$token]);

        }
        catch (JWTException $e)
        {
            //returns that the token was not created successfully
            return response()->json(['status'=>500,'message' => 'could_not_create_token']);
        }
    }

    //Method to obtain user information through api
    public function getAuthenticatedUser()
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
        return response()->json($user, 200);
    }

    //Method to close session through api
    public function logoutApp() {
        auth()->logout();
        return response()->json(['status'=>200,'message' => 'User successfully signed out']);
    }
}
