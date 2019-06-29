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
                                <div class="text-center mt-4 mb-4"  style=" margin-top: 6% !important; margin-bottom: 0">
                                    <h3 class="header-title" style="    font-size: 18px;
    text-align: left;
    padding-bottom: 2%;">Orders between <b>{{$start}}</b> and <b>{{$end}}</b></h3>

                                    <div class="row">
                                        <div class="col-xs-6 col-sm-4">
                                            <div class="card-box widget-flat border-custom bg-custom text-white" style="background-color: #4f88ef !important; border-color: #4f88ef !important;">
                                                <i class="fi-tag"></i>
                                                <h3 class="m-b-10">{{$totalDevices}}</h3>
                                                <p class="text-uppercase m-b-5 font-13 font-600">Total Devices</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4">
                                            <div class="card-box bg-primary widget-flat border-primary text-white" style="background-color: #8828a7 !important; border-color: #8828a7 !important;">
                                                <i class="fi-archive"></i>
                                                <h3 class="m-b-10">{{$iosDevice}}</h3>
                                                <p class="text-uppercase m-b-5 font-13 font-600">iOS Devices</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-4">
                                            <div class="card-box widget-flat border-success bg-success text-white" style="background-color: #e28817 !important; border-color: #e28817 !important;">
                                                <i class="fi-help"></i>
                                                <h3 class="m-b-10">{{$nonIosDevice}}</h3>
                                                <p class="text-uppercase m-b-5 font-13 font-600">Non iOS Devices</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box" style="padding-left: 0; padding-right: 0">

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
                                                        <td><b>{{ucwords(\App\Data::find($order->id)->company)}} {{ucwords(\App\Data::find($order->id)->model)}} - {{\App\Data::find($order->id)->storage}}GB</b></td>

                                                        <td>{{$order->sales}}</td>

                                                        <td>
                                                            <a href="date/phone/{{$order->id}}/{{$start}}/{{$end}}">
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

