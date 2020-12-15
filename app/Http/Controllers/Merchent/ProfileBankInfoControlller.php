<?php

namespace App\Http\Controllers\Merchent;

use App\Merchent\MerchentBankInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ProfileBankInfoControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()){
            if (auth('merchent')->check()){
                $merchentId = auth('merchent')->id();
                $data = MerchentBankInfo::updateOrCreate(['id' => $request->id],
                    [
                        'merchent_id' => $merchentId,
                        'bank_name' => $request->bank_name,
                        'account_no' => $request->account_no,
                        'routing_no' => $request->routing_no,
                        'card_no' => $request->card_no,
                        'branch_name' => $request->branch_name,
                    ]);
            }
            return response()->json($data);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($id){
            $data = MerchentBankInfo::find($id);
            return response()->json($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()){
            $data = MerchentBankInfo::find($request->id)->delete();
            return response()->json(['code' => 200, 'message' => 'Delete successfully', 'data' => $data]);
        }
    }
}
