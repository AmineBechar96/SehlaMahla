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

                <!-- Basic Vertical form layout section start -->
                <section id="basic-vertical-layouts" style="background:url('../../../app-assets/images/cars2.jpg');background-repeat: no-repeat;
                    background-size: cover;">
                    <div class="row match-height" style="padding:10px;">

                        <div class="col-md-4 col-sm-10">
                            <div class="card">
                                <div class="card-header text-center">

                                    <h4 class="text-center">
                                        Rechercher
                                        Votre voiture de
                                        rève</h4>

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
                                        <form class="form form-vertical" method="post"
                                            action="{{ route('home.store') }}">
                                            @csrf
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="row row-sm mg-b-20">
                                                                <div class="col">
                                                                    <label for="first-name-icon">Marque</label>
                                                                    <select class="form-control" id="basicSelect"
                                                                        name="brands">
                                                                        <option value="" disabled selected>Marque
                                                                        </option>
                                                                        @foreach ($marques as $marque)
                                                                        <option value="{{ $marque->model }}">
                                                                            {{ $marque->model }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label for="first-name-icon">Matricule</label>
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="row row-sm mg-b-20">
                                                                <div class="col">
                                                                    <label for=" first-name-icon">Modéle</label>
                                                                    <select class="form-control" id="basicSelect"
                                                                        name="model">
                                                                        <option value="" disabled selected>Modèle
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <label for=" first-name-icon">Serie</label>
                                                                    <select class="form-control" id="basicSelect"
                                                                        name="serie">
                                                                        <option value="" disabled selected>Serie
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <!--div class="col">
                                                                    <label for=" first-name-icon">Type</label>
                                                                    <select class="form-control" id="basicSelect"
                                                                        name="type">
                                                                        <option value="" disabled selected>Type
                                                                        </option>
                                                                    </select>
                                                                </div-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="row row-sm mg-b-20">

                                                                <div class="col">
                                                                    <label for="first-name-icon">Energie</label>
                                                                    <select class="form-control" id="basicSelect"
                                                                        name="energie">
                                                                        <option value="Essence">Essence</option>
                                                                        <option value="Diezel">Diezel</option>
                                                                        <option value="Gpl">Gpl</option>
                                                                    </select>


                                                                </div>
                                                                <div class="col">
                                                                    <label for="first-name-icon">Transmissition</label>
                                                                    <select class="form-control" id="basicSelect"
                                                                        name="trans">
                                                                        <option value="Manuelle">Manuelle</option>
                                                                        <option value="Automatique">Automatique</option>
                                                                        <option value="semi">Semi</option>

                                                                    </select>


                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="row row-sm mg-b-20">
                                                                <div class="col">
                                                                    <label for=" first-name-icon">Kilomitrage</label>
                                                                    <input type="text" id="first-name-vertical"
                                                                        class="form-control" name="kilomitrage"
                                                                        placeholder="ex: 150 mille ">
                                                                </div>
                                                                <div class="col">
                                                                    <label for="first-name-icon">Location</label>
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
                                                                </div>

                                                                <!--div class="col">
                                                                    <label for="first-name-icon">Puissance</label>
                                                                    <select class="form-control" id="basicSelect"
                                                                        name="ch">
                                                                        <option value="" disabled selected>Puissance
                                                                        </option>

                                                                    </select>


                                                                </div>
                                                                <div class="col">
                                                                    <label for="first-name-icon">Moteur</label>
                                                                    <select class="form-control" id="basicSelect"
                                                                        name="litre">
                                                                        <option value="" disabled selected>moteur
                                                                        </option>

                                                                    </select>


                                                                </div-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 text-center">
                                                    <button type="submit" class="btn mb-1 btn-primary btn-block">Estimer
                                                        le
                                                        cout</button>
                                                    <a href="advanced"
                                                        class="btn btn-outline-warning mb-1  btn-block">Recherche
                                                        Avanceé</a>
                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12">

                        </div>
                    </div>
                </section>
                <!-- ======= Why Us Section ======= -->
                <section id="why-uss" class="why-us">
                    <div class="section-title" id="tit">

                        <h2>Achetez intelligemment - étape par étape</h2>
                        <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
                    </div>
                    <div class="container">

                        <div class="row">

                            <div class="col-lg-4" data-aos="fade-up">
                                <div class="box" id="boxx">
                                    <h4 class="text-center">Choisis Votre Voiture</h4>
                                    <span class="text-center"><i class="feather icon-target"></i></span>

                                    <p class="text-center">Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et
                                        consectetur ducimus
                                        vero placeat</p>
                                </div>
                            </div>

                            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="150">
                                <div class="box" id="boxx">
                                    <h4 class="text-center">Valuer Votre Voiture</h4>
                                    <span class="text-center"><i class="feather icon-dollar-sign"></i></span>

                                    <p class="text-center">Dolorem est fugiat occaecati voluptate velit esse. Dicta
                                        veritatis dolor quod et
                                        vel dire leno para dest</p>
                                </div>
                            </div>

                            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                                <div class="box" id="boxx">
                                    <h4 class="text-center"> Faites Les bons choix</h4>
                                    <span class="text-center"><i class="feather icon-award"></i></span>

                                    <p class="text-center">Molestiae officiis omnis illo asperiores. Aut doloribus vitae
                                        sunt debitis quo
                                        vel nam quis</p>
                                </div>
                            </div>

                        </div>

                    </div>


                </section><!-- End Why Us Section -->

                <!-- ======= Clients Section ======= -->
                <section id="clients" class="clients">
                    <div class="container" data-aos="zoom-in">

                        <div class="clients-slider swiper-container">
                            <div class="swiper-wrapper align-items-center">
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/mercedes.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/audi.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/volswagen.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/renault.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/peugeot.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/porsche.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/honda.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/kia.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/hyundai.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/suzuki.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/seat.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/fiat.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/opel.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/skoda.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/daciat.png"
                                        class="img-fluid" alt=""></div>

                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/mitsubuchi.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/nissan.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/chevrolet.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/fiat.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/mazda.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/toyota.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/ford.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/citroen.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/jeep.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/jaguar.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/volvo.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/rover.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/infiniti.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/lamborgini.png"
                                        class="img-fluid" alt=""></div>
                                <div class="swiper-slide"><img src="../../../app-assets/images/brands/cadilac.png"
                                        class="img-fluid" alt=""></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>

                    </div>
                </section><!-- End Clients Section -->


                <!-- ======= Features Section ======= -->
                <section id="features" class="features">
                    <div class="container">

                        <ul class="nav nav-tabs row d-flex">
                            <li class="nav-item col-3" data-aos="zoom-in">
                                <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                                    <i class="ri-gps-line"></i>
                                    <h4 class="d-none d-lg-block">Modi sit est dela pireda nest</h4>
                                </a>
                            </li>
                            <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="100">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                                    <i class="ri-body-scan-line"></i>
                                    <h4 class="d-none d-lg-block">Unde praesenti mara setra le</h4>
                                </a>
                            </li>
                            <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="200">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                                    <i class="ri-sun-line"></i>
                                    <h4 class="d-none d-lg-block">Pariatur explica nitro dela</h4>
                                </a>
                            </li>
                            <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="300">
                                <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                                    <i class="ri-store-line"></i>
                                    <h4 class="d-none d-lg-block">Nostrum qui dile node</h4>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" data-aos="fade-up">
                            <div class="tab-pane active show" id="tab-1">
                                <div class="row">
                                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.
                                        </h3>
                                        <p class="font-italic">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore
                                            magna aliqua.
                                        </p>
                                        <ul>
                                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex
                                                ea commodo consequat.</li>
                                            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in
                                                reprehenderit in voluptate velit.</li>
                                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex
                                                ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                                voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                                                pariatur.</li>
                                        </ul>
                                        <p>
                                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                            dolor in reprehenderit in voluptate
                                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum
                                        </p>
                                    </div>
                                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                                        <img src="../../../app-assets/images/features/feat4.png" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <div class="row">
                                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                        <h3>Neque exercitationem debitis soluta quos debitis quo mollitia officia est
                                        </h3>
                                        <p>
                                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                            dolor in reprehenderit in voluptate
                                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum
                                        </p>
                                        <p class="font-italic">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore
                                            magna aliqua.
                                        </p>
                                        <ul>
                                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex
                                                ea commodo consequat.</li>
                                            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in
                                                reprehenderit in voluptate velit.</li>
                                            <li><i class="ri-check-double-line"></i> Provident mollitia neque rerum
                                                asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.
                                            </li>
                                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex
                                                ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                                voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                                                pariatur.</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                                        <img src="../../../app-assets/images/features/feat2.png" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-3">
                                <div class="row">
                                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                        <h3>Voluptatibus commodi ut accusamus ea repudiandae ut autem dolor ut assumenda
                                        </h3>
                                        <p>
                                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                            dolor in reprehenderit in voluptate
                                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum
                                        </p>
                                        <ul>
                                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex
                                                ea commodo consequat.</li>
                                            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in
                                                reprehenderit in voluptate velit.</li>
                                            <li><i class="ri-check-double-line"></i> Provident mollitia neque rerum
                                                asperiores dolores quos qui a. Ipsum neque dolor voluptate nisi sed.
                                            </li>
                                        </ul>
                                        <p class="font-italic">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore
                                            magna aliqua.
                                        </p>
                                    </div>
                                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                                        <img src="../../../app-assets/images/features/feat3.png" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab-4">
                                <div class="row">
                                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                        <h3>Omnis fugiat ea explicabo sunt dolorum asperiores sequi inventore rerum</h3>
                                        <p>
                                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                            dolor in reprehenderit in voluptate
                                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                            cupidatat non proident, sunt in
                                            culpa qui officia deserunt mollit anim id est laborum
                                        </p>
                                        <p class="font-italic">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore
                                            magna aliqua.
                                        </p>
                                        <ul>
                                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex
                                                ea commodo consequat.</li>
                                            <li><i class="ri-check-double-line"></i> Duis aute irure dolor in
                                                reprehenderit in voluptate velit.</li>
                                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex
                                                ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                                voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                                                pariatur.</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                                        <img src="../../../app-assets/images/features/feat1.png" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </section><!-- End Features Section -->


                <!-- ======= Cta Section ======= -->
                <section id="cta" class="cta">
                    <div class="container">

                        <div class="row" data-aos="zoom-out">
                            <div class="col-lg-9 text-center text-lg-start">
                                <h3>Call To Action</h3>
                                <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                    qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="col-lg-3 cta-btn-container text-center">
                                <a class="cta-btn align-middle" href="#">Call To Action</a>
                            </div>
                        </div>

                    </div>
                </section><!-- End Cta Section -->


            </div>

            <!-- // Basic Vertical form layout section end -->
        </div>
    </div>
    </div>
    <!-- END: Content-->


    @include('layouts.footer')
    <div id="preloader"></div>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    @include('layouts.footer-scripts')


    <script>
        /**
   * Easy selector helper function
   */
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }
   /**
   * Easy on scroll event listener 
   */
   const onscroll = (el, listener) => {
    el.addEventListener('scroll', listener)
  }
        /**
   * Back to top button
   */
  let backtotop = select('.back-to-top')
  if (backtotop) {
    const toggleBacktotop = () => {
      if (window.scrollY > 100) {
        backtotop.classList.add('active')
      } else {
        backtotop.classList.remove('active')
      }
    }
    window.addEventListener('load', toggleBacktotop)
    onscroll(document, toggleBacktotop)
  }

  /**
   * Mobile nav toggle
   */
    </script>
    <script>
        $(document).ready(function() {
                $('select[name="brands"]').on('change', function() {
                    var BrandId = $(this).val();
                    if (BrandId) {
                        $.ajax({
                            url: "{{ URL::to('model') }}/" + BrandId,
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
                            url: "{{ URL::to('serie') }}/" + ModelId,
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
                    } else {
                        console.log('AJAX load did not work');
                    }
                });
            });
    </script>
    <script>
        new Swiper('.clients-slider', {
    speed: 400,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 40
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 60
      },
      640: {
        slidesPerView: 4,
        spaceBetween: 80
      },
      992: {
        slidesPerView: 6,
        spaceBetween: 120
      }
    }
  });


    </script>
</body>
<!-- END: Body-->

</html>