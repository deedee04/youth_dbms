<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
  <!-- Favicons -->
  <link href="{{asset('nsb/img/logo.png')}}" rel="icon">
  <link href="{{asset('nsb/img/logo.png')}}" rel="apple-touch-icon">
    {{-- summer note --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/magnific-popup.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/jquery.selectBox.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/dropzone.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/rangeslider.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/animate.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/leaflet.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/slick.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/slick-theme.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/map.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/easy30.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/jquery.mCustomScrollbar.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/fonts/flaticon/font/flaticon.css') }}">



    <title>Yuth DBMS</title>
  </head>
  <body>
      
    <div class="container">
        <div class="row">
            
        <a href="#intro" class="scrollto"><img style="width:92.7px; height:40px;" src="{{asset('nsb/img/logo.png')}}" alt="" title=""></a>
            <div class="" style="margin:auto;">
                <div class="content-form-box"><br><br>
                    <h3 class="login-header" >SignUp</h3><hr>
                     @include('partials.alerts')
                     <form method="post" action="{{url('add_speaker')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control {{$errors->has('name')? 'is-invalid':''}}" value="{{Request::old('name')}}"
                                        name="name" id="name" type="text" required>                                    
                                    @if ($errors->has('name'))
                                    <div class="form-control-feedback">{{$errors->first('name')}}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="expertise">Area of Expertise</label>
                                        <input class="form-control {{$errors->has('expertise')? 'is-invalid':''}}" value="{{Request::old('expertise')}}"
                                            name="expertise" id="expertise" type="text" required>                                    
                                        @if ($errors->has('expertise'))
                                        <div class="form-control-feedback">{{$errors->first('expertise')}}</div>
                                        @endif
                                    </div>
                                </div>{{-- end col --}}
                               
                        </div>{{--End row--}}
    
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input class="form-control {{$errors->has('email')? 'is-invalid':''}}" value="{{Request::old('email')}}"
                                            name="email" id="email" type="email" required>                                    
                                        @if ($errors->has('email'))
                                        <div class="form-control-feedback">{{$errors->first('email')}}</div>
                                        @endif
                                    </div>
                                </div>{{-- end col --}}
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input class="form-control {{$errors->has('phone')? 'is-invalid':''}}" value="{{Request::old('phone')}}"
                                                name="phone" id="phone" type="phone" required>                                    
                                            @if ($errors->has('phone'))
                                            <div class="form-control-feedback">{{$errors->first('phone')}}</div>
                                            @endif
                                        </div>
                                    </div>{{-- end col --}}
                                    
                            </div>{{--End row--}}
    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input class="form-control {{$errors->has('location')? 'is-invalid':''}}" value="{{Request::old('location')}}"
                                            name="location" id="location" type="text" required>                                    
                                        @if ($errors->has('location'))
                                        <div class="form-control-feedback">{{$errors->first('location')}}</div>
                                        @endif
                                    </div>
                                </div>{{-- end col --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input class="form-control {{$errors->has('photo')? 'is-invalid':''}}" value="{{Request::old('photo')}}"
                                            name="photo" id="photo" type="file" required>                                    
                                        @if ($errors->has('photo'))
                                        <div class="form-control-feedback">{{$errors->first('photo')}}</div>
                                        @endif
                                    </div>
                                </div>{{-- end col --}}
                                        
                                </div>{{--End row--}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="photo">Profile</label>
                                        <textarea id="summernote" name="profile" required class="form-control">{{Request::old('profile')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <p>By signing up you agree to our <a href="{{url('terms')}}" target="_blank">terms and conditions</a></p>
                    <button class="btn btn-primary">Submit</button> &nbsp&nbsp<a href="{{url('/')}}" style="color:red">Go Back</a>
                </div>
                </div>
                
            </div>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
  </body>
</html>