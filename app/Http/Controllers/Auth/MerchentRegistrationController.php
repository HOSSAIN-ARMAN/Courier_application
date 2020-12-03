<?php

namespace App\Http\Controllers\Auth;

use App\Merchent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MerchentRegistrationController extends Controller
{

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string',
            'otp_code' => 'string',
//            'password' => 'required|string|min:5|confirmed',
        ]);

        Merchent::create([
            'name' => $request['name'],
            'mobile' => $request['mobile'],
            'otp_code' => $request['otp_code'],
            'password' => Hash::make($request['password']),
        ]);

        return  redirect()->route('merchent.dashboard');

    }


}
