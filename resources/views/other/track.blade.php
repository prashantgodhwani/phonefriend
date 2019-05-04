        <?php //dd($response->tracking_data); ?>
        @extends('layouts.other')

        @section('content')
        <style>html {
         scrollbar-face-color: #646464;
         scrollbar-base-color: #646464;
         scrollbar-3dlight-color: #646464;
         scrollbar-highlight-color: #646464;
         scrollbar-track-color: #000;
         scrollbar-arrow-color: #000;
         scrollbar-shadow-color: #646464;
         scrollbar-dark-shadow-color: #646464;
        }

        #style-default::-webkit-scrollbar { width: 8px; height: 3px;}
        #style-default::-webkit-scrollbar-button {  background-color: #666; }
        #style-default::-webkit-scrollbar-track {  background-color: #646464;}
        #style-default::-webkit-scrollbar-track-piece { background-color: #000;}
        #style-default::-webkit-scrollbar-thumb { height: 50px; background-color: #666; border-radius: 3px;}
        #style-default::-webkit-scrollbar-corner { background-color: #646464;}}
        #style-default::-webkit-resizer { background-color: #666;}
        .table-height.scroll-table {
         height: auto!important;
         max-height: 284px;
         overflow-y: auto;
        }
        .process-step .btn:focus{outline:none}
        .process{display:table;width:100%;position:relative}
        .process-row{display:table-row}
        .process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
        .process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
        .process-step{display:table-cell;text-align:center;position:relative}
        .process-step p{margin-top:4px}
        .btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}
       </style>
       <div class="site-content" tabindex="-1">
        <div class="container">


         <div id="primary" class="content-area">
          <main id="main" class="site-main">
           <article class="post-2508 page type-page status-publish hentry" id="post-2508">
            <div itemprop="mainContentOfPage" class="entry-content">

             <div class="vc_row-full-width vc_clearfix"></div>
             <div class="vc_row wpb_row vc_row-fluid" style="padding-top: 5%;">
              <div class="contact-form wpb_column vc_column_container vc_col-sm-12 col-sm-12" style=" padding-bottom: 5%">
               <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                 <div class="wpb_text_column wpb_content_element ">
                  <div class="wpb_wrapper">
                   <h2 class="contact-page-title">Track your order</h2>
                  </div>
                 </div>
                 <div lang="en-US" dir="ltr" id="wpcf7-f2507-p2508-o1" class="wpcf7 col-md-12" role="form">
                  <div class="screen-reader-response"></div>
                  <form class="wpcf7-form" method="post" action="{{route('track')}}">
                   {{csrf_field()}}
                   @include('layouts.error')
                   @include('layouts.success')
                   <div class="form-group row">
                    <div class="col-xs-9 col-md-9" style="padding-right: 0px;     padding-left: 0px">
                     <span class="wpcf7-form-control-wrap first-name"><input type="text" aria-invalid="false" aria-required="true" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required input-text" size="40" value="" name="awb" placeholder="Air Way Bill (AWB) Number"></span>
                    </div>
                    <div class="col-xs-2 col-md-2" style=" padding-left: 5px">

                     <input type="submit" value="Track">

                    </div>
                   </div>
                  </form>
                 </div>
                </div>
               </div>
               @if(isset($response))


               @if($response->tracking_data->track_status!=0)
               <br><br><hr><br><br>
