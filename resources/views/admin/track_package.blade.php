<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from themegeniuslab.com/html/mikago/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Nov 2019 16:04:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="irstheme">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Pacific - Logistics & Transportation </title>
    
    <link href={{asset('assets/css/themify-icons.css')}} rel="stylesheet">
    <link href={{asset('assets/css/flaticon.css')}} rel="stylesheet">
    <link href={{asset('assets/css/bootstrap.min.css')}} rel="stylesheet">
    <link href={{asset('assets/css/animate.css')}} rel="stylesheet">
    <link href={{asset('assets/css/owl.carousel.css')}} rel="stylesheet">
    <link href={{asset('assets/css/owl.theme.css')}} rel="stylesheet">
    <link href={{asset('assets/css/slick.css')}} rel="stylesheet">
    <link href={{asset('assets/css/slick-theme.css')}} rel="stylesheet">
    <link href={{asset('assets/css/swiper.min.css')}} rel="stylesheet">
    <link href={{asset('assets/css/owl.transitions.css')}} rel="stylesheet">
    <link href={{asset('assets/css/odometer-theme-default.css')}} rel="stylesheet">
    <link href={{asset('assets/css/jquery.fancybox.css')}} rel="stylesheet">
    <link href={{asset('assets/css/style.css')}} rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
       <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ddb91ded96992700fc9119b/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
        <!--End of Tawk.to Script-->
    <style>
            #cover-spin {
           position:fixed;
           width:100%;
           left:0;right:0;top:0;bottom:0;
           background-color: rgba(255,255,255,0.7);
           z-index:9999;
           display:none;
           }
       
           @-webkit-keyframes spin {
             from {-webkit-transform:rotate(0deg);}
             to {-webkit-transform:rotate(360deg);}
           }
       
           @keyframes spin {
             from {transform:rotate(0deg);}
             to {transform:rotate(360deg);}
           }
       
           #cover-spin::after {
               content:'';
               display:block;
               position:absolute;
               left:48%;top:40%;
               width:40px;height:40px;
               border-style:solid;
               border-color:black;
               border-top-color:transparent;
               border-width: 4px;
               border-radius:50%;
               -webkit-animation: spin .8s linear infinite;
               animation: spin .8s linear infinite;
           }
       
         </style>

