<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;


class AuthController extends Controller
{
    public function loginForm(){
    	return view('auth.login');
    }

    public function login(Request $request){
    	Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ])->validate();

    	$email = $request->email;
    	$password = Hash::make($request->password);

    	$user = User::where('email', $email)->first();
    	
    	if (Hash::check($request->password, $user->password)) {
    		$role = $user->getRoleNames();

    		$credentials = $request->only('email', 'password');
    		Auth::attempt($credentials);

    		if ($role[0] == 'customer') {

                $cartUrlsession= session()->get('cartUrl');

                if ($cartUrlsession) {
                    return redirect('cart');
                }else{
                    return redirect('/');
                }
    		}else{
    			return redirect('genre');
    		}


    	}else{
            return redirect()->back();

    	}

    }

    public function registerForm(){
        return view('auth.register');
    }

    public function register(Request $input){
        Validator::make($input->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string'],
            'address'   => ['required', 'string'],

        ])->validate();

        $user =User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'address' => $input['address'],
        ]);
        $user->assignRole('customer');

        $credentials = $input->only('email', 'password');
        Auth::attempt($credentials);

        return redirect('/');
    }
}
