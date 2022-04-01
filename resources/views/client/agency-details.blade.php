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
    <title>Services - {{$service->title}}</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" type="text/css"
        href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/swiper.css">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
        href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/swiper.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce-details.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">


    <!-- END: Custom CSS-->
    <style>
        /* rating */
        .rating-css div {
            color: #ffe400;
            font-size: 25px;
            font-family: sans-serif;
            font-weight: 800;
            text-align: center;
            text-transform: uppercase;
            padding: 20px 0;
        }

        .rating-css input {
            display: none;

        }

        .rating-css input+label {
            font-size: 50px;
            text-shadow: 1px 1px 0 #8f8420;
            cursor: pointer;
            color: #f2df0a !important;
        }

        .rating-css input:checked+label~label {
            color: #bdbcb5 !important;
        }

        .rating-css label:active {
            transform: scale(0.8);
            transition: 0.3s ease;
        }

        .fit {
            object-fit: cover;
            object-position: center;
            width: 100%;
            height: 280px !important;

        }


        @font-face {
            font-family: 'Cairo', sans-serif;

            unicode-range: 0600–06FF;
        }

        /*badges*/
        .Bronze {
            background-color: #772f1a;
            background-image: linear-gradient(315deg, #772f1a 0%, #f2a65a 74%);
        }

        .Silver {
            background-color: #2f4353;
            background-image: linear-gradient(315deg, #2f4353 0%, #d2ccc4 74%);
        }

        .Gold {
            background-color: #946310;
            background-image: linear-gradient(315deg, #85570c 0%, #ffdd00 74%);
        }

        .Platinium {
            background-color: #861657;
            background-image: linear-gradient(326deg, #861657 0%, #ffa69e 74%);
        }

        .prod {
            width: 100%;
            height: 190px;
            border-radius: 5px 5px 0 0;
        }

        #logsm {
            margin-left: 8rem !important;
        }

        @media (min-width: 768px) {
            #logsm {
                margin-left: 18rem !important;
            }
        }

        .service-input {
            height: 41px;
            border: 0.16rem solid #e3e4e6;
        }
    </style>
    @guest

    <style>
        html body .content.app-content {
            padding-top: 3.5rem;
        }

        @media (max-width: 1199.98px) {
            body.horizontal-layout .content .content-wrapper {
                margin-top: 1rem !important;
            }
        }
    </style>
    @endguest
</head>
<!-- END: Head-->
@guest

<body class="horizontal-layout horizontal-menu 2-columns ecommerce-application  footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">
    @else

    <body class="horizontal-layout horizontal-menu 2-columns ecommerce-application navbar-floating  footer-static  "
        data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
        @endguest


        <!-- BEGIN: Header-->
        @include('layouts.header')
        <!-- END: Header-->


        <!-- BEGIN: Main Menu-->
        @guest

        @else
        @include('layouts.horizontal-menu-features')
        @endguest

        <!-- END: Main Menu-->
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="form-group breadcrum-left">
                    <div class="dropdown">
                        <a class=" btn btn-primary btn-round" href="{{url()->previous()}}">
                            <i class="feather icon-arrow-left"></i> RETOUR</a>

                    </div>
                </div>
                <div class="content-body">
                    <!-- app ecommerce details start -->
                    <section class="app-ecommerce-details">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-5 mt-2">
                                    <div
                                        class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                        <div
                                            class="d-flex align-items-center justify-content-center mb-lg-auto mb-md-auto">

                                            <img class="img-fluid rounded" src="{{$service->service_image_url}}"
                                                alt="img-placeholder">


                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">

                                        <h3 class="titlearabic font-weight-bold">{{$service->title}}
                                        </h3>
                                        <p class="text-muted">SAHLA MAHLA
                                        </p>
                                        <div class="ecommerce-details-price d-flex flex-wrap">
                                            <p class="text-black font-medium-1 mr-1 mb-0"><i
                                                    class="feather icon-check-square text-success"></i>
                                                <span>{{count($service->bookings)}}
                                                    Réservations</span>

                                            </p>
                                            <span class="pl-1 font-medium-3 border-left">

                                                @for ($i = 0; $i < $service->ratings->avg('number_of_starts'); $i++)
                                                    <i class="feather icon-star text-warning"></i>
                                                    @endfor

                                            </span>
                                            <span
                                                class="ml-50 text-dark font-medium-1">{{round($service->ratings->count())}}
                                                reviews</span>

                                        </div>
                                        <div class="ecommerce-details-price d-flex flex-wrap">

                                            <p class="text-black font-medium-1 mr-1 mb-0"><i
                                                    class="feather icon-user text-primary"></i>
                                                <span>{{$numberOfUsers}}
                                                    Abonnées</span>

                                            </p>

                                            <span class="pl-1 font-medium-3 border-left ml-1"><i
                                                    class="fa fa-heart text-danger"></i></span> <span
                                                class="ml-50 text-dark font-medium-1">{{$numberOfLikes}}
                                                J'adors</span>

                                        </div>


                                        <hr>
                                        <h6 class="font-weight-bold">Description</h6>
                                        <p>{{$service->body}}</p>
                                        @php
                                        $tags = explode(' ', $service->tags);

                                        @endphp

                                        <p class="font-weight-bold">

                                            @foreach ($tags as $tag)
                                            <div class="chip chip-warning mr-1">
                                                <div class="chip-body">

                                                    <span class="chip-text">{{'#'.$tag}}</span> </div>
                                            </div>
                                            @endforeach



                                        </p>
                                        <hr>
                                        <div class=" d-flex mt-0" title="Platinium">
                                            @if ($badgecolor->badge_color=="Bronze")
                                            <img src="../../../app-assets/images/icons/{{$badgecolor->badge_color}}.png"
                                                class="mr-1" width="50" height="50" alt="">
                                            @elseif($badgecolor->badge_color=="Silver")
                                            <img src="../../../app-assets/images/icons/Bronze.png" class="mr-1"
                                                width="50" height="50" alt="">
                                            <img src="../../../app-assets/images/icons/{{$badgecolor->badge_color}}.png"
                                                class="mr-1" width="50" height="50" alt="">
                                            @elseif($badgecolor->badge_color=="Gold")
                                            <img src="../../../app-assets/images/icons/Bronze.png" class="mr-1"
                                                width="50" height="50" alt="">
                                            <img src="../../../app-assets/images/icons/Silver.png" class="mr-1"
                                                width="50" height="50" alt="">
                                            <img src="../../../app-assets/images/icons/{{$badgecolor->badge_color}}.png"
                                                class="mr-1" width="50" height="50" alt="">
                                            @else
                                            <img src="../../../app-assets/images/icons/Bronze.png" class="mr-1"
                                                width="50" height="50" alt="">
                                            <img src="../../../app-assets/images/icons/Silver.png" class="mr-1"
                                                width="50" height="50" alt="">
                                            <img src="../../../app-assets/images/icons/Gold.png" class="mr-1" width="50"
                                                height="50" alt="">
                                            <img src="../../../app-assets/images/icons/{{$badgecolor->badge_color}}.png"
                                                class="mr-1" width="50" height="50" alt="">
                                            @endif



                                        </div>
                                        <hr>
                                        <p class="font-weight-bold"> <i
                                                class="feather icon-map-pin mr-50 font-medium-2"></i>{{$service->address}}
                                        </p>
                                        <hr>


                                        @php
                                        $date = \Carbon\Carbon::now()->locale('fr')->dayName;
                                        @endphp
                                        <p> <span class="font-weight-bold"><i
                                                    class="feather icon-calendar mr-50 font-medium-2"></i>
                                                Disponibilité</span> -
                                            @if (in_array($date,$schedule->days_of_service) )
                                            <span class="text-success font-weight-bold">Ouvert</span> de <span
                                                class="text-primary font-weight-bold">{{$schedule->hour_of_starting}}
                                                am</span> à <span
                                                class="text-danger font-weight-bold">{{$schedule->hour_of_closing}}
                                                pm</span>

                                            @else
                                            <span class="text-danger font-weight-bold ">Fermé</span>
                                            @endif


                                            {{$schedule->hour_of_start}}</span>
                                        </p>



                                        <hr>
                                        @if (! is_null($service->website))
                                        <p><span class="font-weight-bold">Website</span> - <span class="text-primary"><a
                                                    href="{{$service->website}}">{{$service->website}}</a></span>
                                        </p>

                                        <hr>

                                        @endif

                                        <p>Trouver dans le Map - <span class="text-success"><a href=""
                                                    class="cursor-pointer" data-toggle="modal" data-target="#large"
                                                    data-nom="{{$service->title}}" data-lat="{{$service->latitude}}"
                                                    data-long="{{$service->longitude}}"><i
                                                        class="feather icon-map mr-50 font-medium-2"></i></a></span>
                                        </p>

                                        <div class="d-flex flex-column flex-sm-row">
                                            @guest
                                            <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"
                                                data-toggle="modal" data-target="#danger2"><i
                                                    class="fas fa-hand-pointer mr-25"></i>RESERVER</button>



                                            <button class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#danger2"><i class="feather icon-star mr-25"></i>DONNER
                                                AVIS</button>


                                            @else

                                            @if (Auth::user()->hasVerifiedEmail())
                                            @can('isClient')
                                            <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"
                                                data-toggle="modal" data-target="#composeForm"><i
                                                    class="fas fa-hand-pointer mr-25"></i>RESERVER</button>
                                            <button class="btn btn-outline-danger" data-toggle="modal"
                                                data-target="#danger"><i class="feather icon-star mr-25"></i>DONNER
                                                AVIS</button>
                                            @else
                                            <div class="flex flex-column">
                                                <h6 class="font-weight-bold">Partager Avec:</h6>

                                                <a class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"
                                                    href="{{$facebooklink}}"><i
                                                        class="feather icon-facebook mr-25"></i>Facebook</a>
                                                <a class="btn btn-info" href="{{$linkedinlink}}"><i
                                                        class="feather icon-linkedin mr-25"></i>LinkedIn
                                                </a>
                                            </div>

                                            @endcan

                                            @else
                                            <a class="btn btn-outline-danger" href="{{url('auth.verify-email')}}"><i
                                                    class="feather icon-star mr-25"></i>DONNER
                                                AVIS</a>
                                            @endif

                                            @endguest

                                        </div>
                                        <hr>
                                        @if ($accounts)
                                        <a href="{{$accounts->facebook}}"
                                            class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i
                                                class="feather icon-facebook"></i></a>
                                        <a href="{{$accounts->linkedin}}"
                                            class="btn btn-icon rounded-circle btn-outline-info mr-1 mb-1"><i
                                                class="feather icon-linkedin"></i></a>

                                        <a href="{{$accounts->instagram}}"
                                            class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i
                                                class="feather icon-instagram"></i></a>
                                        @else
                                        <a href="#" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i
                                                class="feather icon-facebook"></i></a>
                                        <a href="#" class="btn btn-icon rounded-circle btn-outline-info mr-1 mb-1"><i
                                                class="feather icon-linkedin"></i></a>

                                        <a href="#" class="btn btn-icon rounded-circle btn-outline-primary mr-1 mb-1"><i
                                                class="feather icon-instagram"></i></a>
                                        @endif

                                    </div>
                                </div>
                            </div>

                        </div>

                    </section>


                    @if (count($products)>0)
                    <!-- Gallery Section -->
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title w-100 font-weight-bold">
                                    Produits & Taches
                                </h4>

                                <div class="heading-elements">
                                    <span class="text-warning font-weight-bold">Voir Plus</span>
                                </div>
                            </div>
                            <hr>

                            <div class="card">
                                <div class="card-body">
                                    <div class="row">

                                        @forelse ($products as $product)
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 1rem rgb(34 41 47 / 25%) !important;
                                                            }
                                                            
                                                            ">
                                                <div class="card-content">
                                                    <img src="{{$product->product_image_url}}" alt="element 04"
                                                        class="img-fluid prod">
                                                    <div class="card-body">
                                                        <h6 class="font-weight-bold">{{$product->name}}</h6>
                                                        <p class="card-text mb-25 font-weight-bold text-primary">
                                                            {{$product->unit_price}} DA / <span
                                                                class="text-success">{{$product->pay_type}}</span></p>
                                                        <p class="">
                                                            {{Str::limit($product->description, 20, $end='.......')}}
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty

                                        <div class="col-lg-12 mt-5">
                                            <h4 class="text-primary text-center"><i
                                                    class="feather icon-alert-triangle"></i>
                                                Aucun
                                                Produit Trouvé
                                            </h4>
                                        </div>
                                        @endforelse




                                        <!--div class="col-lg-3 col-md-6 col-sm-12 mb-1">
                                            <img class="img-fluid rounded fit"
                                                src="../../../app-assets/images/backgrounds/noimage.png"
                                                alt="img placeholder">
                                        </div-->
                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                    @endif

                    <!-- Rating Section -->
                    @if (count($rating)>0)
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title w-100 font-weight-bold">
                                    Rating & Reviews
                                </h4>
                                <div class="heading-elements">
                                    <span class="text-warning font-weight-bold">Voir Plus</span>

                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 text-center">
                                    <h1>{{number_format($service->ratings->avg('number_of_starts'), 2, '.', '')}} </h1>
                                    <div class="product-rating font-medium-5">
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                        <i class="feather icon-star text-warning"></i>
                                    </div>
                                    <p>reviews ({{round($service->ratings->count())}})</p>
                                </div>
                            </div>
                            <hr>
                            <div class="card">
                                <div class="card-body">
                                    <div class="media-list">
                                        @foreach ($rating as $rate)
                                        <div class="media">
                                            <a class="media-left" href="#">
                                                <img class="rounded-circle"
                                                    src="../../../app-assets/images/icons/client3.png" alt="avatar"
                                                    height="40" width="40">

                                            </a>

                                            <div class="media-body">
                                                <div class="chip chip-warning float-right">
                                                    <div class="chip-body">

                                                        <span class="chip-text">{{$rate->number_of_starts}} <i
                                                                class="feather icon-star"></i>
                                                        </span> </div>
                                                </div>
                                                <h5 class="media-heading font-weight-bold">
                                                    {{ucwords($rate->user->name)}}</h5>
                                                {{$rate->review}}.
                                                <p class="text-muted">{{$rate->created_at}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        @endforeach
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                    @endif


                    <!-- Other Related Services Section -->
                    @if (count($otheragencies)>0)
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title w-100 font-weight-bold">
                                    Services à Proximité
                                </h4>

                                <div class="heading-elements">

                                    <span class="text-warning font-weight-bold">Voir Plus</span>
                                </div>
                            </div>

                            <hr>
                            <div class="card">
                                <div class="card-body">
                                    <div class="swiper-responsive-breakpoints swiper-container px-4 py-2">
                                        <div class="swiper-wrapper">
                                            @foreach ($otheragencies as $servicey)
                                            <div class="swiper-slide rounded swiper-shadow">
                                                <div class="item-heading">
                                                    <p class="font-weight-bold text-black mb-0">
                                                        {{$servicey->title}}
                                                    </p>
                                                    <p>
                                                        <small>SAHLA</small>
                                                        <small>MAHLA</small>
                                                    </p>
                                                </div>
                                                <div class="img-container w-50 mx-auto my-2 py-75">
                                                    <a
                                                        href="{{url('client/'.$servicey->type->name.'/agency-details/'.$servicey->id)}}">


                                                        <img width="100" height="100" style="border-radius:50%"
                                                            src="{{$servicey->service_image_url}}"
                                                            alt="img-placeholder">


                                                    </a>

                                                </div>
                                                <div class="item-meta">
                                                    <div class="product-rating">
                                                        @for ($i = 0; $i < $servicey->ratings->avg('number_of_starts');
                                                            $i++)
                                                            <i class="feather icon-star text-warning"></i>
                                                            @endfor
                                                            @if ($servicey->ratings->avg('number_of_starts')<1) <i
                                                                class="feather icon-star text-secondary"></i>
                                                                @endif


                                                    </div>
                                                    <p class="text-primary">reviews
                                                        ({{$servicey->ratings->count('id')}})
                                                    </p>
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


                        </div>
                    </div>
                    @endif



                </div>
            </div>
            <!-- Map details -->
            <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel17">Fiche technique de la voiture
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="col-12">
                                <!-- gmaps Examples section start -->
                                <section id="gmaps-basic-maps" aria-labelledby="account-pill-general"
                                    aria-expanded="true">
                                    <!-- Info Window -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">

                                                <div class="card-content">
                                                    <div class="card-body">

                                                        <div id="info-windoww" class="height-400">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </section>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--Add Review Modal -->
            <div class="modal fade text-left" id="danger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-white"
                            style="border-bottom-left-radius: 0; display:block; border-bottom-right-radius: 0">
                            <h5 class="modal-title text-center text-dark" id="myModalLabel110">Donner Avis a <span
                                    style="color:green">{{$service->title}}</span></h5>

                        </div>
                        <form action="{{route('add-rating.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="rating-css">
                                    <div class="star-icon">


                                        <input type="hidden" name="service_rated_id" value="{{$service->id}}">
                                        <input type="radio" value="1" name="service_rating" checked id="rating1">
                                        <label for="rating1" class="feather icon-star"></label>
                                        <input type="radio" value="2" name="service_rating" id="rating2">
                                        <label for="rating2" class="feather icon-star"></label>
                                        <input type="radio" value="3" name="service_rating" id="rating3">
                                        <label for="rating3" class="feather icon-star"></label>
                                        <input type="radio" value="4" name="service_rating" id="rating4">
                                        <label for="rating4" class="feather icon-star"></label>
                                        <input type="radio" value="5" name="service_rating" id="rating5">
                                        <label for="rating5" class="feather icon-star"></label>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <fieldset class="form-label-group">
                                        <textarea class="form-control" name="review" id="label-textarea" rows="7"
                                            style="resize: none;" placeholder="Label in Textarea"></textarea>
                                        <label for="label-textarea">Donner Avis</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="reset" class="btn btn-danger round" data-dismiss="modal">Annuler</button>

                                <button type="submit" class="btn btn-primary round ">Envoyer</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Add Review Modal -->
            <div class="modal fade text-left" id="danger2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-white text-dark"
                            style="border-bottom-left-radius: 0;border-bottom-right-radius: 0">
                            <span style="color:green"> {{$service->title}}</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="bg-transparent mb-0 px-2">



                                <div class="card-content">

                                    <div class="card-body pt-1">
                                        <div class="text-center mb-2"> <i
                                                class="feather icon-alert-triangle text-danger"
                                                style="font-size:4rem"></i>
                                        </div>
                                        <h6 class="text-center mb-1">Cette action nécessite une connexion veuillez vous
                                            connecter pour continuer
                                        </h6>
                                    </div>
                                </div>
                                <div class="login-footer">

                                    <div class="footer-btn d-inline">


                                        <a href="{{route('login')}}" class="font-weight-bold text-primary float-right"
                                            style="padding: 0;
                                        border: none;
                                        background: none;">Login</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="modal fade text-left" id="danger33" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel110" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-white text-dark"
                            style="border-bottom-left-radius: 0;border-bottom-right-radius: 0">
                            <span style="color:green"> {{$service->title}}</span>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="bg-transparent mb-0 px-2">



                                <div class="card-content">

                                    <div class="card-body pt-1">
                                        <div class="text-center mb-2"> <i
                                                class="feather icon-alert-triangle text-danger"
                                                style="font-size:4rem"></i>
                                        </div>
                                        <h6 class="text-center mb-1">Vous ne pouvez pas ajouter un avis , car vous
                                            n'avez
                                            pas réservé ce service auparavant, pour ajouter un avis, votre réservation
                                            doit être acceptée ou complétée
                                        </h6>
                                    </div>
                                </div>
                                <div class="login-footer">

                                    <div class="footer-btn d-inline">


                                        <a href="" data-dismiss="modal"
                                            class="font-weight-bold text-primary float-right" style="padding: 0;
                                    border: none;
                                    background: none;">COMPRIS</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Montrer Numero Modal-->
            <div class="modal fade text-left" id="small" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel19">Contacter <span style="color:green">
                                    {{$service->title}}</span>
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-1">
                                <p class="btn btn-outline-primary mb-3" id="show" onclick="showNumber()"><i
                                        class="feather icon-phone-call"></i>&nbsp;MONTRER NUMERO
                                </p>
                                <h5 class="mb-3" id="number"></h5>
                            </div>
                            <div class="text-center mt-1">
                                <button class="btn btn-primary"><a href="tel:+{{$service->phone}}"
                                        style="color:white"><i
                                            class="feather icon-phone-call"></i>&nbsp;APPELER</a></button>
                                <p class="mt-1"> Ou Appeler Gratuitement via :</p>
                                <button class="btn btn-success"><a style="color:white"
                                        href="https://api.whatsapp.com/send?phone={{$service->phone}}"><i
                                            class="fa fa-whatsapp mr-25"></i>&nbsp;APPELER</a></button>
                            </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Modal-->
            <div class="modal fade text-left" id="composeForm" tabindex="-1" role="dialog"
                aria-labelledby="emailCompose" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-white" style="display:block">
                            <h5 class="modal-title text-center text-warning" id="emailCompose">Réservation de <span
                                    class="text-warning">{{$service->title}}</span></h5>

                        </div>
                        <div class="modal-body  mt-1 pt-1">
                            <p for="radiocolor" class="mb-1 font-weight-bold" style="font-size:0.85rem;"> Quel est le
                                Titre de Votre
                                Reservations ?</p>
                            <form action="{{route('book.store')}}" method="post">
                                @csrf
                                <div class="form-label-group mt-1">
                                    <input type="hidden" value="{{$service->id}}" name="service_id">
                                    <input type="text" id="emailTo" class="service-input form-control"
                                        placeholder="Titre" name="booking_title">
                                    @error('booking_title')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="feather icon-bookmark"></i>
                                    </div>
                                    <label for="emailTo">Titre</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="text" id="emailSubject" class="service-input form-control"
                                        placeholder="Adresse" name="booking_addresse">
                                    @error('booking_addresse')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <div class="form-control-position">
                                        <i class="feather icon-home"></i>
                                    </div>
                                    <label for="emailSubject">Addresse</label>
                                </div>
                                <label for="radiocolor" class="mb-1 font-weight-bold"> Quand vous voulez cette service
                                    ?</label>
                                <ul class="list-unstyled">
                                    <li class="d-inline-block mr-2">

                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-warning">
                                                <input type="radio" name="radiocolor" onclick="collapse(0)" checked
                                                    value="current">

                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Aussitôt que Possible</span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    <li class="d-inline-block">
                                        <fieldset>
                                            <div class="vs-radio-con vs-radio-warning">
                                                <input type="radio" name="radiocolor" onclick="collapse(1)"
                                                    value="schedule">
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="">Planifier une Réservation
                                                </span>
                                            </div>
                                        </fieldset>
                                    </li>
                                    @error('radiocolor')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </ul>
                                <div class="form-label-group mt-1 d-none" id="bookDate">

                                    <input id="bookdate" name="booking_date"
                                        class="service-input form-control pickadate" placeholder="Choisissez une Date">
                                    <div class="form-control-position">
                                        <i class="feather icon-calendar"></i>
                                    </div>

                                </div>
                                <div class="form-label-group d-none" id="bookTime">

                                    <input type="text" id="booktime" name="booking_time"
                                        class="service-input form-control" placeholder="Choisissez le Temps">
                                    <div class="form-control-position">
                                        <i class="feather icon-clock"></i>
                                    </div>


                                </div>
                                <fieldset class="form-label-group mt-1">
                                    <textarea class="form-control service-input" name="booking_description"
                                        id="label-textarea" rows="4" style="resize: none;"
                                        placeholder="Decrire Votre Demande"></textarea>
                                    @error('booking_description')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                    <label for="label-textarea">Decrire Votre Demande</label>
                                </fieldset>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <input type="Reset" value="Annuler" class="btn btn-primary round" data-dismiss="modal">
                            <button type="submit" class="btn btn-warning round">Terminer</button>

                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->
        @include('layouts.footer')
        <!-- END: Footer-->

        <!-- BEGIN: Vendor JS-->
        <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
        <script src="../../../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
        <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBgjNW0WA93qphgZW-joXVR6VC3IiYFjfo"></script>
        <script src="../../../app-assets/vendors/js/charts/gmaps.min.js"></script>
        <script src="../../../app-assets/vendors/js/extensions/swiper.min.js"></script>
        <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        <!-- BEGIN: Theme JS-->
        <script src="../../../app-assets/js/core/app-menu.js"></script>
        <script src="../../../app-assets/js/core/app.js"></script>
        <script src="../../../app-assets/js/scripts/components.js"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="../../../app-assets/js/scripts/pages/app-ecommerce-details.js"></script>
        <script src="../../../app-assets/js/scripts/forms/number-input.js"></script>
        <script src="../../../app-assets/js/scripts/charts/gmaps/maps.js"></script>
        <script src="../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>
        <!-- BEGIN: Page JS-->
        <script src="../../../app-assets/js/scripts/extensions/swiper.js"></script>
        <!-- END: Page JS-->
        <!-- END: Page JS-->
        <script src="../../../app-assets/js/scripts/pages/rent-agency.js"></script>

        @if (session()->has('notbooked'))
        <script>
            $('#danger33').modal('show')        
        </script>


        @endif
        @if (session()->has('success'))
        <script>
            Swal.fire({
      position: 'top-end',
      type: 'success',
      title: '{!! session()->get('success') !!}',
      showConfirmButton: false,
      timer: 1500,
      confirmButtonClass: 'btn btn-primary',
      buttonsStyling: false,
    })
        </script>
        <script src="../../../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>


        @endif
        @if (session()->has('success2'))
        <script>
            Swal.fire({
      position: 'top-end',
      type: 'success',
      title: '{!! session()->get('success2') !!}',
      showConfirmButton: false,
      timer: 1500,
      confirmButtonClass: 'btn btn-primary',
      buttonsStyling: false,
    })
        </script>


        @endif


        <script>
            function collapse(x){
            if(x==0){
                document.getElementById('bookDate').classList.add("d-none")
                document.getElementById('bookTime').classList.add("d-none");
            }
            else{
                document.getElementById('bookDate').classList.remove("d-none");
                document.getElementById('bookTime').classList.remove("d-none");
            }
            return;
        }
        </script>
        <script>
            flatpickr("#bookdate", {
            altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
        });
        flatpickr("#booktime", {
            enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "00:00"
        });

        </script>
    </body>
    <!-- END: Body-->

</html>