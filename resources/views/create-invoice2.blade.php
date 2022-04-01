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
    <title>Form Layouts - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"
        href="../../../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
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



    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">

            <div class="content-body">

                <section id="multiple-column-form">
                    <div class="row match-height justify-content-center">
                        <div class="col-lg-8 col-sm-12 ">
                            <div class="card">
                                <div class="card-header justify-content-center d-flex flex-column">
                                    <div class="avatar bg-primary mb-2">
                                        <img src="./../../app-assets/images/banner/invoice.png" width="70" height="70"
                                            alt="" srcset="">

                                    </div>
                                    <h4 class="card-title font-medium-5 ">Ajouter Facture
                                    </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="form-body">
                                                <h5 class="font-weight-bold mb-2 mt-2">Informations de Client</h5>
                                                <div class="row">

                                                    <div class="col-md-4 col-sm-6 col-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold"
                                                                for="first-name-column">NOM</label>
                                                            <input style="height:50px" type="text"
                                                                id="first-name-column" class="form-control"
                                                                style="height:50px" placeholder="First Name"
                                                                name="fname-column">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-6">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold"
                                                                for="last-name-column">ADDRESSE</label>
                                                            <input style="height:50px" type="text" id="last-name-column"
                                                                class="form-control" placeholder="Last Name"
                                                                name="lname-column">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold" for="city-column">CODE
                                                                POSTAL</label>

                                                            <input style="height:50px" type="text" id="zipcode"
                                                                class="form-control" placeholder="City"
                                                                name="city-column">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-4 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold" for="city-column">EMAIL
                                                            </label>

                                                            <input style="height:50px" type="text" id="client_email"
                                                                class="form-control" placeholder="City"
                                                                name="city-column">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold" for="city-column">NUMERO
                                                            </label>

                                                            <input style="height:50px" type="text" id="client_number"
                                                                class="form-control" placeholder="City"
                                                                name="city-column">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="font-weight-bold mt-2 text-center mb-2">General Information
                                                    section</h5>

                                                <div id="app">

                                                    <items></items>
                                                </div>

                                                <div class="row mt-2 mb-5">
                                                    <div class="col-md-4 col-12">
                                                        <button class="btn btn-success font-weight-bold"><i
                                                                class="feather icon-plus"></i> AJOUTER</button>

                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row mt-2 mb-5">




                                                    <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold"
                                                                for="email-id-column">SUBTOTAL</label>

                                                            <input style="height:50px" type="email" id="email-id-column"
                                                                class="form-control" name="email-id-column"
                                                                placeholder="Email">

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-6">
                                                        <fieldset class="mt-2">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" value="false">
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>
                                                                <span class="font-weight-bold">REDUCTION</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-6 ">
                                                        <div class="form-group ">
                                                            <label class="font-weight-bold"
                                                                for="email-id-column">REDUCTION</label>

                                                            <input style="height:50px" type="email" id="email-id-column"
                                                                class="form-control" name="email-id-column"
                                                                placeholder="Email">

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row justify-content-end mt-2 mb-5 ">
                                                    <div class="col-md-6 col-12 ">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold"
                                                                for="email-id-column">TOTAL</label>

                                                            <input style="height:50px" type="email" id="email-id-column"
                                                                class="form-control" name="email-id-column"
                                                                placeholder="Email">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary mr-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

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

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <script src="{{mix('js/app.js')}}"></script>
    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    <script src="../../../app-assets/js/scripts/forms/number-input.js"></script>

</body>
<!-- END: Body-->

</html>