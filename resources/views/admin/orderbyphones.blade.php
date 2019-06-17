@extends('layouts.dashboard')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 m-b-30 header-title">View Detailed Orders </h4>
                        @include('layouts.error')
                        <form role="form" action="{{route('orders.date')}}" method="POST" class="form-inline">
                            {{csrf_field()}}
                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Start date</label>
                                <input type="date" name="startdt" class="form-control  col-md-12" id="exampleInputPassword1" placeholder="Start Date" >
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">End date</label>
                                <input type="date" name="enddt" class="form-control col-md-12" id="exampleInputPassword1" placeholder="End Date" >
                            </div>
                            <div class="form-group col-md-12" style="    margin-top: 2%;">
                                <button type="submit" class="btn btn-success col-md-12">Search Orders</button>
                            </div>
                        </form>
                        <hr>
                        @include('layouts.success')
                        @isset($orders)
                            @if($orders->count() > 0)
                                <div class="row" style=" margin-top: 6%;">
                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <h4 class="header-title">Orders between {{$start}} and {{$end}}</h4>

                                            <table class="table" id="datatable">
                                                <!--<table class="table-responsive table table-striped table-bordered" cellspacing="0" id="dataTablee" style="width:100%">-->
                                                <thead class="thead-dark">
                                                <tr>
                                                    <th>Phone</th>
                                                    <th>Quantity</th>
                                                    <th class="hidden-sm">Action</th>
                                                </tr>

                                                </thead>

                                                <tbody >
                                                @foreach($orders as $order)

                                                    <tr>
                                                        <td><b>{{ucwords(\App\Phone::find($order->phone_id)->data->company)}} {{ucwords(App\Phone::find($order->phone_id)->data->model)}} - {{App\Phone::find($order->phone_id)->data->storage}}GB</b></td>

                                                        <td>{{$order->sales}}</td>

                                                        <td>
                                                            <a href="javascript: void(0);">
                                                                View Sales
                                                            </a>
                                                        </td>


                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            {{-- $orders->links('pagination.paginate2') --}}
                                        </div>
                                    </div><!-- end col -->
                                </div>
                            @endif
                        @endisset

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
                            keys: true,
                            order: [[1, 'desc']]
                        });
                    });
                </script>

@endsection

