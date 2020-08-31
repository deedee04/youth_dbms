@extends('layouts.admin')
@section('users') active @stop
@section('header')
    {{-- summer note --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@stop
@section('mail') active @stop
@section('content')
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-envelope"></i> Mail</h1>
        </div>
    </div>

    <div class="tile">
        <div class="tile-body">
            @include('partials.alerts')
            <form method="post" action="{{ url('send_mail') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input class="form-control {{ $errors->has('subject') ? 'is-invalid' : '' }}"
                                value="{{ Request::old('subject') ? Request::old('subject') : '' }}" name="subject"
                                id="subject" type="text" required>
                            @if ($errors->has('subject'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('subject') }}</div>
                            @endif
                        </div>
                    </div>{{-- end col
                    --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="age">Message</label>
                            <textarea id="summernote" cols="4"
                                class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message"
                                id="message" type="number"
                                required>{{ Request::old('message') ? Request::old('message') : '' }}</textarea>
                            @if ($errors->has('message'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('message') }}</div>
                            @endif
                        </div>
                    </div>{{-- end col
                    --}}

                </div>{{--End
                row--}}
        </div>
    </div>

    <div class="tile">
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered " id="sampleTable">
                    <thead>
                        <tr>
                            <th><label>CheckAll<input id="checkall" type="checkbox" /></label></th>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($youthInfos as $info)
                            <tr>
                                <td><input class="checkone"  type="checkbox"  name="email[]" value="{{ $info->email }}"  />
                                </td>
                                <td>{{ $info->name }}</td>
                                <td>{{ $info->dob }}</td>
                                <td>{{ $info->age }}</td>
                                <td>{{ $info->gender }}</td>
                                <td>{{ $info->nationality }}</td>
                                <td>{{ $info->email }}</td>
                                <td>{{ $info->phone }}</td>
                                <td>{{ $info->education }}</td>
                                <td>{{ $info->occupation }}</td>
                                <td>{{ $info->thematic_area }}</td>
                                <td>{{ $info->data_source }}</td>
                                {{-- <td>{{ date('d-m-Y', strtotime($user->JoinDate)) }}</td>
                                --}}
                                <td><input  type="checkbox"  name="email[]" value="{{ $info->email }}"  /></td>
                             
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary">Send Mail</button><br>
                </form>
            </div>
        </div>
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

        let checkone = document.getElementsByClassName("checkone");
        document.getElementById("checkall").addEventListener("click", (e) => {
            if (e.target.checked) {
                for (let one of Array.from(checkone)) {
                    one.checked = true;
                }
            } else {
                for (let one of Array.from(checkone)) {
                    one.checked = false;
                }
            }
        })

    </script>
@stop
