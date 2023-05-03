<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Response;
use Illuminate\Support\Facades\Auth;
use Illumiate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class LoginController extends Controller
{
    protected $success = 200;
    protected $error = 401;

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->input('email'), 'password'=>$request->input('password')])){
            $user = Auth::user();

            $data['token'] = $user->createToken('investbul')->accessToken;
            $data['id'] = $user->id;
            $data['email'] = $user->email;
        }
        return Response::json(['data' => $data], $this->success, [], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }
}
