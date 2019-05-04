@extends('layouts.dashboard')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title">Offer Subscribers</h4>
                    <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($offer_subscribers as $offer_subscriber)
                        <tr>
                            <td>
                                <a href="javascript: void(0);">
                                    <span class="ml-2">{{ucwords($offer_subscriber->name)}}</span>
                                </a>
                            </td>
                            <td><b>{{$offer_subscriber->email}}</b></td>
                            <td><b>{{$offer_subscriber->mobile}}</b></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $offer_subscribers->links('pagination.paginate2') }}
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection