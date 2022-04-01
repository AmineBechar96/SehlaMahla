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
    @include('layouts.head')
</head>

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">
    @include('layouts.header')
    @include('layouts.horizontal-menu')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <!-- Analytics card section start -->
                <section id="analytics-card">
                    <!-- Analytics card section start -->


                    <div class="row">
                        <div class="col-2">
                        </div>
                        <div class="col-8">

                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title pb-2">Etat de la
                                        voiture
                                    </h4>

                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-0">
                                        <div class="row" style="margin-top:15px;">

                                            @if ($taux >= 90)
                                            <div class="alert alert-success" role="alert">
                                                <h4 class="alert-heading">Success</h4>
                                                <p class="mb-0">
                                                    Tootsie roll lollipop lollipop icing. Wafer cookie danish
                                                    macaroon. Liquorice fruitcake apple pie I love cupcake cupcake.
                                                </p>
                                            </div>
                                            @else
                                            @if ($taux >= 70)
                                            <div class="alert alert-primary" role="alert">
                                                <h4 class="alert-heading">Primary</h4>
                                                <p class="mb-0">
                                                    Tootsie roll lollipop lollipop icing. Wafer cookie danish
                                                    macaroon. Liquorice fruitcake apple pie I love cupcake cupcake.
                                                </p>
                                            </div>
                                            @else
                                            @if ($taux >= 50)
                                            <div class="alert alert-warning" role="alert">
                                                <h4 class="alert-heading">Warning</h4>
                                                <p class="mb-0">
                                                    Tootsie roll lollipop lollipop icing. Wafer cookie danish
                                                    macaroon. Liquorice fruitcake apple pie I love cupcake cupcake.
                                                </p>
                                            </div>
                                            @else

                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading"> Danger
                                                </h4>
                                                <p class="mb-0">
                                                    Tootsie roll lollipop lollipop icing. Wafer cookie danish
                                                    macaroon. Liquorice fruitcake apple pie I love cupcake cupcake.
                                                </p>
                                            </div>
                                            @endif
                                            @endif
                                            @endif
                                            <div class="col-sm-1  d-flex flex-column flex-wrap text-center">

                                            </div>
                                            <div class="col-sm-10 col-12 d-flex justify-content-center">
                                                <div id="goal"></div>
                                            </div>
                                        </div>

                                        <div class="card" style="margin-top:30px;">
                                            <div class="card-header">

                                                <h4>Informations de la
                                                    voiture</h4>

                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table mt-3">

                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Nom</th>
                                                                <td>{{$marque}} {{$model}} {{$notes}}</td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Année</th>
                                                                <td>{{$proDate}}</td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Energie</th>
                                                                <td>{{$energie}}</td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Transmission</th>
                                                                <td>{{$transmission}}</td>

                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Kilométrage</th>
                                                                <td>{{$kilometrage}} Km</td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </section>
                <!-- Analytics Card section end-->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    @include('layouts.footer')
    @include('layouts.footer-scripts')
    <script>
        var options = {
  chart: {
    type: 'line'
  },
  series: [{
    name: 'sales',
    data: [30,40,35,50,49,60,70,91,125]
  }],
  xaxis: {
    categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
    </script>
    <script language="javascript">
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
        colors: ['#28C76F'],
        plotOptions: {
            radialBar: {
                size: 110,
                startAngle: -150,
                endAngle: 150,
                hollow: {
                    size: '77%'
                },
                track: {
                    background:'#b9c3cd',
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
        series: [<?php echo json_encode($taux);?>],
        stroke: {
            lineCap: 'round'
        }
    };

    var goalChart = new ApexCharts(
        document.querySelector('#goal'),
        goalChartoptions
    );

    goalChart.render();
    var y = {
        chart: {
            height: 250,
            type: 'radialBar',
            sparkline: { enabled: !0 },
            dropShadow: { enabled: !0, blur: 3, left: 1, top: 1, opacity: 0.1 }
        },
        colors: [t],
        plotOptions: {
            radialBar: {
                size: 110,
                startAngle: -150,
                endAngle: 150,
                hollow: { size: '77%' },
                track: { background: l, strokeWidth: '50%' },
                dataLabels: {
                    name: { show: !1 },
                    value: { offsetY: 18, color: '#99a2ac', fontSize: '4rem' }
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
                inverseColors: !0,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        series: [38],
        stroke: { lineCap: 'round' }
    };
    new ApexCharts(document.querySelector('#goal'), y).render();
    var y = {
        chart: {
            height: 250,
            type: 'radialBar',
            sparkline: { enabled: !0 },
            dropShadow: { enabled: !0, blur: 3, left: 1, top: 1, opacity: 0.1 }
        },
        colors: [t],
        plotOptions: {
            radialBar: {
                size: 110,
                startAngle: -150,
                endAngle: 150,
                hollow: { size: '77%' },
                track: { background: l, strokeWidth: '50%' },
                dataLabels: {
                    name: { show: !1 },
                    value: { offsetY: 18, color: '#99a2ac', fontSize: '4rem' }
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
                inverseColors: !0,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        series: [38],
        stroke: { lineCap: 'round' }
    };
    new ApexCharts(document.querySelector('#goal-over-chart'), y).render();

    // Client Retention Chart
    // ----------------------------------
    </script>

</body>
<!-- END: Body-->

</html>