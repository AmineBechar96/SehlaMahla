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
    <title>Tableau de
        bord - Fournisseur - SAHLA MAHLA</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

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
    <style>
        .provider {
            background-color: #2a2a72 !important;
            background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%) !important;
        }

        .bullet-ongoing {
            background-color: #1CA7EC;

        }

        .bullet-completed {
            background-color: #28c76f;
        }

        .bullet-canceled {
            background-color: #ea5455;

        }

        .bullet-rejected {
            background-color: #dc1416;

        }

        .badge-rejected {
            background-color: #dc1416;

        }

        .bullet-accepted {
            background-color: #6dbae0;

        }

        .bullet-ongoing {
            background-color: #1CA7EC;

        }

        .bullet-pending {
            background-color: #ff9f43;

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
            <div class="content-header row">
            </div>
            <div class="content-body">

                <section id="dashboard-analytics">

                    <!-- Dashboard Analytics Start -->
                    @if (count($services)>0)
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card bg-analytics provider text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="../../../app-assets/images/elements/decore-left.png" class="img-left"
                                            alt="card-img-left">
                                        <img src="../../../app-assets/images/elements/decore-right.png"
                                            class="img-right" alt="card-img-right">
                                        <div class="avatar avatar-xl bg-white shadow mt-0" title="Platinium">
                                            <div class="avatar-content">
                                                <img src="../../../app-assets/images/icons/{{$badgecolor->badge_color}}.png"
                                                    style="width:60px; height:60px;" alt="">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Bienvenue {{Auth::user()->name}},</h1>
                                            <p class="m-auto w-75">Vous avez
                                                <strong>{{auth()->user()->points->number_of_points}}</strong> points,
                                                nous vous encourageons à completer plus de services pour obtenir le
                                                prochain
                                                badge.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class=" p-50 m-0">
                                        <div class="avatar-content">
                                            <img src="../../../app-assets/images/icons/customers.png"
                                                style="width:40px; height:40px;" alt="">
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">{{$number_of_subscriber}}</h2>
                                    <p class="mb-0 font-weight-bold text-primary">Nombre d'abonnées</p>
                                </div>
                                <div class="card-content">
                                    <div id="subscribe-gain-chartt"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="p-50 m-0">
                                        <div class="avatar-content">
                                            <img src="../../../app-assets/images/icons/follower.png"
                                                style="width:41px; height:41px;" alt="">
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25">{{$number_of_favoris}}</h2>
                                    <p class="mb-0 font-weight-bold text-danger">Mention de J'adors</p>
                                </div>
                                <div class="card-content">
                                    <div id="orders-received-chartt"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="card-title">Revenue</h4>
                                    <p class="font-medium-5 mb-0"><i
                                            class="feather icon-settings text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pb-0">
                                        <div class="d-flex justify-content-start">
                                            <div class="mr-2">
                                                <p class="mb-50 text-bold-600">Cette Année</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">DA</sup>
                                                    <span class="text-success">
                                                        @if (is_null($currentYear))
                                                        0,00
                                                        @else
                                                        {{$currentYear->TotalRevenue}}
                                                        @endif

                                                    </span>
                                                </h2>
                                            </div>
                                            <div>
                                                <p class="mb-50 text-bold-600">Année Passée</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">DA</sup>
                                                    <span>
                                                        @if(is_null($lastYear))
                                                        0,00
                                                        @else
                                                        {{$lastYear->TotalRevenue}}
                                                        @endif
                                                    </span>
                                                </h2>
                                            </div>

                                        </div>
                                        <div id="revenue-chartt"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4 class="mb-0">Prochain Badge
                                    </h4>
                                    @if (Auth::user()->points->badge_color=="Bronze")
                                    <img class="mb-0 mt-0" src="../../../app-assets/images/icons/Silver.png"
                                        style="width:30px; height:30px;" alt="">
                                    @elseif(Auth::user()->points->badge_color=="Silver")
                                    <img class="mb-0 mt-0" src="../../../app-assets/images/icons/Gold.png"
                                        style="width:30px; height:30px;" alt="">

                                    @else
                                    <img class="mb-0 mt-0" src="../../../app-assets/images/icons/Platinium.png"
                                        style="width:30px; height:30px;" alt="">
                                    @endif

                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0 pb-0">
                                        <div id="goal-overview-chartt" class="mt-75"></div>
                                        <div class="row text-center mx-0">
                                            <div
                                                class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">Retenu</p>
                                                <p class="font-large-1 text-bold-700">
                                                    {{Auth::user()->points->number_of_points}}</p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">En Attente
                                                </p>
                                                <p class="font-large-1 text-bold-700">
                                                    @if (Auth::user()->points->badge_color=="Bronze")
                                                    {{300-Auth::user()->points->number_of_points}}
                                                    @elseif(Auth::user()->points->badge_color=="Silver")
                                                    {{600-Auth::user()->points->number_of_points}}
                                                    @elseif(Auth::user()->points->badge_color=="Gold")
                                                    {{1000-Auth::user()->points->number_of_points}}
                                                    @else
                                                    {{Auth::user()->points->number_of_points*2}}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="mb-0">Dernieres Réservations</h4>
                                    <a href="{{url('provider/bookings')}}"
                                        class="font-weight-bold text-primary float-right">Voir Tout</a>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                                <tr>
                                                    <th>CLIENT</th>
                                                    <th>STATUS</th>
                                                    <th>TITRE</th>
                                                    <th>ADDRESSE</th>

                                                    <th>DATE</th>
                                                    <th>TEMPS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bookings as $booking)
                                                <tr>
                                                    <td class="p-1">
                                                        <ul
                                                            class="list-unstyled users-list m-0  d-flex align-items-center">
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Vinnie Mostowy"
                                                                class="avatar pull-up">
                                                                <img class="media-object rounded-circle"
                                                                    src="../../../app-assets/images/icons/client3.png"
                                                                    alt="Avatar" height="30" width="30">
                                                            </li>
                                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                                data-placement="bottom"
                                                                data-original-title="Elicia Rieske"
                                                                class=" ml-1 font-weight-bold pull-up">
                                                                {{ucwords($booking->user->name)}}
                                                            </li>

                                                        </ul>
                                                    </td>
                                                    <td
                                                        class="{{$booking->bookingStatusColor($booking->status)}} font-weight-bold">
                                                        <i
                                                            class="bullet bullet-sm bullet-{{$booking->status}} mr-50"></i>{{trans('bookings.'.$booking->status)}}
                                                    </td>
                                                    <td>
                                                        <a class="font-weight-bold text-dark"
                                                            href="{{url('client/'.$booking->id.'/booking')}}">
                                                            {{$booking->title}} </a>
                                                    </td>
                                                    <td>{{$booking->address}}</td>

                                                    <td>{{$booking->booking_date}}</td>
                                                    <td>{{ date('h:i A', strtotime($booking->booking_time))}}</td>
                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    <div id="tsparticles"></div>
                    <div class="row justify-content-center" style="margin-top:100px;">
                        <div id="tsparticles"></div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card bg-analytics provider text-white">
                                <div class="card-content">
                                    <div class="card-body text-center">
                                        <img src="../../../app-assets/images/elements/decore-left.png" class="img-left"
                                            alt="card-img-left">
                                        <img src="../../../app-assets/images/elements/decore-right.png"
                                            class="img-right" alt="card-img-right">
                                        <div class="avatar avatar-xl bg-white shadow mt-0">
                                            <div class="avatar-content">
                                                <img src="../../../app-assets/images/icons/Bronze.png"
                                                    style="width:60px; height:60px;" alt="">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <h1 class="mb-2 text-white">Congratulations {{ucwords(Auth::user()->name)}},
                                            </h1>
                                            <p class="m-auto w-75">Vous avez créé votre <strong>compte</strong> avec
                                                succès, vous pouvez maintenant créer votre premier service

                                                .</p>
                                            <a href="{{url('provider/categories')}}" class="btn btn-warning mt-1">
                                                COMMENSER
                                                MAINTENANT
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    @endif


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

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tsparticles@1.22.1"></script>

    <!-- tsParticles confetti shape script -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/tsparticles-shape-confetti@1.7.1"></script>
    <script>
        // the tsParticles loading script
