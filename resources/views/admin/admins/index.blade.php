@extends('layouts.admin')
@section('content')
<!-- .row -->
<div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">MANAGE Admins</div>
                            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal" data-target="#add-contact">Add Admin</button><br><br>
                            <div class="table-responsive">
                                <table class="table table-hover manage-u-table color-table info-table ">
                                    <thead>
                                        <tr>
                                            <th width="70" class="text-center">#</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            <th>ADDED</th>
                                            <th width="250">ROLE</th>
                                            <th width="300">MANAGE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=0; $i<10;$i++)
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td>Daniel Kristeen
                                                <br/><span class="text-muted">Texas, Unitedd states</span></td>
                                            <td>daniel@website.com
                                                <br/><span class="text-muted">999 - 444 - 555</span></td>
                                            <td>15 Mar 1988
                                                <br/><span class="text-muted">10: 55 AM</span></td>
                                            <td>
                                                <select class="form-control">
                                                    <option>Modulator</option>
                                                    <option>Admin</option>
                                                    <option>User</option>
                                                    <option>Subscriber</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-key"></i></button>
                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button>
                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                                            </td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->

                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel">Add Admin</h4> </div>
                                            <div class="modal-body">
                                                <from class="form-horizontal form-material">
                                                    <div class="form-group">
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" placeholder="Name"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" placeholder="Email"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" placeholder="Phone"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" placeholder="Password"> 
                                                        </div>
                                                        <div class="col-md-12 m-b-20">
                                                            <input type="text" class="form-control" placeholder="Confirm Password"> 
                                                        </div>
                                                        
                                                    </div>
                                                </from>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Save</button>
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
@endsection