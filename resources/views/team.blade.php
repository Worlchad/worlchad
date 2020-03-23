@extends('layouts.app')
@section('page_styles')
   <style>
       .team-member p {
        padding: 0px ;
        margin: 0;
        font-size: 14px;
    }
        .team-member div:last-child {
            border-top: 1px solid #cccccc;
            padding-top: 1%;
        }
   </style>
@endsection
@section('content')
    <section class="container-fluid">
            <div class="container team bg-primary text-white">
            <h2>{{$team->name}}</h2>
            <h5>{{$team->address}}</h5>
            <h5>{{$team->phone_number}}</h5>
            </div>
            <div class="container team-members">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addMemberModal">
                          Add Member
                        </button>
                        <br>
                    </div>
                </div>
                <div class="container">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                        <p>{{session()->get('message')}}</p>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                        <p>{{session()->get('error')}}</p>
                        </div>
                    @endif
                </div>
                <div class="row">
                    @forelse ($team->members as $member)
                    <div class="col-md-3">
                        <div class="card team-member" style="width: 100%; margin:2rem">
                        <img class="card-img-top" src="{{$member->image?$member->image:'https://placehold.it/126x80?text=image'}}" alt="Card image cap" style="height:200px">
                            <div class="card-body">
                                <p class="card-text"><strong class="text-primary">Name:</strong>  {{$member->full_name}}</p>
                                <p class="card-text"><strong class="text-primary">Gender:</strong>  {{$member->gender}}</p>
                                <p class="card-text"><strong class="text-primary">Date of birth:</strong>  {{$member->dob}}</p>
                                <p class="card-text"><strong class="text-primary">position:</strong>  {{$member->position}}</p>
                                <div>
                                <form style="display:inline-block" action="{{route('events.sport.members.delete',['team_id'=>$team->id,'id'=>$member->id])}}" method="post">
                                    @method('delete')
                                    @csrf
                                            <button class="btn btn-danger" style="padding: 0.2em 0.5em"><i class="fa fa-trash text-white"></i></button>
                                    </form>
                                <form action="" style="display:inline-block">
                                <a href="{{route('events.sports.member.print',['team_id'=>$team->id,'id'=>$member->id])}}" class="btn btn-primary" style="padding: 0 0.5em"><i class="fa fa-print text-white"></i></a>

                                </form>
                                </div>
                            </div> 

                        </div>
                    </div>
                    @empty
                      <div class="col-md-12">
                            <h3>No Team Member Added yet</h3>
                        </div>  
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('events.sports.members.print',['team_id'=>$team->id])}}" class="btn btn-primary pull-right"><i class="fa fa-print text-white"></i> Print Members Sheet</a>
                    </div>
                </div>
            </div>
            
    </section>
    <!-- Modal -->
<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addMemberModalLabel">New Member</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="{{route('events.sport.members.store',$team->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
        <input type="hidden" name="team_id" value="{{$team->id}}">

                  <div class="form-group">
                      <label for="">First Name</label>
                      <input type="text" class="form-control" name="first_name">
                  </div>
                  <div class="form-group">
                      <label for="">Middle Name</label>
                      <input type="text" class="form-control" name="middle_name">
                  </div>
                  <div class="form-group">
                      <label for="">Last Name</label>
                      <input type="text" class="form-control" name="last_name">
                  </div>
                  <div class="form-group">
                      <label for="">Gender</label>
                      <select name="gender" id="" class="form-control" >
                          <option value="male">Male</option>
                          <option value="female">female</option>
                      </select>
                  </div>
                  <div class="form-group">
                        <label for="">Date of Birth</label>
                        <input type="date" class="form-control" name="dob">
                    </div>
                  <div class="form-group">
                      <label for="">Position</label>
                      <input type="text" class="form-control" name="position">
                  </div>
                  <div class="form-group">
                        <label for="">Photo</label>
                        <input type="file" class="form-control" name="photo">
                </div>
                <br>
                <button class="btn btn-primary">Add</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection