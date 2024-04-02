<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Hash;
class RegisterController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
          'name'=>'required|string|max:100',
          'email'=>'required|email|max:100',
          'password'=>'required|string|max:10',
        ]);

        if($validator->fails()){
          return response()->json([
              'status' => 422,
              'errors' => $validator->messages()
          ],422);
        }else{

          $user = User::create([
              'name'=>$request->name,
              'email'=>$request->email,
              'password' => Hash::make($request->password),

          ]);

          if($user){
              return response()->json([
                 'status' => 200,
                 'message' => "User Created Successfull"
              ],200);

          }else{
              return response()->json([
                  'status' => 500,
                  'message' => "Somthing went Wrong"
               ],500);

          }

        }
  }
}
