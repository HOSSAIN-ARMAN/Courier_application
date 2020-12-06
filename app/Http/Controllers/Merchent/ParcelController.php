<?php

namespace App\Http\Controllers\Merchent;

use App\Admin\Delivery;
use App\Admin\DeliveryZone;
use App\Admin\ParcelArea;
use App\Admin\ParcelType;
use App\Admin\PickUpZone;
use App\Merchent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

class ParcelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:merchent');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merchent.parcel.index', [
            'parcelArea' => ParcelType::all(),
            'deliveries'   => Delivery::all(),
            'pickZones'   => PickUpZone::all(),
            'deliveryZones' => DeliveryZone::all(),
        ]);
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


    public function store(Request $request)
    {
        $merchentId = auth('merchent')->id();
        $parcelInfo = array(
          'merchent_id'  => $merchentId,
            'parcel_type_id' => $request->parcel_type_id,
            'delivery_type_id' => $request->delivery_type_id,
            'pick_up_zone_id' => $request->pick_up_zone_id,
            'weight' => $request->weight,
            'price' => $request->price,
            'delivery_fee' => $request->delivery_fee,
            'amount' => $request->amount,
            'cod_charge' => $request->cod_charge,
            'pickup_number' => $request->pickup_number,
            'pick_up_address' => $request->pick_up_address,
        );

        $this->storeCustomer($request, $merchentId);
        Merchent\Parcel::insert($parcelInfo);

        return redirect()
            ->route('parcel.index')
            ->with('message', 'Parcel created successfully!');

    }
    public function storeCustomer($request, $merchentId){
        $customerInfo = array(
            'merchent_id' => $merchentId,
            'customer_name' => $request->customer_name,
            'customer_contact' => $request->customer_contact,
            'delivery_zone_id' => $request->delivery_zone_id,
            'customer_address' => $request->customer_address,
            'customer_comments' => $request->customer_comments,
        );
        Merchent\Customer::insert($customerInfo);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
