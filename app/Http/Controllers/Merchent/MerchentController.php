<?php

namespace App\Http\Controllers\Merchent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:merchent');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('merchent.index');
    }
}
