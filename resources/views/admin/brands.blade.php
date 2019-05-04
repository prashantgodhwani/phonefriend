@extends('layouts.dashboard')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">Default Example</h4>
                        <p class="text-muted font-14 m-b-30">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                        </p>

                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Brand Name</th>
                                <th>Total Models</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($data as $brand)
                            <tr>
                                <td>{{ucwords($brand->company)}}</td>
                                <td>{{DB::table('data')->where('company',$brand->company)->count('model')}}</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
@stop

@section('scripts')
                <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
                <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
                <script src="{{asset('admin/plugins/datatables/dataTables.keyTable.min.js')}}"></script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#datatable').DataTable({
                            keys: true
                        });
                    });
                </script>

    @endsection