</head>
<body>
        <div id="cover-spin"></div>
        <!-- start page-wrapper -->
        <div class="page-wrapper">
    
            <!-- start preloader -->
            <div class="preloader">
                <div class="sk-folding-cube">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
            <!-- end preloader -->
    
            <!-- Start header -->
            <header id="header" class="site-header header-style-3">
                <div class="topbar">
                    <div class="container">
                        <div class="row">
                            <div class="col col-sm-3">
                               
                            </div>
                            <div class="col col-sm-9">
                                <div class="text">
                                    <p>Do you want any logistics service, Contact Us</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end container -->
                </div> <!-- end topbar -->
    
                <nav class="navigation navbar navbar-default">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="open-btn">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index-2.html"><img src="assets/images/logo-2.png" alt></a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse navbar-right navigation-holder">
                            <button class="close-navbar"><i class="ti-close"></i></button>
                            <ul class="nav navbar-nav">
                                <li class="menu-item">
                                    <a href="#home">Home</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#services">Services</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#about">About us</a>
                                </li>
                            </ul>
                        </div><!-- end of nav-collapse -->
    
                        <div class="search-contact">
                            <div class="contact">
                                <a href="#track" class="theme-btn contactUs">Track Package</a>
                            </div>
                        </div>
                    </div><!-- end of container -->
                </nav>
            </header>
            <!-- end of header -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Shippers Address</h3><hr> <p>{{$item->name}}</p>
                        <p>{{$item->shippers_email}}</p>
                        <p>{{$item->shippers_phone}}</p>
                        <p>{{$item->shippers_address}}</p>
                        <p>{{$item->shippers_country}}</p>
                    </div>
                    <div class="col-md-6">
                        <h3>Receivers Address</h3><hr>
                        <p>{{$item->firstname.' '.$item->middlename.' '.$item->lastname}}</p>
                        <p>{{$item->address}}</p>
                        <p>{{$item->phone}}</p>
                        <p>{{$item->email}}</p>
                        <p>{{$item->country}}</p>

                    </div>
                </div>
                <div class="row">
                    <h3>Shipment Information</h3><hr>
                    <div class="col-md-3">
                        <b>Origin:</b>
                        <p>{{$item->shippers_country}}</p>
                    </div>
                    <div class="col-md-3">
                        <b>Package</b>
                        <p>{{$item->product}}</p>
                    </div>
                    <div class="col-md-3">
                        <b>Status</b>
                        <p>{{$item->status}}</p>
                    </div>
                    <div class="col-md-3">
                        <b>Destination</b>
                        <p>{{$item->country}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <b>Qty</b>
                        <p>{{$item->number}}</p>
                    </div>
                    <div class="col-md-3">
                        <b>Total Freight</b>
                        <p>{{$item->total_freight}}</p>
                    </div>
                    <div class="col-md-3">
                        <b>Payment Mode</b>
                        <p>{{$item->payment_mode}}</p>
                    </div>
                    <div class="col-mod-3">
                        <b>Excpected Delivery Date</b>
                        <p>{{$item->delivery_date}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <b>Depature Time</b>
                        <p>{{$item->depature_time}}</p>
                    </div>
                    <div class="col-md-3">
                            <b>Pick up Time</b>
                            <p>{{$item->pickup_time}}</p>
                        </div>
                    <div class="col-md-3">
                        <b>Shipment Mode</b>
                        <p>{{$item->shipment_mode}}</p>
                    </div>
                    
                </div>
                <diV class="row">
                    <div class="col-md-6">
                        <b>Comments</b>
                        <p>{{$item->comments}}</p>
                    </div>
                </diV>

            </div>
     <!-- start site-footer -->
     <footer class="site-footer">
            <div class="upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-3 col-md-3 col-sm-6">
                            <div class="widget about-widget">
                                <div class="logo widget-title">
                                    <img src="assets/images/logo-2.png" alt>
                                </div>
                                {{-- <p>Mikago arm towards the viewer gregor then turned to look out the window at the dull weather</p> --}}
                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-3 col-sm-6">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Usefull Links</h3>
                                </div>
                                <ul>
                                    <li><a href="#about">About us</a></li>
                                    <li><a href="#services">Our services</a></li>
                                    <li><a href="#contact">Contact us</a></li>
                                  
                                </ul>
                                {{-- <ul>
                                    <li><a href="#">Provacu Policy</a></li>
                                    <li><a href="#">Testimonials</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul> --}}
                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-3 col-sm-6">
                            <div class="widget contact-widget service-link-widget">
                                <div class="widget-title">
                                    <h3>Our Address</h3>
                                </div>
                                <ul>
                                    <li>19/11 New town avene, new Dusting, Canada</li>
                                    {{-- <li><span>Phone:</span> 12347541</li> --}}
                                    <li><span>Email:</span> info@pacificexpress.com</li>
                                    <li><span>Office Time:</span> 09AM- 5PM</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-3 col-sm-6">
                            <div class="widget newsletter-widget">
                                <div class="widget-title">
                                    <h3>Newsletter</h3>
                                </div>
                                <p>You will be notified when somthing new will be appear.</p>
                                <form>
                                    <div class="input-1">
                                        <input type="email" class="form-control" placeholder="Email Address *" required>
                                    </div>
                                    <div class="submit clearfix">
                                        <button type="submit"><i class="ti-email"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="separator"></div>
                        <div class="col col-xs-12">
                            <p class="copyright">Copyright &copy; PacificCargoExpress 2019 .</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end site-footer -->
    </div>
    <!-- end of page-wrapper -->



    <!-- All JavaScript files
    ================================================== -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <!-- Plugins for this template -->
    <script src="{{asset('assets/js/jquery-plugin-collection.js')}}"></script>

    <!-- Custom script for this template -->
    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        document.getElementById("trackButton").addEventListener("click",e=>{
        e.preventDefault();
        if(document.getElementById("trackForm").checkValidity()){
           $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "post",
                data: $("#trackForm").serialize() ,
                url: "<?php echo url('track_item')?>",
                beforeSend:function(){
                  $('#cover-spin').show(0)
                },
                success: function (data) {
                    if(data.status){
                        let msg = 'Name: '+data.name+'\n\n Phone: '+data.phone+'\n\n Email: '+data.email+'\n\n Delivery Date: '+data.delivery_date+'\n\n Item weight: '+data.weight+'\n\n Number of Items: '+data.number+'\n\n Current location of Item: '+data.location+'\n\n Delivery Country: '+data.country+'\n\n Delivery Address: '+data.address
                        swal({
                            title: "Success!",
                            text: msg,
                            icon: "success",
                            button: "Ok!",
                        });
                    }
                    else{
                        swal({
                            title: "Error!",
                            text: "Item not found!",
                            icon: "error",
                            button: "Ok!",
                        });
                    }

                },
                error: function(data){
                    swal({
                        title: "Error!",
                        text: "Something Went Wrong !",
                        icon: "error",
                        button: "Ok!",
                    });
                },
                complete: function(){
                  $('#cover-spin').hide(0);
                }

            });


        }
        else{
          document.getElementById("trackForm").reportValidity();
        }

        });
    </script>
</body>

</html>