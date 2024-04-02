<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Hash;

class LoginController extends Controller
{
    public function check(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email|max:100',
            'password'=>'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 421,
                'errors' => $validator->messages(),
            ], 421);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'status' => 200,
                'message' => 'Login successful',
                'user' => $user,
            ], 200);
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid credentials',
            ], 401);
        }
    }
}
