<?php

namespace App\Http\Controllers\Merchent;

use App\Admin\BankInfo;
use App\Admin\MobileBank;
use App\Merchent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;
use DB;

class ProfileController extends Controller
{


    public function index()
    {
        $id = auth('merchent')->id();
        return view('merchent.profile.index', [
            'merchent' => Merchent::where('id', $id)->first(),
            'pickUpType' => Merchent\PickUpType::all(),
            'mobileBankNames' => MobileBank::all(),
            'bankNames' => BankInfo::all(),
            'merchentMobileBankDetails' => Merchent\MerchentMobileBankInfo::where('merchent_id', $id)->get(),
            'bankDetails' => Merchent\MerchentBankInfo::where('merchent_id', $id)->get(),
        ]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
       if ($request->ajax()){
           if (auth('merchent')->check()){
               $merchentId = auth('merchent')->id();
               $data = Merchent\MerchentMobileBankInfo::updateOrCreate(['id' => $request->id], [
                   'merchent_id' => $merchentId,
                   'mobile_bank_name' => $request->mobile_bank_name,
                   'account_no' => $request->account_no
               ]);
           }
           return response()->json($data, 200);
       }

    }


    public function show($id)
    {
        //
    }


    public function edit($id=null)
    {
        if($id){
            $merchentMobileBankInfo = Merchent\MerchentMobileBankInfo::find($id);
            return response()->json($merchentMobileBankInfo);
        }
    }

    public function update(Request $request)
    {
        if (auth('merchent')->check()){
            if ($request->image && auth('merchent')->id()){
                $image = $request->file('image');
                $model = Merchent::find(auth('merchent')->id());
                if(isset($image)){
                    if (file_exists($model->image)){
                        unlink($model->image);
                    }
                    $imagePath = $this->uploadImage($image);
                }
                if ($image){
                    $model->image = $imagePath;
                    $model->save();
                }
                return back();

            }else{
                Merchent::findOrFail($request->id)->update($request->all());
                return back();
            }
        }

    }

    private function uploadImage($image){
        $imageName = $image->getClientOriginalName();
        $directory = "Profile-img/";
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }


    public function destroy(Request $request)
    {
        $merchentMobileBankInfo = Merchent\MerchentMobileBankInfo::find($request->id)->delete();
        return response()->json(['code' => 200, 'message' => 'Delete successfully', 'data' => $merchentMobileBankInfo]);
    }

    public function display(){
        $id = auth('merchent')->id();
        $merchentMobileBankDetails = DB::table('merchent_mobile_bank_infos')->where('merchent_id', $id)
            ->join('mobile_banks', 'merchent_mobile_bank_infos.mobile_bank_id', '=', 'mobile_banks.id')
            ->select('merchent_mobile_bank_infos.*', 'mobile_banks.name')->paginate(5);
        return response()->json($merchentMobileBankDetails);

    }
}
