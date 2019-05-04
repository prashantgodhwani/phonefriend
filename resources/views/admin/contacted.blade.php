@extends('layouts.dashboard')

@section('content')
    <!-- Start Page content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">Contacted</h4>

                        <table id="datatable" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Contact ID</th>
                                <th>Contact Name</th>
                                <th>Contact Phone</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($contacts as $contact)
                                <tr>
                                    <td>#CONTACT-A1Z{{$contact->id}}</td>
                                    <td>{{ucwords($contact->fname." ".$contact->lname)}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{$contact->subject}}</td>
                                    <td>{{$contact->message}}</td>
                                    </td>
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