<?php

namespace App\Http\Controllers\Merchent;

use App\Merchent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;


class ProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:merchent');

    }

    public function index()
    {
        $id = auth('merchent')->id();
        return view('merchent.profile.index', [
            'merchent' => Merchent::where('id', $id)->first(),
            'pickUpType' => Merchent\PickUpType::all()
        ]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {

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
    private function uploadImage($image){
        $imageName = $image->getClientOriginalName();
        $directory = "Profile-img/";
        $image->move($directory, $imageName);
        return $directory.$imageName;
    }


    public function destroy($id)
    {

    }
}
