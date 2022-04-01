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
                <section id="knowledge-base-search">
                    <div class="row">
                        <div class="col-12">
                            <div class="card knowledge-base-bg white">
                                <div class="card-content">
                                    <div class="card-body p-sm-4 p-2" style="background:
                                    #957ddb
                                    ">
                                        <h1 class="white">Dedicated Source Used on Website</h1>
                                        <p class="card-text mb-2">
                                            Bonbon sesame snaps lemon drops marshmallow ice cream carrot cake croissant
                                            wafer.
                                        </p>
                                        <form method="post" action="{{ route('compare.store') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for=""
                                                        style="color:#ffffff;font-weight:bold;margin-bottom:10px;">Vehicule
                                                        1</label>
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="basicSelect" name="vehicule1">
                                                            <option value="" disabled selected> Choisis une Marque
                                                            </option>
                                                            @foreach ($marques as $marque)
                                                            <option value="{{ $marque->id_car_make }}">
                                                                {{ $marque->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <label for="" class="text-left"
                                                            style="color:#ffffff;font-weight:bold;margin-bottom:10px;">Vehicule
                                                            2</label>
                                                        <select class="form-control" id="basicSelect" name="vehicule2">
                                                            <option value="" disabled selected> Choisis un Marque
                                                            </option>
                                                            @foreach ($marques as $marque)
                                                            <option value="{{ $marque->id_car_make }}">
                                                                {{ $marque->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="basicSelect" name="model1">
                                                            <option value="" disabled selected> Choisis un Modéle
                                                            </option>

                                                        </select>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset class="form-group">
                                                        <select class="form-control" id="basicSelect" name="model2">
                                                            <option value="" disabled selected> Choisis un Modéle
                                                            </option>

                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit"
                                                        class="btn mb-1 btn-primary btn-block">Comparer le deux
                                                        véhicules</button></div>
                                            </div>

                                        </form>
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
        $(document).ready(function() {
                    $('select[name="vehicule1"]').on('change', function() {
                        var BrandId = $(this).val();
                        if (BrandId) {
                            $.ajax({
                                url: "{{ URL::to('model_2') }}/" + BrandId,
                                type: "GET",
                                dataType: "json",
                                success: function(data) {
                                    $('select[name="model1"]').empty();
                                    $.each(data, function(key, value) {
                                        $('select[name="model1"]').append('<option value="' +
                                            value + '">' + value + '</option>');
                                    });
                                },
                            });
                        } else {
                            console.log('AJAX load did not work');
                        }
                    });
                });
    </script>
    <script>
        $(document).ready(function() {
                        $('select[name="vehicule2"]').on('change', function() {
                            var BrandId = $(this).val();
                            if (BrandId) {
                                $.ajax({
                                    url: "{{ URL::to('model_2') }}/" + BrandId,
                                    type: "GET",
                                    dataType: "json",
                                    success: function(data) {
                                        $('select[name="model2"]').empty();
                                        $.each(data, function(key, value) {
                                            $('select[name="model2"]').append('<option value="' +
                                                value + '">' + value + '</option>');
                                        });
                                    },
                                });
                            } else {
                                console.log('AJAX load did not work');
                            }
                        });
                    });
    </script>

</body>
<!-- END: Body-->

</html>