@extends('layouts.dashboard')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">Models</h4>
                        <p class="text-muted font-14 m-b-30">
                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                        </p>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-12 text-sm-center form-inline">
                                    <div class="form-group mr-2">
                                        <a href="{{route('model.add')}}">
                                            <button id="demo-btn-addrow" class="btn btn-primary"><i class="mdi mdi-plus-circle mr-2"></i> Add Model</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @include('layouts.success')
                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Brand Name</th>
                                <th>Model Name</th>
                                <th>Storage</th>
                                <th>Price</th>
                                <th>Operations</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($phones as $phone)
                                <tr>
                                    <td>{{ucwords($phone->company)}}</td>
                                    <td>{{$phone->model}}</td>
                                    <td>{{$phone->storage}} GB</td>
                                    <td>₹ {{$phone->price}}</td>
                                    <td><a href="{{route('models.edit',[$phone->id])}}"><span class=" dripicons-document-edit"></span></a>&nbsp;&nbsp;&nbsp;<a href="{{route('models.delete',[$phone->id])}}"><span class=" dripicons-cross"></span></a> </td>
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