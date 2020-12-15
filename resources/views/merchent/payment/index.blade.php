@extends('merchent.layouts.master')
@section('title','Payment')
@section('page-header')
    <i class="fa fa-list"></i> Payment
@stop

@push('css')
    <style>
       .thumbnail{
           margin-left: 5px;
       }

    </style>
@endpush

@section('content')
    {{--    @include('merchent.components.page_header', [--}}
    {{--       'fa' => 'fa fa-pencil',--}}
    {{--       'name' => 'Create Category',--}}
    {{--       'route' => route('parcel.index')--}}
    {{--    ])--}}

    <div class="row padding">
        <br>
        <div class="col-sm-6 text-secondary"><b class="h2 text-success">Merchants Payment</b></div>
        <div class="col-sm-6 d-flex flex-row-revers">
           <div class="row padding">
               <div class="col-sm-8"></div>
               <div class="col-sm-4">
                   <button class="p-2 btn btn-outline-info"><b style="color: black">Export</b></button>
                   <button class="p-2 btn btn-outline-dark"><b style="color: black">Print</b></button>
               </div>
           </div>
        </div>
    </div>
    <hr>
    <div class="row padding">
        <br>
        <div class="col-sm-4">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="parcel">Status <sup class="red">*</sup></label>
                <div class="col-sm-9">
                    <select class="form-control" name="parcel_type_id" id="parcel_area">
                        <option value="-1">--select--</option>
                        <option value="#">All</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="parcel">Payment Status <sup class="red">*</sup></label>
                <div class="col-sm-9">
                    <select class="form-control" name="parcel_type_id" id="parcel_area">
                        <option value="-1">--select--</option>
                        <option value="#">All</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="parcel">Search <sup class="red">*</sup></label>
                <div class="col-sm-9">
                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                </div>
            </div>
        </div>
        <hr>
        <table id="payment_table"  class="table table-bordered table-hover responsive">
            <thead>
            <tr>
                <th>Invoice-NO</th>
                <th >Status</th>
                <th>Delivery Date</th>
                <th>Price</th>
                <th>COD Charge</th>
                <th>Fee</th>
                <th>Discount</th>
                <th>Total</th>
                <th>Payment</th>
                {{--            <th class="detail-col" style="width: 100px">Action</th>--}}

            </tr>
            </thead>

            <tbody>

            <tr>
                <td>none</td>
                <td><span class="label label-sm label-success">none</span></td>
                <td>none</td>
                <td>none</td>
                <td>none</td>
                <td>none</td>
                <td>none</td>
                <td>none</td>
                <td>none</td>

                {{--                <td>--}}
                {{--                    <div class="action-buttons">--}}
                {{--                        <a href="#" class="green bigger-140 show-details-btn" title="Show Details">--}}
                {{--                            <i class="ace-icon fa fa-angle-double-down"></i>--}}
                {{--                            <span class="sr-only">Details</span>--}}
                {{--                        </a>--}}
                {{--                        <a href="#" class="green bigger-140 show-parcel-location-btn" title="Show Details">--}}
                {{--                            <i class="fa fa-truck" aria-hidden="true"></i>--}}
                {{--                            <span class="sr-only">Parcel location</span>--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                {{--                </td>--}}
            </tr>

            </tbody>
        </table>
    </div>
    <hr>

    <div class="container-fluid" >
        <div class="row padding">
            <div class="col-sm-3">
                <div class="card-deck" style="background: #385d7a">
                    <div class="card thumbnail">
                        <div class="card-body">

                            <img src="https://portal.gontobbocourier.com/images/icon/fee.png"  height="50px" alt="" style="float: right">
                            <h5 class="card-title">BDT. 0.00</h5>
                            <p class="card-text"><small class="text-muted"><b>Total Collection</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card-deck" style="background: #385d7a">
                    <div class="card thumbnail">
                        <div class="card-body">
                            <img src="https://portal.gontobbocourier.com/images/icon/paid.png" height="50px" alt="" style="float: right">
                            <h5 class="card-title">BDT. 0.00</h5>
                            <p class="card-text"><small class="text-muted"><b>Total Fee</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card-deck" style="background: #385d7a">
                    <div class="card thumbnail">
                        <div class="card-body">
                            <img src="https://portal.gontobbocourier.com/images/icon/paid.png" height="50px" alt="" style="float: right">
                            <h5 class="card-title">BDT. 0.00</h5>
                            <p class="card-text"><small class="text-muted"><b>Total Discount</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card-deck" style="background: #385d7a">
                    <div class="card thumbnail">
                        <div class="card-body">
                            <img src="https://portal.gontobbocourier.com/images/icon/unpaid.png" height="50px" alt="" style="float: right">
                            <h5 class="card-title">BDT. 0.00</h5>
                            <p class="card-text"><small class="text-muted"><b>COD Charge</b></small></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card-deck" style="background: #385d7a">
                    <div class="card thumbnail">
                        <div class="card-body">
                            <img src="https://portal.gontobbocourier.com/images/icon/unpaid.png" height="50px" alt="" style="float: right">
                            <h5 class="card-title">BDT. 0.00</h5>
                            <p class="card-text"><small class="text-muted"><b>Payable Amount</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        $("#payment_table").DataTable();
    </script>








@endpush

