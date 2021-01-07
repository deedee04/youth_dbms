@extends('layouts.admin')
@section('community_engagement') active @stop
@section('header')
{{-- summer note --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@stop
@section('community_engagement') active @stop
@section('content')
<div class="app-title">
    <div>
        <h1>
            <i class="fa fa-user"></i> Community Engagement Actor</h1>
    </div>
    @can('can create community engagement')
    <div class="tile-title-w-btn" style="margin-top:16px;">
        <a class="btn btn-primary icon-btn" href="upload_community_engagement"><i class="fa fa-upload"></i>Upload Excel
            File</a>
        <button class="btn btn-primary icon-btn" data-toggle="modal" data-target="#newCommunityEngagement"><i
                class="fa fa-plus"></i>Add New</button>
    </div>
    @endcan
</div>

<div class="tile">
    <div class="tile-body">
        @include('partials.alerts')
        <div class="table-responsive">
            <table class="table table-hover table-bordered " id="sampleTable">
                <thead>
                    <tr> @can('can create community engagement')
                        <th>Action</th>
                        @endcan
                        <th>Name</th>
                        <th>Age</th>
                        <th>Country</th>
                        <th>Region</th>
                        <th>LanguagesSpoken</th>
                        <th>Organization</th>
                        <th>ThematicArea</th>
                        <th>Email</th>
                        <th>CreatedAt</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($community as $info)
                    <tr>
                        @can('can create youth')
                        <td>
                            <div class="btn-group pull-right" role="group">
                                {{-- <button class="btn btn-primary pull-right" type="button">Action</button> --}}
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal"
                                            data-target="#editCommunityEngagement{{ $info->id }}" href="#">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </a>
                                        <a class="dropdown-item"
                                            onclick="return confirm('Are you sure you want to delete this community actor?')"
                                            href="delete_community_engagement/{{ $info->id }}">
                                            <i class="fa fa-trash"></i><span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @endcan
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->age }}</td>
                        <td>{{ $info->country }}</td>
                        <td>{{ $info->region }}</td>
                        <td>{{ $info->languages_spoken }}</td>
                        <td>{{ $info->organization }}</td>
                        <td>{{ $info->thematic_area }}</td>
                        <td>{{ $info->email }}</td>
                        <td>{{ $info->created_at }}
                            <!-- Modal:edit community actors Modal -->
                            <div class="modal fade" id="editCommunityEngagement{{ $info->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!--Header-->
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Edit Community Engagement Actor
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <!--Body-->
                                        <div class="modal-body">
                                            <form method="post" action="{{ url('update_community_engagement') }}"
                                                enctype="multipart/form-data">
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
                                                            <label for="age">Age</label>
                                                            <input
                                                                class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('age') ? Request::old('age') : $info->age }}"
                                                                name="age" id="age" type="number" required>
                                                            @if ($errors->has('age'))
                                                            <div class="form-control-feedback">
                                                                {{ $errors->first('age') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col
                                                    --}}
                                                </div>{{--End
                                                row--}}
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="dob">Country</label>
                                                            <input
                                                                class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('country') ? Request::old('country') : $info->country }}"
                                                                name="country" id="country" type="text" required>
                                                            @if ($errors->has('country'))
                                                            <div class="form-control-feedback">
                                                                {{ $errors->first('country') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Region</label>
                                                            <input
                                                                class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('region') ? Request::old('region') : $info->region}}"
                                                                name="region" id="region" type="text" required>
                                                            @if ($errors->has('region'))
                                                            <div class="form-control-feedback">
                                                                {{ $errors->first('region') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col
                                                    --}}


                                                </div>{{--End
                                                row--}}

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phone">Languages Spoken</label>
                                                            <textarea
                                                                class="form-control {{ $errors->has('languages_spoken') ? 'is-invalid' : '' }}"
                                                                name="languages_spoken" id="languages_spoken"
                                                                type="text"
                                                                required>{{ Request::old('languages_spoken') ? Request::old('languages_spoken') : $info->languages_spoken }}</textarea>
                                                            @if ($errors->has('languages_spoken'))
                                                            <div class="form-control-feedback">
                                                                {{ $errors->first('languages_spoken') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col
                                                    --}}

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="organization">Organization</label>
                                                            <input
                                                                class="form-control {{ $errors->has('organization') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('organization') ? Request::old('organization') : $info->organization }}"
                                                                name="organization" id="organization" type="text"
                                                                required>
                                                            @if ($errors->has('organization'))
                                                            <div class="form-control-feedback">
                                                                {{ $errors->first('organization') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col
                                                    --}}

                                                </div>{{--End
                                                row--}}

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="thematic_area">Thematic Area</label>
                                                            <input
                                                                class="form-control {{ $errors->has('thematic_area') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('thematic_area') ? Request::old('thematic_area') : $info->thematic_area }}"
                                                                name="thematic_area" id="thematic_area" type="text"
                                                                required>
                                                            @if ($errors->has('thematic_area'))
                                                            <div class="form-control-feedback">
                                                                {{ $errors->first('thematic_area') }}</div>
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
                                                    </div>{{-- end col
                                                    --}}

                                                </div>{{--End
                                                row--}}

                                        </div>
                                        <!--Footer-->
                                        <input type="hidden" value="{{$info->id}}" name="id" />
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
                        </td>

                        {{-- <td>{{ date('d-m-Y', strtotime($user->JoinDate)) }}</td>
                        --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




<!-- Modal:Create community actors Modal -->
<div class="modal fade" id="newCommunityEngagement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Community Engagement Actor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="post" action="{{ url('community_engagement') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('name') }}" name="name" id="name" type="text" required>
                                @if ($errors->has('name'))
                                <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('age') }}" name="age" id="age" type="number" required>
                                @if ($errors->has('age'))
                                <div class="form-control-feedback">{{ $errors->first('age') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                    </div>{{--End row--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob">Country</label>
                                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('country') }}" name="country" id="country" type="text"
                                    required>
                                @if ($errors->has('country'))
                                <div class="form-control-feedback">{{ $errors->first('country') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Region</label>
                                <input class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('region') }}" name="region" id="region" type="text" required>
                                @if ($errors->has('region'))
                                <div class="form-control-feedback">{{ $errors->first('region') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}


                    </div>{{--End row--}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Languages Spoken</label>
                                <textarea
                                    class="form-control {{ $errors->has('languages_spoken') ? 'is-invalid' : '' }}"
                                    name="languages_spoken" id="languages_spoken" type="text"
                                    required>{{ Request::old('languages_spoken') }}</textarea>
                                @if ($errors->has('languages_spoken'))
                                <div class="form-control-feedback">{{ $errors->first('languages_spoken') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organization">Organization</label>
                                <input class="form-control {{ $errors->has('organization') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('organization') }}" name="organization" id="organization"
                                    type="text" required>
                                @if ($errors->has('organization'))
                                <div class="form-control-feedback">{{ $errors->first('organization') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}

                    </div>{{--End row--}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="thematic_area">Thematic Area</label>
                                <input class="form-control {{ $errors->has('thematic_area') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('thematic_area') }}" name="thematic_area" id="thematic_area"
                                    type="text" required>
                                @if ($errors->has('thematic_area'))
                                <div class="form-control-feedback">{{ $errors->first('thematic_area') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('email') }}" name="email" id="email" type="email" required>
                                @if ($errors->has('email'))
                                <div class="form-control-feedback">{{ $errors->first('email') }}</div>
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
<!-- End Ceate  Modal -->

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