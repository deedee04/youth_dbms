@extends('layouts.master')
@section('nav_topbar')
@stop
@section('body')
<!-- Login page start -->
<div class="login-page">
    <div class="container-fluid">
        <div class="row">
            
            <div class="" style="margin:auto;">
                <div class="content-form-box">
                    <h1 class="login-header">Login</h1>
                     @include('partials.alerts')
                    <p>Please enter your email and password to login</p>
                    <form id="login_form" method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <div class="form-check checkbox-theme">
                                <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Keep Me Signed In
                                </label>
                            </div>
                        </div>
                        <button type="submit" id="btnlogin" class="btn btn-color btn-md">Login</button>
                    </form>
                    <hr>
                        <div class="pull-right">
                            <p>Don't have an account?<a href="{{url('/register')}}"> Sign Up Now</a></p>
                        </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Login page end -->
@stop
@section('script')
    <script>
       
    </script>
@stop