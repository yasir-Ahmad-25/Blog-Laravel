<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function signup(){
        return view('auth.signup');
    }

    public function signin(){
        return view('auth.signin');
    }

    public function create_user(Request $request){

        // validate inputs
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string', 
            'profile_image' => 'required|image|mimes:jpg,png,jpeg', 
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|min:6|confirmed'
        ]);


        if($validator->fails()){
            $firstError = $validator->errors()->first();
            return response()->json([
                'status' => false, 
                'message' => $firstError,
            ]);
        }else{

            // store profile image to storage
            $img_path = $request->file('profile_image')->store('users' ,'public');
            // get data
            $data = [
                'name' => $request->get('fullname'), 
                'profile_image' => $img_path, 
                'email' => $request->get('email'), 
                'password' => $request->get('password'),
            ];

            // store user data to db
            $store = User::create($data);

            // check if the user is stored 
            if($store){
                // if stored login

                Auth::login($store);
                session()->regenerate();
                session()->regenerateToken();

                // return redirect()->route('blogs.index');
                return response()->json([
                    'status' => true, 
                    'redirect' => route('blogs.index'),
                ]);
            }else{
                return response()->json([
                    'status' => false, 
                    'message' => 'Failed To Create User', 
                ]);
            }
        }
    }

    public function login_user(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');
        $user = User::where('email',$email)->first();

        if($user && Hash::check($password,$user->password)){

            Auth::login($user);
            session()->regenerate();
            session()->regenerateToken();

            return response()->json([
                'status' => true, 
                'redirect' => route('blogs.index'),
            ]);

        }else{
            return response()->json([
                'status' => false, 
                'message' => 'Username or Password is incorrect',
            ]);
        }
    }
}
