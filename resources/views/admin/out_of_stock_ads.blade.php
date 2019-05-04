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
                        <h4 class="header-title">Out Of Stock Advertisements</h4>
                        <div id="loading">
                            <img src="https://flinngallery.com/wp-content/themes/greenwich-sage/assets/images/loader.gif">

                        </div>
                        @include('layouts.success')
                        <table class="table-responsive table" cellspacing="0" width="100%" id="datatable">
                            <!--<table class="table-responsive table table-striped table-bordered" cellspacing="0" id="dataTablee" style="width:100%">-->
                            <thead style="display:table; width:100%;" class="thead-dark">
                            <tr>
                                <th> ID </th>
                                <th>Image</th>
                                <th>Phone</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th class="hidden-sm">Action</th>
                            </tr>

                            </thead>

                            <tbody style="display:table; width:100%;">
                            @foreach($phones as $phone)
                                <tr>
                                    <td><b>#TT-0A{{$phone->id}}</b></td>
                                    <td><img style="width: 60px;" src="https://www.phonefriend.in/storage{{str_replace("public", "", $phone->dp)}}"> </td>
                                    <td>{{ucwords($phone->data->company . " " . $phone->data->model . " - " . $phone->data->storage . " GB")}}</td>
                                    <td>@if(isset($phone->color)) {{$phone->color}} @else -- @endif</td>
                                    <td>₹ {{ number_format($phone->price, 2) }}</td>
                                    <td>
                                        <form name="quantityForm" id="quantityForm" method="POST" action="{{route('phone.update.stock',$phone->id)}}">
                                            {{csrf_field()}}

                                            <div class="form-row align-items-center">
                                                <div class="col-auto my-1">
                                                    <label class="sr-only" for="inlineFormInputName">Quantity</label>
                                                    <input type="number" class="form-control"  name="quantityAdvertisement" id="quantityAdvertisement" placeholder="Quantity" required>
                                                </div>
                                                <div class="col-auto my-1">
                                                    <button type="submit" class="btn btn-success">Increase Buffer</button>
                                                </div>
                                            </div>

                                        </form>
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
                        columns: [ 0,  2, 3, 4]
                    },
                    title: 'Out Of Stock Advertisements Data export, PhoneFriend - ' + new Date()
                },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [ 0,  2, 3, 4]
                        },
                        title: 'Out Of Stock Advertisements Data export, PhoneFriend - ' + new Date()
                    },
                    'copy', 'print'
                ]
            });
            document.getElementById("loading").style.display = "none";
            document.getElementById("datatable").style.display = "block";
        });
    </script>

@endsection

