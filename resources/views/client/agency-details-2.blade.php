<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
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
    <title>Product Details - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

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

</head>
<!-- END: Head-->





<body class="horizontal-layout horizontal-menu 2-columns ecommerce-application navbar-floating footer-static  "
    data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
    <!-- BEGIN: Header-->
    @include('layouts.header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->

    @include('layouts.horizontal-menu-features')
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <!-- app ecommerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5 mt-2">
                                <div
                                    class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-center mb-lg-auto mb-md-auto">

                                        <img class="img-fluid rounded" src="{{$service->service_image_url}}"
                                            alt="img-placeholder">


                                    </div>
                                </div>
                                <div class="col-12 col-md-6">

                                    <h3 class="titlearabic font-weight-bold">{{$service->title}}
                                    </h3>
                                    <p class="text-muted">Par Tawlifa
                                    </p>
                                    <div class="ecommerce-details-price d-flex flex-wrap">

                                        <p class="text-black font-medium-1 mr-1 mb-0"><i
                                                class="feather icon-user text-primary"></i>
                                            <span>{{$numberOfUsers}}
                                                Abonnées</span>

                                        </p>
                                        <span class="pl-1 font-medium-3 border-left">

                                            @for ($i = 0; $i < $service->ratings->avg('number_of_starts'); $i++)
                                                <i class="feather icon-star text-warning"></i>
                                                @endfor

                                        </span>
                                        <span
                                            class="ml-50 text-dark font-medium-1">{{round($service->ratings->count())}}
                                            reviews</span>

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
                                        <img src="../../../app-assets/images/icons/{{$badgecolor->badge_color}}.png"
                                            class="mr-1" width="50" height="50" alt="">

                                    </div>
                                    <hr>
                                    <p class="font-weight-bold"> <i
                                            class="feather icon-home mr-50 font-medium-2"></i>{{$service->address}}
                                    </p>
                                    <hr>


                                    @php
                                    $date = \Carbon\Carbon::now()->locale('fr')->dayName;
                                    @endphp
                                    <p> <span class="font-weight-bold">Disponibilité</span> -
                                        @if (in_array($date,$schedule->days_of_service) )
                                        <span class="text-success font-weight-bold">Ouvert</span> de <span
                                            class="text-primary font-weight-bold">{{$schedule->hour_of_starting}}
                                            am</span> à <span
                                            class="text-danger font-weight-bold">{{$schedule->hour_of_closing}}
                                            pm</span>

                                        @else
                                        <span class="text-danger font-weight-bold ">Fermé</span> de <span
                                            class="text-primary font-weight-bold ">{{$schedule->hour_of_starting}}
                                            am</span> à <span
                                            class="text-danger font-weight-bold">{{$schedule->hour_of_closing}}
                                            pm</span>
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
                                        <button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0" data-toggle="modal"
                                            data-target="#composeForm"><i
                                                class="fas fa-hand-pointer mr-25"></i>RESERVER</button>
                                        @guest


                                        <button class="btn btn-outline-danger" data-toggle="modal"
                                            data-target="#danger2"><i class="feather icon-star mr-25"></i>DONNER
                                            AVIS</button>


                                        @else
                                        @if (Auth::user()->hasVerifiedEmail())
                                        <button class="btn btn-outline-danger" data-toggle="modal"
                                            data-target="#danger"><i class="feather icon-star mr-25"></i>DONNER
                                            AVIS</button>
                                        @else
                                        <a class="btn btn-outline-danger" href="{{url('auth.verify-email')}}"><i
                                                class="feather icon-star mr-25"></i>DONNER
                                            AVIS</a>
                                        @endif

                                        @endguest

                                    </div>
                                    <hr>
                                    @if ($accounts)
                                    <a href="{{url($accounts->facebook)}}"
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
                                                height="64" width="64">

                                        </a>

                                        <div class="media-body">
                                            <div class="chip chip-warning float-right">
                                                <div class="chip-body">

                                                    <span class="chip-text">{{$rate->number_of_starts}} <i
                                                            class="feather icon-star"></i>
                                                    </span> </div>
                                            </div>
                                            <h5 class="media-heading">{{$rate->user->name}}</h5>
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

                <!-- Gallery Section -->
                <div class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title w-100 font-weight-bold">
                                Gallerie
                            </h4>

                            <div class="heading-elements">
                                <span class="text-warning font-weight-bold">Voir Plus</span>
                            </div>
                        </div>
                        <hr>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-1">
                                        <img class="img-fluid rounded fit"
                                            src="../../../app-assets/images/backgrounds/noimage.png"
                                            alt="img placeholder">
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-1">
                                        <img class="img-fluid rounded fit"
                                            src="../../../app-assets/images/backgrounds/noimage.png"
                                            alt="img placeholder">
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-1">
                                        <img class="img-fluid rounded fit"
                                            src="../../../app-assets/images/backgrounds/noimage.png"
                                            alt="img placeholder">
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-1">
                                        <img class="img-fluid rounded fit"
                                            src="../../../app-assets/images/backgrounds/noimage.png"
                                            alt="img placeholder">
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
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
                                                    <small>Par</small>
                                                    <small>Tawlifa</small>
                                                </p>
                                            </div>
                                            <div class="img-container w-50 mx-auto my-2 py-75">
                                                <a
                                                    href="{{url('client/'.$servicey->type->name.'/agency-details/'.$servicey->id)}}">


                                                    <img width="100" height="100" style="border-radius:50%"
                                                        src="{{$servicey->service_image_url}}" alt="img-placeholder">


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
                                                <p class="text-primary">reviews ({{$servicey->ratings->count('id')}})
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
                            <section id="gmaps-basic-maps" aria-labelledby="account-pill-general" aria-expanded="true">
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
        <!-- Add Review Modal -->
        <div class="modal fade text-left" id="large2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel110">Donner Avis a <span
                                style="color:green">{{$service->title}}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="bg-transparent mb-0 px-2">

                            <div class="card-title">
                                <h4 class="mb-0">Register</h4>
                            </div>

                            <p class="px-2">Vous Devez s'inscrire pour faire cette
                                action.</p>
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-label-group">
                                            <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                placeholder="Name" value="{{ old('name') }}" required
                                                autocomplete="name" autofocus>
                                            <label for="name">Name</label>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email" required> -->
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="Email" value="{{ old('email') }}" required
                                                autocomplete="email">
                                            <label for="email">Email</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> -->
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password" required
                                                autocomplete="new-password">
                                            <label for="password">Password</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-label-group">
                                            <!-- <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" required> -->
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" placeholder="Confirm Password" required
                                                autocomplete="new-password">
                                            <label for="password-confirm">Confirm
                                                Password</label>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox" checked>
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class=""> J'accepte les
                                                            termes & les
                                                            conditions.</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <a href="auth-login.html"
                                            class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                        <button type="submit"
                                            class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                    </form>
                                </div>
                            </div>
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
                    <div class="modal-header" style="border-bottom-left-radius: 0;border-bottom-right-radius: 0">
                        <h5 class="modal-title" id="myModalLabel110">Donner Avis a <span
                                style="color:green">{{$service->title}}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
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
                    <div class="modal-header" style="border-bottom-left-radius: 0;border-bottom-right-radius: 0">
                        <h5 class="modal-title" id="myModalLabel110">Donner Avis a <span
                                style="color:green">{{$service->title}}</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="bg-transparent mb-0 px-2">

                            <div class="card-title">
                                <h4 class="mb-0">Login</h4>
                            </div>

                            <p class="px-2">Vous Devez s'inscrire pour faire cette action.</p>
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <fieldset class="form-label-group form-group position-relative has-icon-left">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                placeholder="E-Mail Address" value="{{ old('email') }}" required
                                                autocomplete="email" autofocus>

                                            <div class="form-control-position">
                                                <i class="feather icon-user"></i>
                                            </div>
                                            <label for="email">E-Mail Address</label>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="form-label-group position-relative has-icon-left">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Password" required
                                                autocomplete="current-password">

                                            <div class="form-control-position">
                                                <i class="feather icon-lock"></i>
                                            </div>
                                            <label for="password">Password</label>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </fieldset>
                                        <div class="form-group d-flex justify-content-between align-items-center">
                                            <div class="text-left">
                                                <fieldset class="checkbox">
                                                    <div class="vs-checkbox-con vs-checkbox-primary">
                                                        <input type="checkbox">
                                                        <span class="vs-checkbox">
                                                            <span class="vs-checkbox--check">
                                                                <i class="vs-icon feather icon-check"></i>
                                                            </span>
                                                        </span>
                                                        <span class="">Remember me</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            @if (Route::has('password.request'))
                                            <div class="text-right"><a class="card-link"
                                                    href="{{ route('password.request') }}">
                                                    Mot de Passe Oublié ?
                                                </a></div>
                                            @endif
                                        </div>
                                        <a href="#" data-toggle="modal" data-target="#large2" data-dismiss="modal"
                                            class="btn btn-outline-primary float-left btn-inline">Register</a>
                                        <button type="submit"
                                            class="btn btn-primary float-right btn-inline">Login</button>
                                    </form>
                                </div>
                            </div>
                            <div class="login-footer">
                                <div class="divider">
                                    <div class="divider-text">OR</div>
                                </div>
                                <div class="footer-btn d-inline">
                                    <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                    <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                    <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
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
                            <button class="btn btn-primary"><a href="tel:+{{$service->phone}}" style="color:white"><i
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
        <!-- Email non  verifier-->
        <div class="modal fade text-left" id="verifyemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel19"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">

                    <div class="modal-header bg-danger white">
                        <h5 class="modal-title" id="myModalLabel120"> <i
                                class="feather icon-info mr-1 align-middle"></i>Email non verifier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        {{view('auth.verify-email')}}



                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- Booking Modal-->
        <div class="modal fade text-left" id="composeForm" tabindex="-1" role="dialog" aria-labelledby="emailCompose"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-text-bold-600" id="emailCompose">Réservation de <span
                                class="text-warning">{{$service->title}}</span></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pt-1">
                        <p for="radiocolor" class="mb-1 font-weight-bold" style="font-size:0.85rem;"> Quel est le
                            Titre de Votre
                            Reservations ?</p>
                        <form action="{{route('book.store')}}" method="post">
                            @csrf
                            <div class="form-label-group mt-1">
                                <input type="hidden" value="{{$service->id}}" name="service_id">
                                <input type="text" id="emailTo" class="form-control" placeholder="Titre"
                                    name="booking_title">
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
                                <input type="text" id="emailSubject" class="form-control" placeholder="Adresse"
                                    name="booking_addresse">
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

                                <input id="bookdate" name="booking_date" class="form-control pickadate"
                                    placeholder="Choisissez une Date">
                                <div class="form-control-position">
                                    <i class="feather icon-calendar"></i>
                                </div>

                            </div>
                            <div class="form-label-group d-none" id="bookTime">

                                <input type="text" id="booktime" name="booking_time" class="form-control"
                                    placeholder="Choisissez le Temps">
                                <div class="form-control-position">
                                    <i class="feather icon-clock"></i>
                                </div>


                            </div>
                            <fieldset class="form-label-group mt-1">
                                <textarea class="form-control" name="booking_description" id="label-textarea" rows="4"
                                    style="resize: none;" placeholder="Decrire Votre Demande"></textarea>
                                @error('booking_description')
                                <span class="text-danger" role="alert">
                                    {{ $message }}
                                </span>
                                @enderror
                                <label for="label-textarea">Decrire Votre Demande</label>
                            </fieldset>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="Reset" value="ANNULER" class="btn btn-primary" data-dismiss="modal">
                        <button type="submit" class="btn btn-warning">TERMINER</button>

                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 mb-0"><span
                class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a
                    class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">Pixinvent,</a>All rights Reserved</span><span
                class="float-md-right d-none d-md-block">Hand-crafted & Made with<i
                    class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/swiper.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-ecommerce-details.js"></script>
    <script src="../../../app-assets/js/scripts/forms/number-input.js"></script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->
    <!-- END: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/rent-agency.js"></script>

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