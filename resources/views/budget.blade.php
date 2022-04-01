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
                <div class="content-header-left col-md-9 col-12 mb-2">

                </div>

            </div>
            <div class="content-body">
                <!-- Horizontal Sliders -->
                <!-- Slider With Input Starts-->
                <section id="slider-input">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Veuillez Entrer Votre Budget</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{ route('budget.store') }}" method="post">
                                            @csrf
                                            <fieldset>

                                                <div class="my-1" id="slider-with-input"></div>
                                                <div class="row">

                                                    <div class="col-xl-1 col-lg-2 col-md-3 col-12">
                                                        <input class="form-control d-inline-block mt-2" type="number"
                                                            min="0" max="999" step="1" name="minprice"
                                                            id="slider-input-number">
                                                    </div>
                                                    <div class="col-xl-1 col-lg-2 col-md-3 col-12">
                                                        <input class="form-control d-inline-block mt-2" type="number"
                                                            min="0" max="999" step="1" name="maxprice"
                                                            id="slider-input-number2">
                                                    </div>
                                                </div>
                                                <h4 class="card-title mt-5">Veuillez Entrer Votre Année</h4>
                                                <div class="my-1 mt-3" id="slider-with-input-annee"></div>

                                                <div class="row">

                                                    <div class="col-xl-1 col-lg-2 col-md-3 col-12">
                                                        <input class="form-control d-inline-block mt-2" type="number"
                                                            min="1980" max="2021" step="1" name="minyear"
                                                            id="slider-input-annee">
                                                    </div>
                                                    <div class="col-xl-1 col-lg-2 col-md-3 col-12">
                                                        <input class="form-control d-inline-block mt-2" type="number"
                                                            min="1980" max="2021" step="1" name="maxyear"
                                                            id="slider-input-annee2">
                                                    </div>
                                                </div>

                                                <div class="row mt-3 justify-content-end">

                                                    <div class="col ">
                                                        <input class="btn btn-primary mb-1" type="submit"
                                                            value="Rechercher">
                                                        <a class="btn bg-gradient-warning  mb-1" href="index.html"
                                                            role="button">Retour</a>
                                                    </div>

                                                </div>
                                    </div>
                                    </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            <!-- Slider With Input Ends-->
        </div>
    </div>
    </div>
    <!-- END: Content-->
    @include('layouts.footer')
    @include('layouts.footer-scripts')
</body>
<!-- END: Body-->

</html>