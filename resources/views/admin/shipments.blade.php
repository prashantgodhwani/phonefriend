@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title">SHIPMENTS</h4>

                        <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                            <thead>
                            <tr>
                                <th>
                                    Shipment ID
                                </th>
                                <th>Order ID</th>
                                <th>Product Name</th>
                                <th>AWB</th>
                                <th>Payment Mode</th>
                                <th>Status</th>
                                <th>Shipment Created On</th>
                                <th class="hidden-sm">Action</th>
                            </tr>
                            </thead>

                            <tbody>



                                @foreach($responses['data'] as $response)

                                <tr>
                                    <td><b># @if(isset($response['id']))
                                                {{$response['id']}}
                                            @endif</b></td>

                                    <td>
                                        # @if(isset($response['order_id']))
                                            {{$response['order_id']}}
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($response['awb']))
                                            {{$response['awb']}}
                                        @endif
                                    </td>

                                    <td>
                                        <a href="javascript: void(0);">
                                            @if(isset($response['payment_method']))
                                                {{$response['payment_method']}}
                                            @endif
                                        </a>
                                    </td>

                                    <td>
                                        @if(isset($response['status']) && $response['status']=="Success")
                                            <span class="badge badge-success">Success</span>
                                        @elseif(isset($response['status']) &&  $response['status']=="Failure")
                                            <span class="badge badge-danger">Failure</span>
                                        @else
                                            <span class="badge badge-secondary"> @if(isset($response['status']))
                                                    {{$response['status']}}
                                                @endif</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if(isset($response['created_at']))
                                            {{$response['created_at']}}
                                        @endif
                                    </td>


                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection