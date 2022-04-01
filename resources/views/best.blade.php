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
        <div class="row">
          <div class="col-12">
            <p>You can easily create reuseable chart components. Read full documnetation <a
                href="https://www.chartjs.org/docs/latest/getting-started/" target="_blank">here</a></p>
          </div>
        </div>
        <!-- line chart section start -->
        <section id="chartjs-charts">
          <!-- Bar Chart -->
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Les marques les plus populaires en Algerie</h4>
                </div>
                <div class="card-content">
                  <div class="card-body pl-0">
                    <div class="height-400">
                      <canvas id="bar-chartt"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Les marques les plus chers en Algerie</h4>
                </div>
                <div class="card-content">
                  <div class="card-body pl-0">
                    <div class="height-400">
                      <canvas id="bar-chartt2"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </section>
        <div class="divider divider-light">
          <div class="divider-text"></div>
        </div>
        <section id="apexchart" class="mt-5">
          <div class="row">
            <!-- Bar Chart -->
            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Les modèles les plus populaires en Algerie</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="bar-chartt5"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Les modèles les plus chers en Algerie</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="bar-chartt6"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <div class="divider divider-light">
          <div class="divider-text"></div>
        </div>

        <div class="row mt-5" id="basic-table">
          <div class="col-12">
            <div class="card">
              <div class="card-header ">
                <h4 class="card-title ">Les Meilleurs voitures pour chaque marque en Algérie
                </h4>
              </div>
              <div class="card-content">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>{{$datatable['models'][0]}}</th>
                          <th>{{$datatable['models'][1]}}</th>
                          <th>{{$datatable['models'][2]}}</th>
                          <th>{{$datatable['models'][3]}}</th>
                          <th>{{$datatable['models'][4]}}</th>
                          <th>{{$datatable['models'][5]}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                                                $i=0;
                                                for ($i=0; $i < 6; $i++) { 
                                                  # code...
                                                
                                                ?>
                        <tr>
                          <td>{{$mod1['brand'][$i]." ".$mod1['note'][$i] }}</td>
                          <td>{{$mod2['brand'][$i]." ".$mod2['note'][$i] }}</td>
                          <td>{{$mod3['brand'][$i]." ".$mod3['note'][$i] }}</td>
                          <td>{{$mod4['brand'][$i]." ".$mod4['note'][$i] }}</td>
                          <td>{{$mod5['brand'][$i]." ".$mod5['note'][$i] }}</td>
                          <td>{{$mod6['brand'][$i]." ".$mod6['note'][$i] }}</td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="divider divider-light">
          <div class="divider-text"></div>
        </div>
        <section id="apexchart" class="mt-5">
          <div class="row">
            <div class="col-lg-2 col-md-12"></div>
            <div class="col-lg-8 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Les wilayas les plus Actifs dans le marché</h4>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="donut-chartt" class="mx-auto"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
    <!-- END: Content-->

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
var $white = '#fff';
var $black = '#000';
var yaxis_opposite = false;
var themeColors = [$primary, $success, $danger, $warning, $label_color];
    var cData = JSON.parse(`<?php echo $data['chart_data']; ?>`);
    var cData2 = JSON.parse(`<?php echo $data2['chart_data2']; ?>`);
    var cData3 = JSON.parse(`<?php echo $data3['chart_data3']; ?>`);
    var cData4= JSON.parse(`<?php echo $data4['chart_data4']; ?>`);
    var cData5= JSON.parse(`<?php echo $data5['chart_data5']; ?>`);
 //Get the context of the Chart canvas element we want to select
 var barChartctx = $("#bar-chartt");
var barChartctx2 = $("#bar-chartt2");

// Chart Options
var barchartOptions = {
  // Elements options apply to all of the options unless overridden in a dataset
  // In this case, we are setting the border of each bar to be 2px wide
  elements: {
    rectangle: {
      borderWidth: 2,
      borderSkipped: 'left'
    }
  },
  responsive: true,
  maintainAspectRatio: false,
  responsiveAnimationDuration: 500,
  legend: { display: false },
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
      },
      ticks: {
        stepSize: 3
      },
    }],
  },
  title: {
    display: true,
    text: 'Les Marques les plus vendus en Algérie'
  },

};



var barchartOptions2 = {
  // Elements options apply to all of the options unless overridden in a dataset
  // In this case, we are setting the border of each bar to be 2px wide
  elements: {
    rectangle: {
      borderWidth: 2,
      borderSkipped: 'left'
    }
  },
  responsive: true,
  maintainAspectRatio: false,
  responsiveAnimationDuration: 500,
  legend: { display: false },
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
      },
      ticks: {
        stepSize: 50
      },
    }],
  },
  title: {
    display: true,
    text: 'Les Marques les plus chers en Algérie'
  },

};

// Chart Data
var barchartData = {
  labels: cData.label,
  datasets: [{
    label: "Pourcentage (%)",
    data: cData.data,
    backgroundColor: themeColors,
    borderColor: "transparent"
  }]
};



var barchartData2 = {
  labels: cData2.label,
  datasets: [{
    label: "Prix Moyens (millions)",
    data: cData2.data,
    backgroundColor: themeColors,
    borderColor: "transparent"
  }]
};


var barChartconfig = {
  type: 'bar',

  // Chart Options
  options: barchartOptions,

  data: barchartData
};

var barChartconfig2 = {
  type: 'bar',

  // Chart Options
  options: barchartOptions2,

  data: barchartData2
};

// Create the chart
var barChart = new Chart(barChartctx, barChartconfig);
var barChart2 = new Chart(barChartctx2, barChartconfig2);
// Bar Chart
// ----------------------------------
var barChartOptions = {
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
  series: [{name: 'Pourcentage(%)',
    data: cData3.data
  }],
  xaxis: {
    categories: cData3.label,
    tickAmount: 5
  },
  yaxis: {
    opposite: yaxis_opposite
  }
}


var barChartOptions2 = {
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
  series: [{name: 'Prix Moyen (millions DZD)',
    data: cData4.data
  }],
  xaxis: {
    categories:cData4.label,      
    tickAmount: 5
  },
  yaxis: {
    opposite: yaxis_opposite
  }
}


var barChart = new ApexCharts(
  document.querySelector("#bar-chartt5"),
  barChartOptions
);
barChart.render();

var barChart2 = new ApexCharts(
  document.querySelector("#bar-chartt6"),
  barChartOptions2
);
barChart2.render();

// Donut Chart
// -----------------------------
var donutChartOptions = {
  chart: {
    type: 'donut',
    height: 350
  },
  colors: themeColors,
  labels: cData5.label,
  series: cData5.data,
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
var donutChart = new ApexCharts(
  document.querySelector("#donut-chartt"),
  donutChartOptions
);

donutChart.render();

  </script>
</body>
<!-- END: Body-->

</html>