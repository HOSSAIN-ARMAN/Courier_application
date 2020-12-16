@extends('merchent.layouts.master')
@section('title','profile')
@section('page-header')
    <i class="fa fa-list"></i> Profile
@stop

@push('css')
    <style>
        /*td.nowrap {*/
        /*    white-space: nowrap;*/
        /*    width: 100%;*/
        /*}*/

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
        <hr>
        <div class="row padding">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12  center">
                        <form enctype="multipart/form-data" method="post" action="{{ route('merchent.Info.update') }}">
                            @csrf
							<span class="profile-picture">
                                <input id="profileImage" type="file" name="image" accept="image/*">
                                @if($merchent->image)
                                    <img class="editable img-responsive"  alt="Alex's Avatar" id="avatar2" src="{{ asset($merchent->image) }}" />
                                @else
                                <img class="editable img-responsive"  alt="Alex's Avatar" id="avatar2" src="{{ asset('assets/images/avatars/profile-pic.jpg') }}" />
                                @endif
                            </span>

                        <div class="space space-4"></div>

                        <button type="submit" id="uploade_profile" class="btn btn-sm btn-block btn-success">
                            <span class="bigger-110">Hit on Choose File to Update profile</span>
                        </button>
                        </form>
                        <div class="profile-user-info">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Name </div>
                                <div class="profile-info-value">
                                    <span class="h6">{{ $merchent->name }}</span>
                                </div>
                            </div>
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Phone NUmber </div>

                                <div class="profile-info-value">
                                    <i class="fa fa-phone-square light-orange bigger-110"></i>
                                    <span class="h6">{{ $merchent->mobile }}</span>
                                </div>
                            </div>

                        </div>
                    </div><!-- /.col -->
                </div>    <!-- /.row -->
            </div>
            <div class="col-md-8">
                <div class="tabbable">
                    <ul class="nav nav-tabs padding-18">
                        <li class="active">
                            <a data-toggle="tab" href="#home">
                                <i class="green ace-icon fa fa-user bigger-120"></i>
                                Profile info
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#feed" onclick="showMErchentMobileBankTableRow()">
                                <i class="orange ace-icon fa fa-bank bigger-120"></i>
                                Mobile banking
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#friends">
                                <i class="blue ace-icon fa fa-balance-scale bigger-120"></i>
                                Bank info
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#pictures">
                                <i class="pink ace-icon fa fa-chain bigger-120"></i>
                                Change Password
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content no-border padding-24">
                        <div id="home" class="tab-pane in active">
                            <div class="row">
                                <form name="mobileBankForm" class="form-horizontal" enctype="multipart/form-data" action="{{ route('merchent.Info.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" id="merchent_id" name="id" value="{{$merchent->id}}">
                                    <div class="col-sm-6">
                                        <div class="row padding">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="weight">Name <sup class="red">*</sup></label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $merchent->name }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="address">Address <sup class="red">*</sup></label>
                                                <div class="col-md-8">
                                                    <textarea name="address" rows="3" cols="25" placeholder="Enter Merchant address!!...">{{ $merchent->address }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="pickUpAddress">Pick-Up address <sup class="red">*</sup></label>
                                                <div class="col-md-8">
                                                    <textarea name="pick_up_address" rows="3" cols="25" placeholder="Enter Pick Up address!!..."> {{ $merchent->pick_up_address }}</textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row padding">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="parcel">Pick-Up Type <sup class="red">*</sup></label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="pick_up_type_id" id="pick_up_type_id">
                                                        <option value="1">--select--</option>
                                                        @foreach($pickUpType as $type)
                                                          <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="customer_contact">Mobile <sup class="red">*</sup></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">+880</span>
                                                        <input type="tel" id="mobile" name="mobile" class="form-control" value="{{ $merchent->mobile }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="weight">Shope Name <sup class="red">*</sup></label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="shop_name" name="shop_name" class="form-control" value="{{ $merchent->shop_name }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label no-padding-right" for="customer_contact">Pick-up Number <sup class="red">*</sup></label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">+880</span>
                                                        <input type="tel" id="pick_up_number" name="pick_up_number" class="form-control" value="{{ $merchent->pick_up_number }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-4">
                                            <button class="btn btn-sm btn-success submit create-button" type="submit">
                                                <i class="fa fa-save"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!--profile info -->

                        <div id="feed" class="tab-pane">
                            <div class="profile-feed row">
                                <table id="mobile_bank_info_table" class="table  table-bordered responsive" cellspacing="0" style="width:100%">
                                    <button  onclick="addMobileBankInfo(event.target)" class="btn btn-success  float-left" > Add Mobile Bank-Info</button>
                                    <thead class="">
                                    <tr>
                                        <th>Account Type</th>
                                        <th >Accoutn Number</th>
                                        <th class="detail-col" style="width: 100px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="mobile-bank-table">
                                    @foreach($merchentMobileBankDetails as $detail)
                                      <tr id="_mobile_bank_row_{{$detail->id}}" class="tr">
                                          <td class="center">{{ $detail->mobile_bank_name }}</td>
                                          <td class="center">{{ $detail->account_no }}</td>
                                          <td class="center">
                                              <a href="javascript:void(0)" data-id="{{ $detail->id }}" onclick="editMobileBankInfo(event.target)" class="btn btn-info">Edit</a>
                                              <a href="javascript:void(0)" data-id="{{ $detail->id }}" onclick="deleteMobileBankInfo(event.target)" class="btn btn-danger">Delete</a>
                                          </td>
                                      </tr>

                                    @endforeach
                                    </tbody>
                                </table>
{{--                            {{ $merchentMobileBankDetails->links() }}--}}

                                <!-- mobile bank modal -->
                                <div class="modal fade" id="mobile-bank-modal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"></h4>
                                            </div>
                                            <form name="mobileBankForm" class="form-horizontal">
                                                @csrf
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="parcel">Account Type <sup class="red">*</sup></label>
                                                                <div class="col-sm-7">
                                                                    <select class="form-control" name="mobile_bank_name" id="mobile_bank_name">
                                                                        <option value="-1">--select--</option>
                                                                        @foreach($mobileBankNames as $mobileBank)
                                                                            <option value="{{$mobileBank->name}}">{{$mobileBank->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span id="titleError" class="alert-message"></span>
                                                            <input type="hidden" name="id" id="merchent_mobile_bank_info_id" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="parcel">Account Number <sup class="red">*</sup></label>
                                                                <div class="col-sm-7">
                                                                    <input type="number" id="account_no" name="account_no" class="form-control" placeholder="Enter Mobile bank Account Number">
                                                                </div>
                                                            </div>
                                                            <span id="titleError" class="alert-message"></span>
                                                            {{--                                                            <input type="hidden" name="id" id="post_id" >--}}
                                                        </div>
                                                    </div>
                                            </div>
                                            </form>
                                            <div class="modal-footer">
                                                <button id="btn_text" class="btn btn-primary" onclick="createMerchantMobileBankInfo()">Save</button>
                                                <button type="button" id="btn_text" class="btn btn-danger" onclick="cancelMerchantMobileBankInfoModal()">Cancel</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- mobile Banking -->

                        <div id="friends" class="tab-pane">
                            <div class="profile-users clearfix">
                                <table id="bank-table" class="table  table-bordered table-hover responsive">
                                    <button  onclick="addBankInfo(event.target)" class="btn btn-outline-info"> Add Bank-Info</button>
                                    <thead>
                                    <tr>
                                        <th>Bank Name</th>
                                        <th>Accoutn Number</th>
                                        <th>Routing Number</th>
                                        <th>Card Number</th>
                                        <th>Branch</th>
                                        <th class="detail-col" style="width: 100px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bank-table">
                                    @foreach($bankDetails as $bankDetail)
                                    <tr id="_bank_detail_id{{$bankDetail->id}}" class="tr">
                                        <td class="center">{{$bankDetail->bank_name}}</td>
                                        <td class="center">{{ $bankDetail->account_no }}</td>
                                        <td class="center">{{ $bankDetail->routing_no }}</td>
                                        <td class="center">{{ $bankDetail->card_no }}</td>
                                        <td class="center">{{ $bankDetail->branch_name }}</td>
                                        <td class="center">
                                            <a href="javascript:void(0)" data-id="{{$bankDetail->id}}" onclick="editBankInfo(event.target)" class="btn btn-info">Edit</a>
                                            <a href="javascript:void(0)" data-id="{{$bankDetail->id}}" onclick="deleteBankInfo(event.target)" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!--bank modal-->
                                <div class="modal fade" id="bank-modal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"></h4>
                                            </div>
                                            <form name="bankForm" class="form-horizontal">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="parcel">Bank Name <sup class="red">*</sup></label>
                                                                <div class="col-sm-7">
                                                                    <select class="form-control" name="bank_name" id="bank_name">
                                                                        <option value="-1">--select--</option>
                                                                        @foreach($bankNames as $bankName)
                                                                            <option value="{{ $bankName->name }}">{{$bankName->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span id="titleError" class="alert-message"></span>
                                                            <input type="hidden" id="merchent_bank_infos_id" name="merchent_bank_infos_id" class="form-control" placeholder="Enter bank Account Number">

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="parcel">Account Number <sup class="red">*</sup></label>
                                                                <div class="col-sm-7">
                                                                    <input type="number" id="account_no" name="account_no" class="form-control account_no" placeholder="Enter bank Account Number">
                                                                </div>
                                                            </div>
                                                            <span id="titleError" class="alert-message"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="parcel">Routing Number <sup class="red">*</sup></label>
                                                                <div class="col-sm-7">
                                                                    <input type="number" id="routing_no" name="routing_no" class="form-control" placeholder="Routing Number">
                                                                </div>
                                                            </div>
                                                            <span id="titleError" class="alert-message"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="parcel">Card Number <sup class="red">*</sup></label>
                                                                <div class="col-sm-7">
                                                                    <input type="number" id="card_no" name="card_no" class="form-control" placeholder="Enter Card Number">
                                                                </div>
                                                            </div>
                                                            <span id="titleError" class="alert-message"></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label class="col-sm-3 control-label no-padding-right" for="parcel">Branch name <sup class="red">*</sup></label>
                                                                <div class="col-sm-7">
                                                                    <input type="text" id="branch_name" name="branch_name" class="form-control" placeholder="Enter Mobile bank Account Number">
                                                                </div>
                                                            </div>
                                                            <span id="titleError" class="alert-message"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="bank_btn_text" class="btn btn-primary" onclick="createMerchantBankInfo()">Save</button>
                                                    <button type="button" id="btn_text" class="btn btn-danger" onclick="cancelMerchantBankModal()">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Bank-info -->

                        <div id="pictures" class="tab-pane"> <!-- change password-->
                            comming soon
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('js')

    <script type="text/javascript">
        $("#bank-table").DataTable();

        function addBankInfo(){
            $('#bank-modal').modal('show');
        }
        function cancelMerchantBankModal(){
            emptyBankData();
            $('#bank-modal').modal('hide');
        }

        function emptyBankData(){
            $("#merchent_bank_infos_id").val("");
            $("#bank_name").val("");
            $(".account_no").val("");
            $("#routing_no").val("");
            $("#card_no").val("");
            $("#branch_name").val("");
        }

        function deleteBankInfo(event){
            var id = $(event).data('id');
            var url = '{{ route('bank.info.destroy') }}'
            $.ajax({
               url: url,
               type:"POST",
               data:{
                   id:id,
                   _token: '{{ csrf_token() }}'
               },
               success:function (data) {
                  $("#_bank_detail_id"+id).remove();
               }
            });
        }

        function editBankInfo(event){
            var id = $(event).data("id");
            if (id){
                $('#bank_btn_text').html('Update');
            }
            $.ajax({
                url: '{{URL::route('bank.info.show') }}/'+id,
                type:'GET',
                success:function (response){
                   if (response){
                       $("#merchent_bank_infos_id").val(response.id);
                       $("#bank_name").val(response.bank_name);
                       $(".account_no").val(response.account_no);
                       $("#routing_no").val(response.routing_no);
                       $("#card_no").val(response.card_no);
                       $("#branch_name").val(response.branch_name);
                       $('#bank-modal').modal('show');
                   }
                }

            })
        }

        function createMerchantBankInfo(){
            $('#bank_btn_text').html('save');
            var id = $("#merchent_bank_infos_id").val();
            var bank_name  = $("#bank_name").val();
            var account_no = $(".account_no").val();
            var routing_no = $("#routing_no").val();
            var card_no = $("#card_no").val();
            var branch_name = $("#branch_name").val();
            var url  = "{{ route('bank.info.store') }}"
            $.ajax({
               url: url,
                type:"POST",
                data:{
                    id: id,
                    bank_name: bank_name,
                    account_no: account_no,
                    routing_no: routing_no,
                    card_no: card_no,
                    branch_name: branch_name,
                    _token: '{{ csrf_token() }}'
                },
                success:function (response){
                    if (response){
                        if (id){
                            $("#_bank_detail_id"+id+" td:nth-child(1)").html(response.bank_name);
                            $("#_bank_detail_id"+id+" td:nth-child(2)").html(response.account_no);
                            $("#_bank_detail_id"+id+" td:nth-child(3)").html(response.routing_no);
                            $("#_bank_detail_id"+id+" td:nth-child(4)").html(response.card_no);
                            $("#_bank_detail_id"+id+" td:nth-child(5)").html(response.branch_name);
                        }
                        else {
                            $('.bank-table').prepend('<tr id="_bank_detail_id'+response.id+'" class="tr"> ' +
                                '<td class="center">' +response.bank_name+ '</td>' +
                                '<td class="center">' +response.account_no+ '</td>'+
                                '<td class="center">' +response.routing_no+ '</td>'+
                                '<td class="center">' +response.card_no+ '</td>'+
                                '<td class="center">' +response.branch_name+ '</td>'+
                                '<td class="center"> <a href="javascript:void(0)" data-id = "'+ response.id +'" onclick = "editBankInfo(event.target)" class="btn btn-info">Edit</a>'+ " " +
                                '<a href="javascript:void(0)" data-id = "' + response.id+'" onclick="deleteBankInfo(event.target)" class="btn btn-danger">Delete </a>' + '<td>' +
                                '</tr>')

                        }
                        emptyBankData();
                        $('#bank-modal').modal('hide');
                    }
                }

            });
        }


    </script><!-- Bank Info Script -->

    <script type="text/javascript">
        $("#mobile_bank_info_table").DataTable();

        {{--function showMErchentMobileBankTableRow(){--}}
        {{--    $.ajax({--}}
        {{--        url: '{{ URL::route('mobile.bank.info.display') }}',--}}
        {{--        type:'get',--}}
        {{--        success:function (response){--}}
        {{--            if (response){--}}
        {{--                $('.mobile-bank-table').empty();--}}
        {{--                $.each(response, function (key, value) {--}}
        {{--                    $('.mobile-bank-table').prepend('<tr id="_mobile_bank_row_'+value.id+'"> ' +--}}
        {{--                        '<td>' +value.name+ '</td>' +--}}
        {{--                        '<td>' +value.account_no+ '</td>'+--}}
        {{--                        '<td> <a href="javascript:void(0)" data-id = "'+ value.id +'" onclick = "editMobileBankInfo(event.target)" class="btn btn-outline-info" > Edit </a>'+--}}
        {{--                        '<a href="javascript:void(0)" data-id = "' + value.id+'" onclick="deleteMobileBankInfo(event.target)" class="btn btn-outline-danger">Delete </a>' + '<td>' +--}}
        {{--                        '</tr>')--}}
        {{--                });--}}
        {{--            }--}}
        {{--        }--}}
        {{--    })--}}
        {{--}--}}

        function editMobileBankInfo(event){
            var id = $(event).data("id");
            if (id){
                $('#btn_text').text('Update');
            }
            $.ajax({
                url  : '{{ URL::route('mobile.bank.info.edit') }}/'+id,
                type : 'GET',
                success:function (response) {
                    if(response) {
                        $("#merchent_mobile_bank_info_id").val(response.id);
                        $("#mobile_bank_name").val(response.mobile_bank_name);
                        $("#account_no").val(response.account_no);
                        $("#mobile-bank-modal").modal('show');
                    }
                }
            });
        }
        function addMobileBankInfo(){
            $("#mobile-bank-modal").modal('show');
            $("#mobile_bank_name").val("");
            $("#account_no").val("");
            $('#btn_text').text('Save');
        }

        function cancelMerchantMobileBankInfoModal(){
            $("#mobile-bank-modal").modal('hide');
        }

        function createMerchantMobileBankInfo(){
            var id = $("#merchent_mobile_bank_info_id").val();
            var mobile_bank_name = $("#mobile_bank_name").val();
            var account_no = $("#account_no").val();
            var url = "{{ route('mobile.bank.info.store') }}";

            $.ajax({
                url: url,
                type:"POST",
                data: {
                    id: id,
                    mobile_bank_name: mobile_bank_name,
                    account_no: account_no,
                    _token: '{{ csrf_token() }}',
                },
                success:function (response){
                  if (response){
                      if (id){
                          $("#_mobile_bank_row_"+id+" td:nth-child(1)").html(response.mobile_bank_name);
                          $("#_mobile_bank_row_"+id+" td:nth-child(2)").html(response.account_no);
                      }
                      else {
                      $('.mobile-bank-table').prepend('<tr id="_mobile_bank_row_'+response.id+'" class="tr"> ' +
                          '<td class="center">' +response.mobile_bank_name+ '</td>' +
                          '<td class="center">' +response.account_no+ '</td>'+
                          '<td class="center"> <a href="javascript:void(0)" data-id = "'+ response.id +'" onclick = "editMobileBankInfo(event.target)" class="btn btn-info">Edit</a>'+ " " +
                          '<a href="javascript:void(0)" data-id = "' + response.id+'" onclick="deleteMobileBankInfo(event.target)" class="btn btn-danger">Delete </a>' + '<td>' +
                          '</tr>')

                  }

                  }

                    $("#mobile-bank-modal").modal('hide');

                }

            });
        }

        function deleteMobileBankInfo(event) {
            var id = $(event).data("id");
            // if (id){
            //     Swal.fire('Are You sure to delete this');
            //     return;
            // }
            $.ajax({
                url    : '{{ route('mobile.bank.info.destroy') }}',
                type   : 'POST',
                data   : {
                    id    : id,
                    _token : '{{ csrf_token() }}',
                },
                success: function (response) {
                    $("#_mobile_bank_row_"+id).remove();
                    // if (response.code == 200 ) {
                    //     Swal.fire('delete  successfully');
                    // }
                },
                error    : function (response) {
                    $('#titleError').text(response.responseJSON.errors.title);
                    $('#descriptionError').text(response.responseJSON.errors.description);
                }
            });
        }


    </script> <!-- Mobile Bank Info Script -->

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

    <script>
        $(document).ready(function(){
            $('#pick_up_type_id').val('{{ $merchent->pick_up_type_id }}')

            $("#profileImage").change( function () {
                $("#uploade_profile").text("Click to Update");
            })

        });
    </script>






@endpush
