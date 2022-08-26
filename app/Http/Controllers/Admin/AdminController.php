<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $messages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password' => 'Password is required',
            ];

            $validator = Validator::make($request->all(),$rules,$messages)->validate();


            if(Auth::guard('admin')->attempt(['email'=>$data['email'], 'password'=>$data['password']])){
               return redirect('admin/dashboard');
            }else{
                return redirect()->back()->with('error_msg','Invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function logout(){
         Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
