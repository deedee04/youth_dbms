@extends('layouts.admin')
@section('youth_info') active @stop

@section('content')
<div class="app-title">
    <div>
        <h1>
            <i class="fa fa-user"></i> Youth Database</h1>
    </div>
    @can('can create youth')
    <div class="tile-title-w-btn" style="margin-top:16px;">
        <a class="btn btn-primary icon-btn" href="upload_youth_info"><i class="fa fa-upload"></i>Upload Excel File</a>
        <button class="btn btn-primary icon-btn" data-toggle="modal" data-target="#newYouthInfo"><i
                class="fa fa-plus"></i>Add New</button>
    </div>
    @endcan
</div>

<div class="row mb-2">
    <div class="col-md-4">
        <input placeholder="Search Name" class='form-control' id='searchName' />
    </div>
    <div class="col-md-4">
        <input placeholder="Search Country" class='form-control' id='searchCountry' />
    </div>
    <div class="col-md-4">
        <select class='form-control' id='searchGender'>
            <option value="0">All</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
</div>

<div class="tile">
    <div class="tile-body">
        @include('partials.alerts')


        {{-- <table class="table table-hover table-bordered " id="stable1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Nationality</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Education</th>
                            <th>Occupation</th>
                            <th>ThematicArea</th>
                            <th>DataSource/Program</th>
                            <th>Year</th>
                            <th>CreatedAt</th>
                            @can('can create youth')
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead></table>--}}


        <div class="table-responsive">
            <table class="table table-hover table-bordered " id="table">
                <thead>
                    <tr>
                        @can('can create youth')
                        <th>Action</th>
                        @endcan
                        <th class="filter">Name</th>
                        <th>DOB</th>
                        <th>Age</th>
                        <th class="filter">Gender</th>
                        <th class="filter">Nationality</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Education</th>
                        <th>Occupation</th>
                        <th>ThematicArea</th>
                        <th>DataSource/Program</th>
                        <th>Year</th>
                        <th>CreatedAt</th>

                    </tr>
                </thead>
                {{-- <thead id="searchRow">
                    <tr>

                        <th></th>
                        <th class="filter"></th>
                        <th></th>
                        <th></th>
                        <th class="filter"></th>
                        <th class="filter"></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>


                    </tr>
                </thead> --}}
                <tbody>

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
                <h4 class="modal-title" id="myModalLabel">Add Youth Database</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="post" action="{{ url('youth_info') }}" enctype="multipart/form-data">
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
                                <label for="dob">DOB</label>
                                <input class="form-control {{ $errors->has('dob') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('dob') }}" name="dob" id="dob" type="date" required>
                                @if ($errors->has('dob'))
                                <div class="form-control-feedback">{{ $errors->first('dob') }}</div>
                                @endif
                            </div>
                        </div>
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
                                <label for="phone">Phone</label>
                                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('phone') }}" name="phone" id="phone" type="phone" required>
                                @if ($errors->has('phone'))
                                <div class="form-control-feedback">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location">Gender</label>
                                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" required
                                    name="gender" id="gender">
                                    <option value="">--Select--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @if ($errors->has('gender'))
                                <div class="form-control-feedback">{{ $errors->first('gender') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <input class="form-control {{ $errors->has('nationality') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('nationality') }}" name="nationality" id="nationality"
                                    type="text" required>
                                @if ($errors->has('nationality'))
                                <div class="form-control-feedback">{{ $errors->first('nationality') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="education">Education</label>
                                <input class="form-control {{ $errors->has('education') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('education') }}" name="education" id="education" type="text"
                                    required>
                                @if ($errors->has('education'))
                                <div class="form-control-feedback">{{ $errors->first('education') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="occupation">Occupation</label>
                                <input class="form-control {{ $errors->has('occupation') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('occupation') }}" name="occupation" id="occupation"
                                    type="text" required>
                                @if ($errors->has('occupation'))
                                <div class="form-control-feedback">{{ $errors->first('occupation') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}


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
                                <label for="data_source">Data Source</label>
                                <input class="form-control {{ $errors->has('data_source') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('data_source') }}" name="data_source" id="data_source"
                                    type="text" required>
                                @if ($errors->has('data_source'))
                                <div class="form-control-feedback">{{ $errors->first('data_source') }}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input class="form-control {{ $errors->has('year') ? 'is-invalid' : '' }}"
                                    value="{{ Request::old('year') }}" name="year" id="year" type="text" required>
                                @if ($errors->has('year'))
                                <div class="form-control-feedback">{{ $errors->first('year') }}</div>
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
<script>
    $(document).ready(function() {
         
            // $('#table thead#searchRow th.filter').each( function () {
            // var title = $(this).text();
            // $(this).append( '<input type="text" class="form-control" style="width:150px" placeholder="Search '+title+'" />' );
            // } );
    
          var table =   $('#table').DataTable({
                processing: true,
                 serverSide: true,
                //"ajax": "/api/youth-info",
                ajax: {
                    url:'{{ route('fetchYouthInfo') }}',
                    data: function (d) {
                        d.searchName = $('#searchName').val(),
                        d.searchGender = $('#searchGender').val(),
                        d.searchCountry = $('#searchCountry').val(),
                        d.search = $('input[type="search"]').val()
                    }},
               
                columns: [
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    { data: 'name', name: 'name' },
                    { data: 'dob', name: 'dob' },
                    { data: 'age', name: 'age' },
                    { data: 'gender', name: 'gender' },
                    { data: 'nationality', name: 'nationality' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'education', name: 'education' },
                    { data: 'occupation', name: 'occupation' },
                    { data: 'thematic_area', name: 'thematic_area' },
                    { data: 'data_source', name: 'data_source' },
                    { data: 'year', name: 'year' },
                    { data: 'created_at', name: 'created_at' },
                ]

            });
    

        $('#searchGender').change(function(){
            table.draw();
        });
        $('#searchName,#searchCountry').on('input',function(){
            table.draw();
        });
    });
</script>
@stop