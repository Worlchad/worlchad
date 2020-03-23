@extends('layouts.admin')

@section('page_title')
Events
@endsection
@section('page_styles')
<link href="{{asset('/plugins/bower_components/datatables/media/css/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Events</h3>
                            <p class="text-muted m-b-30">Worlchad Events</p>
                            <div class="row"><a  href="{{route('events.create')}}" class="btn btn-info btn-rounded pull-right">Add new event</a></div><br>

                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Summary</th>
                                            <th>City</th>
                                            <th>Venue</th>
                                            <th>Attendees</th>
                                            <th>Start date</th>
                                            <th>End date</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($events as $event)
                                        <tr>
                                            <td>{{$event->name}}</td>
                                            <td>{{$event->description}}</td>
                                            <td>{{$event->city->name}}</td>
                                            <td>{{$event->venue}}</td>
                                            <td>27</td>
                                            <td>{{$event->start_date}}</td>
                                            <td>{{$event->end_date}}</td>
                                            <td>{{$event->category->name}}</td>
                                            <td>
                                                <a href="{{route('events.edit',$event->id)}}"><i class="btn btn-info btn-outline btn-circle fa fa-edit"></i></a>
                                                <a href="{{route('events.destroy',$event->id)}}"><i class="btn btn-danger btn-outline btn-circle fa fa-trash"></i></a>
                                                <a href="{{route('events.attendees',$event->id)}}"><i class="btn btn-info btn-outline btn-circle fa fa-users"></i></a>
                                                <a href="{{route('events.participant',$event->id)}}"><i class="btn btn-success btn-outline btn-circle fa fa-users"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <h3>No Events Available</h3>
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
