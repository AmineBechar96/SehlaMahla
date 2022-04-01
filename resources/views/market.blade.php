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

                <!-- line chart section start -->
                <section id="chartjs-charts">


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
                                                <p class="mb-50 text-bold-600">This Month</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">$</sup>
                                                    <span class="text-success">{{$data6['data'][1]}}</span>
                                                </h2>
                                            </div>
                                            <div>
                                                <p class="mb-50 text-bold-600">Last Month</p>
                                                <h2 class="text-bold-400">
                                                    <sup class="font-medium-1">$</sup>
                                                    <span>{{$data6['data'][0]}}</span>
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
                                    <h4 class="mb-0">Goal Overview</h4>
                                    <p class="font-medium-5 mb-0"><i
                                            class="feather icon-help-circle text-muted cursor-pointer"></i></p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body px-0 pb-0">
                                        <div id="goal-overview-chartt" class="mt-75 height-250"></div>
                                        <div class="row text-center mx-0">
                                            <div
                                                class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">Completed</p>
                                                <p class="font-large-1 text-bold-700">{{$data7['data'][0]}}</p>
                                            </div>
                                            <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                                <p class="mb-50">In Progress</p>
                                                <p class="font-large-1 text-bold-700">
                                                    {{$data7['goal'][0]-$data7['data'][0]}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bar Chart -->
                    <div class="row">
                        <!-- Line Chart -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Moyenne des Prix Vendus</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="line-chartt"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Scatter Chart -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Scatter Chart</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="scatter-chartt" class="height-400"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <!-- Line Chart -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Nombre de Voitures Vendus</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="line-chartt2"></div>
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
    <!-- END: Content-->
    @include('layouts.footer')
    @include('layouts.footer-scripts')
    <script>
        var $primary = '#7367F0';
var $success = '#28C76F';
var $danger = '#EA5455';
var $warning = '#FF9F43';
var $label_color = '#1E1E1E';
var $primary_light = '#A9A2F6';
    var $danger_light = '#f29292';
    var $success_light = '#55DD92';
    var $warning_light = '#ffc085';
    var $info_light = '#1fcadb';
    var $strok_color = '#b9c3cd';
    var $label_color = '#e7e7e7';
var grid_line_color = '#dae1e7';
var scatter_grid_color = '#f3f3f3';
var $scatter_point_light = '#D1D4DB';
var $scatter_point_dark = '#5175E0';
var $info = '#00cfe8';
var $white = '#fff';
var $black = '#000';
var yaxis_opposite = false;
var themeColors = [$primary, $success, $danger, $warning, $label_color];
var themeColors2 = [$success ,$primary , $danger, $warning, $info];
    var cData2 = JSON.parse(`<?php echo $data2['chart_data2']; ?>`);
    var cData3 = JSON.parse(`<?php echo $data3['chart_data3']; ?>`);
    var cData4 = JSON.parse(`<?php echo $data4['chart_data4']; ?>`);
    var cData5 = JSON.parse(`<?php echo $data5['chart_data5']; ?>`);
    var cData7 = JSON.parse(`<?php echo $data7['chart_data7']; ?>`);
    var cData8 = JSON.parse(`<?php echo $data8['chart_data8']; ?>`);
    var cData9 = JSON.parse(`<?php echo $data9['chart_data9']; ?>`);
    var taux=Math.round(cData7.data*100/cData7.goal);
    console.log(taux);
   
    // Line Chart
    // ----------------------------------
    var lineChartOptions = {
      chart: {
        height: 350,
        type: 'line',
        zoom: {
          enabled: false
        }
      },
      colors: themeColors,
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      series: [{
        name: "Desktops",
        data: cData3.data,
      }],
      title: {
        text: 'Moyenne des prix',
        align: 'left'
      },
      grid: {
        row: {
          colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.5
        },
      },
      xaxis: {
        categories: cData3.label,
      },
      yaxis: {
        tickAmount: 5,
        opposite: yaxis_opposite
      }
    }
    var lineChart = new ApexCharts(
      document.querySelector("#line-chartt"),
      lineChartOptions
    );
    lineChart.render();
    // Line Chart
    // ----------------------------------
    var lineChartOptions2 = {
      chart: {
        height: 350,
        type: 'line',
        zoom: {
          enabled: false
        }
      },
      colors: themeColors,
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      series: [{
        name: "Desktops",
        data: cData2.data,
      }],
      title: {
        text: 'Nombre de voitures',
        align: 'left'
      },
      grid: {
        row: {
          colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
          opacity: 0.5
        },
      },
      xaxis: {
        categories: cData2.label,
      },
      yaxis: {
        tickAmount: 5,
        opposite: yaxis_opposite
      }
    }
    var lineChart2 = new ApexCharts(
      document.querySelector("#line-chartt2"),
      lineChartOptions2
    );
    lineChart2.render();
    // Scatter chart
    // ------------------------------

    var scatterChart = echarts.init(document.getElementById('scatter-chartt'));

var data = [
    [
        [43604, 77, cData8.data[0]*5500000, cData8.label[0], 'Peugeot'],
        [40163, 77.4, cData8.data[1]*5500000, cData8.label[1], 'Peugeot'],
        [13334, 72, cData8.data[2]*5500000, cData8.label[2], 'Peugeot'],
        [21670, 74.7, cData8.data[3]*5500000, cData8.label[3], 'Peugeot'],
        [36599, 78, cData8.data[4]*5500000, cData8.label[4], 'Peugeot'],
        [26476, 77.1, cData8.data[5]*5500000, cData8.label[5], 'Peugeot'],
        [34476, 75.4, cData8.data[6]*5500000, cData8.label[6], 'Peugeot'],
        [16666, 81.1, cData8.data[7]*5500000, cData8.label[7], 'Peugeot'],
        [5777, 75.7, cData8.data[8]*5500000, cData8.label[8], 'Peugeot'],
        [29550, 79.1, cData8.data[9]*5500000, cData8.label[9], 'Peugeot'],
        [1576, 67.9, cData8.data[10]*5500000, cData8.label[10], 'Peugeot'],
        [10087, 78, cData8.data[11]*5500000, cData8.label[11], 'Peugeot'],
        [24021, 70.4, cData8.data[12]*5500000, cData8.label[12], 'Peugeot'],
    ],
    [
        [44056, 81.8, cData9.data[0]*5500000, cData9.label[0], 'Renault'],
        [40294, 81.7, cData9.data[1]*5500000, cData9.label[1], 'Renault'],
        [13334, 76.9, cData9.data[2]*5500000, cData9.label[2], 'Renault'],
        [21291, 78.5, cData9.data[3]*5500000, cData9.label[3], 'Renault'],
        [36923, 80.8, cData9.data[4]*5500000, cData9.label[4], 'Renault'],
        [26599, 81.9, cData9.data[5]*5500000, cData9.label[5], 'Renault'],
        [34053, 77.1, cData9.data[6]*5500000, cData9.label[6], 'Renault'],
        [16182, 78.8, cData9.data[7]*5500000, cData9.label[7], 'Renault'],
        [5903, 70.8, cData9.data[8]*5500000, cData9.label[8], 'Renault'],
        [30162, 83.5, cData9.data[9]*5500000, cData9.label[9], 'Renault'],
        [1390, 71.4, cData9.data[10]*5500000, cData9.label[10], 'Renault'],
        [10644, 80.7, cData9.data[11]*5500000, cData9.label[11], 'Renault'],
        [24186, 72.6, cData9.data[12]*5500000, cData9.label[12], 'Renault'],
       
    ]
];

var scatterChartoption = {
    legend: {
        right: 10,
        data: ['Peugeot', 'Renault']
    },
    xAxis: {
        splitLine: {
            lineStyle: {
                type: 'dashed'
            }
        }
    },
    yAxis: {
        splitLine: {
            lineStyle: {
                type: 'dashed'
            }
        },
        scale: true
    },
    series: [
        {
            name: 'Peugeot',
            data: data[0],
            type: 'scatter',
            symbolSize: function(data) {
                return Math.sqrt(data[2]) / 5e2;
            },
            label: {
                emphasis: {
                    show: true,
                    formatter: function(param) {
                        return param.data[3];
                    },
                    position: 'top'
                }
            },
            itemStyle: {
                normal: {
                    shadowBlur: 10,
                    shadowColor: 'rgba(120, 36, 50, 0.5)',
                    shadowOffsetY: 5,
                    color: new echarts.graphic.RadialGradient(0.4, 0.3, 1, [
                        {
                            offset: 0,
                            color: 'rgb(251, 118, 123)'
                        },
                        {
                            offset: 1,
                            color: 'rgb(204, 46, 72)'
                        }
                    ])
                }
            }
        },
        {
            name: 'Renault',
            data: data[1],
            type: 'scatter',
            symbolSize: function(data) {
                return Math.sqrt(data[2]) / 5e2;
            },
            label: {
                emphasis: {
                    show: true,
                    formatter: function(param) {
                        return param.data[3];
                    },
                    position: 'top'
                }
            },
            itemStyle: {
                normal: {
                    shadowBlur: 10,
                    shadowColor: 'rgba(25, 100, 150, 0.5)',
                    shadowOffsetY: 5,
                    color: new echarts.graphic.RadialGradient(0.4, 0.3, 1, [
                        {
                            offset: 0,
                            color: 'rgb(129, 227, 238)'
                        },
                        {
                            offset: 1,
                            color: 'rgb(25, 183, 207)'
                        }
                    ])
                }
            }
        }
    ]
};

scatterChart.setOption(scatterChartoption);
window.addEventListener('resize', function() {
    scatterChart.resize();
});

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
            dashArray: [0, 8],
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
            categories: cData4.label,
            axisBorder: {
                show: false
            },
            tickPlacement: 'on'
        },
        yaxis: {
            tickAmount: 5,
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
                name: 'This Month',
                data: cData5.data
            },
            {
                name: 'Last Month',
                data: cData4.data
            }
        ]
    };

    var revenueChart = new ApexCharts(
        document.querySelector('#revenue-chartt'),
        revenueChartoptions
    );

    revenueChart.render();
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

        series: [taux],
        stroke: {
            lineCap: 'round'
        }
    };

    var goalChart = new ApexCharts(
        document.querySelector('#goal-overview-chartt'),
        goalChartoptions
    );

    goalChart.render();

    // Client Retention Chart
    // ----------------------------------
  
    </script>
</body>
<!-- END: Body-->

</html>