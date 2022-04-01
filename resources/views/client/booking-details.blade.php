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
    <title>Réservasion - Détails</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
        href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.css">
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/toastr.css">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

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






                <!-- Checkout Customer Address Starts -->

                <fieldset class="checkout-step-2 px-0">
                    <section id="checkout-address" class="list-view product-checkout">
                        <div class="card">
                            <div class="card-header flex-column align-items-start">
                                <h3 class="card-title">{{$booking->title}} </h3>
                                <p class="{{$booking->bookingStatusColor($booking->status)}} font-weight-bold mt-25"><i
                                        class="feather icon-activity mr-1"></i>{{trans('bookings.'.$booking->status)}}
                                </p>
                                <div class="d-flex justify-items-between mt-1">
                                    <img src="{{$booking->service->service_image_url}}" class="round" width="50"
                                        height="50" alt="" srcset="">
                                    <p class="text-muted" style="margin-top:15px; margin-left:5px;">
                                        {{$booking->service->title}}</p>
                                </div>





                            </div>
                            <hr>
                            <span class="ml-auto pr-1"><i
                                    class="feather icon-calendar mr-1"></i>{{$booking->created_at}}</span>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <h6>Description</h6>
                                            <p>{{$booking->description}}</p>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <h6>Addresse</h6>
                                            <p> <i class="feather icon-map-pin mr-1"></i>{{$booking->address}}</p>
                                        </div>

                                        <div class="col-md-6 col-sm-12 mt-2">

                                            <h6>Date</h6>
                                            <p> <i class="feather icon-calendar mr-1"></i>{{$booking->booking_date}}</p>
                                        </div>
                                        <div class="col-md-6 col-sm-12 mt-2">

                                            <h6>Temps</h6>
                                            <p> <i
                                                    class="feather icon-clock mr-1"></i>{{ date('h:i A', strtotime($booking->booking_time))}}
                                            </p>
                                        </div>

                                        <div class="col-sm-6 offset-md-6 mt-3">

                                            <div class="btn btn-primary delivery-address float-right">
                                                <a href="{{url()->previous()}}" class="text-white"><i
                                                        class="feather icon-arrow-left"></i> RETOUR</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="customer-card">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{$booking->service->title}} </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body actions">
                                        <p class="mb-0"><i
                                                class="feather icon-tag mr-1"></i>{{$booking->service->commune->name}} ,
                                            {{$booking->service->commune->wilaya->name_en}} , Algerie</p>
                                        <p><i class="feather icon-map-pin mr-1"></i>{{$booking->service->address}}</p>
                                        <p><i
                                                class="feather icon-star mr-1"></i>{{trans('types.'.$booking->service->type->name)}}
                                        </p>
                                        <p><i class="feather icon-calendar mr-1"></i>{{$booking->service->created_at}}
                                        </p>
                                        <hr>
                                        <div class="btn btn-primary btn-block delivery-address"><a style="color:white"
                                                href="{{url('client/'.$booking->service->type->name.'/agency-details/'.$booking->service->id)}}"><i
                                                    class="feather icon-eye "></i> CONSULTER</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </fieldset>

                <!-- Checkout Customer Address Ends -->







            </div>
        </div>
    </div>
    <!-- END: Content-->

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
    <script src="../../../app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->
    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/app-ecommerce-shop.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>