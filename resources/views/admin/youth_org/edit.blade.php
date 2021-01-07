@extends('layouts.admin')
@section('youth_org') active @stop
@section('header')

@stop
@section('youth_org') active @stop
@section('content')
<div class="app-title">
    <div>
        <h1>
            <i class="fa fa-user"></i>Edit Youth Organization</h1>
    </div>

</div>

<div class="tile">
    <div class="tile-body">
        @include('partials.alerts')

        <form method="post" action="{{ route('youthOrg.update', $data->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name Of Organization</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            value="{{ old('name', $data->name) }}" name="name" id="name" type="text" required>
                        @if ($errors->has('name'))
                        <div class="form-control-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                </div>{{-- end col --}}
                <div class="col-md-6">
                    <label for="counntry">Country</label>
                    <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}"
                        value="{{ old('country', $data->country) }}" name="country" id="country" type="text" required>
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
                            value="{{ old('location', $data->location) }}" name="location" id="location" type="text"
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
                            value="{{ old('legal_status', $data->legal_status) }}" name="legal_status" id="legal_status"
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
                            value="{{ old('thematic_focus', $data->thematic_focus) }}" name="thematic_focus"
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
                            value="{{ old('phone', $data->phone) }}" name="phone" id="phone" type="tel" required>
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
                            value="{{ old('email', $data->email) }}" name="email" id="email" type="email" required>
                        @if ($errors->has('email'))
                        <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                </div>{{-- end col --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                            value="{{ old('website', $data->website) }}" name="website" id="website" type="text"
                            required>
                        @if ($errors->has('website'))
                        <div class="form-control-feedback">{{ $errors->first('website') }}</div>
                        @endif
                    </div>
                </div>{{-- end col --}}

            </div>{{--End row--}}

            <a href="{{route('youthOrg.index')}}" class="btn btn-outline-primary">Back</a>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection()