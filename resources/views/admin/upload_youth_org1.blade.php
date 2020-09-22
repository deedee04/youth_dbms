@extends('layouts.admin')
@section('content') active @stop
@section('header')
    {{-- summer note --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@stop
@section('youth_info') active @stop
@section('content')
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-user"></i> Youth Info</h1>
        </div>
    </div>

    <div class="tile">
        <div class="tile-body">
            @include('partials.alerts')
            <form method="post" action="{{ url('upload_youth_org') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <a href="{{ asset('assets/excel_template/youth_org_template.xlsx') }}">Download
                                Excel Template</a>
                        </div>
                    </div>{{-- end col
                    --}}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="excel_file">Excel File</label>
                            <input class="form-control {{ $errors->has('excel_file') ? 'is-invalid' : '' }}"
                                name="excel_file" id="excel_file" type="file" required>
                            @if ($errors->has('excel_file'))
                                <div class="form-control-feedback">
                                    {{ $errors->first('excel_file') }}</div>
                            @endif
                        </div>
                    </div>{{-- end col
                    --}}
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button class="btn btn-primary">Submit</button>
            </form>
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
