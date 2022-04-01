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

                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form" style="background:url('../../../app-assets/images/cars2.jpg');background-repeat: no-repeat;
                background-size: cover;">
                    <div class="row match-height" style="padding-top:25px;">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center">Recherche Avanceé</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">

                                        @if ($errors->any())

                                        @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger mt-1 alert-dismissible alert-validation-msg"
                                            role="alert">
                                            <i class="feather icon-info mr-1 align-middle"></i>
                                            <strong>{{$error}}</strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endforeach


                                        @endif
                                        <form class="form" method="post" action="{{ route('advanced.store') }}">
                                            @csrf
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <label for="first-name-icon">Marque</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect" name="brands">
                                                                <option value="" disabled selected>Marque
                                                                </option>
                                                                @foreach ($marques as $marque)
                                                                <option value="{{ $marque->model }}">
                                                                    {{ $marque->model }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <label for="first-name-icon">Matricule</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect"
                                                                name="matricule">
                                                                <option value="2021">2021</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2016">2016</option>

                                                                <option value="2015">2015</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                                <option value="2010">2010</option>
                                                                <option value="2009">2009</option>

                                                                <option value="2008">2008</option>
                                                                <option value="2007">2007</option>
                                                                <option value="2006">2006</option>
                                                                <option value="2005">2005</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <label for=" first-name-icon">Modéle</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect" name="model">
                                                                <option value="" disabled selected>Modèle
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <label for=" first-name-icon">Serie</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect" name="serie">
                                                                <option value="" disabled selected>Serie
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-3 col-12">
                                                        <label for=" first-name-icon">Type</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect" name="type">
                                                                <option value="" disabled selected>Type
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <label for="first-name-icon">Couleur</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect"
                                                                name="couleur">
                                                                <option value="Noir">Noir</option>
                                                                <option value="Blanc">Blanc</option>
                                                                <option value="Bleu">Bleu</option>
                                                                <option value="Gris">Gris</option>
                                                                <option value="Gris Souris">Gris Souris</option>
                                                                <option value="Bleu Ciel">Bleu Ciel</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <label for="first-name-icon">Energie</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect"
                                                                name="energie">
                                                                <option value="Essence">Essence</option>
                                                                <option value="Diezel">Diezel</option>
                                                                <option value="Gpl">Gpl</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <label for="first-name-icon">TDI</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect" name="tdi">
                                                                <option value="" disabled selected>TDI
                                                                <option value="tdi">TDI</option>
                                                                <option value="hdi">HDI</option>
                                                                <option value="ess">ESS</option>
                                                                <option value="dsi">DCI</option>
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <label for=" first-name-icon">Kilomitrage</label>
                                                        <div class="form-label-group">

                                                            <input type="text" id="first-name-vertical"
                                                                class="form-control" name="kilomitrage"
                                                                placeholder="kilomitrage">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <label for="first-name-icon">Transmissition</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect" name="trans">
                                                                <option value="Manuelle">Manuelle</option>
                                                                <option value="Automatique">Automatique</option>
                                                                <option value="semi">Semi</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <label for="first-name-icon">Puissance</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect" name="ch">
                                                                <option value="" disabled selected>Puissance
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <label for="first-name-icon">Moteur</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect" name="litre">
                                                                <option value="" disabled selected>moteur
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-12">
                                                        <label for="first-name-icon">Location</label>
                                                        <div class="form-label-group">

                                                            <select class="form-control" id="basicSelect"
                                                                name="location">

                                                                <option value="Oran">Oran</option>
                                                                <option value="Alger">Alger</option>
                                                                <option value="Chlef">Chlef</option>
                                                                <option value="Mascara">Mascara</option>
                                                                <option value="Bejaia">Bejaia</option>
                                                                <option value="Relizane">Relizane</option>
                                                                <option value="SidiBelAbbes">SidiBelAbbes
                                                                </option>
                                                                <option value="Naama">Naama</option>
                                                                <option value="SoukAhras">SoukAhras</option>
                                                                <option value="Ouargla">Ouargla</option>
                                                                <option value="Constantine">Constantine</option>
                                                                <option value="AinDefla">AinDefla</option>
                                                                <option value="Tipaza">Tipaza</option>
                                                                <option value="Medea">Medea</option>
                                                                <option value="Adrar">Adrar</option>
                                                                <option value="Batna">Batna</option>
                                                                <option value="Mostaganem">Mostaganem</option>
                                                                <option value="Blida">Blida</option>
                                                                <option value="Setif">Setif</option>
                                                                <option value="Skikda">Skikda</option>
                                                                <option value="Ghardaia">Ghardaia</option>
                                                                <option value="Boumerdes">Boumerdes</option>
                                                                <option value="OumElBouaghi">OumElBouaghi
                                                                </option>
                                                                <option value="Tebessa">Tebessa</option>
                                                                <option value="Bouira">Bouira</option>
                                                                <option value="Biskra">Biskra</option>
                                                                <option value="TiziOuzou">TiziOuzou</option>
                                                                <option value="Djelfa">Djelfa</option>
                                                                <option value="BordjBouArreridj">
                                                                    BordjBouArreridj</option>
                                                                <option value="ElOued">ElOued</option>
                                                                <option value="Guelma">Guelma</option>
                                                                <option value="Khenchela">Khenchela</option>
                                                                <option value="ElBayadh">ElBayadh</option>
                                                                <option value="Tlemcen">Tlemcen</option>
                                                                <option value="Jijel">Jijel</option>
                                                                <option value="Tissemsilt">Tissemsilt</option>
                                                                <option value="Tiaret">Tiaret</option>
                                                                <option value="Msila">Msila</option>
                                                                <option value="Saida">Saida</option>
                                                                <option value="Laghouat">Laghouat
                                                                </option>
                                                                <option value="Bechar">Bechar</option>
                                                                <option value="ElTaref">ElTaref</option>
                                                                <option value="Annaba">Annaba</option>
                                                                <option value="AinTemouchent">AinTemouchent
                                                                </option>
                                                                <option value="Illizi">Illizi</option>
                                                                <option value="Tindouf">Tindouf</option>
                                                                <option value="Tamanrasset">Tamanrasset</option>
                                                                <option value="Saida">Saida</option>
                                                                <option value="Laghouat">Laghouat
                                                                </option>
                                                                <option value="Bechar">Bechar</option>
                                                            </select>
                                                            </option>

                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Estimer
                                                            Le Cout</button>
                                                        <a href="home"
                                                            class="btn btn-outline-warning mr-1 mb-1">Retour</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </section>
                <!-- // Basic Floating Label Form section end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->
    @include('layouts.footer')
    @include('layouts.footer-scripts')
    <script>
        $(document).ready(function() {
                $('select[name="brands"]').on('change', function() {
                    var BrandId = $(this).val();
                    if (BrandId) {
                        $.ajax({
                            url: "{{ URL::to('model_3') }}/" + BrandId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="model"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="model"]').append('<option value="' +
                                        key + '">' + key + '</option>');
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
                $('select[name="model"]').on('change', function() {
                    var ModelId = $(this).val();
                    if (ModelId) {
                        $.ajax({
                            url: "{{ URL::to('serie_2') }}/" + ModelId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="serie"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="serie"]').append('<option value="' +
                                        key + '">' + key + '</option>');
                                });
                            },
                        });
                        
                        $.ajax({
                            url: "{{ URL::to('type') }}/" + ModelId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="type"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="type"]').append('<option value="' +
                                        key + '">' + key + '</option>');
                                });
                            },
                        });

                        $.ajax({
                            url: "{{ URL::to('engine') }}/" + ModelId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="litre"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="litre"]').append('<option value="' +
                                        value + '">' + value + '</option>');
                                });
                            },
                        });

                        $.ajax({
                            url: "{{ URL::to('power') }}/" + ModelId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="ch"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="ch"]').append('<option value="' +
                                        value + '">' + value + '</option>');
                                });
                            },
                        });
                    

                $.ajax({
                            url: "{{ URL::to('location') }}/" + ModelId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="location"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="location"]').append('<option value="' +
                                        value + '">' + value + '</option>');
                                });
                            },
                        });
                    

                $.ajax({
                            url: "{{ URL::to('tdi') }}/" + ModelId,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="tdi"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="tdi"]').append('<option value="' +
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