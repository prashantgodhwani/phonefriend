@extends('layouts.dashboard')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">All Merchants</h4>
                        <p class="text-muted font-14 m-b-30">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                        </p>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12 text-sm-center form-inline">
                                    <div class="form-group mr-2">
                                        <a href="{{route('merchant.add')}}">
                                        <button id="demo-btn-addrow" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i> Add Merchant</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="datatable" class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Merchant ID</th>
                                <th>Merchant Name</th>
                                <th>Merchant Email</th>
                                <th>Merchant Phone</th>
                                <th>Merchant Password</th>
                                <th>Live Phones / Orders </th>
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
                                    <td>{{$user->password}}</td>
                                      <td>  <img src="http://www.clker.com/cliparts/4/t/n/Q/b/d/green-glossy-icon-hi.png" style="width:13px">&nbsp;
                                        {{\App\Phone::where('user_id',$user->id)->where('sold',0)->count()}}
                                        &nbsp; &nbsp;
                                        <img src="http://images.all-free-download.com/images/graphiclarge/vector_black_background_shopping_cart_icon_280673.jpg" style="width:13px">
                                    {{\App\Order::where('user_id',$user->id)->count()}}
                                    </td>
                                    <td><a href="{{route('merchant.view',[$user->id])}}"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;<a href="{{route('merchant.edit',[$user->id])}}"><i class="fa fa-edit"></i></a>&nbsp; &nbsp;@if($user->banned==0)<a href="{{route('user.ban',[$user->id])}}"><i class="fa fa-ban"></i></a>@else<a href="{{route('user.unban',[$user->id])}}"><i class="fa fa-times" style="color: darkred;"></i></a>@endif &nbsp; &nbsp;<a href="{{route('merchant.delete',[$user->id])}}"><i class="fa fa-trash"></i></a>

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
                <script src="{{asset('admin/assets/js/jquery.doubleScroll.js')}}"></script>

                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#datatable').DataTable({
                            keys: true,
                            "bScrollCollapse": true,
                        });
                    });


                    $(document).ready(function() {
                        $('#datatable').doubleScroll();
                    });

                </script>



@endsection