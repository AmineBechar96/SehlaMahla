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


    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                                        href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                        href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        Change Password
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill"
                                        href="#account-vertical-info" aria-expanded="false">
                                        <i class="feather icon-info mr-50 font-medium-3"></i>
                                        Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill"
                                        href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-camera mr-50 font-medium-3"></i>
                                        Social links
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-connections" data-toggle="pill"
                                        href="#account-vertical-connections" aria-expanded="false">
                                        <i class="feather icon-feather mr-50 font-medium-3"></i>
                                        Connections
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill"
                                        href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                        Notifications
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Table head options</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Similar to tables and dark tables, use the
                                                                        modifier classes <code
                                                                            class="highlighter-rouge">.thead-light</code>
                                                                        or <code
                                                                            class="highlighter-rouge">.thead-dark</code>
                                                                        to make <code
                                                                            class="highlighter-rouge">&lt;thead&gt;</code>s
                                                                        appear light or dark gray.</p>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead style="background:blue;">
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Email</th>
                                                                                <th scope="col">User ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Leanne Graham</td>
                                                                                <td>sincere@april.biz</td>
                                                                                <td>@mdo</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Ervin Howell</td>
                                                                                <td>shanna@melissa.tv</td>
                                                                                <td>@fat</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Clementine Bauch</td>
                                                                                <td>nathan@yesenia.net</td>
                                                                                <td>@twitter</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                                aria-labelledby="account-pill-password" aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Table head options</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Similar to tables and dark tables, use the
                                                                        modifier classes <code
                                                                            class="highlighter-rouge">.thead-light</code>
                                                                        or <code
                                                                            class="highlighter-rouge">.thead-dark</code>
                                                                        to make <code
                                                                            class="highlighter-rouge">&lt;thead&gt;</code>s
                                                                        appear light or dark gray.</p>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Email</th>
                                                                                <th scope="col">User ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Leanne Graham</td>
                                                                                <td>sincere@april.biz</td>
                                                                                <td>@mdo</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Ervin Howell</td>
                                                                                <td>shanna@melissa.tv</td>
                                                                                <td>@fat</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Clementine Bauch</td>
                                                                                <td>nathan@yesenia.net</td>
                                                                                <td>@twitter</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                                aria-labelledby="account-pill-info" aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Table head options</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Similar to tables and dark tables, use the
                                                                        modifier classes <code
                                                                            class="highlighter-rouge">.thead-light</code>
                                                                        or <code
                                                                            class="highlighter-rouge">.thead-dark</code>
                                                                        to make <code
                                                                            class="highlighter-rouge">&lt;thead&gt;</code>s
                                                                        appear light or dark gray.</p>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Email</th>
                                                                                <th scope="col">User ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Leanne Graham</td>
                                                                                <td>sincere@april.biz</td>
                                                                                <td>@mdo</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Ervin Howell</td>
                                                                                <td>shanna@melissa.tv</td>
                                                                                <td>@fat</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Clementine Bauch</td>
                                                                                <td>nathan@yesenia.net</td>
                                                                                <td>@twitter</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                                                aria-labelledby="account-pill-social" aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Table head options</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Similar to tables and dark tables, use the
                                                                        modifier classes <code
                                                                            class="highlighter-rouge">.thead-light</code>
                                                                        or <code
                                                                            class="highlighter-rouge">.thead-dark</code>
                                                                        to make <code
                                                                            class="highlighter-rouge">&lt;thead&gt;</code>s
                                                                        appear light or dark gray.</p>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Email</th>
                                                                                <th scope="col">User ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Leanne Graham</td>
                                                                                <td>sincere@april.biz</td>
                                                                                <td>@mdo</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Ervin Howell</td>
                                                                                <td>shanna@melissa.tv</td>
                                                                                <td>@fat</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Clementine Bauch</td>
                                                                                <td>nathan@yesenia.net</td>
                                                                                <td>@twitter</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
                                                aria-labelledby="account-pill-connections" aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Table head options</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Similar to tables and dark tables, use the
                                                                        modifier classes <code
                                                                            class="highlighter-rouge">.thead-light</code>
                                                                        or <code
                                                                            class="highlighter-rouge">.thead-dark</code>
                                                                        to make <code
                                                                            class="highlighter-rouge">&lt;thead&gt;</code>s
                                                                        appear light or dark gray.</p>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Email</th>
                                                                                <th scope="col">User ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Leanne Graham</td>
                                                                                <td>sincere@april.biz</td>
                                                                                <td>@mdo</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Ervin Howell</td>
                                                                                <td>shanna@melissa.tv</td>
                                                                                <td>@fat</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Clementine Bauch</td>
                                                                                <td>nathan@yesenia.net</td>
                                                                                <td>@twitter</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-notifications"
                                                role="tabpanel" aria-labelledby="account-pill-notifications"
                                                aria-expanded="false">
                                                <div class="row" id="table-head">
                                                    <div class="col-12">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">Table head options</h4>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                    <p>Similar to tables and dark tables, use the
                                                                        modifier classes <code
                                                                            class="highlighter-rouge">.thead-light</code>
                                                                        or <code
                                                                            class="highlighter-rouge">.thead-dark</code>
                                                                        to make <code
                                                                            class="highlighter-rouge">&lt;thead&gt;</code>s
                                                                        appear light or dark gray.</p>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table mb-0">
                                                                        <thead class="thead-dark">
                                                                            <tr>
                                                                                <th scope="col">ID</th>
                                                                                <th scope="col">Name</th>
                                                                                <th scope="col">Email</th>
                                                                                <th scope="col">User ID</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">1</th>
                                                                                <td>Leanne Graham</td>
                                                                                <td>sincere@april.biz</td>
                                                                                <td>@mdo</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">2</th>
                                                                                <td>Ervin Howell</td>
                                                                                <td>shanna@melissa.tv</td>
                                                                                <td>@fat</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">3</th>
                                                                                <td>Clementine Bauch</td>
                                                                                <td>nathan@yesenia.net</td>
                                                                                <td>@twitter</td>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page end -->

            </div>
        </div>
    </div>
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row pb-50">
                                        <div
                                            class="col-lg-6 col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                                            <div>
                                                <h2 class="text-bold-700 mb-25">2.7K</h2>
                                                <p class="text-bold-500 mb-75">Avg Sessions</p>
                                                <h5 class="font-medium-2">
                                                    <span class="text-success">+5.2% </span>
                                                    <span>vs last 7 days</span>
                                                </h5>
                                            </div>
                                            <a href="#" class="btn btn-primary shadow">View Details <i
                                                    class="feather icon-chevrons-right"></i></a>
                                        </div>
                                        <div
                                            class="col-lg-6 col-12 d-flex justify-content-between flex-column text-right order-lg-2 order-1">
                                            <div class="dropdown chart-dropdown">
                                                <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button"
                                                    id="dropdownItem5" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Last 7 Days
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdownItem5">
                                                    <a class="dropdown-item" href="#">Last 28 Days</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">Last Year</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row avg-sessions pt-50">
                                        <div class="col-6">
                                            <p class="mb-0">Goal: $100000</p>
                                            <div class="progress progress-bar-primary mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                    aria-valuemin="50" aria-valuemax="100" style="width:50%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Users: 100K</p>
                                            <div class="progress progress-bar-warning mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                    aria-valuemin="60" aria-valuemax="100" style="width:60%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Retention: 90%</p>
                                            <div class="progress progress-bar-danger mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="70" aria-valuemax="100" style="width:70%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Duration: 1yr</p>
                                            <div class="progress progress-bar-success mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90"
                                                    aria-valuemin="90" aria-valuemax="100" style="width:90%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Retention: 90%</p>
                                            <div class="progress progress-bar-danger mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="30"
                                                    aria-valuemin="30" aria-valuemax="100" style="width:30%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Duration: 1yr</p>
                                            <div class="progress progress-bar-success mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                    aria-valuemin="60" aria-valuemax="100" style="width:60%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row pb-50">
                                        <div
                                            class="col-lg-6 col-12 d-flex justify-content-between flex-column order-lg-1 order-2 mt-lg-0 mt-2">
                                            <div>
                                                <h2 class="text-bold-700 mb-25">2.7K</h2>
                                                <p class="text-bold-500 mb-75">Avg Sessions</p>
                                                <h5 class="font-medium-2">
                                                    <span class="text-success">+5.2% </span>
                                                    <span>vs last 7 days</span>
                                                </h5>
                                            </div>
                                            <a href="#" class="btn btn-primary shadow">View Details <i
                                                    class="feather icon-chevrons-right"></i></a>
                                        </div>
                                        <div
                                            class="col-lg-6 col-12 d-flex justify-content-between flex-column text-right order-lg-2 order-1">
                                            <div class="dropdown chart-dropdown">
                                                <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button"
                                                    id="dropdownItem5" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Last 7 Days
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="dropdownItem5">
                                                    <a class="dropdown-item" href="#">Last 28 Days</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">Last Year</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row avg-sessions pt-50">
                                        <div class="col-6">
                                            <p class="mb-0">Goal: $100000</p>
                                            <div class="progress progress-bar-primary mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="50"
                                                    aria-valuemin="50" aria-valuemax="100" style="width:50%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Users: 100K</p>
                                            <div class="progress progress-bar-warning mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                    aria-valuemin="60" aria-valuemax="100" style="width:60%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Retention: 90%</p>
                                            <div class="progress progress-bar-danger mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                    aria-valuemin="70" aria-valuemax="100" style="width:70%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Duration: 1yr</p>
                                            <div class="progress progress-bar-success mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="90"
                                                    aria-valuemin="90" aria-valuemax="100" style="width:90%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Retention: 59%</p>
                                            <div class="progress progress-bar-danger mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="59"
                                                    aria-valuemin="59" aria-valuemax="100" style="width:59%"></div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-0">Duration: 1yr</p>
                                            <div class="progress progress-bar-success mt-25">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="32"
                                                    aria-valuemin="32" aria-valuemax="100" style="width:32%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <h4>Product Orders</h4>
                                <div class="dropdown chart-dropdown">
                                    <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button"
                                        id="dropdownItem2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Last 7 Days
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem2">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="chart-info d-flex justify-content-between mb-1">
                                        <div class="series-info d-flex align-items-center">
                                            <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                            <span class="text-bold-600 ml-50">Finished</span>
                                        </div>
                                        <div class="product-result">
                                            <span>23043</span>
                                        </div>
                                    </div>
                                    <div class="chart-info d-flex justify-content-between mb-1">
                                        <div class="series-info d-flex align-items-center">
                                            <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                            <span class="text-bold-600 ml-50">Pending</span>
                                        </div>
                                        <div class="product-result">
                                            <span>14658</span>
                                        </div>
                                    </div>
                                    <div class="chart-info d-flex justify-content-between mb-75">
                                        <div class="series-info d-flex align-items-center">
                                            <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                            <span class="text-bold-600 ml-50">Rejected</span>
                                        </div>
                                        <div class="product-result">
                                            <span>4758</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between pb-0">
                                <h4>Product Orders</h4>
                                <div class="dropdown chart-dropdown">
                                    <button class="btn btn-sm border-0 dropdown-toggle p-0" type="button"
                                        id="dropdownItem2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Last 7 Days
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem2">
                                        <a class="dropdown-item" href="#">Last 28 Days</a>
                                        <a class="dropdown-item" href="#">Last Month</a>
                                        <a class="dropdown-item" href="#">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="chart-info d-flex justify-content-between mb-1">
                                        <div class="series-info d-flex align-items-center">
                                            <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                            <span class="text-bold-600 ml-50">Finished</span>
                                        </div>
                                        <div class="product-result">
                                            <span>23043</span>
                                        </div>
                                    </div>
                                    <div class="chart-info d-flex justify-content-between mb-1">
                                        <div class="series-info d-flex align-items-center">
                                            <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                            <span class="text-bold-600 ml-50">Pending</span>
                                        </div>
                                        <div class="product-result">
                                            <span>14658</span>
                                        </div>
                                    </div>
                                    <div class="chart-info d-flex justify-content-between mb-75">
                                        <div class="series-info d-flex align-items-center">
                                            <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                            <span class="text-bold-600 ml-50">Rejected</span>
                                        </div>
                                        <div class="product-result">
                                            <span>4758</span>
                                        </div>
                                    </div>
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