tsParticles.load("tsparticles", {
  fullScreen: {
    enable: true
  },
  particles: {
    number: {
      value: 0 // no starting particles
    },
    color: {
      value: ["#1E00FF", "#FF0061", "#E1FF00", "#00FF9E"] // the confetti colors
    },
    shape: {
      type: "confetti", // the confetti shape
      options: {
        confetti: { // confetti shape options
          type: ["circle", "square"] // you can only have circle or square for now
        }
      }
    },
    opacity: {
      value: 1, // confetti are solid, so opacity should be 1, but who cares?
      animation: {
        enable: true, // enables the opacity animation, this will fade away the confettis
        minimumValue: 0, // minimum opacity reached with animation
        speed: 2, // the opacity animation speed, the higher the value, the faster the confetti disappear
        startValue: "max", // start always from opacity 1
        destroy: "min" // destroy the confettis at opacity 0
      }
    },
    size: {
      value: 7, // confetti size
      random: {
        enable: true, // enables a random size between 3 (below) and 7 (above)
        minimumValue: 3 // the confetti minimum size
      }
    },
    life: {
      duration: {
        sync: true, // syncs the life duration for those who spawns together
        value: 5 // how many seconds the confettis should be on screen
      },
      count: 1 // how many times the confetti should appear, once is enough this time
    },
    move: {
      enable: true, // confetti need to move right?
      gravity: {
        enable: true, // gravity to let them fall!
        acceleration: 20 // how fast the gravity should attract the confettis
      },
      speed: 50, // the confetti speed, it's the starting value since gravity will affect it, and decay too
      decay: 0.05, // the speed decay over time, it's a decreasing value, every frame the decay will be multiplied by current particle speed and removed from that value
      outModes: { // what confettis should do offscreen?
        default: "destroy", // by default remove them
        top: "none" // but since gravity attract them to bottom, when they go offscreen on top they can stay
      }
    }
  },
  background: {
    color: "#fff" // set the canvas background, it will set the style property
  },
  emitters: [ // the confetti emitters, the will bring confetti to life
    {
      direction: "top-right", // the first emitter spawns confettis moving in the top right direction
      rate: {
        delay: 0.1, // this is the delay in seconds for every confetti emission (10 confettis will spawn every 0.1 seconds)
        quantity: 10 // how many confettis must spawn ad every delay
      },
      position: { // the emitter position (values are in canvas %)
        x: 0,
        y: 50
      },
      size: { // the emitter size, if > 0 you'll have a spawn area instead of a point
        width: 0,
        height: 0
      }
    },
    {
      direction: "top-left", // same as the first one but in the opposite side
      rate: {
        delay: 0.1,
        quantity: 10
      },
      position: {
        x: 100,
        y: 50
      },
      size: {
        width: 0,
        height: 0
      }
    }
  ]
});
    </script>
    <script>
        $(window).on("load", function () {
    
    
     
    
    var $primary = '#7367F0';
    var $danger = '#EA5455';
    var $success = '#28C76F';
    
    var $warning = '#FF9F43';
    var $info = '#0DCCE1';
    var $primary_light = '#8F80F9';
    var $warning_light = '#FFC085';
    var $danger_light = '#f29292';
    var $info_light = '#1edec5';
    var $strok_color = '#b9c3cd';
    var $label_color = '#e7eef7';
    var $white = '#fff';
    
    
    // Subscribers Gained Chart starts //
    // ----------------------------------
    
    var gainedChartoptions = {
      chart: {
        height: 100,
        type: 'area',
        toolbar: {
          show: false,
        },
        sparkline: {
          enabled: true
        },
        grid: {
          show: false,
          padding: {
            left: 0,
            right: 0
          }
        },
      },
      colors: [$primary],
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 2.5
      },
      fill: {
        type: 'gradient',
        gradient: {
          shadeIntensity: 0.9,
          opacityFrom: 0.7,
          opacityTo: 0.5,
          stops: [0, 80, 100]
        }
      },
      series: [{
        name: 'Subscribers',
        data: [
            @foreach ($saved as $save)
            {{$save->Total}} ,
            @endforeach
          ]
      }],
    
      xaxis: {
        labels: {
          show: false,
        },
        axisBorder: {
          show: false,
        }
      },
      yaxis: [{
        y: 0,
        offsetX: 0,
        offsetY: 0,
        padding: { left: 0, right: 0 },
      }],
      tooltip: {
        x: { show: false }
      },
    }
    
    var gainedChart = new ApexCharts(
      document.querySelector("#subscribe-gain-chartt"),
      gainedChartoptions
    );
    
    gainedChart.render();
    // Subscribers Gained Chart ends //
    // Line Area Chart - 3
    // ----------------------------------

    var saleslineChartoptions = {
        chart: {
            height: 100,
            type: 'area',
            toolbar: {
                show: false
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            }
        },
        colors: [$danger],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth',
            width: 2.5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 0.9,
                opacityFrom: 0.7,
                opacityTo: 0.5,
                stops: [0, 80, 100]
            }
        },
        series: [
            {
                name: 'Sales',
                data: [
                    
                    @foreach ($liked as $like)
        {{$like->Total}} ,
        @endforeach
                
            ]
            }
        ],

        xaxis: {
            labels: {
                show: false
            },
            axisBorder: {
                show: false
            }
        },
        yaxis: [
            {
                y: 0,
                offsetX: 0,
                offsetY: 0,
                padding: { left: 0, right: 0 }
            }
        ],
        tooltip: {
            x: { show: false }
        }
    };

    var saleslineChart = new ApexCharts(
        document.querySelector('#line-area-chart-33'),
        saleslineChartoptions
    );

    saleslineChart.render();

