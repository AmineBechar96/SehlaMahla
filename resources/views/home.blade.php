<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Home</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <link rel="stylesheet" type="text/css"
        href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/swiper.min.css">
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce-shop.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce-details.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <!-- END: Page CSS-->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->
    <style>
        html body .content.app-content {
            padding-top: 3rem;
        }

        #searchbar:focus {
            border: none;
            box-shadow: none;
        }

        .swiper-responsive-breakpoints.swiper-container .swiper-slide {
            padding: 0;
            background: none;
        }

        .swiper-container .swiper-shadow {
            box-shadow: none !important;
        }

        .fitt {
            object-fit: cover !important;
            object-position: center !important;
            width: 100% !important;
            height: 280px !important;
            border-radius: 5px 5px 0 0;
        }

        @media (max-width: 1199.98px) {
            body.horizontal-layout .content .content-wrapper {
                margin-top: 1rem !important;
            }
        }

        .carousel-captionn {
            position: absolute;
            right: 52%;
            bottom: 33%;
            left: 5%;
            z-index: 10;
            padding-top: auto;
            color: #000;
            text-align: left;

        }

        .carousel-captionn h1 {
            font-size: 68px;
        }

        .carousel-captionn p {
            font-size: 16px;

        }

        .carousel-control-next-icon {
            background-image: none !important;
        }

        .carousel-control-prev-icon {
            background-image: none !important;

        }

        /* On screens that are 992px or less,$
        set the background color to blue*/
        @media screen and (max-width: 769px) {
            .carousel-captionn {
                position: absolute;
                right: 55%;
                bottom: 36%;
                left: 5%;
                z-index: 10;
                padding-top: auto;
                color: #000;
                text-align: left;
            }

            .carousel-captionn h1 {
                font-size: 28px;
            }

            .carousel-captionn p {
                line-height: 1rem;
                font-size: 12px;
            }

            html body .content.app-content {
                padding-top: 3rem;
            }
        }

        /* On screens that are 600px or less, set the background color to olive */
        @media screen and (max-width:528px) {
            .carousel-captionn {
                position: absolute;
                right: 50%;
                bottom: 20%;
                left: 5%;
                z-index: 10;
                padding-top: auto;
                color: #000;
                text-align: left;
            }

            .carousel-captionn h1 {
                font-size: 25px;
            }

            .carousel-captionn p {
                font-size: 8px;
                line-height: 1rem;
            }
        }

        /* On screens that are 600px or less, set the background color to olive */
        @media screen and (max-width:461px) {
            .carousel-captionn {
                position: absolute;
                right: 48%;
                bottom: 21%;
                left: 5%;
                z-index: 10;
                padding-top: auto;
                color: #000;
                text-align: left;
            }

            .carousel-captionn h1 {
                font-size: 20px;
            }

            .carousel-captionn button {
                font-size: 8px;
                padding: 9px 11px;
                width: 73px;
            }

            .carousel-captionn p {
                font-size: 7px;
                line-height: 1rem;
            }

            .carousel-captionn a {

                padding: 0.5rem 1.5rem;
                font-size: 0.7rem;
                line-height: 1;
                border-radius: 2rem;
            }

            html body .content.app-content {
                padding-top: 3rem;
            }

            #filter {
                font-size: 10px;
            }


        }

        #logsm {
            margin-left: 8rem !important;
        }

        @media (min-width: 768px) {
            #logsm {
                margin-left: 18rem !important;
            }
        }





        @media (max-width: 768px) {
            #resultsection {
                z-index: 11;
                margin-top: 7rem;
                width: 100%;
            }
        }

        @media (max-width: 1399.98px) {
            #resultsection {
                z-index: 11;
                margin-top: 7rem;
                width: 100%;
            }
        }


        @media (max-width: 461px) {
            #resultsection {
                z-index: 11;
                margin-top: 5.5rem;
                width: 100%;
            }
        }

        #resultline:hover {
            background: #e2e2e2;
        }
    </style>
    @livewireStyles

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  ecommerce-application footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar" href="../../../html/ltr/horizontal-menu-template/index.html">
                        <div class="brand-logo"><img src="../../../app-assets/images/logo/llll.png" height="85"
                                width="120" alt=""></div>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">





                    @guest
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link  hidden-xs"
                                    href="{{ route('login') }}"><span>
                                        <img class="" src="../../../app-assets/images/icons/home.png" alt="avatar"
                                            height="25" width="25"></span></a>
                            </li>

                            <li id="logsm" class="nav-item d-xl-none ml-md-5
        
                                    ml-2">
                                <a class="nav link" href="../../../html/ltr/horizontal-menu-template/index.html">
                                    <div class="brand-logo"><img src="../../../app-assets/images/logo/llll.png"
                                            height="65" width="85" alt=""></div>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block "><a class="nav-link font-weight-bold "
                                    href="{{ route('login') }}" data-toggle="tooltip" data-placement="top"
                                    title="Dashboard"><span>
                                        <img src="../../../app-assets/images/icons/home.png" alt="avatar" height="25"
                                            width="25"></span></a></li>


                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <!--li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                    class="selected-language">English</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"
                                    data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a
                                    class="dropdown-item" href="#" data-language="fr"><i
                                        class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"
                                    data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a
                                    class="dropdown-item" href="#" data-language="pt"><i
                                        class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                        </li-->

                        <li class="dropdown dropdown-user nav-item"><a class="nav-link dropdown-user-link"
                                href="{{ route('login') }}">
                                <div class="user-nav d-sm-flex d-none mt-1 "><span
                                        class="user-name text-bold-600">S'inscrire
                                    </span></div><span><span>
                                        <img class="round mt-1" src="../../../app-assets/images/icons/login.png"
                                            alt="avatar" height="25" width="25"></span>
                            </a>

                        </li>
                    </ul>
                    @else
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">

                                @can('isClient') <a class="nav-link" href="{{ url('client/dashboard') }}"
                                    data-toggle="tooltip" data-placement="top" title="Dashboard"><span>
                                        <img src="../../../app-assets/images/icons/home.png" alt="avatar" height="25"
                                            width="25"></span></a>
                                @endcan
                                @can('isProvider')
                                <a class="nav-link" href="{{ url('provider/dashboard') }}" data-toggle="tooltip"
                                    data-placement="top" title="Dashboard"><span>
                                        <img src="../../../app-assets/images/icons/home.png" alt="avatar" height="25"
                                            width="25"></span></a>
                                @endcan
                            </li>

                            <li id="logsm" class="nav-item d-xl-none ml-md-5
                
                                            ml-2">
                                <a class="nav link" href="{{url('home')}}">
                                    <div class="brand-logo"><img src="../../../app-assets/images/logo/llll.png"
                                            height="65" width="85" alt=""></div>
                                </a>
                            </li>
                        </ul>
                        @can('isClient')
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link"
                                    href="{{ url('client/dashboard') }}" data-toggle="tooltip" data-placement="top"
                                    title="Dashboard"><span>
                                        <img src="../../../app-assets/images/icons/home.png" alt="avatar" height="25"
                                            width="25"></span></a></li>


                        </ul>
                        @endcan
                        @can('isProvider')
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link font-weight-bold "
                                    href="{{ url('provider/dashboard') }}" data-toggle="tooltip" data-placement="top"
                                    title="Dashboard"><span>
                                        <img src="../../../app-assets/images/icons/home.png" alt="avatar" height="25"
                                            width="25"></span></a></li>


                        </ul>
                        @endcan

                    </div>
                    <ul class="nav navbar-nav float-right">
                        <!--li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                        id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                            class="selected-language">English</span></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"
                                            data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a
                                            class="dropdown-item" href="#" data-language="fr"><i
                                                class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"
                                            data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a
                                            class="dropdown-item" href="#" data-language="pt"><i
                                                class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                                </li-->
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                                data-toggle="dropdown">@if (auth()->user()->unreadNotifications->count()>0)
                                <i class="ficon feather icon-bell"></i><span
                                    class="badge badge-pill badge-primary badge-up">{{auth()->user()->unreadNotifications->count()}}</span>
                                @else
                                <i class="ficon feather icon-bell"></i>
                                @endif</a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">{{auth()->user()->unreadNotifications->count()}} Nouveau</h3>
                                        <span class="notification-title">App
                                            Notifications</span>
                                    </div>
                                </li>
                                @can('isProvider')
                                <li class="scrollable-container media-list">
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                    @if ($notification->type=="App\Notifications\NewServiceBooking" or
                                    $notification->type=="App\Notifications\BookingHasBeenRescheduled")

                                    <a class="d-flex justify-content-between"
                                        href="{{url('provider/'.$notification->data['booking_id'].'/notification/'.$notification->id)}}">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="{{$notification->data['color']}} media-heading ">
                                                    {{$notification->data['title']}}
                                                </h6>
                                                <small class="notification-text">
                                                    <span class="font-weight-bold">
                                                        {{$notification->data['user_name']}}</span>
                                                    {{$notification->data['sub_title']}}
                                                    <span
                                                        class="font-weight-bold">{{$notification->data['service_name']}}</span></small>
                                            </div><small>
                                                <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                                </time></small>
                                        </div>
                                    </a>
                                    @else
                                    <a class="d-flex justify-content-between" href="{{url('provider/users-list')}}">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="{{$notification->data['color']}} media-heading ">
                                                    {{$notification->data['title']}}
                                                </h6>
                                                <small class="notification-text">
                                                    <span class="font-weight-bold">
                                                        {{$notification->data['user_name']}}</span>
                                                    {{$notification->data['sub_title']}}
                                                    <span
                                                        class="font-weight-bold">{{$notification->data['service_name']}}</span></small>
                                            </div><small>
                                                <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                                </time></small>
                                        </div>
                                    </a>
                                    @endif

                                    @endforeach
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                        href="{{url('provider/markasread')}}">Tout marquer comme lu</a></li>

                                @endcan
                                @can('isClient')
                                <li class="scrollable-container media-list">
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                    @if ($notification->type=="App\Notifications\Client\BookingHasBeenAccepted" or
                                    $notification->type=="App\Notifications\Client\BookingHasBeenStarted" or
                                    $notification->type=="App\Notifications\Client\BookingHasBeenFinished")

                                    <a class="d-flex justify-content-between"
                                        href="{{url('client/'.$notification->data['booking_id'].'/notification/'.$notification->id)}}">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6
                                                    class="{{$notification->data['color']}} media-heading font-weight-bold ">
                                                    {{$notification->data['title']}}
                                                </h6>
                                                <small class="notification-text">
                                                    <span class="font-weight-bold">
                                                        {{$notification->data['service_name']}}</span>
                                                    {{$notification->data['sub_title']}}
                                                </small>
                                            </div><small>
                                                <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                                </time></small>
                                        </div>
                                    </a>
                                    @elseif($notification->type=="App\Notifications\Client\NewProviderCoupon")
                                    <a class="d-flex justify-content-between"
                                        href="{{url('client/'.$notification->data['coupon_id'].'/coupon/'.$notification->id)}}">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6
                                                    class="{{$notification->data['color']}} media-heading font-weight-bold ">
                                                    {{$notification->data['title']}}
                                                </h6>
                                                <small class="notification-text">
                                                    <span class="font-weight-bold">
                                                        {{$notification->data['service_name']}}</span>
                                                    {{$notification->data['sub_title']}}
                                                </small>
                                            </div><small>
                                                <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                                </time></small>
                                        </div>
                                    </a>
                                    @else
                                    <a class="d-flex justify-content-between" href="{{url('provider/users-list')}}">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i
                                                    class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="{{$notification->data['color']}} media-heading ">
                                                    {{$notification->data['title']}}
                                                </h6>
                                                <small class="notification-text">
                                                    <span class="font-weight-bold">
                                                        {{$notification->data['user_name']}}</span>
                                                    {{$notification->data['sub_title']}}
                                                    <span
                                                        class="font-weight-bold">{{$notification->data['service_name']}}</span></small>
                                            </div><small>
                                                <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                                </time></small>
                                        </div>
                                    </a>
                                    @endif

                                    @endforeach
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                        href="{{url('client/markasread')}}">Tout marquer comme lu</a></li>
                                @endcan

                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span
                                        class="user-name text-bold-600">{{ucwords(Auth::user()->name)}}</span><span
                                        class="user-status">@if (!is_null(Auth::user()->email_verified_at))
                                        <span class="text-success"><i class="feather icon-check"></i>Verifié</span>
                                        @else
                                        <span class="text-warning"><i class="feather icon-x"></i>Non Verifié</span>
                                        @endif</span></div>

                                @if (Auth::user()->role=='Client')
                                <span>
                                    <img class="round" src="../../../app-assets/images/icons/client3.png" alt="avatar"
                                        height="30" width="30"></span>
                                @else
                                <span>
                                    <img class="round" src="../../../app-assets/images/icons/provider3.png" alt="avatar"
                                        height="30" width="30"></span>
                                @endif


                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!--a class="dropdown-item"
                                    href="page-user-profile.html"><i class="feather icon-user"></i> Edit Profile</a><a
                                    class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My
                                    Inbox</a><a class="dropdown-item" href="app-todo.html"><i
                                        class="feather icon-check-square"></i> Task</a><a class="dropdown-item"
                                    href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div--><a class="dropdown-item"
                                    href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-formm').submit();"><i
                                        class="feather icon-power"></i> Logout</a>
                                <form id="logout-formm" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endguest


                </div>
            </div>
        </div>
    </nav>

    <!-- END: Header-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Basic Carousel And Optional Carousel start -->
                <section id="basic-carousel">

                    <div class="row">

                        <div class="col-md-12 col-sm-12">
                            <div class="card" style="margin:0;">

                                <div class="card-content">
                                    <div class="card-body" style="padding:0;">
                                        <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators mb-4">
                                                <li data-target="#carousel-example-caption" data-slide-to="0"
                                                    class="active"></li>
                                                <li data-target="#carousel-example-caption" data-slide-to="1"></li>
                                                <li data-target="#carousel-example-caption" data-slide-to="2"></li>
                                                <li data-target="#carousel-example-caption" data-slide-to="3"></li>
                                                <li data-target="#carousel-example-caption" data-slide-to="4"></li>
                                            </ol>
                                            <div class="carousel-inner" role="listbox">

                                                <div class="carousel-item active">
                                                    <img class="img-fluid rounded"
                                                        src="../../../app-assets/images/slider/hamburgur.png"
                                                        alt="Second slide">
                                                    <div class="carousel-captionn">

                                                        <h1 class="font-weight-bold text-white">Meilleurs Restaurants à
                                                            Travers le Pays </h1>
                                                        <p class="font-weight-bold text-white">Avec sahla mahla, vous
                                                            pouvez
                                                            réserver des tables , demandez de plats en ligne et
                                                            bien plus encore profitez de la livraison
                                                            .</p>
                                                        @guest
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1 "
                                                            href="{{route('login')}}">Découvrir</a>
                                                        @else
                                                        @can('isClient')
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{url('client/16/browze')}}">Découvrir</a>
                                                        @endcan
                                                        @endguest

                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded"
                                                        src="../../../app-assets/images/slider/cakee.png"
                                                        alt="Third slide">
                                                    <div class="carousel-captionn">

                                                        <h1 class="text-white  font-weight-bold">Choisissez vos Gâteaux
                                                            les plus sucrés
                                                        </h1>
                                                        <p class=" text-white font-weight-bold"> Pour
                                                            vos anniversaires et fêtes , demandez en ligne les
                                                            meilleures gateaux avec sahla mahla
                                                        </p>
                                                        @guest
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{route('login')}}">Découvrir</a>
                                                        @else
                                                        @can('isClient')
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{url('client/92/browze')}}">Découvrir</a>
                                                        @endcan
                                                        @endguest
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded"
                                                        src="../../../app-assets/images/slider/doctor-3.png"
                                                        alt="Third slide">
                                                    <div class="carousel-captionn">

                                                        <h1 class="text-white font-weight-bold">Profitez des meilleurs
                                                            Soins de Santé </h1>
                                                        <p class=" text-white font-weight-bold">Trouvez tous les
                                                            médecins et cliniques autour de vous, vous pouvez réserver
                                                            facilement votre rendez-vous
                                                            .</p>
                                                        @guest
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{route('login')}}">Découvrir</a>
                                                        @else
                                                        @can('isClient')
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{url('client/41/browze')}}">Découvrir</a>
                                                        @endcan
                                                        @endguest
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded"
                                                        src="../../../app-assets/images/slider/deliv.png"
                                                        alt="Third slide">
                                                    <div class="carousel-captionn">

                                                        <h1 class="text-white  font-weight-bold">
                                                            Livraison la plus proche de vous

                                                        </h1>
                                                        <p class=" text-white font-weight-bold">Connectez avec tous les
                                                            expéditeurs à travers le pays avec différents véhicules et
                                                            types de transport
                                                            .</p>
                                                        @guest
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{route('login')}}">Découvrir</a>
                                                        @else
                                                        @can('isClient')
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{url('client/86/browze')}}">Découvrir</a>
                                                        @endcan
                                                        @endguest
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded"
                                                        src="../../../app-assets/images/slider/friznd.png"
                                                        alt="Third slide">
                                                    <div class="carousel-captionn">

                                                        <h1 class="text-white font-weight-bold">Les crèches
                                                            la plus proche de vous
                                                        </h1>
                                                        <p class=" text-white font-weight-bold">Vous avez besoin d'une
                                                            crèche pour vos enfants ? vous n'avez plus besoin de
                                                            chercher,
                                                            sahla mahla vous donne la solution.</p>
                                                        @guest
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{route('login')}}">Découvrir</a>
                                                        @else
                                                        @can('isClient')
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{url('client/19/browze')}}">Découvrir</a>
                                                        @endcan
                                                        @endguest
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded"
                                                        src="../../../app-assets/images/slider/cameraa.png"
                                                        alt="Third slide">
                                                    <div class="carousel-captionn">

                                                        <h1 class="text-white font-weight-bold">Capturez les
                                                            beaux
                                                            moments
                                                        </h1>
                                                        <p class=" text-white font-weight-bold">Vous pouvez maintenant
                                                            embaucher les caméramans les mieux notés pour votre fête de
                                                            mariage et vos événements
                                                            .</p>
                                                        @guest
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{route('login')}}">Découvrir</a>
                                                        @else
                                                        @can('isClient')
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{url('client/66/browze')}}">Découvrir</a>
                                                        @endcan
                                                        @endguest
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded"
                                                        src="../../../app-assets/images/slider/work.png"
                                                        alt="Third slide">
                                                    <div class="carousel-captionn">

                                                        <h1 class="text-white font-weight-bold">Un réseau
                                                            d'entreprises & startups

                                                        </h1>
                                                        <p class=" text-white font-weight-bold">Trouvez vos meilleures
                                                            affaires avec un vaste réseau d'entreprises et
                                                            d'entrepreneurs de tous les domaines
                                                            .</p>
                                                        @guest
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{route('login')}}">Découvrir</a>
                                                        @else
                                                        @can('isClient')
                                                        <a class="btn bg-white round text-dark font-weight-bold mb-1"
                                                            href="{{url('client/104/browze')}}">Découvrir</a>
                                                        @endcan
                                                        @endguest
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Carousel And Optional Carousel start end -->

                <section id="faq-search" class="ml-1 mr-1" style="margin-top:-40px">
                    @livewire('main-search');
                </section>
                <!-- categories  Section -->
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title w-100 font-weight-bold">
                                Categoriees
                            </h4>

                            <div class="heading-elements">
                                @guest
                                <a href="{{route('login')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @else

                                @endguest
                                @can('isClient')
                                <a href="{{url('client/categories')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan
                                @can('isProvider')
                                <a href="{{url('provider/categories')}}"> <span
                                        class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan
                            </div>
                        </div>
                        <hr>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">


                                    <div class="col-6 col-lg-2 col-md-4 ">
                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                            }
                                            
                                            ">
                                            <div class="card-content rounded">
                                                <img class="img-fluid rounded mt-1 " width="100" height="100"
                                                    src="../../../app-assets/images/backgrounds/work.png"
                                                    alt="img placeholder">
                                                <div class="card-body">
                                                    <h6 class="font-weight-bold" style="color:orange"> Construction</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 col-md-4 ">
                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                            }
                                            
                                            ">
                                            <div class="card-content">
                                                <img class="img-fluid rounded mt-1"
                                                    src="../../../app-assets/images/backgrounds/make.png"
                                                    alt="img placeholder" width="100" height="100">
                                                <div class="card-body">
                                                    <h6 class="font-weight-bold" style="color:purple"> Salon de Beauté
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 col-lg-2 col-md-4 ">
                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                            }
                                            
                                            ">
                                            <div class="card-content">
                                                <img class="img-fluid rounded mt-1"
                                                    src="../../../app-assets/images/backgrounds/ship.png" width="100"
                                                    height="100" alt="img placeholder">
                                                <div class="card-body">
                                                    <h6 class="font-weight-bold text-success"> Livraison</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 col-md-4 ">
                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                            }
                                            
                                            ">
                                            <div class="card-content">
                                                <img class="img-fluid rounded mt-1"
                                                    src="../../../app-assets/images/backgrounds/cooo.png" width="100"
                                                    height="100" alt="img placeholder">
                                                <div class="card-body">
                                                    <h6 class="font-weight-bold text-primary"> Cuisinier</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 col-md-4 ">
                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                                }
                                                
                                                ">
                                            <div class="card-content">
                                                <img class="img-fluid rounded mt-1"
                                                    src="../../../app-assets/images/backgrounds/health.png" width="100"
                                                    height="100" alt="img placeholder">
                                                <div class="card-body">
                                                    <h6 class="font-weight-bold text-danger"> Santé</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2 col-md-4 ">
                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                                    }
                                                    
                                                    ">
                                            <div class="card-content">
                                                <img class="img-fluid rounded mt-1"
                                                    src="../../../app-assets/images/backgrounds/law.png" width="100"
                                                    height="100" alt="img placeholder">
                                                <div class="card-body">
                                                    <h6 class="font-weight-bold text-success"> Affaires légales</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--div class="col-lg-3 col-md-4 col-sm-6 mb-1">
                            <img class="img-fluid rounded fit"
                                src="../../../app-assets/images/backgrounds/noimage.png"
                                alt="img placeholder">
                        </div-->
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- categories Section -->


                <!-- recommendez pour vous Section -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title w-100 font-weight-bold">
                                Recommender
                            </h4>

                            <div class="heading-elements">
                                @guest
                                <a href="{{route('login')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @else


                                @can('isClient')
                                <a href="{{url('client/recommended')}}"> <span
                                        class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan
                                @can('isProvider')
                                <a href="{{url('provider/recommended')}}"> <span
                                        class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan @endguest
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">

                            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                                <div class="swiper-wrapper">
                                    @foreach ($recommended as $service)
                                    <div class="swiper-slide rounded swiper-shadow">

                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                                        }
                                                        
                                                        ">
                                            <div class="card-content">
                                                <a href="{{url($service->type->name.'/agency-details/'.$service->id)}}">
                                                    <img class="img-fluid  fitt" src="{{$service->service_image_url}}"
                                                        alt="img placeholder"></a>
                                                <div class="card-body text-left">
                                                    <h6 class="font-weight-bold">{{$service->title}}</h6>
                                                    @if ($service->ratings->avg('number_of_starts') > 0)
                                                    <p class=" card-text mb-25 font-weight-bold text-warning">
                                                        @for ($i = 0; $i < $service->ratings->avg('number_of_starts');
                                                            $i++) <i class="feather icon-star">
                                                            </i>
                                                            @endfor
                                                            <span class="text-primary"> / Utilisé :
                                                                {{$service->total}}
                                                                Fois</span>
                                                    </p>
                                                    @else
                                                    <p class=" card-text mb-25 font-weight-bold text-secondary">
                                                        <i class="feather icon-star">
                                                        </i>
                                                        <span class="text-primary"> / Utilisé :
                                                            {{$service->total}}
                                                            Fois</span>
                                                    </p>
                                                    @endif

                                                    <p class="">
                                                        <span class="text-success"> <i
                                                                class="feather icon-bookmark"></i>
                                                            {{trans('types.'.$service->type->name)}}</span>

                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- sante  Section -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title w-100 font-weight-bold">
                                Medecins & Dentistes
                            </h4>

                            <div class="heading-elements">
                                @guest
                                <a href="{{route('login')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @else


                                @can('isClient')
                                <a href="{{url('client/9/types')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan
                                @can('isProvider')
                                <a href="{{url('provider/9/types')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan @endguest </div>
                        </div>
                        <hr>
                        <div class="card-body">

                            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                                <div class="swiper-wrapper">
                                    @foreach ($doctors as $doc)
                                    <div class="swiper-slide rounded swiper-shadow">

                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                                            }
                                                            
                                                            ">
                                            <div class="card-content">
                                                <a href="{{url($doc->type->name.'/agency-details/'.$doc->id)}}"><img
                                                        class="img-fluid  fitt" src="{{$doc->service_image_url}}"
                                                        alt="img placeholder"></a>
                                                <div class="card-body text-left">
                                                    <h6 class="font-weight-bold">{{$doc->title}}</h6>
                                                    @if ($doc->ratings->avg('number_of_starts') > 0)
                                                    <p class=" card-text mb-25 font-weight-bold text-warning">
                                                        @for ($i = 0; $i < $doc->ratings->avg('number_of_starts');
                                                            $i++) <i class="feather icon-star">
                                                            </i>
                                                            @endfor
                                                            <span class="text-primary"> / Utilisé :
                                                                {{$doc->total}}
                                                                Fois</span>
                                                    </p>
                                                    @else
                                                    <p class=" card-text mb-25 font-weight-bold text-secondary">
                                                        <i class="feather icon-star">
                                                        </i><span class="text-primary"> / Utilisé :
                                                            {{$doc->total}}
                                                            Fois</span>
                                                    </p>
                                                    @endif
                                                    <p class="">
                                                        <span class="text-success"> <i
                                                                class="feather icon-bookmark"></i>
                                                            {{trans('types.'.$doc->type->name)}}</span>

                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                            </div>
                        </div>
                    </div>
                </section>


                <!-- restaurant Section -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title w-100 font-weight-bold">
                                Restaurants
                            </h4>

                            <div class="heading-elements">
                                @guest
                                <a href="{{route('login')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @else


                                @can('isClient')
                                <a href="{{url('client/16/types')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan
                                @can('isProvider')
                                <a href="{{url('provider/16/types')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan @endguest
                            </div>
                        </div>

                        <hr>
                        <div class="card-body">

                            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                                <div class="swiper-wrapper">
                                    @foreach ($restaurants as $restaurant)
                                    <div class="swiper-slide rounded swiper-shadow">

                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                                            }
                                                            
                                                            ">
                                            <div class="card-content">
                                                <a
                                                    href="{{url($restaurant->type->name.'/agency-details/'.$restaurant->id)}}">
                                                    <img class="img-fluid  fitt"
                                                        src="{{$restaurant->service_image_url}}"
                                                        alt="img placeholder"></a>
                                                <div class="card-body text-left">
                                                    <h6 class="font-weight-bold">{{$restaurant->title}}</h6>
                                                    @if ($restaurant->ratings->avg('number_of_starts') > 0)
                                                    <p class=" card-text mb-25 font-weight-bold text-warning">
                                                        @for ($i = 0; $i < $restaurant->
                                                            ratings->avg('number_of_starts');
                                                            $i++) <i class="feather icon-star">
                                                            </i>
                                                            @endfor
                                                            <span class="text-primary"> / Utilisé :
                                                                {{$restaurant->total}}
                                                                Fois</span>
                                                    </p>
                                                    @else
                                                    <p class=" card-text mb-25 font-weight-bold text-secondary">
                                                        <i class="feather icon-star">
                                                        </i><span class="text-primary"> / Utilisé :
                                                            {{$restaurant->total}}
                                                            Fois</span>
                                                    </p>
                                                    @endif
                                                    <p class="">
                                                        <span class="text-success"> <i
                                                                class="feather icon-bookmark"></i>
                                                            {{trans('types.'.$restaurant->type->name)}}</span>

                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                            </div>
                        </div>
                    </div>
                </section>

                <!-- shipper and trnasporter Section -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title w-100 font-weight-bold">
                                Livraison & Transport
                            </h4>

                            <div class="heading-elements">
                                @guest
                                <a href="{{route('login')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @else


                                @can('isClient')
                                <a href="{{url('client/27/types')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan
                                @can('isProvider')
                                <a href="{{url('provider/27/types')}}"> <span class="text-warning font-weight-bold">Voir
                                        Plus</span></a>
                                @endcan @endguest
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">

                            <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                                <div class="swiper-wrapper">
                                    @foreach ($transporters as $transporter)
                                    <div class="swiper-slide rounded swiper-shadow">

                                        <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 0.5rem rgb(34 41 47 / 25%) !important;
                                                                }
                                                                
                                                                ">
                                            <div class="card-content">
                                                <a
                                                    href="{{url($transporter->type->name.'/agency-details/'.$transporter->id)}}"><img
                                                        class="img-fluid  fitt"
                                                        src="{{$transporter->service_image_url}}"
                                                        alt="img placeholder"></a>
                                                <div class="card-body text-left">
                                                    <h6 class="font-weight-bold">{{$transporter->title}}</h6>
                                                    @if ($transporter->ratings->avg('number_of_starts') > 0)
                                                    <p class=" card-text mb-25 font-weight-bold text-warning">
                                                        @for ($i = 0; $i < $transporter->
                                                            ratings->avg('number_of_starts');
                                                            $i++) <i class="feather icon-star">
                                                            </i>
                                                            @endfor
                                                            <span class="text-primary"> / Utilisé :
                                                                {{$transporter->total}}
                                                                Fois</span>
                                                    </p>
                                                    @else
                                                    <p class=" card-text mb-25 font-weight-bold text-secondary">
                                                        <i class="feather icon-star">
                                                        </i><span class="text-primary"> / Utilisé :
                                                            {{$transporter->total}}
                                                            Fois</span>
                                                    </p>
                                                    @endif
                                                    <p class="">
                                                        <span class="text-success"> <i
                                                                class="feather icon-bookmark"></i>
                                                            {{trans('types.'.$transporter->type->name)}}</span>

                                                    </p>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach


                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 mb-0"><span
                class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<a
                    class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">SAHLA MAHLA,</a>All rights Reserved</span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>

    <script src="../../../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/swiper.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <script src="../../../app-assets/js/scripts/pages/app-ecommerce-details.js"></script>

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    @livewireScripts
    <script>
        window.addEventListener('showModal',function(e){     
    $('#filterResults').modal('show');
    });
   
    </script>
</body>
<!-- END: Body-->

</html>