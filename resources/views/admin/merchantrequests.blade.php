@extends('layouts.dashboard')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title"> Merchants Requests</h4>

                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Merchant Name</th>
                                <th>Merchant Email</th>
                                <th>Merchant Phone</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>#REQUEST-A1Z{{$user->id}}</td>
                                    <td>{{ucwords($user->mname)}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>

                                    </td>
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