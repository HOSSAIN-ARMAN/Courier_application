@extends('admin.layouts.master')
@section('title','Request-Parcel')
@section('page-header')
    <i class="fa fa-list"></i> Request-Parcel
@stop

@push('css')

@endpush


@section('content')
    <div class="row padding table-responsive">
        <div class="col-md-12">
            <hr>
            <table id="simple-table" class="table  table-bordered table-hover responsive">
                <thead>
                <tr>
                    <th>Invoice-NO</th>
                    <th>Merchant Name</th>
                    <th>Status</th>
                    <th>Request Date</th>
                    <th>Details</th>
                    <th class="detail-col" style="width: 100px">Action</th>

                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>none</td>
                    <td>none</td>
                    <td>none</td>
                    <td>none</td>
                    <td>
                        <a>Show-Detail</a>
                    </td>
                    <td>
                        <a>cancel</a>
                    </td>
                </tr>

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

@endpush
