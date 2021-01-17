@extends('layouts.admin')
@section('partners') active @stop
@section('header')
{{-- summer note --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@stop
@section('partners') active @stop
@section('content')
<div class="app-title">
    <div>
        <h1>
            <i class="fa fa-user"></i> Partners</h1>
    </div>
    @can('can create partners')
    <div class="tile-title-w-btn" style="margin-top:16px;">
        <a class="btn btn-primary icon-btn" href="{{url('upload_partners')}}"><i class="fa fa-upload"></i>Upload Excel
            File</a>

        <button class="btn btn-primary icon-btn" data-toggle="modal" data-target="#uploadPartners"><i
                class="fa fa-plus"></i>Add New</button>
    </div>
    @endcan
</div>

<form action="" method="get">
    <div class="row mb-2">
        <div class="col-md-3">
            <input placeholder="Search Name" value="{{request('name')}}" name="name" class='form-control'
                id='searchName' />
        </div>
        <div class="col-md-3">
            <input placeholder="Search Type" value="{{request('type')}}" name="type" class='form-control'
                id='searchType' />
        </div>
        <div class="col-md-3">
            <input placeholder="Search Region" value="{{request('region')}}" name="region" class='form-control'
                id='searchRegion' />
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary">Search</button>
        </div>
    </div>
</form>

<div class="tile">
    <div class="tile-body">
        @include('partials.alerts')
        <div class="table-responsive">
            <table class="table table-hover table-bordered " id="sampleTable">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Region</th>
                        <th>Country</th>
                        {{-- <th>Address</th> --}}
                        <th>Type</th>
                        <th>Focus Person</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Position</th>
                        <th>OrganizationReview</th>
                        <th>AreaOfFocus</th>
                        <th>SourceOfFunds</th>
                        <th>ThematicArea</th>
                        <th>ServicesOffered</th>
                        <th>YouthFocusedProject</th>
                        <th>AgreementWithAuc</th>
                        <th>CreatedAt</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($partners as $info)
                    <tr>
                        <td>
                            <div class="btn-group pull-right" role="group">
                                {{-- <button class="btn btn-primary pull-right" type="button">Action</button> --}}
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal"
                                            data-target="#editPartners{{ $info->id }}" href="#">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </a>
                                        <a class="dropdown-item"
                                            onclick="return confirm('Are you sure you want to delete this info?')"
                                            href="delete_partners/{{ $info->id }}">
                                            <i class="fa fa-trash"></i><span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $info->organization }}</td>
                        <td>{{ $info->region }}</td>
                        <td>{{ $info->country }}</td>
                        {{-- <td>{{ $info->address }}</td> --}}
                        <td>{{ $info->type_of_org }}</td>
                        <td>{{ $info->name_of_focus_person }}</td>
                        <td>{{ $info->phone }}</td>
                        <td>{{ $info->email }}</td>
                        <td>{{ $info->website }}</td>
                        <td>{{ $info->position }}</td>
                        <td>{{ $info->organization_review }}</td>
                        <td>{{ $info->area_of_focus }}</td>
                        <td>{{ $info->source_funding }}</td>
                        <td>{{ $info->thematic_area }}</td>
                        <td>{{ $info->services_offered }}</td>
                        <td>{{ $info->youth_focused_projects }}</td>
                        <td>{{ $info->agreement_with_auc }}</td>
                        <td>{{ $info->created_at }}

                            {{-- <td>{{ date('d-m-Y', strtotime($user->JoinDate)) }}</td>
                        --}}


                        <!-- Modal:edit Youth Info Modal -->
                        <div class="modal fade" id="editPartners{{ $info->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Add Partners</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <!--Body-->
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('partners') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="organization">Name Of Organization</label>
                                                        <input
                                                            class="form-control {{ $errors->has('organization') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('organization') ? Request::old('organization') : $info->organization }}"
                                                            name="organization" id="organization" type="text" required>
                                                        @if ($errors->has('organization'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('organization') }}</div>
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
                                                        <label for="region">Region</label>
                                                        <input
                                                            class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('region') ? Request::old('region') : $info->region }}"
                                                            name="region" id="region" type="text" required>
                                                        @if ($errors->has('region'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('region') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <textarea
                                                            class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                            name="address" id="address" type="address"
                                                            required>{{ Request::old('address') ? Request::old('address') : $info->address }}</textarea>
                                                        @if ($errors->has('address'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('address') }}</div>
                                                        @endif

                                                    </div>
                                                </div>{{-- end col
                                                    --}}


                                            </div>{{--End
                                                row--}}

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="type_of_org">TypeOfOrganization</label>
                                                        <input
                                                            class="form-control {{ $errors->has('type_of_org') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('type_of_org') ? Request::old('type_of_org') : $info->type_of_org }}"
                                                            name="type_of_org" id="type_of_org" type="type_of_org"
                                                            required>
                                                        @if ($errors->has('type_of_org'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('type_of_org') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name_of_focus_person">NameOfFocusPerson</label>
                                                        <input
                                                            class="form-control {{ $errors->has('name_of_focus_person') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('name_of_focus_person') ? Request::old('name_of_focus_person') : $info->name_of_focus_person }}"
                                                            name="name_of_focus_person" id="name_of_focus_person"
                                                            type="tel" required>
                                                        @if ($errors->has('name_of_focus_person'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('name_of_focus_person') }}
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}

                                            </div>{{--End
                                                row--}}


                                            <div class="row">
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
                                            <div class="row">
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
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="position">Position</label>
                                                        <input
                                                            class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('position') ? Request::old('position') : $info->position }}"
                                                            name="position" id="position" type="position" required>
                                                        @if ($errors->has('position'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('position') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                            </div>{{--End
                                                row--}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="organization_review">OrganizationReview</label>
                                                        <input
                                                            class="form-control {{ $errors->has('organization_review') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('organization_review') ? Request::old('organization_review') : $info->organization_review }}"
                                                            name="organization_review" id="organization_review"
                                                            type="tel" required>
                                                        @if ($errors->has('organization_review'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('organization_review') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="area_of_focus">AreaOfFocus</label>
                                                        <input
                                                            class="form-control {{ $errors->has('area_of_focus') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('area_of_focus') ? Request::old('area_of_focus') : $info->area_of_focus }}"
                                                            name="area_of_focus" id="area_of_focus" type="area_of_focus"
                                                            required>
                                                        @if ($errors->has('area_of_focus'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('area_of_focus') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                            </div>{{--End
                                                row--}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="source_funding">SourceOfFunds</label>
                                                        <input
                                                            class="form-control {{ $errors->has('source_funding') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('source_funding') ? Request::old('source_funding') : $info->source_funding }}"
                                                            name="source_funding" id="source_funding" type="" required>
                                                        @if ($errors->has('source_funding'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('source_funding') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="thematic_area">ThematicArea</label>
                                                        <input
                                                            class="form-control {{ $errors->has('thematic_area') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('thematic_area') ? Request::old('thematic_area') : $info->thematic_area }}"
                                                            name="thematic_area" id="thematic_area" type="thematic_area"
                                                            required>
                                                        @if ($errors->has('thematic_area'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('thematic_area') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                            </div>{{--End
                                                row--}}

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="services_offered">ServicesOffered</label>
                                                        <input
                                                            class="form-control {{ $errors->has('services_offered') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('services_offered') ? Request::old('services_offered') : $info->services_offered }}"
                                                            name="services_offered" id="services_offered" type="tel"
                                                            required>
                                                        @if ($errors->has('services_offered'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('services_offered') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="youth_focused_projects">YouthFocusedProject</label>
                                                        <textarea
                                                            class="form-control {{ $errors->has('youth_focused_projects') ? 'is-invalid' : '' }}"
                                                            name="youth_focused_projects" id="youth_focused_projects"
                                                            type="youth_focused_projects"
                                                            required>{{ Request::old('youth_focused_projects') ? Request::old('youth_focused_projects') : $info->youth_focused_projects }}</textarea>
                                                        @if ($errors->has('youth_focused_projects'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('youth_focused_projects') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                            </div>{{--End
                                                row--}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="agreement_with_auc">AgreementWithAuc</label>
                                                        <input
                                                            class="form-control {{ $errors->has('agreement_with_auc') ? 'is-invalid' : '' }}"
                                                            value="{{ Request::old('agreement_with_auc') ? Request::old('agreement_with_auc') : $info->agreement_with_auc }}"
                                                            name="agreement_with_auc" id="agreement_with_auc" type="tel"
                                                            required>
                                                        @if ($errors->has('agreement_with_auc'))
                                                        <div class="form-control-feedback">
                                                            {{ $errors->first('agreement_with_auc') }}</div>
                                                        @endif
                                                    </div>
                                                </div>{{-- end col
                                                    --}}
                                            </div>
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
                        </td>
                    </tr>
                    <!-- End edit  Modal -->
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal:Create Youth Info Modal -->
<div class="modal fade" id="uploadPartners" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Partners</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="post" action="{{ url('partners') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organization">Name Of Organization</label>
                                <input class="form-control {{ $errors->has('organization') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('organization') }}" name="organization" id="organization"
                                    type="text" required>
                                @if ($errors->has('organization'))
                                <div class="form-control-feedback">{{ $errors->first('organization') }}</div>
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
                                <label for="region">Region</label>
                                <input class="form-control {{ $errors->has('region') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('region') }}" name="region" id="region" type="text" required>
                                @if ($errors->has('region'))
                                <div class="form-control-feedback">{{ $errors->first('region') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                    name="address" id="address" type="address"
                                    required>{{ Request::old('address') }}</textarea>
                                @if ($errors->has('address'))
                                <div class="form-control-feedback">{{ $errors->first('address') }}</div>
                                @endif

                            </div>
                        </div>{{-- end col --}}


                    </div>{{--End row--}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_of_org">TypeOfOrganization</label>
                                <input class="form-control {{ $errors->has('type_of_org') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('type_of_org') }}" name="type_of_org" id="type_of_org"
                                    type="type_of_org" required>
                                @if ($errors->has('type_of_org'))
                                <div class="form-control-feedback">{{ $errors->first('type_of_org') }}
                                </div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name_of_focus_person">NameOfFocusPerson</label>
                                <input
                                    class="form-control {{ $errors->has('name_of_focus_person') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('name_of_focus_person') }}" name="name_of_focus_person"
                                    id="name_of_focus_person" type="tel" required>
                                @if ($errors->has('name_of_focus_person'))
                                <div class="form-control-feedback">{{ $errors->first('name_of_focus_person') }}
                                </div>
                                @endif
                            </div>
                        </div>{{-- end col --}}

                    </div>{{--End row--}}


                    <div class="row">
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
                    <div class="row">
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('position') }}" name="position" id="position" type="position"
                                    required>
                                @if ($errors->has('position'))
                                <div class="form-control-feedback">{{ $errors->first('position') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                    </div>{{--End row--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organization_review">OrganizationReview</label>
                                <input
                                    class="form-control {{ $errors->has('organization_review') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('organization_review') }}" name="organization_review"
                                    id="organization_review" type="tel" required>
                                @if ($errors->has('organization_review'))
                                <div class="form-control-feedback">{{ $errors->first('organization_review') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="area_of_focus">AreaOfFocus</label>
                                <input class="form-control {{ $errors->has('area_of_focus') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('area_of_focus') }}" name="area_of_focus" id="area_of_focus"
                                    type="area_of_focus" required>
                                @if ($errors->has('area_of_focus'))
                                <div class="form-control-feedback">{{ $errors->first('area_of_focus') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                    </div>{{--End row--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="source_funding">SourceOfFunds</label>
                                <input class="form-control {{ $errors->has('source_funding') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('source_funding') }}" name="source_funding"
                                    id="source_funding" type="" required>
                                @if ($errors->has('source_funding'))
                                <div class="form-control-feedback">{{ $errors->first('source_funding') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="thematic_area">ThematicArea</label>
                                <input class="form-control {{ $errors->has('thematic_area') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('thematic_area') }}" name="thematic_area" id="thematic_area"
                                    type="thematic_area" required>
                                @if ($errors->has('thematic_area'))
                                <div class="form-control-feedback">{{ $errors->first('thematic_area') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                    </div>{{--End row--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="source_funding">SourceOfFunds</label>
                                <input class="form-control {{ $errors->has('source_funding') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('source_funding') }}" name="source_funding" id="" type="tel"
                                    required>
                                @if ($errors->has('source_funding'))
                                <div class="form-control-feedback">{{ $errors->first('source_funding') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="thematic_area">ThematicArea</label>
                                <input class="form-control {{ $errors->has('thematic_area') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('thematic_area') }}" name="thematic_area" id=""
                                    type="thematic_area" required>
                                @if ($errors->has('thematic_area'))
                                <div class="form-control-feedback">{{ $errors->first('thematic_area') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                    </div>{{--End row--}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="services_offered">ServicesOffered</label>
                                <input class="form-control {{ $errors->has('services_offered') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('services_offered') }}" name="services_offered"
                                    id="services_offered" type="tel" required>
                                @if ($errors->has('services_offered'))
                                <div class="form-control-feedback">{{ $errors->first('services_offered') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="youth_focused_projects">YouthFocusedProject</label>
                                <textarea
                                    class="form-control {{ $errors->has('youth_focused_projects') ? 'is-invalid' : '' }}"
                                    name="youth_focused_projects" id="youth_focused_projects"
                                    type="youth_focused_projects"
                                    required>{{ Request::old('youth_focused_projects') }}</textarea>
                                @if ($errors->has('youth_focused_projects'))
                                <div class="form-control-feedback">{{ $errors->first('youth_focused_projects') }}
                                </div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                    </div>{{--End row--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="agreement_with_auc">AgreementWithAuc</label>
                                <input class="form-control {{ $errors->has('agreement_with_auc') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('agreement_with_auc') }}" name="agreement_with_auc"
                                    id="agreement_with_auc" type="tel" required>
                                @if ($errors->has('agreement_with_auc'))
                                <div class="form-control-feedback">{{ $errors->first('agreement_with_auc') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
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