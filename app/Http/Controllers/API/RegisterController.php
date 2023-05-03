<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illumiate\Support\Facades\Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Laravel\Sanctum\HasApiTokens;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if($validator->fails()){
            return Response::json(['error'=> $validator->errors()], 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }

        $user = new User();

        $user->f_name = $request->input('f_name');
        $user->l_name = $request->input('l_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = FacadesHash::make($request->input('name'));
        $user->save();

        $data['token'] = $user->createToken('')->accessToken;
        $data['name'] = $user->name;

        return  Response::json(['data'=> $data], 200, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    }
}
