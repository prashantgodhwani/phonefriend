@extends('layouts.dashboard')

@section('content')
<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

    ?>
<!-- Start Page content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title">All Advertisements</h4>
                    <p class="text-muted font-14 m-b-30">
                        DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                    </p>

                    <!-- <table id="datatable" class="table table-bordered"> -->
                        <table id="multifilterDataTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Phone ID</th>
                                    <th>Image</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Storage</th>
                                    <th>Qty Available</th>
                                    <th>Price</th>
                                    <th>Color</th>
                                    <th>User Name</th>
                                    <th>Status</th>
                                    <th>Ratings</th>
                                    <th>Uploaded On</th>
                                    <th>Operations</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <th class="searchable">Phone ID</th>
                                    <th>Image</th>
                                    <th class="searchable">Brand</th>
                                    <th class="searchable">Model</th>
                                    <th class="searchable">Storage</th>
                                    <th class="searchable">Qty Available</th>
                                    <th class="searchable">Price</th>
                                    <th class="searchable">Color</th>
                                    <th class="searchable">User Name</th>
                                    <th class="searchable">Status</th>
                                    <th class="searchable">Ratings</th>
                                    <th>Uploaded On</th>
                                    <th>Operations</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($phones as $phone)
                                <tr>
                                    <td>#TT-0A{{$phone->id}}</td>
                                    <td><img style="width: 25px;" src="https://www.phonefriend.in/storage{{str_replace("public", "", $phone->dp)}}"> </td>
                                    <td>{{ucwords($phone->data->company)}}</td>
                                    <td>{{$phone->data->model}}</td>
                                    <td>{{$phone->data->storage}}GB</td>
                                    <td>{{$phone->units_rem}}<b> / {{$phone->units}}</b></td>
                                    <td>₹ {{ number_format($phone->price, 2) }}</td>
                                    <td>{{$phone->color}}</td>
                                    <td>{{$phone->user->name}}</td>
                                    <td>
                                        @if($phone->units_rem == 0 && $phone->sold!=2)
                                        <b><span style="color: green">SOLD</span></b>
                                        @elseif($phone->sold==2)
                                        <b><span style="color: darkred">REMOVED</span></b>
                                        @else
                                        <b><span style="color: darkblue">LIVE</span></b>
                                        @endif
                                    </td>
                                    <td>{{$phone->rating}}</td>
                                    <td>{{$phone->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($phone->units_rem != 0 && $phone->sold!=2)
                                        <a href="../../store/show/{{$phone->id}}/{{str_slug($phone->data->company." ".$phone->data->model." ".$phone->data->storage." GB", "-")}}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                        <a href="{{route('phone.delete',$phone->id)}}"><i class="fa fa-trash"></i></a>
                                        @elseif($phone->units_rem != 0 && $phone->sold == 2)
                                        <a href="{{route('phone.restore',$phone->id)}}"><i class="fa fa-history"></i></a>
                                        @else
                                        <a href="javascript:void(0)"><i class="fa fa-cros"></i>N.A.</a>
                                        @endif
                                    </td>
                                    <td>
                                        <form name="ratingForm" id="ratingForm" method="POST" action="{{route('phone.update',$phone->id)}}">
                                            {{csrf_field()}}
                                            <div class="form-group"> <input type="text" name="ratingPhone" id="ratingPhone" value="{{$phone->rating}}">
                                            </div>
											<div class="form-group">
											<label>Top Selling?</label>
											 <input type="radio" name="mostselling" value="Yes" <?php if($phone->mostselling == 'Yes')
											{ echo "checked"; }?>> Yes<br>
  <input type="radio" name="mostselling" value="No"> No<br>
											</div>
                                            <button type="submit"> update</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
            {{-- $phones->links('pagination.paginate2') --}}
            @stop

