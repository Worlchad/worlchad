@extends('layouts.admin')

@section('page_title')
Attendees - {{$event->name}}
@endsection
@section('page_styles')
<link href="{{asset('/plugins/bower_components/datatables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Events</h3>
                            <p class="text-muted m-b-30">{{$event->name}} Events</p>

                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Picture</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>status</th>
                                            <th>Reference ID</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($event->participants as $participant)
                                        <tr>
                                        <td><img class="img-circle" src="{{asset('uploads/events/participants/'.$participant->image)}}" width="50" alt=""> </td>
                                            <td>{{$participant->first_name}}</td>
                                            <td>{{$participant->last_name}}</td>
                                            <td>{{$participant->email}}</td>
                                            <td>{{$participant->phone}}</td>
                                            <td>{{$participant->country->name}}</td>
                                            <td>{{$participant->state->name}}</td>
                                            <td>{{$participant->status}}</td>
                                            <td>{{$participant->reference_id}}</td>
                                            <td>

                                            </td>
                                        </tr>
                                    @empty
                                        <h3>No Participant yet</h3>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection


@section('page_scripts')
<!-- Custom Theme JavaScript -->
<script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/datatables/datatables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="{{asset('/plugins/bower_components/buttons/1.2.2/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/buttons/1.2.2/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/ajax/libs/jszip/2.5.0/jszip.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/buttons/1.2.2/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/plugins/bower_components/buttons/1.2.2/js/buttons.print.min.js')}}"></script>
    <!-- end - This is for export functionality only -->
    <script>
    $(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary m-r-10');
    </script>
@endsection
