@extends('layouts.admin')
@section('youth_org') active @stop
@section('header')
    {{-- summer note --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@stop
@section('youth_org') active @stop
@section('content')
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-user"></i> Youth Organization</h1>
        </div>
        @can('can create organization')
        <div class="tile-title-w-btn" style="margin-top:16px;">
            <a class="btn btn-primary icon-btn"href="{{url('upload_youth_org')}}"><i
                    class="fa fa-upload"></i>Upload Excel File</a>

            <button class="btn btn-primary icon-btn" data-toggle="modal" data-target="#newYouthInfo"><i
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
                        <tr>
                            <th>NameOfOrganization</th>
                            <th>CountryOfOragnization</th>
                            <th>Location</th>
                            <th>LegalStatus</th>
                            <th>ThematicFocus</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>CreatedAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($youthOrgs as $info)
                            <tr>
                                <td>{{ $info->name }}</td>
                                <td>{{ $info->country }}</td>
                                <td>{{ $info->location }}</td>
                                <td>{{ $info->legal_status }}</td>
                                <td>{{ $info->thematic_focus }}</td>
                                <td>{{ $info->phone }}</td>
                                <td>{{ $info->email }}</td>
                                <td>{{ $info->website }}</td>
                                <td>{{ $info->created_at }}</td>
                                <td>
                                    <div class="btn-group pull-right" role="group">
                                        <button class="btn btn-primary pull-right" type="button">Action</button>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" data-toggle="modal"
                                                    data-target="#editYouthOrg{{ $info->id }}" href="#">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                                </a>
                                                <a class="dropdown-item"
                                                    onclick="return confirm('Are you sure you want to delete this info?')"
                                                    href="delete_youth_organizations/{{ $info->id }}">
                                                    <i class="fa fa-trash"></i><span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td>{{ date('d-m-Y', strtotime($user->JoinDate)) }}</td>
                                --}}
                            </tr>

                            <!-- Modal:edit Youth Info Modal -->
                            <div class="modal fade" id="editYouthOrg{{ $info->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!--Header-->
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add Youth Organization</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <!--Body-->
                                        <div class="modal-body">
                                            <form method="post" action="{{ url('youth_organizations') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Name Of Organization</label>
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
                                                        <label for="counntry">Country</label>
                                                        <input
                                                            class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('country') ? Request::old('country') : $info->country }}"
                                                            name="country" id="country" type="text" required>
                                                        @if ($errors->has('country'))
                                                            <div class="form-control-feedback">
                                                                {{ $errors->first('country') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                --}}

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="location">Location</label>
                                                            <input
                                                                class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('location') ? Request::old('location') : $info->location }}"
                                                                name="location" id="location" type="text" required>
                                                            @if ($errors->has('location'))
                                                                <div class="form-control-feedback">
                                                                    {{ $errors->first('location') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col
                                                    --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="legal_status">Legal Status</label>
                                                            <input
                                                                class="form-control {{ $errors->has('legal_status') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('legal_status') ? Request::old('legal_status') : $info->legal_status }}"
                                                                name="legal_status" id="legal_status" type="legal_status"
                                                                required>
                                                            @if ($errors->has('legal_status'))
                                                                <div class="form-control-feedback">
                                                                    {{ $errors->first('legal_status') }}</div>
                                                            @endif

                                                        </div>
                                                    </div>{{-- end col
                                                    --}}


                                                </div>{{--End
                                                row--}}

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="thematic_focus">Thematic Focus</label>
                                                            <input
                                                                class="form-control {{ $errors->has('thematic_focus') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('thematic_focus') ? Request::old('thematic_focus') : $info->thematic_focus }}"
                                                                name="thematic_focus" id="thematic_focus"
                                                                type="thematic_focus" required>
                                                            @if ($errors->has('thematic_focus'))
                                                                <div class="form-control-feedback">
                                                                    {{ $errors->first('thematic_focus') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col
                                                    --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phone">Phone</label>
                                                            <input
                                                                class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('phone') ? Request::old('phone') : $info->phone }}"
                                                                name="phone" id="phone" type="tel" required>
                                                            @if ($errors->has('phone'))
                                                                <div class="form-control-feedback">
                                                                    {{ $errors->first('phone') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col
                                                    --}}

                                                </div>{{--End
                                                row--}}


                                                <div class="row">
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="website">Website</label>
                                                            <input
                                                                class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                                                value="{{ Request::old('website') ? Request::old('website') : $info->website }}"
                                                                name="website" id="website" type="text" required>
                                                            @if ($errors->has('website'))
                                                                <div class="form-control-feedback">
                                                                    {{ $errors->first('website') }}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col
                                                    --}}

                                                </div>{{--End
                                                row--}}
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
                            <!-- End Edit  Modal -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal:Create Youth Info Modal -->
    <div class="modal fade" id="newYouthInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Youth Organization</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <form method="post" action="{{ url('youth_organizations') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name Of Organization</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        value="{{ Request::old('name') }}" name="name" id="name" type="text" required>
                                    @if ($errors->has('name'))
                                        <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                            <div class="col-md-6">
                                <label for="counntry">Country</label>
                                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('country') }}" name="country" id="country" type="text" required>
                                @if ($errors->has('country'))
                                    <div class="form-control-feedback">{{ $errors->first('country') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}"
                                        value="{{ Request::old('location') }}" name="location" id="location" type="text"
                                        required>
                                    @if ($errors->has('location'))
                                        <div class="form-control-feedback">{{ $errors->first('location') }}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="legal_status">Legal Status</label>
                                    <input class="form-control {{ $errors->has('legal_status') ? 'is-invalid' : '' }}"
                                        value="{{ Request::old('legal_status') }}" name="legal_status" id="legal_status"
                                        type="legal_status" required>
                                    @if ($errors->has('legal_status'))
                                        <div class="form-control-feedback">{{ $errors->first('legal_status') }}</div>
                                    @endif

                                </div>
                            </div>{{-- end col --}}


                        </div>{{--End row--}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thematic_focus">Thematic Focus</label>
                                    <input class="form-control {{ $errors->has('thematic_focus') ? 'is-invalid' : '' }}"
                                        value="{{ Request::old('thematic_focus') }}" name="thematic_focus"
                                        id="thematic_focus" type="thematic_focus" required>
                                    @if ($errors->has('thematic_focus'))
                                        <div class="form-control-feedback">{{ $errors->first('thematic_focus') }}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                        value="{{ Request::old('phone') }}" name="phone" id="phone" type="tel" required>
                                    @if ($errors->has('phone'))
                                        <div class="form-control-feedback">{{ $errors->first('phone') }}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}

                        </div>{{--End row--}}


                        <div class="row">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                        value="{{ Request::old('website') }}" name="website" id="website" type="text"
                                        required>
                                    @if ($errors->has('website'))
                                        <div class="form-control-feedback">{{ $errors->first('website') }}</div>
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
