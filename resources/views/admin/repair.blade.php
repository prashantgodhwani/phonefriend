@extends('layouts.dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h3 class="header-title">PHONEFRIEND REPAIR REQUESTS</h3>

                        


                        <table class="table table-hover m-0 tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">
                            <thead>
                            <tr>
                                <th>
                                    Sr. No.
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Description/Issue</th>
                                <th>City</th>
                            </tr>
                            </thead>

                            <tbody>
<?php $i=1;?>
                            @foreach($repair as $dt)
                                <tr>
                                   <td><b>#<?php echo $i++;?></b></td>
                                    <td><b>{{ucwords($dt->name)}}</b></td>
                                    <td><b>{{$dt->email}}</b></td>
                                    <td>{{$dt->mobile}}</td>
                                    <td width="25%">{{$dt->description}}</td>
									<td><?php if($dt->city==1)
									{
										echo "Delhi/NCR";
									}
									if($dt->city==2)
									{
										echo "Bangalore";
									}
									if($dt->city==3)
									{
										echo "Pune";
									}
									if($dt->city==4)
									{
										echo "Chennai";
									}
									if($dt->city==5)
									{
										echo "Hyderabad";
									}
									if($dt->city==6)
									{
										echo "Mumbai";
									}
									if($dt->city==7)
									{
										echo "Gurugram";
									}
									if($dt->city==8)
									{
										echo "Ghaziabad";
									}
									?></td>


                                    
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


