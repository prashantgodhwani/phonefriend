@extends('layouts.dashboard')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-30 header-title">Edit Brand Details</h4>
@include('layouts.error')
                        <form role="form" action="{{route('models.edit',[$data->id])}}" method="POST">
                            {{csrf_field()}}
                            {{ method_field('PATCH') }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Brand Name</label>
                                <input type="text" name="company" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->company}}">
                                <small id="emailHelp" class="form-text text-muted">Keep every letter small of the company name.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Model Name</label>
                                <input type="text" name="model" class="form-control" id="exampleInputPassword1" placeholder="Model" value="{{$data->model}}">
                                <small id="emailHelp" class="form-text text-muted">Keep every letter exactly how you want to show.</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Storage</label>
                                <input type="text" name="storage" class="form-control" id="exampleInputPassword1" placeholder="Model" value="{{$data->storage}}">GB
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Model Price</label>
                                ₹  <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Model" value="{{$data->price}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Model Number</label>
                                <input type="text" name="modelno" class="form-control" id="exampleInputPassword1" placeholder="Model Number" value="{{$data->modelno}}">
                                <small id="emailHelp" class="form-text text-muted">Model Number</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit Phone Model</button>
                        </form>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
            @endsection