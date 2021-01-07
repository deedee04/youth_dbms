@extends('layouts.admin')
@section('youth_info') active @stop
@section('header')
{{-- summer note --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@stop
@section('youth_info') active @stop
@section('content')
<div class="app-title">
    <div>
        <h1>
            <i class="fa fa-user"></i> Update Youth Database</h1>
    </div>

</div>

<div class="tile">
    <div class="tile-body">
        @include('partials.alerts')


        <form method="post" action="{{ url('update_youth_info', ['id' => $info->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            value="{{ old('name',$info->name) }}" name="name" id="name" type="text" required>
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
                        <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}"
                            value="{{ old('age',$info->age)  }}" name="age" id="age" type="number" required>
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
                        <label for="dob">DOB</label>
                        <input class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}"
                            value="{{ old('dob',$info->dob )  }}" name="dob" id="dob" type="date" required>
                        @if ($errors->has('dob'))
                        <div class="form-control-feedback">
                            {{ $errors->first('dob') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            value="{{ old('email',$info->email)   }}" name="email" id="email" type="email" required>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                            value="{{ old('phone', $info->phone )}}" name="phone" id="phone" type="phone" required>
                        @if ($errors->has('phone'))
                        <div class="form-control-feedback">
                            {{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                </div>{{-- end col
                                                    --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="location">Gender</label>
                        <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" required
                            name="gender" id="gender">
                            <option value="">--Select--</option>
                            <option value="Male" {{ old('gender',$info->gender) == 'Male' ? 'selected' : '' }}>
                                Male</option>
                            <option value="Female" {{ old('gender',$info->gender ) == 'Female' ? 'selected' : '' }}>
                                Female</option>
                        </select>
                        @if ($errors->has('gender'))
                        <div class="form-control-feedback">
                            {{ $errors->first('gender') }}</div>
                        @endif
                    </div>
                </div>{{-- end col
                                                    --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}"
                            value="{{ old('nationality', $info->nationality) }}" name="nationality" id="nationality"
                            type="text" required>
                        @if ($errors->has('nationality'))
                        <div class="form-control-feedback">
                            {{ $errors->first('nationality') }}</div>
                        @endif
                    </div>
                </div>{{-- end col
                                                    --}}

            </div>{{--End
                                                row--}}


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="education">Education</label>
                        <input class="form-control {{ $errors->has('education') ? 'is-invalid' : '' }}"
                            value="{{ old('education', $info->education) }}" name="education" id="education" type="text"
                            required>
                        @if ($errors->has('education'))
                        <div class="form-control-feedback">
                            {{ $errors->first('education') }}</div>
                        @endif
                    </div>
                </div>{{-- end col
                                                    --}}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="occupation">Occupation</label>
                        <input class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}"
                            value="{{old('occupation', $info->occupation) }}" name="occupation" id="occupation"
                            type="text" required>
                        @if ($errors->has('occupation'))
                        <div class="form-control-feedback">
                            {{ $errors->first('occupation') }}</div>
                        @endif
                    </div>
                </div>{{-- end col
                                                    --}}

            </div>{{--End
                                                row--}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="thematic_area">Thematic Area</label>
                        <input class="form-control {{ $errors->has('thematic_area') ? 'is-invalid' : '' }}"
                            value="{{ old('thematic_area', $info->thematic_area) }}" name="thematic_area"
                            id="thematic_area" type="text" required>
                        @if ($errors->has('thematic_area'))
                        <div class="form-control-feedback">
                            {{ $errors->first('thematic_area') }}</div>
                        @endif
                    </div>
                </div>{{-- end col
                                                    --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data_source">Data Source</label>
                        <input class="form-control {{ $errors->has('data_source') ? 'is-invalid' : '' }}"
                            value="{{ old('data_source',$info->data_source) }}" name="data_source" id="data_source"
                            type="text" required>
                        @if ($errors->has('data_source'))
                        <div class="form-control-feedback">
                            {{ $errors->first('data_source') }}</div>
                        @endif
                    </div>
                </div>{{-- end col
                                                    --}}
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}"
                            value="{{ old('year', $info->year) }}" name="year" id="year" type="text" required>
                        @if ($errors->has('year'))
                        <div class="form-control-feedback">
                            {{ $errors->first('year') }}</div>
                        @endif
                    </div>
                </div>{{-- end col
                                                    --}}

            </div>{{--End
                                                row--}}


            <a href="{{route('youthInfo.index')}}" class="btn btn-outline-primary">Back</a>
            <button class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>





@stop