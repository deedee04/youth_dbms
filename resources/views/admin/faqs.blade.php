@extends('layouts.admin')
@section('faq') active @stop
@section('users_page') active @stop
@section('content') 
  <div class="app-title">
      <div>
          <h1>
              <i class="fa fa-user"></i> FAQS</h1>
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
                  <th>Title</th>
                  <th>Body</th>
                  <th>Action</th>
                </tr>
              </thead>
				      <tbody>
                    @foreach($faqs as $faq)
                      <tr>
                          <td>{{$faq->title}}</td>
                          <td>{{$faq->body}}</td>
                          <td>
                              <div class="btn-group pull-right" role="group">
                                <button class="btn btn-primary pull-right" type="button">Action</button>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#edit{{$faq->id}}" href="#">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </a>
                                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this FAQ?')" href="delete_faq/{{$faq->id}}">
                                            <i class="fa fa-trash"></i><span>Delete</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </td>
                          {{-- <td>{{date("d-m-Y", strtotime($user->JoinDate))}}</td> --}}
                      </tr>
                        
                   
                    <!-- Modal:Edit faq Modal -->
                    <div class="modal fade" id="edit{{$faq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Edit FAQ</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <!--Body-->
                                <div class="modal-body">
                                    <form method="post" action="{{url('update_faq/'.$faq->id)}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input class="form-control {{$errors->has('title')? 'is-invalid':''}}" value="{{Request::old('title')?Request::old('title'):$faq->title}}"
                                                        name="title" id="title" type="text" required>                                    
                                                    @if ($errors->has('title'))
                                                    <div class="form-control-feedback">{{$errors->first('title')}}</div>
                                                    @endif
                                                </div>
                                            </div>{{-- end col --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="body">Body</label>
                                                    <textarea class="form-control {{$errors->has('body')? 'is-invalid':''}}" name="body" id="body" required>{{Request::old('body')?Request::old('body'):$faq->body}}</textarea>                                                                             
                                                    @if ($errors->has('body'))
                                                    <div class="form-control-feedback">{{$errors->first('body')}}</div>
                                                    @endif
                                                </div>
                                            </div>{{-- end col --}}
                                            
                                        </div>{{--End row--}}
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
                <h4 class="modal-title" id="myModalLabel">Add FAQ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="post" action="{{url('add_faq')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input class="form-control {{$errors->has('title')? 'is-invalid':''}}" value="{{Request::old('title')}}"
                                        name="title" id="title" type="text" required>                                    
                                    @if ($errors->has('title'))
                                    <div class="form-control-feedback">{{$errors->first('title')}}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <textarea class="form-control {{$errors->has('body')? 'is-invalid':''}}" name="body" id="body" required>{{Request::old('body')}}</textarea>                                                                             
                                    @if ($errors->has('body'))
                                    <div class="form-control-feedback">{{$errors->first('body')}}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                            
                        </div>{{--End row--}}
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
@section('script')
   
@stop
