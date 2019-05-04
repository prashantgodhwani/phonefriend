@extends('layouts.dashboard')

@section('content')
<style>
    #loading {
        display:block;
        position: absolute;
        left: 40%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: 0% 0 0 -75px;
        width: 120px;
        height: 120px;
    }
    #datatable {
        display:none;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <h4 class="header-title">Orders</h4>
                    <div id="loading">
                        <img src="https://flinngallery.com/wp-content/themes/greenwich-sage/assets/images/loader.gif">

                    </div>
                    <table class="table-responsive" cellspacing="0" width="100%" id="datatable">
                        <!--<table class="table-responsive table table-striped table-bordered" cellspacing="0" id="dataTablee" style="width:100%">-->
                            <thead style="display:table; width:100%;">
                                <tr>
                                    <th> ID </th>
                                    <th>Ordered By</th>
                                    <th>NOP</th>
                                    <th>Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Status</th>
                                    <th>Ordered On</th>
                                    <th class="hidden-sm">Action</th>
                                </tr>

                            </thead>

                            <tbody style="display:table; width:100%;">
                                @foreach($orders as $order)
                                <tr>
                                    <td><b>{{$order->id}}</b></td>

                                    <td>
                                        <a href="javascript: void(0);">
                                            <span class="ml-2">{{ucwords($order->deliver_fname." ".$order->deliver_lname)}}</span>
                                        </a>
                                    </td>
                                    <td><b>{{$order->nop}} items</b></td>
                                    <td>
                                        ₹ {{number_format($order->amount,2)}}
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);">
                                            {{strtoupper($order->payment_mode)}}
                                        </a>
                                    </td>

                                    <td>
                                        @if($order->order_status=="Success")
                                        <span class="badge badge-success">Success</span>
                                        @elseif($order->order_status=="Failure")
                                        <span class="badge badge-danger">Failure</span>
                                        @else
                                        <span class="badge badge-secondary">Under Process</span>
                                        @endif
                                    </td>

                                    <td>
                                        {{$order->created_at->toDayDateTimeString()}}
                                    </td>

                                    <td>
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('orders.order',$order->id)}}"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>View Order</a>
												
												
												<a class="dropdown-item tracklink" href="javascript:void(0)" data-toggle="modal" data-target="#trackModal" id="<?php echo $order->deliver_phone?>"><i class="fa fa-eye vertical-middle"></i> &nbsp; &nbsp;        Send Tracking Link</a>
												
												
												
                                                <a class="dropdown-item" href="{{route('orders.order',$order->id)}}"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Schedule Shipment</a>
                                                <a class="dropdown-item" href="{{route('orders.order',$order->id)}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Update Status</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- $orders->links('pagination.paginate2') --}}
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
<div id="trackModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send Tracking Link</h4>
      </div>
	  <form action="/admin/sendlink" method="post">
      <div class="modal-body">
	  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <input type="hidden" value="" id="mobileno" name="mobileno">
        <p>Enter Link: <input type="text" name="link" class="form-control"></p>
		<input type="submit" class="btn btn-success" value="Submit">
      </div>
	  </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    @endsection

@section('scripts')
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables/dataTables.keyTable.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script type="text/javascript">
     $(document).ready(function() {
        $('#datatable').DataTable({
            keys: true,
            dom: 'Bfrtip',
            "order": [[ 0, "desc" ]],
             buttons: [ {
                 extend: 'excel',
                 exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                    },
                    title: 'Orders Data export, PhoneFriend - ' + new Date()
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                    },
                    title: 'Orders Data export, PhoneFriend - ' + new Date()
                },
                'copy', 'print'
             ]
        });
      document.getElementById("loading").style.display = "none";
      document.getElementById("datatable").style.display = "block";
     });
     </script>

@endsection
	
