@extends('layouts.admin')
@section('users') active @stop
@section('header')
{{-- summer note --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@stop
@section('users_page') active @stop
@section('content') 
  <div class="app-title">
      <div>
          <h1>
              <i class="fa fa-user"></i> Speakers</h1>
      </div>
      <div class="tile-title-w-btn" style="margin-top:16px;">
        <button class="btn btn-primary icon-btn" data-toggle="modal" data-target="#newSpaeker"><i class="fa fa-plus"></i>Add New</button>
    </div>
  </div> 

  <div class="tile">
    <div class="tile-body">
        @include('partials.alerts')
      <div class="table-responsive">
          <table class="table table-hover table-bordered " id="sampleTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Location</th>
                  <th>Experise</th>
                  <th>Available</th>
                  <th>Approval</th>
                  <th>Action</th>
                </tr>
              </thead>
				      <tbody>
                    @foreach($speakers as $speaker)
                      <tr>
                          <td>{{$speaker->name}}</td>
                          <td>{{$speaker->email}}</td>
                          <td>{{$speaker->phone}}</td>
                          <td>{{$speaker->location}}</td>
                          <td>{{$speaker->expertise}}</td>
                          <td>{!!$speaker->available > 0? '<p style="color:green">Yes</p>': '<p style="color:red">No</p>'!!}</td>
                          <td>{!!$speaker->approved > 0? '<p style="color:green">Yes</p>': '<p style="color:red">No</p>'!!}</td>
                          <td>
                              <div class="btn-group pull-right" role="group">
                                <button class="btn btn-primary pull-right" type="button">Action</button>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#edit{{$speaker->id}}" href="#">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </a>
                                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this speaker?')" href="delete_speaker/{{$speaker->id}}">
                                            <i class="fa fa-trash"></i><span>Delete</span>
                                        </a>
                                        @if($speaker->approved < 1)
                                             <a class="dropdown-item" onclick="return confirm('Are you sure you want to approve this speaker?')" href="approve_speaker/{{$speaker->id}}">
                                                <i class="fa fa-check"></i><span>Approve</span>
                                            </a>
                                        @else
                                            <a class="dropdown-item" onclick="return confirm('Are you sure you want to disapprove this speaker?')" href="disapprove_speaker/{{$speaker->id}}">
                                                <i class="fa fa-close"></i><span>Dispprove</span>
                                            </a>
                                        @endif
                                        <a class="dropdown-item" data-toggle="modal" data-target="#view{{$speaker->id}}">
                                            <i class="fa fa-eye"></i><span>View</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </td>
                          {{-- <td>{{date("d-m-Y", strtotime($user->JoinDate))}}</td> --}}
                      </tr>
                        
                    <!-- Modal:View Speaker Modal -->
                    <div class="modal fade" id="view{{$speaker->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">View Speaker</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <!--Body-->
                                <div class="modal-body">
                                    <center><img src="{{asset('images/'.$speaker->photo_url)}}" style="height:250px!important; width:250px!important" ></center>
                                </div>
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End View Modal -->

                    <!-- Modal:Edit Speaker Modal -->
                    <div class="modal fade" id="edit{{$speaker->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Edit Speaker</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <!--Body-->
                                <div class="modal-body">
                                    <form method="post" action="{{url('update_speaker')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$speaker->id}}"/>
                                        <div class="row">
                                            <center><img src="{{asset('images/'.$speaker->photo_url)}}" height="100px" width="150px"></center>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input class="form-control {{$errors->has('name')? 'is-invalid':''}}" value="{{Request::old('name')?Request::old('name'):$speaker->name}}"
                                                        name="name" id="name" type="text" required>                                    
                                                    @if ($errors->has('name'))
                                                    <div class="form-control-feedback">{{$errors->first('name')}}</div>
                                                    @endif
                                                </div>
                                            </div>{{-- end col --}}
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="expertise">Area of Expertise</label>
                                                        <input class="form-control {{$errors->has('expertise')? 'is-invalid':''}}" value="{{Request::old('expertise')?Request::old('expertise'):$speaker->expertise}}"
                                                            name="expertise" id="expertise" type="text" required>                                    
                                                        @if ($errors->has('expertise'))
                                                        <div class="form-control-feedback">{{$errors->first('expertise')}}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col --}}
                                            
                                        </div>{{--End row--}}

                                        <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input class="form-control {{$errors->has('email')? 'is-invalid':''}}" value="{{Request::old('email')?Request::old('email'):$speaker->email}}"
                                                            name="email" id="email" type="email" required>                                    
                                                        @if ($errors->has('email'))
                                                        <div class="form-control-feedback">{{$errors->first('email')}}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col --}}
                                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phone">Phone</label>
                                                            <input class="form-control {{$errors->has('phone')? 'is-invalid':''}}" value="{{Request::old('phone')?Request::old('phone'):$speaker->phone}}"
                                                                name="phone" id="phone" type="phone" required>                                    
                                                            @if ($errors->has('phone'))
                                                            <div class="form-control-feedback">{{$errors->first('phone')}}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col --}}
                                                    
                                            </div>{{--End row--}}

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="location">Location</label>
                                                        <input class="form-control {{$errors->has('location')? 'is-invalid':''}}" value="{{Request::old('location')?Request::old('location'):$speaker->location}}"
                                                            name="location" id="location" type="text" required>                                    
                                                        @if ($errors->has('location'))
                                                        <div class="form-control-feedback">{{$errors->first('location')}}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="photo">Photo</label>
                                                        <input class="form-control {{$errors->has('photo')? 'is-invalid':''}}" value="{{Request::old('photo')}}"
                                                            name="photo" id="photo" type="file" >                                    
                                                        @if ($errors->has('photo'))
                                                        <div class="form-control-feedback">{{$errors->first('photo')}}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col --}}
                                                        
                                                </div>{{--End row--}}
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="photo">Profile</label>
                                                        <textarea class="summernote2" name="profile" required class="form-control">{{Request::old('profile')?Request::old('profile'):$speaker->publications}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                </div>
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Edit Modal --> 
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>
   
  
  <!-- Modal:Create Speaker Modal -->
  <div class="modal fade" id="newSpaeker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Speaker</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="post" action="{{url('add_speaker')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control {{$errors->has('name')? 'is-invalid':''}}" value="{{Request::old('name')}}"
                                    name="name" id="name" type="text" required>                                    
                                @if ($errors->has('name'))
                                <div class="form-control-feedback">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="expertise">Area of Expertise</label>
                                    <input class="form-control {{$errors->has('expertise')? 'is-invalid':''}}" value="{{Request::old('expertise')}}"
                                        name="expertise" id="expertise" type="text" required>                                    
                                    @if ($errors->has('expertise'))
                                    <div class="form-control-feedback">{{$errors->first('expertise')}}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                           
                    </div>{{--End row--}}

                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control {{$errors->has('email')? 'is-invalid':''}}" value="{{Request::old('email')}}"
                                        name="email" id="email" type="email" required>                                    
                                    @if ($errors->has('email'))
                                    <div class="form-control-feedback">{{$errors->first('email')}}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input class="form-control {{$errors->has('phone')? 'is-invalid':''}}" value="{{Request::old('phone')}}"
                                            name="phone" id="phone" type="phone" required>                                    
                                        @if ($errors->has('phone'))
                                        <div class="form-control-feedback">{{$errors->first('phone')}}</div>
                                        @endif
                                    </div>
                                </div>{{-- end col --}}
                                
                        </div>{{--End row--}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input class="form-control {{$errors->has('location')? 'is-invalid':''}}" value="{{Request::old('location')}}"
                                        name="location" id="location" type="text" required>                                    
                                    @if ($errors->has('location'))
                                    <div class="form-control-feedback">{{$errors->first('location')}}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo">Photo</label>
                                    <input class="form-control {{$errors->has('photo')? 'is-invalid':''}}" value="{{Request::old('photo')}}"
                                        name="photo" id="photo" type="file" required>                                    
                                    @if ($errors->has('photo'))
                                    <div class="form-control-feedback">{{$errors->first('photo')}}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                                    
                            </div>{{--End row--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="photo">Profile</label>
                                    <textarea id="summernote" name="profile" required class="form-control">{{Request::old('profile')}}</textarea>
                                    </div>
                                </div>
                            </div>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Ceate Irm Modal -->    
   
@stop
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
    $(document).ready(function() {
        $('.summernote2').summernote();
    });
</script>
   <script>
       $(document).ready( function () {
        $('#myTable').DataTable();
    } );
   </script>
@stop
