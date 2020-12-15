@extends('merchent.layouts.master')
@section('title','DashBoard')
@section('page-header')
    <i class="fa fa-list"></i> DashBoard
@stop

@push('css')

@endpush

@section('content')
    {{--    @include('merchent.components.page_header', [--}}
    {{--       'fa' => 'fa fa-pencil',--}}
    {{--       'name' => 'Create Category',--}}
    {{--       'route' => route('parcel.index')--}}
    {{--    ])--}}

   <div class="container-fluid" >
       <div class="row padding">
           <div class="col-sm-3">
               <div class="card-deck" style="background: #385d7a">
                   <div class="card thumbnail">
                       <div class="card-body">
                           <img src="https://portal.gontobbocourier.com/images/icon/placed.png" height="50px" alt="" style="float: right">
                           <h5 class="card-title">0</h5>
                           <p class="card-text"><small class="text-muted"><b>Todays Created</b></small></p>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-sm-3">
               <div class="card-deck" style="background: #385d7a">
                   <div class="card thumbnail">
                       <div class="card-body">
                           <img src="https://portal.gontobbocourier.com/images/icon/delivered.png" height="50px" alt="" style="float: right">
                           <h5 class="card-title">0</h5>
                           <p class="card-text"><small class="text-muted"><b>Todays Delivered</b></small></p>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-sm-3">
               <div class="card-deck" style="background: #385d7a">
                   <div class="card thumbnail">
                       <div class="card-body">
                           <img src="https://portal.gontobbocourier.com/images/icon/returned.png" height="50px" alt="" style="float: right">
                           <h5 class="card-title">0</h5>
                           <p class="card-text"><small class="text-muted"><b>Todays Returned</b></small></p>
                       </div>
                   </div>
               </div>
           </div>
           <div class="col-sm-3">
               <div class="card-deck" style="background: #385d7a">
                   <div class="card thumbnail">
                       <div class="card-body">
                           <img src="https://portal.gontobbocourier.com/images/icon/transit.png" height="50px" alt="" style="float: right">
                           <h5 class="card-title">0</h5>
                           <p class="card-text"><small class="text-muted"><b>Total Pending</b></small></p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

    <div class="row">
        <div class="widget-main padding-4">
            <div id="sales-charts"></div>
        </div><!-- /.widget-main -->
    </div><!-- /.row -->
    <br>
    <hr>
    <div class="container-fluid">
        <div class="row padding">
            <div class="col-sm-3">
                <div class="card-deck">
                    <div class="card thumbnail" style="background: black">
                        <div class="card-body">
                            <img src="https://portal.gontobbocourier.com/images/icon/sales.png" height="50px" alt="" style="float: right">
                            <h5 class="card-title" style="color: white">BDT. 0.00</h5>
                            <p class="card-text" style="color: white"><small class="text-muted"><b>Total Collection</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card-deck">
                    <div class="card thumbnail" style="background: black">
                        <div class="card-body">
                            <img src="https://portal.gontobbocourier.com/images/icon/fee.png" height="50px" alt="" style="float: right">
                            <h5 class="card-title" style="color: white">BDT. 0.00</h5>
                            <p class="card-text" style="color: white"><small class="text-muted"><b>Total Price</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card-deck">
                    <div class="card thumbnail" style="background: black">
                        <div class="card-body">
                            <img src="https://portal.gontobbocourier.com/images/icon/paid.png" height="50px" alt="" style="float: right">
                            <h5 class="card-title" style="color: white">BDT. 0.00</h5>
                            <p class="card-text" style="color: white"><small class="text-muted"><b>Total Fee</b></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card-deck">
                    <div class="card thumbnail" style="background: black">
                        <div class="card-body">
                            <img src="https://portal.gontobbocourier.com/images/icon/unpaid.png" height="50px" alt="" style="float: right">
                            <h5 class="card-title" style="color: white">BDT. 0.00</h5>
                            <p class="card-text" style="color: white"><small class="text-muted"><b>Total Discount</b></small></p>
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






{{--    this all script for pi chart--}}
    <script src="assets/js/jquery.flot.min.js"></script>
    <script src="assets/js/jquery.flot.resize.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $.resize.throttleWindow = false;

            var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
            var data = [
                { label: "social networks",  data: 38.7, color: "#68BC31"},
                { label: "search engines",  data: 24.5, color: "#2091CF"},
                { label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
                { label: "direct traffic",  data: 18.6, color: "#DA5430"},
                { label: "other",  data: 10, color: "#FEE074"}
            ]
            function drawPieChart(placeholder, data, position) {
                $.plot(placeholder, data, {
                    series: {
                        pie: {
                            show: true,
                            tilt:0.8,
                            highlight: {
                                opacity: 0.25
                            },
                            stroke: {
                                color: '#fff',
                                width: 2
                            },
                            startAngle: 2
                        }
                    },
                    legend: {
                        show: true,
                        position: position || "ne",
                        labelBoxBorderColor: null,
                        margin:[-30,15]
                    }
                    ,
                    grid: {
                        hoverable: true,
                        clickable: true
                    }
                })
            }


            placeholder.data('chart', data);
            placeholder.data('draw', drawPieChart);


            var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
            var previousPoint = null;

            placeholder.on('plothover', function (event, pos, item) {
                if(item) {
                    if (previousPoint != item.seriesIndex) {
                        previousPoint = item.seriesIndex;
                        var tip = item.series['label'] + " : " + item.series['percent']+'%';
                        $tooltip.show().children(0).text(tip);
                    }
                    $tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
                } else {
                    $tooltip.hide();
                    previousPoint = null;
                }

            });

            $(document).one('ajaxloadstart.page', function(e) {
                $tooltip.remove();
            });




            var d1 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d1.push([i, Math.sin(i)]);
            }

            var d2 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.5) {
                d2.push([i, Math.cos(i)]);
            }

            var d3 = [];
            for (var i = 0; i < Math.PI * 2; i += 0.2) {
                d3.push([i, Math.tan(i)]);
            }


            var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
            $.plot("#sales-charts", [
                { label: "Domains", data: d1 },
                { label: "Hosting", data: d2 },
                { label: "Services", data: d3 }
            ], {
                hoverable: true,
                shadowSize: 0,
                series: {
                    lines: { show: true },
                    points: { show: true }
                },
                xaxis: {
                    tickLength: 0
                },
                yaxis: {
                    ticks: 10,
                    min: -2,
                    max: 2,
                    tickDecimals: 3
                },
                grid: {
                    backgroundColor: { colors: [ "#fff", "#fff" ] },
                    borderWidth: 1,
                    borderColor:'#555'
                }
            });

        })
    </script>

@endpush

