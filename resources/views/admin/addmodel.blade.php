@extends('layouts.dashboard')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="m-t-0 m-b-30 header-title">Add Model</h4>
                        @include('layouts.error')
                        <form role="form" action="{{route('model.store')}}" method="POST" >
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Brand</label>
                                <select name="company" id="company" class="form-control" name="company">
                                    <option value="apple">Apple</option>
                                    <option value="nokia">Nokia</option>
                                    <option value="micromax">Micromax</option>
                                    <option value="samsung">Samsung</option>
                                    <option value="motorola">Motorola</option>
                                    <option value="vivo">Vivo</option>
                                    <option value="oppo">Oppo</option>
                                    <option value="sony">Sony</option>
                                    <option value="oneplus">One Plus</option>
                                    <option value="mi">Mi</option>
                                    <option value="panasonic">Panasonic</option>
                                    <option value="blackberry">Blackberry</option>
                                    <option value="honor">Honor</option>
                                    <option value="google">Google</option>
                                    <option value="lenovo">Lenovo</option>
                                    <option value="gionee">Gionee</option>
                                    <option value="xolo">Xolo</option>
                                    <option value="htc">HTC</option>
                                    <option value="lava">Lava</option>
                                    <option value="lyf">Lyf</option>
                                    <option value="xiaomi">Xiaomi</option>
                                    <option value="lg">LG</option>
                                    <option value="xolo">Xolo</option>
                                    <option value="intex">Intex</option>
                                    <option value="karbonn">Karbonn</option>
                                        <option value="coolpad">Coolpad</option>
                                        <option value="asus">Asus</option>
                                        <option value="vertu">Vertu</option>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Company / Shop name.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Model Name</label>
                                <input type="text" name="model" class="form-control" id="exampleInputPassword1" placeholder="Model" >
                                <small id="emailHelp" class="form-text text-muted">Model Name</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Storage</label>
                                <input type="text" name="storage" class="form-control" id="exampleInputPassword1" placeholder="Storage" >GB
                                <small id="emailHelp" class="form-text text-muted">Storage</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Price</label>
                                <input type="text" name="price" class="form-control" id="exampleInputPassword1" placeholder="Price" >
                                <small id="emailHelp" class="form-text text-muted">Price</small>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Model Number</label>
                                <input type="text" name="modelno" class="form-control" id="exampleInputPassword1" placeholder="Model" >
                                <small id="emailHelp" class="form-text text-muted">Model Number</small>
                            </div>


                            <button type="submit" class="btn btn-primary">Add Model</button>
                        </form>
                    </div>
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
