@extends('merchent.layouts.master')
@section('title','profile')
@section('page-header')
    <i class="fa fa-list"></i> Profile
@stop

@push('css')
    <style>
        #profile-upload{
            background-image:url('');
            background-size:cover;
            background-position: center;
            height: 250px; width: 250px;
            border: 1px solid #bbb;
            position:relative;
            border-radius:250px;
            overflow:hidden;
        }
        #profile-upload:hover input.upload{
            display:block;
        }
        #profile-upload:hover .hvr-profile-img{
            display:inline-block;
        }
        #profile-upload .fa{   margin: auto;
            position: absolute;
            bottom: -4px;
            left: 0;
            text-align: center;
            right: 0;
            padding: 6px;
            opacity:1;
            transition:opacity 1s linear;
            -webkit-transform: scale(.75);


        }
        #profile-upload:hover .fa{
            opacity:1;
            -webkit-transform: scale(1);
        }
        #profile-upload input.upload {
            z-index:1;
            left: 0;
            margin: 0;
            bottom: 0;
            top: 0;
            padding: 0;
            opacity: 0;
            outline: none;
            cursor: pointer;
            position: absolute;
            background:#ccc;
            width:100%;
            display:none;
        }

        #profile-upload .hvr-profile-img {
            width:100%;
            height:100%;
            display: none;
            position:absolute;
            vertical-align: middle;
            position: relative;
            background: transparent;
        }
        #profile-upload .fa:after {
            content: "";
            position:absolute;
            bottom:0; left:0;
            width:100%; height:0px;
            background:rgba(0,0,0,0.3);
            z-index:-1;
            transition: height 0.3s;
        }

        #profile-upload:hover .fa:after { height:100%; }

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
                            <a data-toggle="tab" href="#feed">
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
                                <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('merchent.Info.update') }}" method="post">
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
                                <div class="col-sm-6">

                                </div>

                            </div>
                        </div><!-- mobile Banking -->

                        <div id="friends" class="tab-pane">
                            <div class="profile-users clearfix">

                            </div>

                            <div class="hr hr10 hr-double"></div>

                            <ul class="pager pull-right">
                                <li class="previous disabled">
                                    <a href="#">&larr; Prev</a>
                                </li>

                                <li class="next">
                                    <a href="#">Next &rarr;</a>
                                </li>
                            </ul>
                        </div><!-- Bank-info -->

                        <div id="pictures" class="tab-pane"> <!-- change password-->
                            sdf
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

    <script>
        $(document).ready(function(){
            $('#pick_up_type_id').val('{{ $merchent->pick_up_type_id }}')

            $("#profileImage").change( function () {
                $("#uploade_profile").text("Click to Update");
            })

        });
    </script>





@endpush
