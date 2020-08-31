<!DOCTYPE html>
<html>
<head>
   
    <title>@yield('title') Youth DBMS </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- External CSS libraries -->
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

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}" type="image/x-icon" > 

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('/assets/dashboard/css/style.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('/assets/dashboard/css/skins/green-light.css')}}">
    @yield('header')

</head>
<body id="top">
<section>
    <!-- main header start -->
    <header class="main-header sticky-header" id="main-header-2">
        @yield("nav_topbar")
    </header>
    <!-- main header end -->
    
    @yield('body')
    
   
</section>

{{-- <section>
    <!-- Footer start -->
    <footer class="footer">
        @yield("footer")
        <div class="container footer-inner">
             <div class="footer-top">
                <div class="footer-top-left">
                    <p></p>
                    
                    <div class="social">
                        <a href="https://www.facebook.com/Easy30-2398894787001491/" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/easy30app" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/easy30app/" target="_blank"><i class="fa fa-instagram"></i></a>
                        <!-- <a href="https://www.linkedin.com/company/techvibes-international-limited" target="_blank"><i class="fa fa-linkedin"></i></a> -->
                        <a href="{{ url('/contact-us') }}" target="_blank"><i class="fa fa-envelope" target="_blank"></i></a>
                        <!-- <a href="https://www.youtube.com/channel/UCIeiwTpOUSMt_FH6HYdBjNQ" target="_blank"><i class="fa fa-youtube"></i></a> -->
                    </div><!-- /.social -->                                 
                </div><!-- /.footer-top-left -->

                <div class="footer-top-right">
                    <h2>Subscribe To Newsletter</h2>

                    <form method="post"  id="newsletter" name="newsletter">
                        <div class="alert alert-success" id="newsnotificationmsg" style="display:none">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="alert alert-danger" id="newsfailuremsg" style="display:none">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="input-group">
                            <input id="SubscriptionEmail" name="SubscriptionEmail" type="email" class="form-control" placeholder="Your e-mail address" required>
                            <span class="input-group-btn">
                                <button id="newsletterSubmit" class="btn btn-primary" type="submit" onclick="event.preventDefault(); subscribe();">Subscribe</button>
                            </span><!-- /.input-group-btn -->
                        </div><!-- /.form-group -->
                    </form>             

                    <p>
                        * We promise not to send spam messages.
                    </p>                    
                </div><!-- /.footer-top-right -->
            </div><!-- /.footer-top -->

            <div class="footer-bottom">
                <div class="footer-left">
                   Easy30 Ltd  {{ date('Y') }} . All Rights reserved.
                </div><!-- /.footer-left -->

                <div class="footer-right">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a href="{{ url('/use-easy30') }}" target="_blank" class="nav-link">FAQ</a></li>
                        <li class="nav-item"><a href="{{ url('/easy30/terms-conditions') }}" target="_blank" class="nav-link">Terms &amp; Conditions</a></li>
                        <li class="nav-item"><a href="{{ url('/contact-us') }}" class="nav-link">Contact</a></li>
                    </ul>
                </div><!-- /.footer-right -->           
            </div><!-- /.footer-bottom -->
        </div>
    </footer>
    <!-- Footer end -->

    <!-- Full Page Search -->
    <div id="full-page-search">
        @yield("full_page_search")
        <button type="button" class="close">×</button>
        <form action="#">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="button" class="btn btn-sm btn-color">Search</button>
        </form>
    </div>

    <!-- Property Video Modal -->
    <div class="modal property-modal fade" id="propertyModal" tabindex="-1" role="dialog" aria-labelledby="propertyModalLabel" aria-hidden="true">
        @yield("property_video")
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="propertyModalLabel">
                        Find Your Dream Properties
                    </h5>
                    <p>
                        <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i> 123 Kathal St. Tampa City,
                    </p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 modal-left">
                            <div class="modal-left-content">
                                <div id="modalCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <iframe class="modalIframe" src="https://www.youtube.com/embed/5e0LxrLSzok"  allowfullscreen></iframe>
                                        </div>
                                        <div class="carousel-item">
                                            <img src="http://placehold.it/400x266" alt="Test ALT">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="http://placehold.it/400x266" alt="Test ALT">
                                        </div>
                                    </div>
                                    <a class="control control-prev" href="#modalCarousel" role="button" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>
                                    <a class="control control-next" href="#modalCarousel" role="button" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                                <div class="description"><h3>Description</h3>
                                    <p>
                                        Curabitur odio nibh, luctus non pulvinar a, ultricies ac diam. Donec neque
                                        massa, viverra interdum eros ut, imperdiet pellentesque mauris. Proin sit amet scelerisque
                                        risus. Donec
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 modal-right">
                            <div class="modal-right-content bg-white">
                                <strong class="price">
                                    $178,000
                                </strong>
                                <section>
                                    <h3>Features</h3>
                                    <ul class="bullets">
                                        <li><i class="flaticon-bed"></i> Double Bed</li>
                                        <li><i class="flaticon-swimmer"></i> Swimming Pool</li>
                                        <li><i class="flaticon-bath"></i> 2 Bathroom</li>
                                        <li><i class="flaticon-car-repair"></i> Garage</li>
                                        <li><i class="flaticon-parking"></i> Parking</li>
                                        <li><i class="flaticon-theatre-masks"></i> Home Theater</li>
                                        <li><i class="flaticon-old-typical-phone"></i> Telephone</li>
                                        <li><i class="flaticon-green-park-city-space"></i> Private space</li>
                                    </ul>
                                </section>
                                <section>
                                    <h3>Overview</h3>
                                    <dl>
                                        <dt>Area</dt>
                                        <dd>2500 Sq Ft:3400</dd>
                                        <dt>Condition</dt>
                                        <dd>New</dd>
                                        <dt>Year</dt>
                                        <dd>2018</dd>
                                        <dt>Price</dt>
                                        <dd>$178,000</dd>
                                    </dl>
                                </section>
                                <a href="properties-details.html" class="btn btn-show btn-theme">Show Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Off-canvas sidebar -->
    <div class="off-canvas-sidebar">
        @yield("canvas_sidebar")
        <div class="off-canvas-sidebar-wrapper">
            <div class="off-canvas-header">
                <a class="close-offcanvas" href="#"><span class="fa fa-times"></span></a>
            </div>
            <div class="off-canvas-content">
                <aside class="canvas-widget">
                    <div class="logo-sitebar text-center">
                        <img src="{{ asset('assets/img/logos/logo.png')}}" alt="logo"> 
                    </div>
                </aside>
                <aside class="canvas-widget">
                    <ul class="menu">
                        <li class="menu-item menu-item-has-children"><a href="index.html">Home</a></li>
                        <li class="menu-item"><a href="properties-grid-leftside.html">Properties List</a></li>
                        <li class="menu-item"><a href="properties-details.html">Property Detail</a></li>
                        <li class="menu-item"><a href="blog-single-sidebar-right.html">Blog</a></li>
                        <li class="menu-item"><a href="about-1.html">About  US</a></li>
                        <li class="menu-item"><a href="contact-1.html">Contact US</a></li>
                    </ul>
                </aside>
                <aside class="canvas-widget">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-vk"></i></a></li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</section> --}}

<section>
<!-- External JS libraries -->
    
    <script src="{{ asset('/assets/dashboard/js/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/jquery.selectBox.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/rangeslider.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/jquery.filterizr.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/wow.min.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/backstretch.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/jquery.countdown.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/jquery.scrollUp.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/particles.min.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/typed.min.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/dropzone.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/leaflet.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/leaflet-providers.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/leaflet.markercluster.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/slick.min.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/maps.js') }}"></script>
    <script src="{{ asset('/assets/dashboard/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script>
    <script src="{{ asset('assets/dashboard/js/ie-emulation-modes-warning.js') }}"></script>
    <!-- Custom JS Script -->
    <script  src="{{ asset('/assets/dashboard/js/app.js') }}"></script>
    <!--Sweet Alert-->
    <script  src="{{ asset('/assets/dashboard/js/sweetalert.min.js') }}"></script>
    <script>
    
</script>
    @yield("script")
</section>
</body>
</html>