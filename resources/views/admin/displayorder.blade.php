@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title">View Order</h4>

                        <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                            <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>Merchant Name</th>
                                <th>Phone</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $phone)
                                <tr>
                                    <td><b>#{{\App\Phone::find($phone->phone_id)->id}}</b></td>
                                    <td>
                                        <a href="javascript: void(0);">
                                            <span class="ml-2">{{ucwords(\App\User::find(\App\Phone::find($phone->phone_id)->user_id)->name)}}</span>
                                        </a>
                                    </td>

                                    <td>
                                        {{ucwords(\App\Data::find(\App\Phone::find($phone->phone_id)->data_id)->company." ".\App\Data::find(\App\Phone::find($phone->phone_id)->data_id)->model. " -".\App\Data::find(\App\Phone::find($phone->phone_id)->data_id)->storage."GB")}}
                                    </td>

                                    <td>
                                        ₹{{number_format(\App\Phone::find($phone->phone_id)->price,2)}}
                                    </td>
s
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