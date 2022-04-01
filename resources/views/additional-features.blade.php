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
    <title>Google Maps - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-ecommerce-shop.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->
    <style>
        .ic i {
            color: #1CA7EC !important;

        }

        .active.ic i {
            color: white !important;
        }

        #ecommerce-products .ecommerce-card {

            box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.15) !important;
        }

        #ecommerce-products .ecommerce-card:hover {
            transform: translateY(-5px) !important;
            box-shadow: 0 4px 25px 0 rgba(0, 0, 0, 0.35) !important;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">

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

                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-25 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active ic" id="account-pill-general"
                                        data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i class="fas fa-store mr-50 font-medium-3" id="ic"></i>
                                        &nbsp;Marchés Hebdomadaires
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 ic ic" id="account-pill-password" data-toggle="pill"
                                        href="#account-vertical-password" aria-expanded="false">
                                        <i class="fas fa-building mr-50 font-medium-3"></i>
                                        &nbsp;Points de Vente
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 ic" id="account-pill-info" data-toggle="pill"
                                        href="#account-vertical-info" aria-expanded="false">
                                        <i class="fas fa-wrench  mr-50 font-medium-3"></i>
                                        &nbsp;Mécanique Générale
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 ic" id="account-pill-social" data-toggle="pill"
                                        href="#account-vertical-social" aria-expanded="false">
                                        <i class="fas fa-users  mr-50 font-medium-3"></i>
                                        &nbsp;Nos Clients
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 ic" id="account-pill-connections" data-toggle="pill"
                                        href="#account-vertical-connections" aria-expanded="false">
                                        <i class="fas fa-laptop-house  mr-50 font-medium-3"></i>
                                        &nbsp;Controle Tequniques
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 ic" id="account-pill-pieces" data-toggle="pill"
                                        href="#account-vertical-pieces" aria-expanded="false">
                                        <i class="fas fa-cogs  mr-50 font-medium-3"></i>
                                        &nbsp;Pièces détachées
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 ic" id="account-pill-allocation" data-toggle="pill"
                                        href="#account-vertical-allocation" aria-expanded="false">
                                        <i class="fas fa-car-alt mr-50 font-medium-3"></i>
                                        &nbsp;Locations de Voitures
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 ic" id="account-pill-notifications"
                                        data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="fas fa-truck-loading mr-50 font-medium-3"></i>
                                        &nbsp;Depannages
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 ic" id="account-pill-luxe" data-toggle="pill"
                                        href="#account-vertical-luxe" aria-expanded="false">
                                        <i class="fas fa-car mr-50 font-medium-3"></i>
                                        &nbsp;Voitures De Lux
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 ic" id="account-pill-trans" data-toggle="pill"
                                        href="#account-vertical-trans" aria-expanded="false">
                                        <i class="fas fa-truck mr-50 font-medium-3"></i>
                                        &nbsp;Vehicules de Transport
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-95">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Marchés Hebdomadaires</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>La liste de tous les marchés locaux hebdomadaires
                                                                        dans les wilayas d'Algérie avec <code
                                                                            style="color:#21de41;">Horaire</code>
                                                                        et <code
                                                                            style="color:#21de41;">L'emplacement</code>

                                                                        <div class="table-responsive">
                                                                            <table
                                                                                class="table table-striped table-white mb-0">
                                                                                <thead
                                                                                    style="background:#1CA7EC; color:white; border-radius:5px 5px 0 0 !important;">
                                                                                    <tr>
                                                                                        <th>ID</th>
                                                                                        <th><i
                                                                                                class="fas fa-tag"></i>&nbsp;
                                                                                            Nom </th>
                                                                                        <th span="2"><i
                                                                                                class="fas fa-map-marker-alt"></i>&nbsp;
                                                                                            Wilaya</th>
                                                                                        <th span="1"><i
                                                                                                class="fas fa-hourglass"></i>&nbsp;
                                                                                            Jour</th>
                                                                                        <th span="1"><i
                                                                                                class="fas fa-cloud"></i>&nbsp;
                                                                                            Méteo
                                                                                        </th> 
                                                                                        <th span="1"><i
                                                                                                class="fas fa-map-marked"></i>&nbsp;
                                                                                            Localisation
                                                                                        </th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($markets as $market)
                                                                                    <tr>
                                                                                        <th scope="row">{{$market->id}}
                                                                                        </th>
                                                                                        <td>{{$market->nom}}</td>
                                                                                        <td>{{$market->wilaya}}</td>
                                                                                        <td style="color:#21de41">
                                                                                            {{$market->horaire}}</td>
                                                                                        <td class="place text-center">
                                                                                            <a href=""
                                                                                                class="cursor-pointer"
                                                                                                data-toggle="modal"
                                                                                                data-target="#defaultSize"
                                                                                                data-location="{{$market->wilaya}}"
                                                                                                data-lat="{{$market->latitude}}"
                                                                                                data-long="{{$market->longitude}}"><i
                                                                                                    class="fas fa-cloud-sun"></i></a>
                                                                                        </td>
                                                                                        <td class="text-center"><a
                                                                                                href=""
                                                                                                class="cursor-pointer"
                                                                                                data-toggle="modal"
                                                                                                data-target="#large"
                                                                                                data-nom="{{$market->nom}}"
                                                                                                data-lat="{{$market->latitude}}"
                                                                                                data-long="{{$market->longitude}}"><i
                                                                                                    class="fas fa-external-link-alt"></i></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                                aria-labelledby="account-pill-password" aria-expanded="false">
                                                <div class="row" id="table-head">

                                                    <!-- Info Window -->


                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                                aria-labelledby="account-pill-info" aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Table head options</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Similar to tables and dark tables, use the
                                                                        modifier classes <code
                                                                            class="highlighter-rouge">.thead-light</code>
                                                                        or <code
                                                                            class="highlighter-rouge">.thead-dark</code>
                                                                        to make <code
                                                                            class="highlighter-rouge">&lt;thead&gt;</code>s
                                                                        appear light or dark gray.</p>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Email</th>
                                                                                <th scope="col">User ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Leanne Graham</td>
                                                                                <td>sincere@april.biz</td>
                                                                                <td>@mdo</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Ervin Howell</td>
                                                                                <td>shanna@melissa.tv</td>
                                                                                <td>@fat</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Clementine Bauch</td>
                                                                                <td>nathan@yesenia.net</td>
                                                                                <td>@twitter</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                                                aria-labelledby="account-pill-social" aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Table head options</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Similar to tables and dark tables, use the
                                                                        modifier classes <code
                                                                            class="highlighter-rouge">.thead-light</code>
                                                                        or <code
                                                                            class="highlighter-rouge">.thead-dark</code>
                                                                        to make <code
                                                                            class="highlighter-rouge">&lt;thead&gt;</code>s
                                                                        appear light or dark gray.</p>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Email</th>
                                                                                <th scope="col">User ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Leanne Graham</td>
                                                                                <td>sincere@april.biz</td>
                                                                                <td>@mdo</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Ervin Howell</td>
                                                                                <td>shanna@melissa.tv</td>
                                                                                <td>@fat</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Clementine Bauch</td>
                                                                                <td>nathan@yesenia.net</td>
                                                                                <td>@twitter</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
                                                aria-labelledby="account-pill-connections" aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Table head options</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Similar to tables and dark tables, use the
                                                                        modifier classes <code
                                                                            class="highlighter-rouge">.thead-light</code>
                                                                        or <code
                                                                            class="highlighter-rouge">.thead-dark</code>
                                                                        to make <code
                                                                            class="highlighter-rouge">&lt;thead&gt;</code>s
                                                                        appear light or dark gray.</p>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Email</th>
                                                                                <th scope="col">User ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Leanne Graham</td>
                                                                                <td>sincere@april.biz</td>
                                                                                <td>@mdo</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Ervin Howell</td>
                                                                                <td>shanna@melissa.tv</td>
                                                                                <td>@fat</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Clementine Bauch</td>
                                                                                <td>nathan@yesenia.net</td>
                                                                                <td>@twitter</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-pieces" role="tabpanel"
                                                aria-labelledby="account-pill-pieces" aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <!-- gmaps Examples section start -->
                                                        <section id="gmaps-basic-maps"
                                                            aria-labelledby="account-pill-general" aria-expanded="true">
                                                            <!-- Info Window -->
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h4 class="card-title">Info Window</h4>
                                                                        </div>
                                                                        <div class="card-content">
                                                                            <div class="card-body">
                                                                                <p class="card-text">A basic example
                                                                                    of
                                                                                    using a single info window for 3
                                                                                    markers.</p>
                                                                                <div id="info-window"
                                                                                    class="height-400">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </section>
                                                    </div>
                                                    <!-- gmaps Examples section End -->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-allocation" role="tabpanel"
                                                aria-labelledby="account-pill-allocation" aria-expanded="false">
                                                <div class="ecommerce-application" data-open="hover"
                                                    data-menu="horizontal-menu"
                                                    data-col="content-detached-left-sidebar">
                                                    <!-- BEGIN: Content-->
                                                    <div class="app-content content" style="padding-top:5px;">
                                                        <div class="content-overlay"></div>
                                                        <div class="header-navbar-shadow"></div>
                                                        <div class="content-wrapper" style="margin-top: 10px; !important
                                                    ">

                                                            <div class="content-detached">
                                                                <div class="content-body">
                                                                    <!-- Ecommerce Content Section Starts -->
                                                                    <section id="ecommerce-header">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="ecommerce-header-items">
                                                                                    <div class="result-toggler">
                                                                                        <button
                                                                                            class="navbar-toggler shop-sidebar-toggler"
                                                                                            type="button"
                                                                                            data-toggle="collapse">
                                                                                            <span
                                                                                                class="navbar-toggler-icon d-block d-lg-none"><i
                                                                                                    class="feather icon-menu"></i></span>
                                                                                        </button>
                                                                                        <div class="search-results">
                                                                                            16285 results found
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <!-- Ecommerce Content Section Starts -->
                                                                    <!-- background Overlay when sidebar is shown  starts-->
                                                                    <div class="shop-content-overlay"></div>
                                                                    <!-- background Overlay when sidebar is shown  ends-->

                                                                    <!-- Ecommerce Search Bar Starts -->
                                                                    <section id="ecommerce-searchbar">
                                                                        <div class="row mt-1">
                                                                            <div class="col-sm-12">
                                                                                <fieldset
                                                                                    class="form-group position-relative">
                                                                                    <input type="text"
                                                                                        class="form-control search-product"
                                                                                        id="iconLeft5"
                                                                                        placeholder="Search here">
                                                                                    <div class="form-control-position">
                                                                                        <i
                                                                                            class="feather icon-search"></i>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <!-- Ecommerce Search Bar Ends -->

                                                                    <!-- Ecommerce Products Starts -->
                                                                    <section id="ecommerce-products" class="grid-view">
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content" id="prod1">
                                                                                <div class="item-img text-center">
                                                                                    <a href="agency-details">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/location/11.jpg"
                                                                                            alt="img-placeholder"></a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6 class="item-price">
                                                                                                $39.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">Amazon
                                                                                            - Fire TV Stick with
                                                                                            Alexa Voice Remote -
                                                                                            Black</a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Google</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Enjoy smart access
                                                                                            to
                                                                                            videos, games and
                                                                                            apps
                                                                                            with this Amazon
                                                                                            Fire TV
                                                                                            stick. Its Alexa
                                                                                            voice
                                                                                            remote lets you
                                                                                            deliver hands-free
                                                                                            commands when you
                                                                                            want
                                                                                            to watch television
                                                                                            or
                                                                                            engage with other
                                                                                            applications. With a
                                                                                            quad-core processor,
                                                                                            1GB
                                                                                            internal memory and
                                                                                            8GB
                                                                                            of storage, this
                                                                                            portable Amazon Fire
                                                                                            TV
                                                                                            stick works fast
                                                                                            for buffer-free
                                                                                            streaming.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $39.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i class="fa fa-heart-o"></i>
                                                                                        <span>Wishlist</span>
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a href="agency-details">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/location/22.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6 class="item-price">
                                                                                                $35.00
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a href="agency-details">Google
                                                                                            - Chromecast -
                                                                                            Black</a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Amazon</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Google Chromecast:
                                                                                            Enjoy
                                                                                            a world of
                                                                                            entertainment
                                                                                            with Google
                                                                                            Chromecast.
                                                                                            Just connect to your
                                                                                            HDTV's HDMI
                                                                                            interface and your
                                                                                            home
                                                                                            Wi-Fi network to get
                                                                                            started. You can
                                                                                            stream
                                                                                            your favorite apps
                                                                                            from
                                                                                            your compatible
                                                                                            phone, tablet or
                                                                                            laptop,
                                                                                            plus use your phone
                                                                                            as a
                                                                                            remote to search,
                                                                                            play
                                                                                            and pause content.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $35.00
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a href="agency-details"><img
                                                                                            class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/location/33.jpg"
                                                                                            alt="img-placeholder"></a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="item-cost">
                                                                                                <h6 class="item-price">
                                                                                                    $499.99
                                                                                                </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a href="agency-details">Dell
                                                                                            - Inspiron 15.6"
                                                                                            Touch-Screen Laptop
                                                                                            -
                                                                                            Black</a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Dell</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Dell Inspiron
                                                                                            Laptop:
                                                                                            Get speed and
                                                                                            performance from
                                                                                            this
                                                                                            15.6-inch Dell
                                                                                            Inspiron
                                                                                            laptop. Supported by
                                                                                            an
                                                                                            Intel Core i5-5200U
                                                                                            processor and 6GB of
                                                                                            DDR3L RAM, this slim
                                                                                            touch screen laptop
                                                                                            lets
                                                                                            you run multiple
                                                                                            applications without
                                                                                            lag. The 1TB hard
                                                                                            drive
                                                                                            in this Dell
                                                                                            Inspiron
                                                                                            laptop lets you
                                                                                            store
                                                                                            multiple music,
                                                                                            video and document
                                                                                            files.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $499.99
                                                                                            </h6>
                                                                                            <p class="shipping">
                                                                                                <i
                                                                                                    class="feather icon-shopping-cart"></i>
                                                                                                Free Shipping
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a href="agency-details">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/location/44.jpg"
                                                                                            alt="img-placeholder"></a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $49.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a href="agency-details">Amazon
                                                                                            - Echo Dot</a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Amazon</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Echo Dot is the
                                                                                            latest
                                                                                            addition to Amazon's
                                                                                            voice-controlled
                                                                                            devices.
                                                                                            Deliver your
                                                                                            favorite
                                                                                            playlist anywhere in
                                                                                            your home with the
                                                                                            Amazon Echo Dot
                                                                                            voice-controlled
                                                                                            device.
                                                                                            Control most
                                                                                            electric
                                                                                            devices through
                                                                                            voice
                                                                                            activation, or
                                                                                            schedule
                                                                                            a ride with Uber and
                                                                                            order a pizza. The
                                                                                            Amazon Echo Dot
                                                                                            voice-controlled
                                                                                            device
                                                                                            turns any home into
                                                                                            a
                                                                                            smart home with the
                                                                                            Alexa app on a
                                                                                            smartphone
                                                                                            or tablet.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $49.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a href="agency-details">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/location/55.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $999.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a href="agency-details">
                                                                                            Apple - MacBook Air®
                                                                                            (Latest Model) -
                                                                                            13.3"
                                                                                            Display - Silver
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Apple</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            MacBook Air is a
                                                                                            thin,
                                                                                            lightweight laptop
                                                                                            from
                                                                                            Apple.
                                                                                            MacBook Air features
                                                                                            up
                                                                                            to 8GB of memory, a
                                                                                            fifth-generation
                                                                                            Intel
                                                                                            Core processor,
                                                                                            Thunderbolt 2, great
                                                                                            built-in apps, and
                                                                                            all-day battery
                                                                                            life.1
                                                                                            Its thin, light, and
                                                                                            durable enough to
                                                                                            take
                                                                                            everywhere you
                                                                                            go-and
                                                                                            powerful enough to
                                                                                            do
                                                                                            everything once you
                                                                                            get
                                                                                            there, better.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $999.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a href="agency-details">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/location/66.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $429.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a href="agency-details">
                                                                                            Sharp - 50" Class
                                                                                            (49.5"
                                                                                            Diag.) - LED - 1080p
                                                                                            -
                                                                                            Black
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Sharp</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Only at Best Buy
                                                                                            Sharp
                                                                                            LC-50LB481U LED Roku
                                                                                            TV:
                                                                                            Get a TV that enjoys
                                                                                            full Internet
                                                                                            connectivity with
                                                                                            this
                                                                                            Sharp 49.5-inch
                                                                                            smart
                                                                                            TV. Full HD
                                                                                            resolutions
                                                                                            give you plenty of
                                                                                            detail whether
                                                                                            you're
                                                                                            streaming content
                                                                                            from the Internet
                                                                                            using
                                                                                            the integrated Roku
                                                                                            player or watching
                                                                                            via
                                                                                            cable.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $429.99
                                                                                            </h6>
                                                                                            <p class="shipping">
                                                                                                <i
                                                                                                    class="feather icon-shopping-cart"></i>
                                                                                                Free Shipping
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a href="agency-details">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/77.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $129
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a href="agency-details">
                                                                                            Google - Google Home
                                                                                            -
                                                                                            White/Slate fabric
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Google</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Simplify your
                                                                                            everyday
                                                                                            life with the Google
                                                                                            Home, a
                                                                                            voice-activated
                                                                                            speaker powered by
                                                                                            the
                                                                                            Google Assistant.
                                                                                            Use voice commands
                                                                                            to
                                                                                            enjoy music, get
                                                                                            answers
                                                                                            from Google and
                                                                                            manage
                                                                                            everyday tasks.
                                                                                            Google
                                                                                            Home is
                                                                                            compatible with
                                                                                            Android
                                                                                            and iOS operating
                                                                                            systems, and can
                                                                                            control
                                                                                            compatible smart
                                                                                            devices
                                                                                            such as
                                                                                            Chromecast or Nest.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $129
                                                                                            </h6>
                                                                                            <p class="shipping">
                                                                                                <i
                                                                                                    class="feather icon-shopping-cart"></i>
                                                                                                Free Shipping
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a href="agency-details">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/88.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $29.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a href="agency-details">
                                                                                            Apple - EarPods™
                                                                                            with
                                                                                            Remote and Mic -
                                                                                            White
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Apple</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Apple EarPods are
                                                                                            white
                                                                                            in-ear headphones
                                                                                            included with music
                                                                                            players and
                                                                                            smartphones
                                                                                            designed and
                                                                                            marketed
                                                                                            by Apple Inc. They
                                                                                            are
                                                                                            designed to fit the
                                                                                            ear
                                                                                            while retaining a
                                                                                            new
                                                                                            design pushed by
                                                                                            Apple
                                                                                            alongside the
                                                                                            iPod and iPod Touch
                                                                                            products, with which
                                                                                            they were sold
                                                                                            together.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $29.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a href="agency-details">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/99.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $14.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">
                                                                                            Philips - hue A19
                                                                                            Smart
                                                                                            LED Light Bulb -
                                                                                            White
                                                                                            Only
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Philips</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Philips hue A19
                                                                                            Smart
                                                                                            LED Light Bulb: Get
                                                                                            lighting that's as
                                                                                            smart
                                                                                            as you are. You can
                                                                                            easily dim this
                                                                                            light
                                                                                            bulb and set timers
                                                                                            and
                                                                                            alarms using your
                                                                                            smartphone or
                                                                                            tablet.
                                                                                            Plus, LED technology
                                                                                            offers lasting
                                                                                            illumination while
                                                                                            using
                                                                                            minimal energy.Get
                                                                                            lighting that's as
                                                                                            smart
                                                                                            as you are.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $14.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <!-- Ecommerce Products Ends -->

                                                                    <!-- Ecommerce Pagination Starts -->
                                                                    <section id="ecommerce-pagination">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <nav
                                                                                    aria-label="Page navigation example">
                                                                                    <ul
                                                                                        class="pagination justify-content-center mt-2">
                                                                                        <li class="page-item prev-item">
                                                                                            <a class="page-link"
                                                                                                href="#"></a>
                                                                                        </li>
                                                                                        <li class="page-item active">
                                                                                            <a class="page-link"
                                                                                                href="#">1</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">2</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">3</a>
                                                                                        </li>
                                                                                        <li class="page-item"
                                                                                            aria-current="page">
                                                                                            <a class="page-link"
                                                                                                href="#">4</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">5</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">6</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">7</a>
                                                                                        </li>
                                                                                        <li class="page-item next-item">
                                                                                            <a class="page-link"
                                                                                                href="#"></a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </nav>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <!-- Ecommerce Pagination Ends -->

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- END: Content-->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-notifications"
                                                role="tabpanel" aria-labelledby="account-pill-notifications"
                                                aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <!-- gmaps Examples section start -->
                                                        <section id="gmaps-basic-maps"
                                                            aria-labelledby="account-pill-general" aria-expanded="true">
                                                            <!-- Info Window -->
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h4 class="card-title">Info Window</h4>
                                                                        </div>
                                                                        <div class="card-content">
                                                                            <div class="card-body">
                                                                                <p class="card-text">A basic example
                                                                                    of
                                                                                    using a single info window for 3
                                                                                    markers.</p>
                                                                                <div id="info-window"
                                                                                    class="height-400">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </section>
                                                    </div>
                                                    <!-- gmaps Examples section End -->
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="account-vertical-luxe" role="tabpanel"
                                                aria-labelledby="account-pill-luxe" aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <!-- gmaps Examples section start -->
                                                        <section id="gmaps-basic-maps"
                                                            aria-labelledby="account-pill-general" aria-expanded="true">
                                                            <!-- Info Window -->
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h4 class="card-title">Info Window</h4>
                                                                        </div>
                                                                        <div class="card-content">
                                                                            <div class="card-body">
                                                                                <p class="card-text">A basic example
                                                                                    of
                                                                                    using a single info window for 3
                                                                                    markers.</p>
                                                                                <div id="info-window"
                                                                                    class="height-400">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </section>
                                                    </div>
                                                    <!-- gmaps Examples section End -->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-trans" role="tabpanel"
                                                aria-labelledby="account-pill-trans" aria-expanded="false">

                                                <div class="ecommerce-application" data-open="hover"
                                                    data-menu="horizontal-menu"
                                                    data-col="content-detached-left-sidebar">
                                                    <!-- BEGIN: Content-->
                                                    <div class="app-content content" style="padding-top:5px;">
                                                        <div class="content-overlay"></div>
                                                        <div class="header-navbar-shadow"></div>
                                                        <div class="content-wrapper" style="margin-top: 10px; !important
                                                        ">

                                                            <div class="content-detached">
                                                                <div class="content-body">
                                                                    <!-- Ecommerce Content Section Starts -->
                                                                    <section id="ecommerce-header">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="ecommerce-header-items">
                                                                                    <div class="result-toggler">
                                                                                        <button
                                                                                            class="navbar-toggler shop-sidebar-toggler"
                                                                                            type="button"
                                                                                            data-toggle="collapse">
                                                                                            <span
                                                                                                class="navbar-toggler-icon d-block d-lg-none"><i
                                                                                                    class="feather icon-menu"></i></span>
                                                                                        </button>
                                                                                        <div class="search-results">
                                                                                            16285 results found
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <!-- Ecommerce Content Section Starts -->
                                                                    <!-- background Overlay when sidebar is shown  starts-->
                                                                    <div class="shop-content-overlay"></div>
                                                                    <!-- background Overlay when sidebar is shown  ends-->

                                                                    <!-- Ecommerce Search Bar Starts -->
                                                                    <section id="ecommerce-searchbar">
                                                                        <div class="row mt-1">
                                                                            <div class="col-sm-12">
                                                                                <fieldset
                                                                                    class="form-group position-relative">
                                                                                    <input type="text"
                                                                                        class="form-control search-product"
                                                                                        id="iconLeft5"
                                                                                        placeholder="Search here">
                                                                                    <div class="form-control-position">
                                                                                        <i
                                                                                            class="feather icon-search"></i>
                                                                                    </div>
                                                                                </fieldset>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <!-- Ecommerce Search Bar Ends -->

                                                                    <!-- Ecommerce Products Starts -->
                                                                    <section id="ecommerce-products" class="grid-view">
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content" id="prod1">
                                                                                <div class="item-img text-center">
                                                                                    <a
                                                                                        href="app-ecommerce-details.html">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/11.jpg"
                                                                                            alt="img-placeholder"></a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6 class="item-price">
                                                                                                $39.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">Amazon
                                                                                            - Fire TV Stick with
                                                                                            Alexa Voice Remote -
                                                                                            Black</a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Google</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Enjoy smart access
                                                                                            to
                                                                                            videos, games and
                                                                                            apps
                                                                                            with this Amazon
                                                                                            Fire TV
                                                                                            stick. Its Alexa
                                                                                            voice
                                                                                            remote lets you
                                                                                            deliver hands-free
                                                                                            commands when you
                                                                                            want
                                                                                            to watch television
                                                                                            or
                                                                                            engage with other
                                                                                            applications. With a
                                                                                            quad-core processor,
                                                                                            1GB
                                                                                            internal memory and
                                                                                            8GB
                                                                                            of storage, this
                                                                                            portable Amazon Fire
                                                                                            TV
                                                                                            stick works fast
                                                                                            for buffer-free
                                                                                            streaming.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $39.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i class="fa fa-heart-o"></i>
                                                                                        <span>Wishlist</span>
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a
                                                                                        href="app-ecommerce-details.html">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/22.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6 class="item-price">
                                                                                                $35.00
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">Google
                                                                                            - Chromecast -
                                                                                            Black</a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Amazon</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Google Chromecast:
                                                                                            Enjoy
                                                                                            a world of
                                                                                            entertainment
                                                                                            with Google
                                                                                            Chromecast.
                                                                                            Just connect to your
                                                                                            HDTV's HDMI
                                                                                            interface and your
                                                                                            home
                                                                                            Wi-Fi network to get
                                                                                            started. You can
                                                                                            stream
                                                                                            your favorite apps
                                                                                            from
                                                                                            your compatible
                                                                                            phone, tablet or
                                                                                            laptop,
                                                                                            plus use your phone
                                                                                            as a
                                                                                            remote to search,
                                                                                            play
                                                                                            and pause content.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $35.00
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a
                                                                                        href="app-ecommerce-details.html"><img
                                                                                            class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/33.jpg"
                                                                                            alt="img-placeholder"></a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <div class="item-cost">
                                                                                                <h6 class="item-price">
                                                                                                    $499.99
                                                                                                </h6>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">Dell
                                                                                            - Inspiron 15.6"
                                                                                            Touch-Screen Laptop
                                                                                            -
                                                                                            Black</a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Dell</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Dell Inspiron
                                                                                            Laptop:
                                                                                            Get speed and
                                                                                            performance from
                                                                                            this
                                                                                            15.6-inch Dell
                                                                                            Inspiron
                                                                                            laptop. Supported by
                                                                                            an
                                                                                            Intel Core i5-5200U
                                                                                            processor and 6GB of
                                                                                            DDR3L RAM, this slim
                                                                                            touch screen laptop
                                                                                            lets
                                                                                            you run multiple
                                                                                            applications without
                                                                                            lag. The 1TB hard
                                                                                            drive
                                                                                            in this Dell
                                                                                            Inspiron
                                                                                            laptop lets you
                                                                                            store
                                                                                            multiple music,
                                                                                            video and document
                                                                                            files.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $499.99
                                                                                            </h6>
                                                                                            <p class="shipping">
                                                                                                <i
                                                                                                    class="feather icon-shopping-cart"></i>
                                                                                                Free Shipping
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a
                                                                                        href="app-ecommerce-details.html">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/44.jpg"
                                                                                            alt="img-placeholder"></a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $49.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">Amazon
                                                                                            - Echo Dot</a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Amazon</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Echo Dot is the
                                                                                            latest
                                                                                            addition to Amazon's
                                                                                            voice-controlled
                                                                                            devices.
                                                                                            Deliver your
                                                                                            favorite
                                                                                            playlist anywhere in
                                                                                            your home with the
                                                                                            Amazon Echo Dot
                                                                                            voice-controlled
                                                                                            device.
                                                                                            Control most
                                                                                            electric
                                                                                            devices through
                                                                                            voice
                                                                                            activation, or
                                                                                            schedule
                                                                                            a ride with Uber and
                                                                                            order a pizza. The
                                                                                            Amazon Echo Dot
                                                                                            voice-controlled
                                                                                            device
                                                                                            turns any home into
                                                                                            a
                                                                                            smart home with the
                                                                                            Alexa app on a
                                                                                            smartphone
                                                                                            or tablet.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $49.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a
                                                                                        href="app-ecommerce-details.html">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/55.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $999.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">
                                                                                            Apple - MacBook Air®
                                                                                            (Latest Model) -
                                                                                            13.3"
                                                                                            Display - Silver
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Apple</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            MacBook Air is a
                                                                                            thin,
                                                                                            lightweight laptop
                                                                                            from
                                                                                            Apple.
                                                                                            MacBook Air features
                                                                                            up
                                                                                            to 8GB of memory, a
                                                                                            fifth-generation
                                                                                            Intel
                                                                                            Core processor,
                                                                                            Thunderbolt 2, great
                                                                                            built-in apps, and
                                                                                            all-day battery
                                                                                            life.1
                                                                                            Its thin, light, and
                                                                                            durable enough to
                                                                                            take
                                                                                            everywhere you
                                                                                            go-and
                                                                                            powerful enough to
                                                                                            do
                                                                                            everything once you
                                                                                            get
                                                                                            there, better.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $999.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a
                                                                                        href="app-ecommerce-details.html">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/66.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $429.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">
                                                                                            Sharp - 50" Class
                                                                                            (49.5"
                                                                                            Diag.) - LED - 1080p
                                                                                            -
                                                                                            Black
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Sharp</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Only at Best Buy
                                                                                            Sharp
                                                                                            LC-50LB481U LED Roku
                                                                                            TV:
                                                                                            Get a TV that enjoys
                                                                                            full Internet
                                                                                            connectivity with
                                                                                            this
                                                                                            Sharp 49.5-inch
                                                                                            smart
                                                                                            TV. Full HD
                                                                                            resolutions
                                                                                            give you plenty of
                                                                                            detail whether
                                                                                            you're
                                                                                            streaming content
                                                                                            from the Internet
                                                                                            using
                                                                                            the integrated Roku
                                                                                            player or watching
                                                                                            via
                                                                                            cable.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $429.99
                                                                                            </h6>
                                                                                            <p class="shipping">
                                                                                                <i
                                                                                                    class="feather icon-shopping-cart"></i>
                                                                                                Free Shipping
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a
                                                                                        href="app-ecommerce-details.html">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/77.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $129
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">
                                                                                            Google - Google Home
                                                                                            -
                                                                                            White/Slate fabric
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Google</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Simplify your
                                                                                            everyday
                                                                                            life with the Google
                                                                                            Home, a
                                                                                            voice-activated
                                                                                            speaker powered by
                                                                                            the
                                                                                            Google Assistant.
                                                                                            Use voice commands
                                                                                            to
                                                                                            enjoy music, get
                                                                                            answers
                                                                                            from Google and
                                                                                            manage
                                                                                            everyday tasks.
                                                                                            Google
                                                                                            Home is
                                                                                            compatible with
                                                                                            Android
                                                                                            and iOS operating
                                                                                            systems, and can
                                                                                            control
                                                                                            compatible smart
                                                                                            devices
                                                                                            such as
                                                                                            Chromecast or Nest.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $129
                                                                                            </h6>
                                                                                            <p class="shipping">
                                                                                                <i
                                                                                                    class="feather icon-shopping-cart"></i>
                                                                                                Free Shipping
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a
                                                                                        href="app-ecommerce-details.html">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/88.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $29.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">
                                                                                            Apple - EarPods™
                                                                                            with
                                                                                            Remote and Mic -
                                                                                            White
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Apple</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Apple EarPods are
                                                                                            white
                                                                                            in-ear headphones
                                                                                            included with music
                                                                                            players and
                                                                                            smartphones
                                                                                            designed and
                                                                                            marketed
                                                                                            by Apple Inc. They
                                                                                            are
                                                                                            designed to fit the
                                                                                            ear
                                                                                            while retaining a
                                                                                            new
                                                                                            design pushed by
                                                                                            Apple
                                                                                            alongside the
                                                                                            iPod and iPod Touch
                                                                                            products, with which
                                                                                            they were sold
                                                                                            together.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $29.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card ecommerce-card">
                                                                            <div class="card-content">
                                                                                <div class="item-img text-center">
                                                                                    <a
                                                                                        href="app-ecommerce-details.html">
                                                                                        <img class="img-fluid"
                                                                                            src="../../../app-assets/images/pages/eCommerce/99.jpg"
                                                                                            alt="img-placeholder">
                                                                                    </a>
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $14.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="item-name">
                                                                                        <a
                                                                                            href="app-ecommerce-details.html">
                                                                                            Philips - hue A19
                                                                                            Smart
                                                                                            LED Light Bulb -
                                                                                            White
                                                                                            Only
                                                                                        </a>
                                                                                        <p class="item-company">
                                                                                            By
                                                                                            <span
                                                                                                class="company-name">Philips</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="item-description">
                                                                                            Philips hue A19
                                                                                            Smart
                                                                                            LED Light Bulb: Get
                                                                                            lighting that's as
                                                                                            smart
                                                                                            as you are. You can
                                                                                            easily dim this
                                                                                            light
                                                                                            bulb and set timers
                                                                                            and
                                                                                            alarms using your
                                                                                            smartphone or
                                                                                            tablet.
                                                                                            Plus, LED technology
                                                                                            offers lasting
                                                                                            illumination while
                                                                                            using
                                                                                            minimal energy.Get
                                                                                            lighting that's as
                                                                                            smart
                                                                                            as you are.
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-options text-center">
                                                                                    <div class="item-wrapper">
                                                                                        <div class="item-rating">
                                                                                            <div
                                                                                                class="badge badge-primary badge-md">
                                                                                                <span>4</span>
                                                                                                <i
                                                                                                    class="feather icon-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="item-cost">
                                                                                            <h6 class="item-price">
                                                                                                $14.99
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="wishlist">
                                                                                        <i
                                                                                            class="fa fa-heart-o mr-25"></i>
                                                                                        Wishlist
                                                                                    </div>
                                                                                    <div class="cart">
                                                                                        <i
                                                                                            class="feather icon-shopping-cart mr-25"></i>
                                                                                        <span class="add-to-cart">Add
                                                                                            to cart</span> <a
                                                                                            href="app-ecommerce-checkout.html"
                                                                                            class="view-in-cart d-none">View
                                                                                            In Cart</a>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <!-- Ecommerce Products Ends -->

                                                                    <!-- Ecommerce Pagination Starts -->
                                                                    <section id="ecommerce-pagination">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <nav
                                                                                    aria-label="Page navigation example">
                                                                                    <ul
                                                                                        class="pagination justify-content-center mt-2">
                                                                                        <li class="page-item prev-item">
                                                                                            <a class="page-link"
                                                                                                href="#"></a>
                                                                                        </li>
                                                                                        <li class="page-item active">
                                                                                            <a class="page-link"
                                                                                                href="#">1</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">2</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">3</a>
                                                                                        </li>
                                                                                        <li class="page-item"
                                                                                            aria-current="page">
                                                                                            <a class="page-link"
                                                                                                href="#">4</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">5</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">6</a>
                                                                                        </li>
                                                                                        <li class="page-item"><a
                                                                                                class="page-link"
                                                                                                href="#">7</a>
                                                                                        </li>
                                                                                        <li class="page-item next-item">
                                                                                            <a class="page-link"
                                                                                                href="#"></a>
                                                                                        </li>
                                                                                    </ul>
                                                                                </nav>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                    <!-- Ecommerce Pagination Ends -->

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!-- END: Content-->
                                                </div>
                                                <!-- gmaps Examples section End -->

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- account setting page end -->


            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- Modal -->
    <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content" id="modcontent">
                <div class="modal-header" style="background:#1CA7EC !important; border-radius:8px 8px 0 0 ;">
                    <div class="row" style="width:100%;">
                        <div class="col-6">
                            <div class="text-6xl font-semibold">
                                <h1 style="color:white; font-weight:bold; font-size:45px;" id="temp"></h1>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 style="color:white; font-weight:bold; margin:0">feels like</h5>
                                </div>
                                <div class="col">
                                    <h5 style="color:white; font-weight:bold;" id="feels"></h5>
                                </div>



                            </div>
                        </div>

                        <div class="col-3 mt-2">
                            <div class="row">
                                <div class="col">
                                    <h6 style="color:white; font-weight:bold;" id="weather"></h6>
                                </div>
                                <div class="col">
                                    <h6 style="color:white; font-weight:bold;" id="location"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 mt-2" id="iconn" style="color:white"></div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-row">
                        <div class="pr-2">
                            <h2>MON</h2>
                        </div>
                        <div class="pr-1">

                        </div>
                        <div class="pr-5">
                            cloudy with possible rain
                        </div>
                        <div>
                            <div>19°C</div>
                            <div>19°C</div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
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
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>



    @include('layouts.footer')
    @include('layouts.footer-scripts')
    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBgjNW0WA93qphgZW-joXVR6VC3IiYFjfo"></script>
    <script src="../../../app-assets/vendors/js/charts/gmaps.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/charts/gmaps/maps.js"></script>
    <script>

    </script>
    <!-- END: Page JS-->
    <script>
        function  toDyOfWeek(timestamp) {
      const newDate = new Date(timestamp * 1000);
      const days = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
      return days[newDate.getDay()];
    };
      

        $('#defaultSize').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var lat = button.data('lat')
                var long = button.data('long')
                var location = button.data('location')
                var modal = $(this)
           fetch(`/api/weather?lat=${lat}&lng=${long}`)
          .then(response => response.json())
          .then(data => {
            
            var iconurl = "https://openweathermap.org/img/wn/" + data.current.weather[0].icon + ".png"; 
            document.getElementById('temp').innerHTML = Math.round(data.daily[0].temp.day -273)+ " °C";
            document.getElementById('feels').innerHTML =Math.round(data.current.feels_like) - 273+ " °C";
            document.getElementById('weather').innerHTML = data.current.weather[0].main;
            document.getElementById('location').innerHTML = location+", DZ";
           // document.getElementById('min').innerHTML = "19";
           // document.getElementById('max').innerHTML = "19";
           console.log(data)
          
           var icons = document.querySelectorAll('.icons');
         
              Array.from(icons).forEach((icon) => icon.remove())
        

            var img=document.createElement("img");
            img.className='icons'
            img.src=iconurl;
          
           
            var bodies = document.querySelectorAll('.modal-body');
         
         Array.from(bodies).forEach((body) => body.remove())
            document.getElementById('iconn').appendChild(img)
var modalbody=document.createElement("div")
modalbody.className='modal-body'     
modalbody.style.backgroundColor="#4cb7ed"
modalbody.style.borderRadius="0 0 8px 8px"
modalbody.style.color="white"
document.getElementById('modcontent').appendChild(modalbody)
var length=data.daily.length
for(let i=1; i<length-2;i++){
var iconurl2 = "https://openweathermap.org/img/wn/" + data.daily[i].weather[0].icon + ".png"; 
var flex=document.createElement("div")
flex.className='row'
var jour=document.createElement("div")
jour.className='col'
var h2=document.createElement("h2")
var divicon=document.createElement("div")
divicon.className='col'
var img2=document.createElement("img");
           
            img2.src=iconurl2;
            img2.style.marginBottom="5px"
var divdesc=document.createElement("div")
divdesc.className='col'
var divtemp=document.createElement("div")
divtemp.className='col'
var divmax=document.createElement("div")
var divmin=document.createElement("div")

modalbody.appendChild(flex)
flex.appendChild(jour)
jour.appendChild(h2)
flex.appendChild(divicon)
flex.appendChild(divdesc)
flex.appendChild(divtemp)
divtemp.appendChild(divmax)
divicon.appendChild(img2)
divtemp.appendChild(divmin)
h2.style.color="white"
h2.innerHTML=toDyOfWeek(data.daily[i].dt)
divdesc.innerHTML=data.daily[i].weather[0].description
divmax.innerHTML=Math.round(data.daily[i].temp.max-273)+"°C"
divmin.innerHTML=Math.round(data.daily[i].temp.min-273)+"°C"

            }
            
            
                   
           /*
            document.getElementById('id'+i).innerHTML =Math.round(data.daily[0].temp.day -273) +" °C " +data.current.weather[0].main;
            var img=document.createElement("img");
            img.src=iconurl;
            img.width=30;
            img.height=30;
            document.getElementById('id'+i).appendChild(img)
            //  document.getElementById('id2').innerHTML =Math.round(data.daily[0].temp.day -273) +" " +data.current.weather[0].main+" " + data.daily[0].clouds;
           /* this.currentweather.actual = Math.round(data.current.temp) - 273;
            this.currentweather.feels =
              Math.round(data.current.feels_like) - 273;
            this.currentweather.sammury = data.current.weather[0].main;
            this.currentweather.icon = data.current.weather[0].icon;
            this.daily = data.daily;
            i=i+1;
            console.log(i);
            console.log(data);*/
               // modal.find('.modal-body #type').innerHTML=model;
               // modal.find('.modal-body #product_name').val(product_name);
              
            })
      
        });

    
    </script>

    <script>
        /* var i=1;
        $('.place').each(function(){
             
            var $sel = $(this); lat = $sel.data('lat');long = $sel.data('long');
           
        fetch(`/api/weather?lat=${lat}&lng=${long}`)
          .then(response => response.json())
          .then(data => {
            var iconurl = "https://openweathermap.org/img/wn/" + data.current.weather[0].icon + ".png";
            document.getElementById('id'+i).innerHTML =Math.round(data.daily[0].temp.day -273) +" °C " +data.current.weather[0].main;
            var img=document.createElement("img");
            img.src=iconurl;
            img.width=30;
            img.height=30;
            document.getElementById('id'+i).appendChild(img)
            //  document.getElementById('id2').innerHTML =Math.round(data.daily[0].temp.day -273) +" " +data.current.weather[0].main+" " + data.daily[0].clouds;
           /* this.currentweather.actual = Math.round(data.current.temp) - 273;
            this.currentweather.feels =
              Math.round(data.current.feels_like) - 273;
            this.currentweather.sammury = data.current.weather[0].main;
            this.currentweather.icon = data.current.weather[0].icon;
            this.daily = data.daily;
           // i=i+1;
           // console.log(i);
           // console.log(data);
            //this.location.lat =
            //position.GeolocationPosition.coords.latitude;
            //this.location.lng =
            // position.GeolocationPosition.coords.longitude;
          });
        
        });*/
    </script>
    <script>
        $('#large').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var lat = button.data('lat')
                var long = button.data('long')
                var nom = button.data('nom')
                var modal = $(this)
               
    map = new GMaps({
        div: "#info-windoww",
        lat: 37.4046193722478,
        lng: 2.7974765053780812,
        zoom: 5,
        scaleControl: false,
        width: "100%",
        height: "300px"
    });
    map.addMarker({
        lat: lat,
        lng: long,
        title: nom,
        infoWindow: {
            content: "<p>"+nom+"</p>"
        }
    });
               // modal.find('.modal-body #type').innerHTML=model;
               // modal.find('.modal-body #product_name').val(product_name);
              
            })
    </script>
</body>
<!-- END: Body-->

</html>