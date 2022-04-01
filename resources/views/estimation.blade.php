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
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-primary p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-arrow-down text-primary font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">{{round($prix)-10}}</h2>
                                <p class="mb-0">Prix Minimum</p>
                            </div>
                            <div class="card-content">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-dollar-sign text-success font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">{{round($prix)}}</h2>
                                <p class="mb-0">Bonne Affaire</p>
                            </div>
                            <div class="card-content">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-arrow-up text-danger font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">{{round($prix)+20}}</h2>
                                <p class="mb-0">Prix Maximum</p>
                            </div>
                            <div class="card-content">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex flex-column align-items-start pb-0">
                                <div class="avatar bg-rgba-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i class="feather icon-target text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700 mt-1">84 %</h2>
                                <p class="mb-0">Précision</p>
                            </div>
                            <div class="card-content">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-end">
                                <h4>Sessions By Device</h4>
                                <div class="dropdown chart-dropdown">
                                    <button class="btn btn-sm border-0 dropdown-toggle px-0" type="button"
                                        id="dropdownItem1" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Last 7 Days
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem1">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <div id="session-chart" class="mb-1"> </div>
                                    @foreach ($models as $model)
                                    <div class="chart-info d-flex justify-content-between mb-1">
                                        <div class="series-info d-flex align-items-center">
                                            <i class="feather icon-truck font-medium-2 text-primary"></i>
                                            <span class="text-bold-600 mx-50">{{$model->model}}</span>

                                            <span>
                                                @php
                                                echo "- ".number_format((float)$model->total * 100 / $counttotal, 1,
                                                '.', '')."%";
                                                @endphp
                                            </span>
                                        </div>
                                        <div class="series-result">
                                            <span>2%</span>
                                            <i class="feather icon-arrow-up text-success"></i>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="chart-info d-flex justify-content-between mb-1">
                                        <div class="series-info d-flex align-items-center">
                                            <i class="feather icon-tablet font-medium-2 text-warning"></i>
                                            <span class="text-bold-600 mx-50">Mobile</span>
                                            <span> - 34.9%</span>
                                        </div>
                                        <div class="series-result">
                                            <span>8%</span>
                                            <i class="feather icon-arrow-up text-success"></i>
                                        </div>
                                    </div>
                                    <div class="chart-info d-flex justify-content-between mb-50">
                                        <div class="series-info d-flex align-items-center">
                                            <i class="feather icon-tablet font-medium-2 text-danger"></i>
                                            <span class="text-bold-600 mx-50">Tablet</span>
                                            <span> - 6.5%</span>
                                        </div>
                                        <div class="series-result">
                                            <span>-5%</span>
                                            <i class="feather icon-arrow-down text-danger"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Activity Timeline</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <ul class="activity-timeline timeline-left list-unstyled">

                                        @php
                                        $counteur=0;
                                        @endphp
                                        @foreach ($brandss as $brand)
                                        @php
                                        $counteur=$counteur+1;
                                        @endphp
                                        <li>
                                            <div class="timeline-icon bg-primary">
                                                <i class="feather icon-plus font-medium-2 align-middle"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <div class="timeline-icon bg-primary">
                                                    <i class="feather icon-plus font-medium-2 align-middle"></i>
                                                </div>
                                                <div class="timeline-info">
                                                    <p class="font-weight-bold mb-0">Les Plus vendus: {{$modell}}
                                                        {{$brand->brand}}
                                                    </p>
                                                    <span class="font-small-3">Le {{$modell}} {{$brand->brand}} a été
                                                        vendus plus du
                                                        {{$brand->total}} fois cette
                                                        année
                                                    </span>
                                                </div>
                                                <small class="text-muted"> {{$counteur}}</small>
                                        </li>






                                        @endforeach



                                        <li>
                                            <div class="timeline-icon bg-warning">
                                                <i class="feather icon-alert-circle font-medium-2 align-middle"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold mb-0">Email Newsletter</p>
                                                <span class="font-small-3">Cupcake gummi bears soufflé caramels
                                                    candy</span>
                                            </div>
                                            <small class="text-muted">15 days ago</small>
                                        </li>
                                        <li>
                                            <div class="timeline-icon bg-danger">
                                                <i class="feather icon-check font-medium-2 align-middle"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold mb-0">Plan Webinar</p>
                                                <span class="font-small-3">Candy ice cream cake. Halvah gummi
                                                    bears</span>
                                            </div>
                                            <small class="text-muted">20 days ago</small>
                                        </li>
                                        <li>
                                            <div class="timeline-icon bg-success">
                                                <i class="feather icon-check font-medium-2 align-middle"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold mb-0">Launch Website</p>
                                                <span class="font-small-3">Candy ice cream cake. </span>
                                            </div>
                                            <small class="text-muted">25 days ago</small>
                                        </li>
                                        <li>
                                            <div class="timeline-icon bg-primary">
                                                <i class="feather icon-check font-medium-2 align-middle"></i>
                                            </div>
                                            <div class="timeline-info">
                                                <p class="font-weight-bold mb-0">Marketing</p>
                                                <span class="font-small-3">Candy ice cream. Halvah bears Cupcake gummi
                                                    bears.</span>
                                            </div>
                                            <small class="text-muted">28 days ago</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    @include('layouts.footer')

    @include('layouts.footer-scripts')
</body>
<!-- END: Body-->

</html>