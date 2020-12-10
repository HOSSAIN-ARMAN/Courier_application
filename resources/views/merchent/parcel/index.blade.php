@extends('merchent.layouts.master')
@section('title','Parcel List')
@section('page-header')
    <i class="fa fa-list"></i> Parcel List
@stop

@push('css')
    <style>
        table th,
        td {
            text-align: center !important;
            vertical-align: middle !important;
        }




    </style>
@endpush

@section('content')
{{--    @include('merchent.components.page_header', [--}}
{{--       'fa' => 'fa fa-pencil',--}}
{{--       'name' => 'Create Category',--}}
{{--       'route' => route('parcel.index')--}}
{{--    ])--}}

{{--    =======================--}}


<div class="container">
    <div class="row">
        <h3><i class="text-success glyphicon-pawn"><b>Create Parcel Information</b></i></h3>
        <hr>
    </div>
</div>
<div class="container">
    <form role="form"
          method="post"
          class="form-horizontal"
          enctype="multipart/form-data"
          action="{{route('merchent.parcel.store')}}"
    >
    @csrf
        <div class="col-sm-7">

        <div class="row padding">
            <!-- Parcel Create -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="parcel">Parcel Create From <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <select class="form-control" name="parcel_type_id" id="parcel_area">
                        <option value="-1">--select--</option>
                        @foreach($parcelArea as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                    </select>
                    <strong class="red">{{ $errors->first('parcel_area') }}</strong>
                </div>
            </div>
            <!--delivery type--->
            <div class="form-group" id="delivery_type_div">
                <label class="col-sm-3 control-label no-padding-right" for="delivery">Delivery Type <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <select class="form-control" name="delivery_type_id" >
                        <option value="1">--select--</option>
                        @foreach($deliveries as $delivery)
                        <option value="{{$delivery->id}}">{{ $delivery->name }}</option>
                        @endforeach
                    </select>
                    <strong class="red">{{ $errors->first('code') }}</strong>
                </div>
            </div>



            <!--weight-->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="weight">Weight <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <input type="number" id="weight" name="weight" class="form-control" placeholder="Weight count as a (Kg)">
                </div>
            </div>
            <!--Product Price-->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="price">Product Price <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <input type="number" id="price" name="price" class="form-control" >
                </div>
            </div>
            <!--Delivery Fee-->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="delivery_fee">Delivery Fee <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <input type="number" id="delivery_fee" name="delivery_fee" class="form-control">
                </div>
            </div>
            <!--Collection Amount-->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="amount">Collection Amount <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <input type="number" id="amount" name="amount" class="form-control">
                </div>
            </div>
            <!--COD Charge-->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="cod_charge">COD Charge <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <input type="number" id="cod_charge" name="cod_charge" class="form-control">
                </div>
            </div>
            <!--Pick-Up Number-->

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="cod_charge">Pick-Up Number <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <span class="input-group-addon">+880</span>
                        <input id="test" type="tel" name="pickup_number" class="form-control">
                    </div>
                </div>
            </div>
            <!-- pick up zone -->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="pick_up_zone">Pick-up zone <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <select class="form-control" name="pick_up_zone_id" >
                        <option value="-1">--select--</option>
                        @foreach($pickZones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                        @endforeach
                    </select>
                    <strong class="red">{{ $errors->first('pick_up_zone') }}</strong>
                </div>
            </div>

            <!--pick_up_address-->
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="pick_up_address">Pick-Up Address <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <input type="text" id="pick_up_address" name="pick_up_address" class="form-control">
                </div>
            </div>
            <div class="form-group" style="display: none">
                <label class="col-sm-3 control-label no-padding-right" for="pick_up_address">Status <sup class="red">*</sup></label>
                <div class="col-sm-7">
                    <input type="radio" name="status" checked="checked" value="0">
                    <input type="radio" name="status" value="1">
                </div>
            </div>
        </div>

     </div>
        <!-- ------------------------------------------- -->
        <!-- for customer -->
          <div class="col-sm-5">
             <div class="row padding">
                 <!-- customer name -->
                 <div class="form-group">
                     <label class="col-sm-3 control-label no-padding-right" for="weight">Customer Name <sup class="red">*</sup></label>
                     <div class="col-sm-7">
                         <input type="text" id="customer_name" name="customer_name" class="form-control">
                     </div>
                 </div>
                 <!-- customer Contact -->
                 <div class="form-group">
                     <label class="col-sm-3 control-label no-padding-right" for="customer_contact">Contact <sup class="red">*</sup></label>
                     <div class="col-sm-7">
                         <div class="input-group">
                             <span class="input-group-addon">+880</span>
                             <input type="tel" id="customer_contact" name="customer_contact" class="form-control" placeholder="customer Contact">
                         </div>
                     </div>
                 </div>

                 <!-- delivery zone -->
                 <div class="form-group">
                     <label class="col-sm-3 control-label no-padding-right" for="delivery_zone">Delivery Zone <sup class="red">*</sup></label>
                     <div class="col-sm-7">
                         <select class="form-control" name="delivery_zone_id" >
                             <option value="-1">--select--</option>
                             @foreach($deliveryZones as $deliveryZone)
                             <option value="{{$deliveryZone->id}}">{{ $deliveryZone->name }}</option>
                             @endforeach
                         </select>
                         <strong class="red">{{ $errors->first('delivery_zone') }}</strong>
                     </div>
                 </div>
                 <!-- delivery address -->
                 <div class="form-group">
                     <label class="col-sm-3 control-label no-padding-right" for="address">Address <sup class="red">*</sup></label>
                     <div class="col-md-4">
                         <textarea name="customer_address" rows="4" cols="30" placeholder="Enter Delivery address, where customer places there order!!..."></textarea>
                     </div>
                 </div>
                 <!-- comments -->
                 <div class="form-group">
                     <label class="col-sm-3 control-label no-padding-right" for="delivery_zone">Comments <sup class="red">*</sup></label>
                     <div class="col-md-4">
                         <textarea name="customer_comments" rows="4" cols="30" placeholder="Feel Free, Enter your query! If any... "></textarea>
                     </div>
                 </div>
             </div>
          </div>

        <!-- Buttons -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-4">
                <button class="btn btn-sm btn-success submit create-button" type="submit">
                    <i class="fa fa-save"></i> Create Pick-up Request
                </button>

{{--                                <a href="{{route('admin.category.index')}}" class="btn btn-sm btn-gray">--}}
                <a href="#" class="btn btn-sm btn-gray">
                    <i class="fa fa-refresh"></i> Cancel
                </a>
            </div>
        </div>
    </form>
</div>
@endsection

@push('js')
    <script type="text/javascript">
        function delete_check(id) {
            Swal.fire({
                title: 'Are you sure?',
                html: "<b>You will delete it permanently!</b>",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                width: 400,
            }).then((result) => {
                if (result.value) {
                    $('#deleteCheck_' + id).submit();
                }
            })
        }
    </script>


    <script type="text/javascript">
        $('#parcel_area').change(function (){
            if ($(this).val() == "2") {
                $('#delivery_type_div').hide();
            }else {
                $('#delivery_type_div').show();
            }

        });
    </script>






@endpush
