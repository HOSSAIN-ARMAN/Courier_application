@extends('merchent.layouts.master')
@section('title','Parcel Details')
@section('page-header')
    <i class="fa fa-list"></i> Parcel Details
@stop

@push('css')

@endpush


@section('content')


    <div class="row padding table-responsive">
        <div class="col-md-12">
            <hr>
            <div class="row padding">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label no-padding-right" for="Status"><b>---Status---</b></label>
                        <select class="form-control" name="parcel_type_id" id="parcel_area" onchange="top.location.href=this.options[this.selectedIndex]">
                            <option value="-1">--select--</option>
                            <option value="{{ route('show.parcel.details') }}">All</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <label class="control-label no-padding-right" for="Status"><b>---------Create Date----------</b></label>
                    <div class="row padding">
                        <div class="col-md-6">
                            <label class="col-md-3 control-label">Start:</label>
                            <div class="col-md-3">
                                <input type="Date"  id="date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-3 control-label">End:</label>
                            <div class="col-md-3">
                                <input type="Date"  id="date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <label class="control-label no-padding-right" for="Status"><b>---------Delivery Date----------</b></label>
                    <div class="row padding">
                        <div class="col-md-6">
                            <label class="col-md-3 control-label">Start:</label>
                            <div class="col-md-3">
                                <input type="Date"  id="date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="col-md-3 control-label">End:</label>
                            <div class="col-md-3">
                                <input type="Date"  id="date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <table id="simple-table" class="table  table-bordered table-hover responsive">
                <thead>
                <tr>
                    <th>Invoice-NO</th>
                    <th >Status</th>
                    <th>Pick-Up Person</th>
                    <th>Delivery Person</th>
                    <th>Create Date</th>
                    <th>Delivery Date</th>
                    <th class="detail-col" style="width: 100px">Action</th>

                </tr>
                </thead>

                <tbody>

              @foreach($parceles as $parcel)
                <tr>
                    <td>{{ $parcel->invoice_no }}</td>
                    <td><span class="label label-sm label-success">{{ $parcel->status == 0 ? 'Pandding' : 'Approved' }}</span></td>
                    <td>none</td>
                    <td>none</td>
                    <td>{{ $parcel->created_at }}</td>
                    <td>
{{--                        none {{ dd($parcel->Customer->customer_name ) }}--}}
                    </td>

                    <td>
                        <div class="action-buttons">
                            <a href="#" class="green bigger-140 show-details-btn" title="Show Details">
                                <i class="ace-icon fa fa-angle-double-down"></i>
                                <span class="sr-only">Details</span>
                            </a>
                            <a href="#" class="green bigger-140 show-parcel-location-btn" title="Show Details">
                                <i class="fa fa-truck" aria-hidden="true"></i>
                                <span class="sr-only">Parcel location</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr class="detail-row">
                    <td colspan="8">
                        <div class="table-detail">
                            <div class="row">
                                <div class="col-md-12 com-sm-2">
                                    <!--this for customer profile -->
                                    <div class="col-md-6 col-sm-2">
                                        <div class="text-center">
                                            <img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="{{ asset('assets/images/avatars/profile-pic.jpg') }}" />
                                            <br />
                                            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right" style="background: #385d7a">
                                                <div class="inline position-relative">
                                                    <a class="user-title-label" href="#">
                                                        <i class="ace-icon fa fa-circle light-green"></i>

                                                        <span class="white">Customer Name : <b>{{ $parcel->customer_name }}</b></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--this for customer info-->
                                    <br>
                                    <br>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="space visible-xs"></div>

                                        <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Location </div>

                                                <div class="profile-info-value">
                                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                    <span>{{ $parcel->deliveryZoneName }}</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Contact </div>

                                                <div class="profile-info-value">
                                                    <span>{{ $parcel->customer_contact }}</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Address </div>

                                                <div class="profile-info-value">
                                                    <span>{{ $parcel->customer_address }}</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Comment </div>

                                                <div class="profile-info-value">
                                                    <span>none</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 com-sm-2">
                                    <hr>
                                    <hr>
                                </div>
                                <div class="col-md-12 com-sm-2">
                                    <!--this for Merchent profile-->
                                    <div class="col-md-6 col-sm-2">
                                        <div class="text-center">
                                            <img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="{{ asset('assets/images/avatars/profile-pic.jpg') }}" />
                                            <br />
                                            <div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right" style="background: black">
                                                <div class="inline position-relative">
                                                    <a class="user-title-label" href="#">
                                                        <i class="ace-icon fa fa-circle light-green"></i>

                                                        <span class="white">Merchent Name : <b>{{ $parcel->merchent_name}}</b></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--this for Merchent info-->
                                    <div class="col-md-6 col-sm-6">
                                        <div class="space visible-xs"></div>

                                        <div class="profile-user-info profile-user-info-striped">
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Parcel Invoice </div>

                                                <div class="profile-info-value">
                                                    <span>{{ $parcel->invoice_no }}</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name">Parcel Creating Location </div>

                                                <div class="profile-info-value">
                                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                                    <span>{{ $parcel->parcelTypeName ? $parcel->parcelTypeName : 'Out-Side of Dhaka' }}</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Shop Name </div>

                                                <div class="profile-info-value">
                                                    <span>69 bazar</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Pick-Up Person Number </div>

                                                <div class="profile-info-value">
                                                    <span>none</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Pick-Up Zone </div>

                                                <div class="profile-info-value">
                                                    <span>{{ $parcel->pickUpZoneName }}</span>
                                                </div>
                                            </div>

                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Pick-Up Address </div>
                                                <div class="profile-info-value">
                                                    <span>{{ $parcel->pick_up_address }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Delivery Person </div>
                                                <div class="profile-info-value">
                                                    <span>None</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Delivery Date </div>
                                                <div class="profile-info-value">
                                                    <span>None</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Parcel Weight </div>
                                                <div class="profile-info-value">
                                                    <span>{{ $parcel->weight }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> Product Price </div>
                                                <div class="profile-info-value">
                                                    <span>{{ $parcel->price }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name"> COD Charge </div>
                                                <div class="profile-info-value">
                                                    <span>{{ $parcel->cod_charge }}</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">Service Charge </div>
                                                <div class="profile-info-value">
                                                    <span>none</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">Discount </div>
                                                <div class="profile-info-value">
                                                    <span>None</span>
                                                </div>
                                            </div>
                                            <div class="profile-info-row">
                                                <div class="profile-info-name">Collection Ammount </div>
                                                <div class="profile-info-value">
                                                    <span>{{ $parcel->amount }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </td>
                </tr>
              @endforeach

                </tbody>
            </table>
        </div><!-- /.span -->
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

        $('.show-details-btn').on('click', function(e) {
            e.preventDefault();
            $(this).closest('tr').next().toggleClass('open');
            $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });






        // jQuery(function($) {
        //     //initiate dataTables plugin
        //     var myTable =
        //         $('#dynamic-table')
        //             //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        //             .DataTable( {
        //                 bAutoWidth: false,
        //                 "aoColumns": [
        //                     { "bSortable": false },
        //                     null, null,null, null, null,
        //                     { "bSortable": false }
        //                 ],
        //                 "aaSorting": [],
        //
        //
        //                 //"bProcessing": true,
        //                 //"bServerSide": true,
        //                 //"sAjaxSource": "http://127.0.0.1/table.php"	,
        //
        //                 //,
        //                 //"sScrollY": "200px",
        //                 //"bPaginate": false,
        //
        //                 //"sScrollX": "100%",
        //                 //"sScrollXInner": "120%",
        //                 //"bScrollCollapse": true,
        //                 //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
        //                 //you may want to wrap the table inside a "div.dataTables_borderWrap" element
        //
        //                 //"iDisplayLength": 50
        //
        //
        //                 select: {
        //                     style: 'multi'
        //                 }
        //             } );
        //
        //
        //
        //     $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
        //
        //     new $.fn.dataTable.Buttons( myTable, {
        //         buttons: [
        //             {
        //                 "extend": "colvis",
        //                 "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
        //                 "className": "btn btn-white btn-primary btn-bold",
        //                 columns: ':not(:first):not(:last)'
        //             },
        //             {
        //                 "extend": "copy",
        //                 "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
        //                 "className": "btn btn-white btn-primary btn-bold"
        //             },
        //             {
        //                 "extend": "csv",
        //                 "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
        //                 "className": "btn btn-white btn-primary btn-bold"
        //             },
        //             {
        //                 "extend": "excel",
        //                 "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
        //                 "className": "btn btn-white btn-primary btn-bold"
        //             },
        //             {
        //                 "extend": "pdf",
        //                 "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
        //                 "className": "btn btn-white btn-primary btn-bold"
        //             },
        //             {
        //                 "extend": "print",
        //                 "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
        //                 "className": "btn btn-white btn-primary btn-bold",
        //                 autoPrint: false,
        //                 message: 'This print was produced using the Print button for DataTables'
        //             }
        //         ]
        //     } );
        //     myTable.buttons().container().appendTo( $('.tableTools-container') );
        //
        //     //style the message box
        //     var defaultCopyAction = myTable.button(1).action();
        //     myTable.button(1).action(function (e, dt, button, config) {
        //         defaultCopyAction(e, dt, button, config);
        //         $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
        //     });
        //
        //
        //     var defaultColvisAction = myTable.button(0).action();
        //     myTable.button(0).action(function (e, dt, button, config) {
        //
        //         defaultColvisAction(e, dt, button, config);
        //
        //
        //         if($('.dt-button-collection > .dropdown-menu').length == 0) {
        //             $('.dt-button-collection')
        //                 .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
        //                 .find('a').attr('href', '#').wrap("<li />")
        //         }
        //         $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
        //     });
        //
        //     ////
        //
        //     setTimeout(function() {
        //         $($('.tableTools-container')).find('a.dt-button').each(function() {
        //             var div = $(this).find(' > div').first();
        //             if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
        //             else $(this).tooltip({container: 'body', title: $(this).text()});
        //         });
        //     }, 500);
        //
        //
        //
        //
        //
        //     myTable.on( 'select', function ( e, dt, type, index ) {
        //         if ( type === 'row' ) {
        //             $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
        //         }
        //     } );
        //     myTable.on( 'deselect', function ( e, dt, type, index ) {
        //         if ( type === 'row' ) {
        //             $( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
        //         }
        //     } );
        //
        //
        //
        //
        //     /////////////////////////////////
        //     //table checkboxes
        //     $('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
        //
        //     //select/deselect all rows according to table header checkbox
        //     $('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
        //         var th_checked = this.checked;//checkbox inside "TH" table header
        //
        //         $('#dynamic-table').find('tbody > tr').each(function(){
        //             var row = this;
        //             if(th_checked) myTable.row(row).select();
        //             else  myTable.row(row).deselect();
        //         });
        //     });
        //
        //     //select/deselect a row when the checkbox is checked/unchecked
        //     $('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
        //         var row = $(this).closest('tr').get(0);
        //         if(this.checked) myTable.row(row).deselect();
        //         else myTable.row(row).select();
        //     });
        //
        //
        //
        //     $(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
        //         e.stopImmediatePropagation();
        //         e.stopPropagation();
        //         e.preventDefault();
        //     });
        //
        //
        //
        //     //And for the first simple table, which doesn't have TableTools or dataTables
        //     //select/deselect all rows according to table header checkbox
        //     var active_class = 'active';
        //     $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
        //         var th_checked = this.checked;//checkbox inside "TH" table header
        //
        //         $(this).closest('table').find('tbody > tr').each(function(){
        //             var row = this;
        //             if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
        //             else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
        //         });
        //     });
        //
        //     //select/deselect a row when the checkbox is checked/unchecked
        //     $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
        //         var $row = $(this).closest('tr');
        //         if($row.is('.detail-row ')) return;
        //         if(this.checked) $row.addClass(active_class);
        //         else $row.removeClass(active_class);
        //     });
        //
        //
        //
        //
        //     /********************************/
        //     //add tooltip for small view action buttons in dropdown menu
        //     $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        //
        //     //tooltip placement on right or left
        //     function tooltip_placement(context, source) {
        //         var $source = $(source);
        //         var $parent = $source.closest('table')
        //         var off1 = $parent.offset();
        //         var w1 = $parent.width();
        //
        //         var off2 = $source.offset();
        //         //var w2 = $source.width();
        //
        //         if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
        //         return 'left';
        //     }
        //
        //
        //
        //
        //     /***************/
        //     // $('.show-details-btn').on('click', function(e) {
        //     //     e.preventDefault();
        //     //     $(this).closest('tr').next().toggleClass('open');
        //     //     $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        //     // });
        //     $('.show-details-btn').on('click', function(e) {
        //         alert('ok');
        //         e.preventDefault();
        //         $(this).closest('tr').next().toggleClass('open');
        //         $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        //     });
        //     /***************/
        //
        //
        //
        //
        //
        //     /**
        //      //add horizontal scrollbars to a simple table
        //      $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
        //      {
		// 			horizontal: true,
		// 			styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
		// 			size: 2000,
		// 			mouseWheelLock: true
		// 		  }
        //      ).css('padding-top', '12px');
        //      */
        //
        //
        // })


    </script>
@endpush
