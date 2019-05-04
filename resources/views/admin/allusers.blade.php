@extends('layouts.dashboard')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">All Users</h4>
                        <p class="text-muted font-14 m-b-30">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                        </p>



                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>User Phone</th>
                                <th>User Orders</th>
                                <th>Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>#PHONEFR-A1Z{{$user->id}}</td>
                                    <td>{{ucwords($user->name)}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td><img src="http://www.clker.com/cliparts/4/t/n/Q/b/d/green-glossy-icon-hi.png" style="width:13px">&nbsp;{{\App\Order::where('user_id',$user->id)->count()}}</td>
                                    <td><a href="{{route('user.history',[$user->id])}}"><i class="fa fa-history"></i></a> &nbsp;&nbsp; @if($user->banned==0)<a href="{{route('user.ban',[$user->id])}}"><i class="fa fa-ban"></i></a>@else<a href="{{route('user.unban',[$user->id])}}"><i class="fa fa-times" style="color: darkred;"></i></a>@endif
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