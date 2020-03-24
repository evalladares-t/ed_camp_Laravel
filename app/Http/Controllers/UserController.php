<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function login(){
        $data = [
            'email' => request('email'),
            'password' =>request('password')
        ];
        if(Auth::attempt($data)){
            $user=Auth::user();
            $loginData['token']=$user->createToken('__Token')->accessToken;
            return response()->json(['messsage'=>'Bienvenido','data'=>$loginData],200);
        }
        else{
            return response()->json(['message'=>'Error en las credenciales'],401);
        }
    }

    public function register(Request $request){
        $data = $request->all();
        $data['password']=bcrypt($data['password']);
        
        $user = User::create($data);
        $loginData['token']=$user->createToken('__Token')->accessToken;
        return response()->json(['messsage'=>'Bienvenido nuevo Usuario','data'=>$loginData],200);

    }
}