<!-- 

               <div class="process">
                <div class="process-row nav nav-tabs">
                 <div class="process-step">
                  <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-rocket fa-lg"></i></button>
                  <p><small>Shipped </small></p>
                 </div>
                 
                 <div class="process-step">
                  <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-tasks fa-lg"></i></button>
                  <p><small>RTO <br />initiated</small></p>
                 </div>

                 <div class="process-step">
                  <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-check-square-o fa-lg"></i></button>
                  <p><small>RTO<br />Deliverd </small></p>
                 </div>

                </div>
               </div> -->


               <div class="col-sm-12">
                <h4>TRACKING UPDATE FOR <b>{{$response->tracking_data->shipment_track[0]->awb_code}}</b> : </h4>
                <ol class="track-progress">
                
                 <li class="@if($ship_stat >=1 ) done @else todo @endif" style="  height: 63%;">
                  <em>1</em>
                  <span>Shipped</span>
                 </li>
                 <li class="@if($ship_stat >=2 ) done @else todo @endif" style="  height: 63%;">
                  <em>2</em>
                  <span>In Transit</span>
                 </li>
                 <li class="@if($ship_stat >=3 ) done @else todo @endif" style="  height: 63%;">
                  <em>3</em>
                  <span>Out for Delivery
                  </span>
                 </li>
                 <li class="@if($ship_stat >=4 ) done @else todo @endif" style="  height: 63%;">
                  <em>4</em>
                  <span>DELIVERED</span>
                 </li>
                </ol>
               </div>


               <div class="col-md-6" style="padding-top: 5%">

                <div class="card">
                 <div class="card-header">
                  Shipment Summary
                 </div>
                 <div class="card-body">
                  <table class="table col-md-12">
                   <tbody>
                    <tr>
                     <th>Order Number</th>
                     <td> {{$response->tracking_data->shipment_track[0]->order_id}}</td>

                    </tr>
                    <tr>
                     <th>Pickup Date</th>
                     <td> {{$response->tracking_data->shipment_track[0]->pickup_date}}</td>

                    </tr>
                    
                    <tr>
                     <th>Current Status</th>
                     <td><span  @if($response->tracking_data->shipment_track[0]->current_status == 'Delivered')style="color:green; font-weight: bold"@endif>{{strtoupper($response->tracking_data->shipment_track[0]->current_status)}}</span></td>

                    </tr>
                    <tr>
                     <th>Date of Delivery<On></On></th>
                     <td>@if(isset($response->tracking_data->shipment_track[0]->delivered_date))<span>
                      @if($response->tracking_data->shipment_track[0]->delivered_date == "Information not available")

                      {{$response->tracking_data->shipment_track[0]->delivered_date}}
                      @else 
                      {{Carbon\Carbon::parse($response->tracking_data->shipment_track[0]->delivered_date)->toDayDateTimeString()}}
                      @endif
                     </span>
                     @else 
                     N.A. 
                     @endif
                    </td>

                   </tr>
                   <tr>
                    <th>Delivered To </th>
                    <td>@if(isset($response->tracking_data->shipment_track[0]->delivered_to))<span>{{$response->tracking_data->shipment_track[0]->delivered_to}}</span>@else N.A. @endif</td>

                   </tr>

                   <tr>
                    <th>Origin City</th>
                    <td> {{$response->tracking_data->shipment_track[0]->origin}}</td>
                    

                   </tr>

                  </tbody>
                 </table>

                </div>
               </div>
              </div>



              <div class="col-md-6" style="padding-top: 5%">

               <div class="card">
                <div class="card-header">
                 Shipment Details
                </div>
                <div class="card-body">
                 <table class="table col-md-12">
                  <tbody>
                   <tr>
                    <th>Number of Items</th>
                    <td> {{$response->tracking_data->shipment_track[0]->packages}}</td>

                   </tr>
                   <tr>
                    <th>Weight</th>
                    <td> {{$response->tracking_data->shipment_track[0]->weight}}</td>

                   </tr>
                   <tr>
                    <th>Received By</th>
                    <td> {{$response->tracking_data->shipment_track[0]->consignee_name}}</td>
                   </tr>

                   <tr>
                    <th>Destination City</th>
                    <td> {{$response->tracking_data->shipment_track[0]->destination}}</td>
                   </tr>


                   <tr>
                    <th>Shipment Type</th>
                    <td> {{$response->tracking_data->shipment_track[0]->shipment_type}}</td>
                   </tr>

                   <tr>
                    <th>Description</th>
                    <td> {{$response->tracking_data->shipment_track[0]->description}}</td>
                   </tr>


                  </tbody>
                 </table>

                </div>
               </div>
              </div>

              <div class="col-md-12"  style="padding-top: 5%; padding-right: 0px">
               <div class="table-responsive table-height scroll-table">
                <div class="card">
                 <div class="card-header">
                  Shipment History
                 </div>
                 <div class="card-body">
                  <table class="table table-striped table-hover">
                   <thead>
                    <tr>
                     <th width="33.33%" align="left">Location</th>
                     <th width="33.33%" align="left">Date</th>
                     <th width="33.33%" align="left">Activity</th>
                    </tr>
                   </thead>
                   <tbody>
                    @foreach($response->tracking_data->shipment_track_activities as $his)
                    <tr>
                     <td>{{$his->location}}</td>
                     <td>{{$his->date}}</td>
                     <td>{{$his->activity}}</td>
                    </tr>
                    @endforeach
                   </tbody>
                  </table>
                 </div>
                </div>
               </div>
              </div>


             </div>

            </div>
            <!-- /.panel -->
           </div>
           @else
           <div class="col-md-12" style="padding-top: 5%">
            <h5>Aahh! There is no activities found in our DB. Please have some patience it will be updated soon.</h5>
           </div>
           @endif
           @endif
          </div>


         </div>

        </div>
       </div>
      </article>
     </main><!-- #main -->
    </div><!-- #primary -->
   </div><!-- .container -->
  </div><!-- #content -->
  @endsection

  @section('scripts')

  <script
  src="https://code.jquery.com/jquery-2.2.4.js"
  ></script>
  @endsection




