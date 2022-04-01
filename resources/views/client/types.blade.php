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
    <title>Types - Client - SAHLA MAHLA </title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


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
                        @foreach ($types as $type)
                        <a href="{{url('client/'.$type->id.'/browze')}}">
                            <div class="col-lg-3 col-md-6 col-12">

                                <div class="card">

                                    <div class="card-header d-flex flex-column align-items-start pb-0">


                                        <img class="img-fluid rounded mt-1 mb-1 " width="80" height="80"
                                            src="../../../app-assets/images/types/{{$type->name}}.png"
                                            alt="img placeholder">


                                        <h4 class="text-bold-700 mt-1 mb-25">{{trans('types.'.$type->name)}} </h4>
                                        <p class="mb-2">{{trans('categories.'.$type->category->name)}}
                                            <span class="ml-1 text-success">
                                                {{$type->hasService($type->id)}}</span></p>
                                    </div>

                                </div>
                        </a>
                    </div>
                    @endforeach


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
    <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/cards/card-statistics.js"></script>
    <!-- END: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-analytics.js"></script>

    @php
    $data=json_encode($types);
    @endphp
    <script>
        function color(color){
            if(color=="success"){
                return "#28c76f";
            }
            if(color=="info"){
                return "#00cfe8";
            }
            if(color=="danger"){
                return "#ea5455";
            }
            if(color=="warning"){
                return "#ff9f43";
            }
        }

    
    </script>
    <script>
        $(document).ready(function() {
            var types = {!! $types->toJson() !!};
            var $primary = '#7367F0';
  var $danger = '#EA5455';
  var $warning = '#FF9F43';
  var $info = '#0DCCE1';
  var $primary_light = '#8F80F9';
  var $warning_light = '#FFC085';
  var $danger_light = '#f29292';
  var $info_light = '#1edec5';
  var $strok_color = '#b9c3cd';
  var $label_color = '#e7eef7';
  var $white = '#fff';
 // console.log(types);
 // Subscribers Gained Chart starts //
      // ----------------------------------
    for(i = 0; i < types.length; i++){
        var type=types[i];
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
        colors: [color(type.color)],
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
          data: [28, 40, 11, 52, 38, 60, 55]
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
     // console.log(type[0]);
     var object="#"+type.name+"-chart";
     //console.log(object);
      var gainedChart = new ApexCharts(
        document.querySelector(object),
        gainedChartoptions
      );
    
      gainedChart.render();
    }
      // Subscribers Gained Chart ends //
});
       
    
    </script>



</body>
<!-- END: Body-->

</html>