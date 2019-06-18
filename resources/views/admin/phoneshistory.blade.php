@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title"></h4>

                        <div class="text-center mt-4 mb-4">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box widget-flat border-custom bg-custom text-white">
                                        <i class="fi-tag"></i>
                                        <h3 class="m-b-10">{{($orders->isEmpty()) ? '0' : $orders[0]->sales}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">Total Orders</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box bg-primary widget-flat border-primary text-white">
                                        <i class="fi-archive"></i>
                                        <h3 class="m-b-10">{{($codAttempted->isEmpty()) ? '0' : $codAttempted[0]->sales}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">COD Attempted</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box widget-flat border-success bg-success text-white">
                                        <i class="fi-help"></i>
                                        <h3 class="m-b-10">{{($codSuccess->isEmpty()) ? '0' : $codSuccess[0]->sales}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">COD Successful</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="card-box bg-danger widget-flat border-danger text-white">
                                        <i class="fi-server"></i>
                                        <h3 class="m-b-10">{{($ccdcAttempted->isEmpty()) ? '0' :  $ccdcAttempted[0]->sales}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">CCDC Attempted</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-4">
                                    <div class="card-box widget-flat border-custom bg-custom text-white"  style="background-color: #8828a7 !important; border-color: #8828a7 !important;">
                                        <i class="fi-tag"></i>
                                        <h3 class="m-b-10">{{($ccdcSuccess->isEmpty()) ? '0' : $ccdcSuccess[0]->sales}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">CCDC Success</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4">
                                    <div class="card-box bg-primary widget-flat border-primary text-white"  style="background-color: #2bceb0 !important; border-color: #2bceb0 !important;">
                                        <i class="fi-archive"></i>
                                        <h3 class="m-b-10">{{($ccdcUP->isEmpty()) ? '0' : $ccdcUP[0]->sales}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">CCDC Under Process</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-4">
                                    <div class="card-box widget-flat border-success bg-success text-white"  style="background-color: #e28817 !important; border-color: #e28817 !important;">
                                        <i class="fi-help"></i>
                                        <h3 class="m-b-10">{{($ccdcAborted->isEmpty()) ? '0' : $ccdcAborted[0]->sales}}</h3>
                                        <p class="text-uppercase m-b-5 font-13 font-600">CCDC Aborted</p>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
@endsection