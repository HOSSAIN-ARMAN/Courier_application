<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MerchentLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:merchent');
    }
    public function showLoginForm(){
        return view('auth.merchent-login');
    }
    public function login(Request $request){
        $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required|min:4'
        ]);

        if(Auth::guard('merchent')->attempt(['email'=>$request->email, 'password' => $request->password], $request->remember)){

            return redirect()->intended(route('merchent.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