// Orders Received Chart starts //
  // ----------------------------------

  var orderChartoptions = {
    chart: {
      height: 100,
      type: 'area',
      toolbar: {
        show: false,
      },
      sparkline: {
        enabled: true
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0
        }
      },
    },
    colors: [$danger],
    dataLabels: {
      enabled: false
    },
    stroke: {
      curve: 'smooth',
      width: 2.5
    },
    fill: {
      type: 'gradient',
      gradient: {
        shadeIntensity: 0.9,
        opacityFrom: 0.7,
        opacityTo: 0.5,
        stops: [0, 80, 100]
      }
    },
    series: [{
      name: 'Mention de jaime',
      data: [
        @foreach ($liked as $like)
        {{$like->Total}} ,
        @endforeach
                
      ]
    }],

    xaxis: {
      labels: {
        show: false,
      },
      axisBorder: {
        show: false,
      }
    },
    yaxis: [{
      y: 0,
      offsetX: 0,
      offsetY: 0,
      padding: { left: 0, right: 0 },
    }],
    tooltip: {
      x: { show: false }
    },
  }

  var orderChart = new ApexCharts(
    document.querySelector("#orders-received-chartt"),
    orderChartoptions
  );

  orderChart.render();

  // Orders Received Chart ends //


   // Goal Overview  Chart
    // -----------------------------

    var goalChartoptions = {
        chart: {
            height: 250,
            type: 'radialBar',
            sparkline: {
                enabled: true
            },
            dropShadow: {
                enabled: true,
                blur: 3,
                left: 1,
                top: 1,
                opacity: 0.1
            }
        },
        colors: [$success],
        plotOptions: {
            radialBar: {
                size: 110,
                startAngle: -150,
                endAngle: 150,
                hollow: {
                    size: '77%'
                },
                track: {
                    background: $strok_color,
                    strokeWidth: '50%'
                },
                dataLabels: {
                    name: {
                        show: false
                    },
                    value: {
                        offsetY: 18,
                        color: '#99a2ac',
                        fontSize: '4rem'
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'horizontal',
                shadeIntensity: 0.5,
                gradientToColors: ['#00b5b5'],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },

        series: [
            @if (Auth::user()->points->badge_color=="Bronze")
                                                    {{round((Auth::user()->points->number_of_points*100)/300)}}
                                                    @elseif(Auth::user()->points->badge_color=="Silver")
                                                    {{round((Auth::user()->points->number_of_points*100)/600)}}
                                                    @elseif(Auth::user()->points->badge_color=="Gold")
                                                    {{round((Auth::user()->points->number_of_points*100)/1000)}}
                                                    @else
                                                    {{round((Auth::user()->points->number_of_points*100)/(Auth::user()->points->number_of_points*2))}}
                                                    @endif

        ],
        stroke: {
            lineCap: 'round'
        }
    };

    var goalChart = new ApexCharts(
        document.querySelector('#goal-overview-chartt'),
        goalChartoptions
    );

    goalChart.render();
     // revenue-chart Chart
    // -----------------------------

    var revenueChartoptions = {
        chart: {
            height: 270,
            toolbar: { show: false },
            type: 'line'
        },
        stroke: {
            curve: 'smooth',
            dashArray: [0, 12],
            width: [4, 2]
        },
        grid: {
            borderColor: $label_color
        },
        legend: {
            show: false
        },
        colors: [$danger_light, $strok_color],

        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                inverseColors: false,
                gradientToColors: [$primary, $strok_color],
                shadeIntensity: 1,
                type: 'horizontal',
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            }
        },
        markers: {
            size: 0,
            hover: {
                size: 5
            }
        },
        xaxis: {
            labels: {
                style: {
                    colors: $strok_color
                }
            },
            axisTicks: {
                show: false
            },
            categories: [
              "Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"
            ],
            axisBorder: {
                show: false
            },
            tickPlacement: 'on'
        },
        yaxis: {
            tickAmount: 2,
            labels: {
                style: {
                    color: $strok_color
                },
                formatter: function(val) {
                    return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
                }
            }
        },
        tooltip: {
            x: { show: false }
        },
        series: [
            {
                name: 'Cette Annee',
                data: [
                    @foreach ((array) auth()->user()->currentYearSales() as $key => $value)
                        {{$value}},
                        @endforeach
                ]
            },
            {
                name: 'Annee Passee',
                data: [
                    @foreach ((array) auth()->user()->lastYearSales() as $key => $value)
                        {{$value}},
                        @endforeach
                ]
            }
        ]
    };

    var revenueChart = new ApexCharts(
        document.querySelector('#revenue-chartt'),
        revenueChartoptions
    );

    revenueChart.render();

});
    

    </script>
</body>


<!-- END: Body-->

</html>