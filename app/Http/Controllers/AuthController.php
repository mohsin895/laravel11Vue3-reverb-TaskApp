<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Events\NewUserCreate;
use Str;

class AuthController extends Controller
{
   public function register(Request $request)
   {
       $fields = $request->all();
       $error = Validator::make($fields, [
           'email' => 'required|email|unique:users,email',
           'password' => 'required|min:6|max:8'
       ]);

       if ($error->fails()) {
           return response($error->errors()->all(), 422); // corrected from error() to errors()
       }

     $user= User::create([
           'email' => $fields['email'],
           'password' => bcrypt($fields['password']),
           'isValidEmail' => User::IS_INVALID_EMAIL,
           'remember_token' => $this->generateRandomCode(),
       ]);

       NewUserCreate::dispatch($user);

       return response(['user'=>$user,'message' => 'User created'], 200);
   }
public function checkEmail($token){
    User::where('remember_token',$token)
    ->update(['isValidEmail'=>User::IS_VALID_EMAIL]);
    return redirect('/login');
}
   function generateRandomCode()
   {
       $code = Str::random(10) . time();
       return $code;
   }
}
