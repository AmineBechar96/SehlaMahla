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
    <title>Facture - Details</title>
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/invoice.css">
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

                <!-- invoice functionality start -->
                <section class="invoice-print mb-1">
                    <div class="row">

                        <fieldset class="col-12 col-md-5 mb-1 mb-md-0">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{$invoice->client->email}}"
                                    placeholder="Email" aria-describedby="button-addon2">
                                <div class="input-group-append" id="button-addon2">
                                    <button class="btn btn-outline-primary" type="button">EMAIL</button>
                                </div>
                            </div>
                        </fieldset>
                        <div class="col-12 col-md-7 d-flex flex-column flex-md-row justify-content-end">

                            <a class="btn btn-primary  ml-0 ml-md-1"
                                href="{{url('provider/invoices/'.$invoice->id.'/download')}}"> <i
                                    class="feather icon-download"></i>
                                Télécharger</a>
                        </div>
                    </div>
                </section>
                <!-- invoice functionality end -->

                <!-- invoice page -->
                <section class="card invoice-page">
                    <div id="invoice-template" class="card-body">
                        <!-- Invoice Company Details -->
                        <div id="invoice-company-details" class="row">
                            <div class="col-sm-6 col-12 text-left pt-1">
                                <div class="media pt-1">
                                    <img src="{{$invoice->client->service->service_image_url}}"
                                        style="border-radius:50%" width="70" height="70" alt="company logo">


                                </div>
                            </div>

                            <div class="col-sm-6 col-12 text-right">
                                <h1>Facture</h1>
                                <div class="invoice-details mt-2">
                                    <h6>INVOICE NO.</h6>
                                    <p>{{$invoice->invoice_number}}</p>
                                    <h6 class="mt-2">INVOICE DATE</h6>
                                    <p>{{$invoice->invoice_date}}</p>
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Company Details -->

                        <!-- Invoice Recipient Details -->
                        <div id="invoice-customer-details" class="row pt-2">
                            <div class="col-sm-6 col-12 text-left">
                                <h5>Client</h5>
                                <div class="recipient-info my-2">
                                    <p>{{$invoice->client->name}}</p>
                                    <p>{{$invoice->client->address}}</p>

                                </div>
                                <div class="recipient-contact pb-2">
                                    <p>
                                        <i class="feather icon-mail"></i>
                                        {{$invoice->client->email}}
                                    </p>
                                    <p>
                                        <i class="feather icon-phone"></i>
                                        {{$invoice->client->phone}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 text-right">
                                <h5>{{$invoice->client->service->title}}</h5>
                                <div class="company-info my-2">
                                    <p>{{$invoice->client->service->address}}</p>
                                    <p>{{$invoice->client->service->commune->name}},{{$invoice->client->service->commune->wilaya->name_en}},
                                        Algerie </p>

                                </div>
                                <div class="company-contact">
                                    <p>
                                        <i class="feather icon-mail"></i>

                                        {{$invoice->socialMedia($invoice->client->service->id)}}

                                    </p>
                                    <p>

                                        <p><i class="feather icon-phone"></i> {{$invoice->client->service->phone}}</p>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--/ Invoice Recipient Details -->

                        <!-- Invoice Items Details -->
                        <div id="invoice-items-details" class="pt-1 invoice-items-table">
                            <div class="row">
                                <div class="table-responsive col-12">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>DESCRIPTION DE TÂCHE
                                                </th>
                                                <th>QUANTITY</th>
                                                <th>PRIX UNITAIRE</th>
                                                <th>MONTANT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($invoice->products as $order)
                                            <tr>
                                                <td>{{$order->name}}</td>
                                                <td>{{$order->pivot->quantity}}</td>
                                                <td>{{number_format($order->unit_price, 2, ',', ' ')}} DA</td>
                                                <td>{{number_format(($order->unit_price *$order->pivot->quantity), 2, ',', ' ') }}
                                                    DA </td>
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="invoice-total-details" class="invoice-total-table">
                            <div class="row">
                                <div class="col-7 offset-5">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tbody>

                                                <tr>
                                                    <th>SOUS-TOTAL</th>
                                                    <td>{{number_format((($invoice->total - $invoice->tva_value -$invoice->shipping_value) + $invoice->discount_value), 2, ',', ' ')}}
                                                        DA</td>
                                                </tr>
                                                <tr>
                                                    <th>TVA ({{$parameters->tva_rate}})</th>
                                                    <td>{{number_format($invoice->tva_value, 2, ',', ' ')}} DA</td>
                                                </tr>
                                                <tr>
                                                    <th>LIVRAISON ({{$parameters->shipping_rate}})</th>
                                                    <td>{{number_format($invoice->shipping_value, 2, ',', ' ')}} DA</td>
                                                </tr>


                                                <tr>
                                                    <th>REDUCTION

                                                    </th>
                                                    <td>{{number_format($invoice->discount_value, 2, ',', ' ')}} DA</td>
                                                </tr>

                                                <tr>
                                                    <th>TOTAL</th>
                                                    <td>{{number_format($invoice->total, 2, ',', ' ')}} DA</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </section>
                <!-- invoice page end -->

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
    <script src="../../../app-assets/js/scripts/pages/invoice.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->


</html>