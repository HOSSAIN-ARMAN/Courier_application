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
use DB;
Use Illuminate\Support\Collection;
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


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
//        return $request->all();
        $invoiceNo =  'Invoice-No: '.time();
        $merchentId = auth('merchent')->id();
        $parcelId = Merchent\Parcel::create($this->data($request, $merchentId, $invoiceNo))->id;
        $this->storeCustomer($request, $merchentId, $parcelId);

        return redirect()
            ->route('parcel.index')
            ->with('message', 'Pick-up Request successfully!');

    }
    private function storeCustomer($request, $merchentId, $parcelId){
        $customerInfo = array(
            'merchent_id' => $merchentId,
            'customer_name' => $request->customer_name,
            'customer_contact' => $request->customer_contact,
            'delivery_zone_id' => $request->delivery_zone_id,
            'customer_address' => $request->customer_address,
            'customer_comments' => $request->customer_comments,
            'parcel_id' => $parcelId
        );
        Merchent\Customer::insert($customerInfo);
    }


    private function data($request, $merchentId, $invoiceNo){
        $parcelInfo = array(
            'merchent_id'  => $merchentId,
            'parcel_type_id' => $request->parcel_type_id,
            'delivery_type_id' => $request->parcel_type_id == 2 ? 2 : $request->delivery_type_id,
            'pick_up_zone_id' => $request->pick_up_zone_id,
            'weight' => $request->weight,
            'price' => $request->price,
            'delivery_fee' => $request->delivery_fee,
            'amount' => $request->amount,
            'cod_charge' => $request->cod_charge,
            'pickup_number' => $request->pickup_number,
            'pick_up_address' => $request->pick_up_address,
            'status' => $request->status,
            'invoice_no' => $invoiceNo
        );
        return $parcelInfo;
    }

    public function details(){


        $parceles = DB::table('parcels')
            ->join('merchents', 'parcels.merchent_id', '=', 'merchents.id')
            ->join('customers', 'parcels.id', '=', 'customers.parcel_id')
            ->join('parcel_types', 'parcels.parcel_type_id', '=', 'parcel_types.id')
            ->join('deliveries', 'parcels.delivery_type_id', '=', 'deliveries.id')
            ->join('delivery_zones', 'customers.delivery_zone_id', '=', 'delivery_zones.id')
            ->join('pick_up_zones', 'parcels.pick_up_zone_id', '=', 'pick_up_zones.id')
            ->select(
                'parcels.*',
                'merchents.name as  merchent_name',
                'customers.customer_name' , 'customers.customer_contact', 'customers.customer_address',
                'parcel_types.name as parcelTypeName',
                'deliveries.name as deliveryName',
                'delivery_zones.name as deliveryZoneName',
                'pick_up_zones.name as pickUpZoneName'
            )->get();

        return view('merchent.parcel.detail',[
            'parceles' => $parceles,
        ]);
    }
    public function getDeliveryTypeName($id){
        if ($id){
//            $count = Delivery::count();
//            $skip = 1;
//            $limit = $count - $skip; // the limit
//            $data = Delivery::skip($skip)->take($limit)->where('parcel_type_id', $id)->get();
            $data = Delivery::where('parcel_type_id', $id)->get();
            return response()->json($data);
        }
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
