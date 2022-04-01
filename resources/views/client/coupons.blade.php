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
    <title>Coupones</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/toastr.css">


    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/card-analytics.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

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
            <div class="form-group breadcrum-left">
                <div class="dropdown">
                    <a class=" btn btn-primary btn-round" href="{{url()->previous()}}">
                        <i class="feather icon-arrow-left"></i> RETOUR</a>

                </div>
            </div>
            <div class="content-body">

                <!-- Statistics card section start -->
                <section id="statistics-card">
                    <div class="row justify-content-center">
                        @forelse ($provider_coupons as $pcoupon)


                        <div class="col-xl-3 col-md-4 col-sm-6">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="p-50 m-0 mb-1">
                                            <img src="{{$pcoupon->discount->service->service_image_url}}" class="round"
                                                width="45" height="45" alt="" srcset="">
                                        </div>
                                        <h5 class="text-bold-700">{{$pcoupon->discount->service->title }}</h5>

                                        @if ($pcoupon->status=="unused")
                                        <p class="mb-1 line-ellipsis  font-weight-bold text-success">
                                            {{trans('coupons.'.$pcoupon->status)}}
                                        </p>
                                        <p class="mb-1 line-ellipsis text-dark">date d'expiration :
                                            {{$pcoupon->discount->valid_until}}</p>
                                        @elseif($pcoupon->status=="used")
                                        <p class="mb-1 line-ellipsis font-weight-bold text-warning">
                                            {{trans('coupons.'.$pcoupon->status)}}
                                        </p>

                                        <p class="mb-1 line-ellipsis text-dark">date d'utilisation :
                                            {{$pcoupon->discount->valid_until}}</p>
                                        @else
                                        <p class="mb-1 line-ellipsis font-weight-bold text-danger">
                                            {{trans('coupons.'.$pcoupon->status)}}
                                        </p>

                                        <p class="mb-1 line-ellipsis text-dark">expirer le :
                                            {{$pcoupon->discount->valid_until}}</p>
                                        @endif


                                        <button class="btn btn-primary round codee"
                                            data-clipboard-text="{{$pcoupon->code}}" id="type-successs">COPIER
                                            CODE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-center pb-0">
                                    <div class="p-50 m-0">
                                        <div class="avatar-content">
                                            <img class="round" src="../../../app-assets/images/icons/coupon.png"
                                                alt="avatar" height="80" width="80">
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">0</h2>
                                    <h5 class="mb-1 text-center">Vous avez pas de coupones !</h5>
                                </div>
                                <div class="card-content">


                                    <div class="alert alert-success ml-2 mr-2 mb-2" role="alert">
                                        <h4 class="alert-heading"><i class="feather icon-star mr-1 align-middle"></i>
                                            Remarque</h4>
                                        <span>
                                            Nous vous <strong> conseigner </strong> d'utiliser nos services ,
                                            pour avoir plus de coupones</strong>.</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </section>
                <!-- // Statistics Card section end-->

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
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/cards/card-statistics.js"></script>
    <!-- END: Page JS-->
    <script src="../../../app-assets/js/scripts/extensions/toastr.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script>
        var btns = document.querySelectorAll('button');
      var clipboard = new ClipboardJS(btns)       
      $('.codee').on('click', function () {
    toastr.success('code copier avec success!',"Faite");
      });

     
    </script>
</body>
<!-- END: Body-->

</html>