<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        return response()->json(Auth::user());
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        try {
            $user = User::where('email', $request->email)->firstOrFail();
            if (Hash::check($request->password, $user->password)) {
                // success
                $token = base64_encode(str_random(40));
                $user->api_token = $token;
                $user->save();
                return response()->json(['api_token' => $token, 'status' => 'success']);
            } else {
                return response()->json(['status' => 'fail', 'info' => 'Incorrect password']);
            }
        } catch (\Exception $exception) {
            return response()->json(['status' => 'fail', 'info' => 'User not exist']);
        }
    }

    public function logout(Request $request) {
        try {
            Auth::user()->api_token = NULL;
            Auth::user()->save();
            return response()->json('success');
        } catch (\Exception $exception) {
            return response()->json('fail');
        }
    }
}