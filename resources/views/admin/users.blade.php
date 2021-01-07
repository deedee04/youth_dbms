@extends('layouts.admin')
@section('users') active @stop
@section('header')
{{-- summer note --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@stop
@section('users') active @stop
@section('content')
<div class="app-title">
    <div>
        <h1>
            <i class="fa fa-user"></i> Youth Info</h1>
    </div>
    <div class="tile-title-w-btn" style="margin-top:16px;">
        <button class="btn btn-primary icon-btn" data-toggle="modal" data-target="#addUser"><i
                class="fa fa-plus"></i>Add New User</button>
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
                        <th>CreatedAt</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $info)
                    <tr>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->email }}</td>
                        <td>{{ $info->created_at }}</td>
                        <td>
                            <div class="btn-group pull-right" role="group">
                                <button class="btn btn-primary pull-right" type="button">Action</button>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal"
                                            data-target="#editUser{{$info->id}}" href="#">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </a>
                                        <a class="dropdown-item"
                                            onclick="return confirm('Are you sure you want to delete this user?')"
                                            href="delete_user/{{ $info->id }}">
                                            <i class="fa fa-trash"></i><span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        {{-- <td>{{ date('d-m-Y', strtotime($user->JoinDate)) }}</td>
                        --}}
                    </tr>
                    <!-- Modal:edit user Modal -->
                    <div class="modal fade" id="editUser{{$info->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Add Youth Info</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <!--Body-->
                                <div class="modal-body">
                                    <form method="post" action="{{ url('update_user') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input
                                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                        value="{{ Request::old('name') ? Request::old('name') : $info->name }}"
                                                        name="name" id="name" type="text" required>
                                                    @if ($errors->has('name'))
                                                    <div class="form-control-feedback">
                                                        {{ $errors->first('name') }}</div>
                                                    @endif
                                                </div>
                                            </div>{{-- end col
                                                    --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input
                                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                        value="{{ Request::old('email') ? Request::old('email') : $info->email }}"
                                                        name="email" id="email" type="email" required>
                                                    @if ($errors->has('email'))
                                                    <div class="form-control-feedback">
                                                        {{ $errors->first('email') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end col
                                                    --}}
                                        <div class="row">
                                            @foreach ($permissions as $item)
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-bottom: 5px">
                                                    <label><input name="permissions[]" type="checkbox" @foreach($model
                                                            as
                                                            $mod){{ $item->id == $mod->permission_id &&  $mod->model_id == $info->id ?  'checked' : '' }}@endforeach
                                                            value="{{ $item->id }}">
                                                        {{ $item->name }}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <input type="hidden" name="id" value="{{$info->id}}" />
                                        <!--Footer-->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-primary"
                                                data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End edit  Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal:Create user Modal -->
        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Add Yoth Info</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <!--Body-->
                    <div class="modal-body">
                        <form method="post" action="{{ url('users') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                            value="{{ Request::old('name') }}" name="name" id="name" type="text"
                                            required>
                                        @if ($errors->has('name'))
                                        <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                </div>{{-- end col --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                            value="{{ Request::old('email') }}" name="email" id="email" type="email"
                                            required>
                                        @if ($errors->has('email'))
                                        <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>{{-- end col --}}
                                <div class="row">
                                    @foreach ($permissions as $item)
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label><input name="permissions[]" type="checkbox" value="{{ $item->id }}">
                                                {{ $item->name }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--Footer-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary"
                                        data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Ceate  Modal -->
    </div>
</div>






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
    $(document).ready(function() {
            $('#myTable').DataTable();
        });

</script>
@stop