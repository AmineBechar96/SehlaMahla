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
          <!-- Bar Chart -->
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Nombre de chevaux des voitures les plus vendus en Algérie
                  </h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="mixed-chartt"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Les meilleurs couleurs vendus en Algérie</h4>
                </div>
                <div class="card-content">
                  <div class="card-body pl-0">
                    <div class="height-300">
                      <canvas id="horizontal-barr"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="divider divider-light">
            <div class="divider-text"></div>
          </div>
          <div class="row mt-5">
            <!-- Pie Chart -->
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Energie des voitures les plus Actifs</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="pie-chartt" class="mx-auto"></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Donut Chart -->
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Type de voitures</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="donut-chartt2" class="mx-auto"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="divider divider-light">
            <div class="divider-text"></div>
          </div>
          <div class="row mt-5">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Taille du moteur (Litre)</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="bar-chartt7"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Type de moteur</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="bar-chartt8"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="divider divider-light">
        <div class="divider-text"></div>
      </div>

      <div class="row mt-5">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Les années des voitures les plus vendus</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div id="mixed-chartt2"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </section>





    </div>
  </div>
  </div>
  <!-- END: Content-->
  @include('layouts.footer')
  @include('layouts.footer-scripts')
  <script>
    var $primary = '#1ca7ec';
var $success = '#2ee8b3';
var $danger = '#f73e41';
var $warning = '#FF9F43';
var $label_color = '#1E1E1E';
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
    var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
    var cData2 = JSON.parse(`<?php echo $data2['chart_data2']; ?>`);
    var cData3 = JSON.parse(`<?php echo $data3['chart_data3']; ?>`);
    var cData4= JSON.parse(`<?php echo $data4['chart_data4']; ?>`);
    var cData5= JSON.parse(`<?php echo $data5['chart_data5']; ?>`);
    var cData6= JSON.parse(`<?php echo $data6['chart_data6']; ?>`);
    var cData7= JSON.parse(`<?php echo $data7['chart_data7']; ?>`);




// Mixed Chart
    // -----------------------------
    var mixedChartOptions = {
      chart: {
        height: 350,
        type: 'line',
        stacked: false,
      },
      colors: themeColors,
      stroke: {
        width: [0, 2, 5],
        curve: 'smooth'
      },
      plotOptions: {
        bar: {
          columnWidth: '50%'
        }
      },
      // colors: ['#3A5794', '#A5C351', '#E14A84'],
      series: [{
        name: 'Nombre de Chevaux',
        type: 'column',
        data:cData.data
      }],
      fill: {
        opacity: [0.85, 0.25, 1],
        gradient: {
          inverseColors: false,
          shade: 'light',
          type: "vertical",
          opacityFrom: 0.85,
          opacityTo: 0.55,
          stops: [0, 100, 100, 100]
        }
      },
      labels: cData.label,
      markers: {
        size: 0
      },
      legend: {
        offsetY: -10
      },
      xaxis: {
        type: 'text',
        title: {
          text: 'Nombre de Chevaux'
        },
      },
      yaxis: {
        min: 0,
        tickAmount: 5,
        title: {
          text: 'Nombre de Voitures'
        },
        opposite: yaxis_opposite
      },
      tooltip: {
        shared: true,
        intersect: false,
        y: {
          formatter: function (y) {
            if (typeof y !== "undefined") {
              return y.toFixed(0) + " views";
            }
            return y;
  
          }
        }
      }
    }
    var mixedChart = new ApexCharts(
      document.querySelector("#mixed-chartt"),
      mixedChartOptions
    );
    mixedChart.render();
