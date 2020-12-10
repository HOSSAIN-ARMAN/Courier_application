<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MerchentLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:merchent')->except('logout');
    }
    public function showLoginForm(){
        return view('auth.merchent-login');
    }
    public function login(Request $request){
        $this->validate($request, [
           'mobile' => 'required',
           'password' => 'required|min:4',
        ]);

        if(Auth::guard('merchent')->attempt(['mobile'=>$request->mobile, 'password' => $request->password], $request->remember)){

            return redirect()->intended(route('merchent.dashboard'));
        }
        return redirect()->back()->withInput($request->only('mobile', 'remember'));
    }
    public function logout(Request $request)
    {

        Auth::guard('merchent')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/merchent/login');
    }

    protected function loggedOut(Request $request)
    {
        //make more secure
    }
}
