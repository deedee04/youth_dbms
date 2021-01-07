@extends('layouts.admin')
@section('dashboard') active @stop
@section('content')
<div class="app-title">
    <div>
        <h1>
            <i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
</div>
<div class="row">
    @can('can view')
    <div class="col-md-6 col-lg-4">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Users</h4>
                <p><b>{{$countUser}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
                <h4>Youth</h4>
                <p><b>{{$countYouthInfo}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-building fa-3x"></i>
            <div class="info">
                <h4>Youth Org</h4>
                <p><b>{{$countYouthOrg}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-home fa-3x"></i>
            <div class="info">
                <h4>Partners</h4>
                <p><b>{{$countPartners}}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-building fa-3x"></i>
            <div class="info">
                <h4>Community Eng.</h4>
                <p><b>{{$countCom}}</b></p>
            </div>
        </div>
    </div>

    @endcan
</div>
@stop
@section('script')

@stop