// horizontal bar
// Get the context of the Chart canvas element we want to select
var horizontalChartctx = $("#horizontal-barr");
  
  var horizontalchartOptions = {
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each horizontal bar to be 2px wide
    elements: {
      rectangle: {
        borderWidth: 2,
        borderSkipped: 'right',
        borderSkipped: 'top',
      }
    },
    responsive: true,
    maintainAspectRatio: false,
    responsiveAnimationDuration: 500,
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }],
      yAxes: [{
        display: true,
        gridLines: {
          color: grid_line_color,
        },
        scaleLabel: {
          display: true,
        }
      }]
    },
    title: {
      display: true,
      text: 'Les couleurs les plus vendus en Algérie'
    }
  };

  // Chart Data
  var horizontalchartData = {
    labels: cData2.label,
    datasets: [{
      label: "Nombre Voitures",
      data: cData2.data,
      backgroundColor: themeColors,
      borderColor: "transparent"
    }]
  };

  var horizontalChartconfig = {
    type: 'horizontalBar',

    // Chart Options
    options: horizontalchartOptions,

    data: horizontalchartData
  };

  // Create the chart
  var horizontalChart = new Chart(horizontalChartctx, horizontalChartconfig);

 // Pie Chart
    // -----------------------------
    var pieChartOptions = {
      chart: {
        type: 'pie',
        height: 350
      },
      colors: themeColors,
      labels: cData3.label,
      series: cData3.data,
      legend: {
        itemMargin: {
          horizontal: 2
        },
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 350
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
    }
    var pieChart = new ApexCharts(
      document.querySelector("#pie-chartt"),
      pieChartOptions
    );
    pieChart.render();
  
   // Donut Chart
    // -----------------------------
    var donutChartOptions2 = {
      chart: {
        type: 'donut',
        height: 350
      },
      colors: themeColors,
      labels: cData4.label,
      series: cData4.data,
      legend: {
        itemMargin: {
          horizontal: 2
        },
      },
      responsive: [{
        breakpoint: 480,
        options: {
          chart: {
            width: 350
          },
          legend: {
            position: 'bottom'
          }
        }
      }]
    }
    var donutChart2 = new ApexCharts(
      document.querySelector("#donut-chartt2"),
      donutChartOptions2
    );
  
    donutChart2.render();

 var barChartOptions3 = {
      chart: {
        height: 350,
        type: 'bar',
      },
      colors: themeColors,
      plotOptions: {
        bar: {
          horizontal: true,
        }
      },
      dataLabels: {
        enabled: false
      },
      series: [{name: 'pct de Nombre de Voitures (%)',
        data: cData5.data
      }],
      xaxis: {
        categories:cData5.label,      
        tickAmount: 5
      },
      yaxis: {
        opposite: yaxis_opposite
      }
    }
    var barChart3 = new ApexCharts(
      document.querySelector("#bar-chartt7"),
      barChartOptions3
    );
    barChart3.render();








var barChartOptions4 = {
      chart: {
        height: 350,
        type: 'bar',
      },
      colors: themeColors,
      plotOptions: {
        bar: {
          horizontal: true,
        }
      },
      dataLabels: {
        enabled: false
      },
      series: [{name: 'pct de Nombre de Voitures (%)',
        data: cData6.data
      }],
      xaxis: {
        categories:cData6.label,      
        tickAmount: 5
      },
      yaxis: {
        opposite: yaxis_opposite
      }
    }





     var barChart4 = new ApexCharts(
      document.querySelector("#bar-chartt8"),
      barChartOptions4
    );
    barChart4.render();
    // Mixed Chart
    // -----------------------------
    var mixedChartOptions2 = {
      chart: {
        height: 350,
        type: 'line',
        stacked: false,
      },
      colors: themeColors2,
      stroke: {
        width: [0, 2, 5],
        curve: 'smooth'
      },
      plotOptions: {
        bar: {
          columnWidth: '50%'
        }
      },
      // colors: [ '#A5C351', '#E14A84'],
      series: [{
        name: 'Nombre de Voitures',
        type: 'area',
        data:cData7.data
      }],
      fill: {
        opacity: [0.85, 0.25, 1],
        gradient: {
          inverseColors: false,
          shade: 'light',
          type: "vertical",
          opacityFrom: 0.85,
          opacityTo: 0.55,
          stops: [0, 100, 100, 100]
        }
      },
      labels:cData7.label,
      markers: {
        size: 0
      },
      legend: {
        offsetY: -10
      },
      xaxis: {
        type: 'datetime',
        title: {
          text: 'Année de production'
        },
      },
      yaxis: {
        min: 0,
        tickAmount: 5,
        title: {
          text: 'Nombre de Voitures'
        },
        opposite: yaxis_opposite
      },
      tooltip: {
        shared: true,
        intersect: false,
        y: {
          formatter: function (y) {
            if (typeof y !== "undefined") {
              return y.toFixed(0) + " %";
            }
            return y;
  
          }
        }
      }
    }
    var mixedChart2 = new ApexCharts(
      document.querySelector("#mixed-chartt2"),
      mixedChartOptions2
    );
    mixedChart2.render();
console.log(cData7.label);
  </script>





</body>
<!-- END: Body-->

</html>