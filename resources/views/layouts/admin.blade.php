<!DOCTYPE html>
<html lang="en">

<head>
   
    <title>Youth DBMS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/assets/vali/css/main.css')}}">
    {{-- Easy30 css --}}
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/css/easy30.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    @yield('header');
</head>

<body class="app sidebar-mini rtl">
    {{-- Loader --}}
    <div id="loading-bar-spinner" class="spinner"><div class="spinner-icon"></div></div>
    <!-- Navbar-->
    <header class="app-header">
        <a class="app-header__logo px-0" href="#"> <img src="{{asset('assets/images/logo.jpeg')}}" style="width:100%; height:80px;" alt="logo"> </a>
        {{-- <a class="app-header__logo" href="#"> <span>Youth DBMS</span> </a> --}}
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <span style="color: white;font-weight:bolder;font-size:16px; margin:auto">YOUTH DIVISION</span>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">   
            <!-- User Menu-->
            <li class="dropdown">
                <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
                    <i class="fa fa-user fa-lg"></i>
                </a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-lg"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        @yield('top-bar')
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('partials.menu')
    <main class="app-content">
        @yield('content')
    </main>

    <section>
        <!-- Essential javascripts for application to work-->
        <script src="{{asset('/assets/vali/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('/assets/vali/js/popper.min.js')}}"></script>
        <script src="{{asset('/assets/vali/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/assets/vali/js/sweetalert.min.js')}}"></script>
        <script src="{{asset('/assets/vali/js/main.js')}}"></script>
         <!-- Page specific javascripts-->
        <!-- Data table plugin-->
        <script type="text/javascript" src="{{asset('/assets/vali/js/plugins/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/assets/vali/js/plugins/dataTables.bootstrap.min.js')}}"></script>
        <script type="text/javascript">$('#sampleTable').DataTable();</script>
        <script type="text/javascript">$('#sampleTable2').DataTable();</script>
        <!-- Page specific javascripts-->
        <!-- Google analytics script-->
        
        @yield('footer')
    </section>

</body>

</html>

</html>