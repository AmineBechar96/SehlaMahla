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
    <title>Règles Générales - SAHLA MAHLA</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/knowledge-base.css">
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
                <!-- Knowledge base category Content  -->
                <section id="knowledge-base-category mb-0">

                    <div class="row match-height">
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Buying</h4>
                                    <a href="page-kb-question.html" class="knowledge-base-category">
                                        <ul class="list-group list-group-flush mt-1">
                                            <li class="list-group-item">Cake icing gummi bears?</li>
                                            <li class="list-group-item">Jelly soufflé apple pie?</li>
                                            <li class="list-group-item">Soufflé apple pie ice cream cotton?</li>
                                            <li class="list-group-item">Powder wafer brownie?</li>
                                            <li class="list-group-item">Toffee donut dragée cotton candy?</li>
                                            <li class="list-group-item">Soufflé chupa chups chocolate bar?</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Item Support</h4>
                                    <a href="page-kb-question.html" class="knowledge-base-category">
                                        <ul class="list-group list-group-flush mt-1">
                                            <li class="list-group-item">Dessert halvah carrot cake sweet?</li>
                                            <li class="list-group-item">Jelly beans bonbon marshmallow?</li>
                                            <li class="list-group-item">Marzipan chocolate gummi bears bonbon powder?
                                            </li>
                                            <li class="list-group-item">Chupa chups lemon drops caramels?</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Payments</h4>
                                    <a href="page-kb-question.html" class="knowledge-base-category">
                                        <ul class="list-group list-group-flush mt-1">
                                            <li class="list-group-item">Oat cake lemon drops sweet sweet?</li>
                                            <li class="list-group-item">Cotton candy brownie ice cream wafer roll?</li>
                                            <li class="list-group-item">Chocolate bonbon cake sugar plum?</li>
                                            <li class="list-group-item">Cake fruitcake chupa chups?</li>
                                            <li class="list-group-item">Fruitcake bonbon dessert gingerbread powder?
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Downloads</h4>
                                    <a href="page-kb-question.html" class="knowledge-base-category">
                                        <ul class="list-group list-group-flush mt-1">
                                            <li class="list-group-item">Marshmallow jelly beans oat cake?</li>
                                            <li class="list-group-item">Cake ice cream jujubes cookie?</li>
                                            <li class="list-group-item">Sesame snaps tart cake pie chocolate?</li>
                                            <li class="list-group-item">Chocolate cake chocolate tootsi?</li>
                                            <li class="list-group-item">Caramels lemon drops tiramisu cake?</li>
                                            <li class="list-group-item">Brownie dessert gummies. Tiramisu bear claw
                                                apple?</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Licenses</h4>
                                    <a href="page-kb-question.html" class="knowledge-base-category">
                                        <ul class="list-group list-group-flush mt-1">
                                            <li class="list-group-item">Macaroon tootsie roll?</li>
                                            <li class="list-group-item">Cheesecake sweet soufflé jelly tiramisu
                                                chocolate?</li>
                                            <li class="list-group-item">Carrot cake topping tiramisu oat?</li>
                                            <li class="list-group-item">Ice cream soufflé marshmallow?</li>
                                            <li class="list-group-item">Dragée liquorice dragée jelly beans?</li>
                                            <li class="list-group-item">Lemon drops gingerbread chupa chups tiramisu?
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Documents</h4>
                                    <a href="page-kb-question.html" class="knowledge-base-category">
                                        <ul class="list-group list-group-flush mt-1">
                                            <li class="list-group-item">Brownie dessert gummies?</li>
                                            <li class="list-group-item">Cookie tiramisu lollipop?</li>
                                            <li class="list-group-item">Bonbon sugar plum jelly-o?</li>
                                            <li class="list-group-item">Halvah chupa chups chupa chups?</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Knowledge base category Content ends -->

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
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>