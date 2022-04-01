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
    <title>Statistiques - Client - SAHLA MAHLA </title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/shepherd-theme-default.css">
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/tour/tour.css">
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
                <!-- Dashboard Analytics Start -->
                <section id="dashboard-analytics">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class=" p-50 m-0">
                                        <div class="avatar-content">

                                            <img src="../../../app-assets/images/icons/services.png"
                                                style="width:40px; height:40px;" alt="">
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$savedServices}}</h2>
                                    <p class="mb-1 font-weight-bold ">Services Souscrits
                                    </p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class=" p-50 m-0">
                                        <div class="avatar-content">
                                            <img src="../../../app-assets/images/icons/heart2.png"
                                                style="width:40px; height:40px;" alt="">
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$likedServices}}</h2>
                                    <p class="mb-1 font-weight-bold ">Services Aimés</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class=" p-50 m-0">
                                        <div class="avatar-content">
                                            <img src="../../../app-assets/images/icons/discount.png"
                                                style="width:38px; height:38px;" alt="">
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{$coupons}}</h2>
                                    <p class="mb-1 font-weight-bold ">Coupones Gagniés</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class=" p-50 m-0">
                                        <div class="avatar-content">
                                            <img src="../../../app-assets/images/icons/{{auth()->user()->points->badge_color}}.png"
                                                style="width:40px; height:40px;" alt="">
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{auth()->user()->points->number_of_points}}</h2>
                                    <p class="mb-1 font-weight-bold ">Points Gagnés
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row match-height">
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4>Réservations</h4>

                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="product-order-chartt" class="mb-3"></div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-success"></i>
                                                <span class="text-bold-600 ml-50">Terminées</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{count($completed)}}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-1">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                                <span class="text-bold-600 ml-50">En Attente</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{count($pending)}}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-75">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                                <span class="text-bold-600 ml-50">En Cours</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{count($ongoing)}}</span>
                                            </div>
                                        </div>
                                        <div class="chart-info d-flex justify-content-between mb-75">
                                            <div class="series-info d-flex align-items-center">
                                                <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                                <span class="text-bold-600 ml-50">Annulées</span>
                                            </div>
                                            <div class="product-result">
                                                <span>{{count($canceled)}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Statistiques</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Prochaine Badge</p>
                                                <h4>{{$nextBadge}}%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>800 <i class="feather icon-arrow-up text-success"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-primary mb-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$nextBadge}}"
                                                aria-valuemin="{{$nextBadge}}" aria-valuemax="100"
                                                style="width:{{$nextBadge}}%"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Platinium</p>
                                                <h4>{{$platinium}}%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>-200 <i class="feather icon-arrow-down text-danger"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-primary mb-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$platinium}}"
                                                aria-valuemin="{{$platinium}}" aria-valuemax="100"
                                                style="width:{{$platinium}}%"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Signal</p>
                                                <h4>{{Auth::user()->reported()}}%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>100 <i class="feather icon-arrow-up text-success"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-danger mb-2">
                                            <div class="progress-bar" role="progressbar"
                                                aria-valuenow="{{(Auth::user()->reported()*100)/10}}"
                                                aria-valuemin="{{(Auth::user()->reported()*100)/10}}"
                                                aria-valuemax="100"
                                                style="width:{{(Auth::user()->reported()*100)/10}}%"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Comportement Géneral</p>
                                                <h4>{{$behaviour}}%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>-450 <i class="feather icon-arrow-down text-danger"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-success mb-50">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$behaviour}}"
                                                aria-valuemin="{{$behaviour}}" aria-valuemax="100"
                                                style="width:{{$behaviour}}%">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Rensigniement</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="activity-timeline timeline-left list-unstyled">
                                            <li>
                                                <div class="timeline-icon bg-info">
                                                    <i class="feather icon-award font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">
                                                        Gagner des points

                                                    </p>
                                                    <span class="font-small-3">2 points pour chaque reservation
                                                        terminées</span>
                                                </div>
                                                <small
                                                    class="text-muted">{{auth()->user()->points->updated_at->diffForHumans()}}</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-warning">
                                                    <i class="feather icon-user-x font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Annulation de reservations
                                                    </p>
                                                    <span class="font-small-3">-1 points pour chaque reservation
                                                        Annulée</span>
                                                </div>
                                                <small class="text-muted">
                                                    {{auth()->user()->points->updated_at->diffForHumans()}}</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-primary">
                                                    <i class="feather icon-gift font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Nouveaux badges
                                                    </p>
                                                    <span class="font-small-3">300 points pour passer au prochaine
                                                        badge</span>
                                                </div>
                                                <small
                                                    class="text-muted">{{auth()->user()->points->updated_at->diffForHumans()}}</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-danger">
                                                    <i class="feather icon-alert-circle font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Signal
                                                    </p>
                                                    <span class="font-small-3">20 signal compte suspendu</span>
                                                </div>
                                                <small
                                                    class="text-muted">{{auth()->user()->points->updated_at->diffForHumans()}}</small>
                                            </li>
                                            <li>
                                                <div class="timeline-icon bg-success">
                                                    <i class="feather icon-percent font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Coupones et reductions
                                                    </p>
                                                    <span class="font-small-3">coupone pour les client fidéles</span>
                                                </div>
                                                <small
                                                    class="text-muted">{{auth()->user()->points->updated_at->diffForHumans()}}</small>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- Dashboard Analytics end -->

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
    <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <!-- END: Page JS-->
    <script>
        var $primary = '#00cfe8';
  var $danger = '#EA5455';
  var $warning = '#FF9F43';
  var $info = '#0DCCE1';
  var $success= '#28c76f';
  var $primary_light = '#6ee2f0';
  var $success_light='#5bf57f';
  var $warning_light = '#FFC085';
  var $danger_light = '#f29292';
  var $info_light = '#1edec5';
  var $strok_color = '#b9c3cd';
  var $label_color = '#e7eef7';
  var $white = '#fff';


  var productChartoptions = {
    chart: {
      height: 325,
      type: 'radialBar',
    },
    colors: [$success, $warning, $primary, $danger],
    fill: {
      type: 'gradient',
      gradient: {
        // enabled: true,
        shade: 'dark',
        type: 'vertical',
        shadeIntensity: 0.5,
        gradientToColors: [$success_light, $warning_light, $primary_light, $danger_light],
        inverseColors: false,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 100]
      },
    },
    stroke: {
      lineCap: 'round'
    },
    plotOptions: {
      radialBar: {
        size: 165,
        hollow: {
          size: '20%'
        },
        track: {
          strokeWidth: '100%',
          margin: 15,
        },
        dataLabels: {
          name: {
            fontSize: '18px',
          },
          value: {
            fontSize: '16px',
          },
          total: {
            show: true,
            label: 'Total',

            formatter: function (w) {
              // By default this function returns the average of all series. The below is just an example to show the use of custom formatter function
              return {{count($booking)}}
            }
          }
        }
      }
    },
    @if(count($booking)>0)
    series: [{{round((count($completed)*100)/count($booking))}}, {{round((count($pending)*100)/count($booking))}},{{round((count($ongoing)*100)/count($booking))}}, {{round((count($canceled)*100)/count($booking))}}],

        @else
        series: [0, 0,0, 0],
        @endif
  
    labels: ['Terminées', 'En Attente', 'En Cours','Annulées'],

  }

  var productChart = new ApexCharts(
    document.querySelector("#product-order-chartt"),
    productChartoptions
  );

  productChart.render();

  // Product Order Chart ends //

    </script>
</body>
<!-- END: Body-->

</html>