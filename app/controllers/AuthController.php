<?php

class AuthController extends BaseController
{
    public function login()
    {
   		//dd(Input::all());
   		//$data = Input::all();
   		$data = Input::only('email','password','remember');
        $credentials = ['email'=>$data['email'],'password'=>$data['password']];
        if(Auth::attempt($credentials,$data['remember']))
        {
            return Redirect::back();
        }
        
        return Redirect::back()->with('login_error',1);
    }
    
    public function logout()
    {
        Auth::logout();
        return Redirect::route('home');
    }
}