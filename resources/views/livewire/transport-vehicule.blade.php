<div class="content-wrapper">

    <div class="content-detached content-right">
        <div class="content-body">
            <section id="ecommerce-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ecommerce-header-items">
                            <div class="result-toggler">
                                <button class="navbar-toggler shop-sidebar-toggler" type="button"
                                    data-toggle="collapse">
                                    <span class="navbar-toggler-icon d-block d-lg-none"><i
                                            class="feather icon-menu"></i></span>
                                </button>
                                <div class="search-results">
                                    {{$total}} results found
                                </div>
                            </div>
                            <div class="view-options">
                                <div class="btn-group mt-2" style="margin-right:10px;">


                                    <div class="form-group" wire:ignore>
                                        <select class="select2 form-control" name="selectedWilaya" id="selectedWilaya"
                                            wire:model="selectedWilaya">
                                            <optgroup label="Wilaya">
                                                @foreach ($wilayas as $wilaya)
                                                <option value="{{$wilaya->code}}">
                                                    {{$wilaya->name_en}}
                                                </option>
                                                @endforeach


                                            </optgroup>

                                        </select>
                                    </div>





                                    @if (! is_null($selectedWilaya))
                                    <div>
                                        <div class="form-group">
                                            <select class="select2 form-control" name="commune" id="selectedCommune"
                                                wire:model="selectedCommune">
                                                <option value="">Commune</option>

                                                @foreach ($communes as $commune)
                                                <option value="{{$commune->id}}">{{$commune->name}}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                    </div>
                                    @endif


                                </div>
                                <div class="view-btn-option">

                                    <button class="btn btn-white list-view-btn view-btn ">
                                        <i class="feather icon-list"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Ecommerce Search Bar Starts -->
            <section id="ecommerce-searchbar">
                <div class="row mt-1">
                    <div class="col-sm-12">
                        <fieldset class="form-group position-relative">

                            <input type="text" class="form-control search-product" id="iconLeft5"
                                placeholder="Search here" wire:click="searchagency()" wire:model="search">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </section>
            <div class="d-flex justify-content-center align-items-center mt-1 mb-1 ">
                {{ $agencies->links('') }}
            </div>
            @if (count($agencies)>0)
            @php
            $display="grid-view"
            @endphp
            @else
            @php
            $display="list-view"
            @endphp
            @endif
            <section id="ecommerce-products" class="{{$display}}">
                @if (count($agencies)>0)
                @foreach ($agencies as $agency)
                <div class="card ecommerce-card">
                    <div class="card-content" id="prod1">
                        <div class="item-img text-center">
                            <a href="{{$agency->type}}/agency-details/{{$agency->ID}}">

                                <img class="img-fluid"
                                    src="../../../app-assets/images/pages/eCommerce/{{$agency->vehicule_shape}}.png"
                                    alt="img-placeholder">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        <span>{{$agency->rating}}</span>

                                        <i class="feather icon-star"></i>


                                    </div>
                                </div>
                                <div>
                                    <h5 class="item-price text-success">
                                        @if ($filter=="distance")
                                        {{number_format($agency->distance, 1, '.', '')}} KM
                                        @endif
                                    </h5>
                                </div>
                            </div>
                            <div class="item-name">
                                <a href="app-ecommerce-details.html">{{$agency->title}}</a>
                                <p class="item-company">
                                    By
                                    <span class="company-name">Google</span>
                                </p>
                            </div>
                            <div>
                                <p class="item-description">
                                    Enjoy smart access
                                    to
                                    videos, games and
                                    apps
                                    with this Amazon
                                    Fire TV
                                    stick. Its Alexa
                                    voice
                                    remote lets you
                                    deliver hands-free
                                    commands when you
                                    want
                                    to watch television
                                    or
                                    engage with other
                                    applications. With a
                                    quad-core processor,
                                    1GB
                                    internal memory and
                                    8GB
                                    of storage, this
                                    portable Amazon Fire
                                    TV
                                    stick works fast
                                    for buffer-free
                                    streaming.
                                </p>
                            </div>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        <span>{{$agency->rating}}</span>
                                        @for ($i = 0; $i < $agency->rating; $i++)
                                            <i class="feather icon-star"></i>
                                            @endfor

                                    </div>
                                </div>
                                <div class="item-cost">
                                    <h6 class="item-price">
                                        $39.99
                                    </h6>
                                </div>
                            </div>
                            @guest
                            <div class="wishlistt">
                                <i class="fa fa-heart-o"></i>
                                <span>Wishlist</span>
                            </div>
                            @else

                            @if (Auth::user()->hasVerifiedEmail())

                            <div class="wishlist" onclick="addRow(this)" data-type="{{$agency->type}}"
                                data-agency_id="{{$agency->ID}}">
                                <i class="fa fa-heart-o" wire:ignore.self></i>
                                <span>Wishlist</span>
                            </div>
                            @else

                            <div class="wishlistt">
                                <i class="fa fa-heart-o"></i>
                                <span>Wishlist</span>
                            </div>
                            @endif
                            @endguest

                            <div class="cart">
                                @guest
                                <i class="feather icon-shopping-cart"></i>
                                <span class="add-to-cart">ENregistrer
                                </span> <a href="#" data-title="{{$agency->title}}" data-toggle="modal"
                                    data-target="#danger2" class="view-in-cart d-none">S'inscrire
                                </a>
                                @else
                                @if (Auth::user()->hasVerifiedEmail())


                                <i class="feather icon-shopping-cart"></i>

                                <span class="add-to-cart"
                                    wire:click="store({{$agency->ID}},'{{$agency->type}}')">Enregistrer
                                </span>

                                @else
                                <i class="feather icon-shopping-cart"></i>
                                <span class="add-to-cart">ENregistrer
                                </span> <a href="{{url('email/verify')}}"
                                    class="view-in-cart {{$isSetClicked  ? "" : "d-none"}}">Verifier
                                    Email</a>
                                @endif

                                @endguest

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

                @else
                <!-- error 404 -->
                <section class="row match-width flexbox-container">
                    <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-center">
                        <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <img src="../../../app-assets/images/pages/location/nocontent.svg"
                                        class="img-fluid align-self-center" alt="branding logo">
                                    <h1 class="font-large-2 my-1">Oups -No Content
                                        Found!</h1>
                                    <p class="p-2">
                                        Nous sommes désolés, il n'y a pas de contenu disponible,
                                        dans cette commune, aidez-nous en nous informant auprès de certains fournisseurs
                                        de services de votre région

                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- error 404 end -->



                @endif

            </section>
        </div>
    </div>
    <div class="sidebar-detached sidebar-left">
        <div class="sidebar">
            <!-- Ecommerce Sidebar Starts -->
            <div class="sidebar-shop" id="ecommerce-sidebar-toggler">

                <div class="row">
                    <div class="col-sm-12">
                        <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                    </div>
                </div>
                <span class="sidebar-close-icon d-block d-md-none">
                    <i class="feather icon-x"></i>
                </span>
                <div class="card">
                    <div class="card-body">


                        <!-- /Price Slider -->
                        <div class="price-slider">
                            <div class="price-slider-title mt-1">
                                <h6 class="filter-title mb-0">Filtrer Votre Recherche</h6>
                            </div>
                        </div>
                        <!-- /Price Range -->
                        <hr>
                        <!-- Categories Starts -->
                        <div id="product-categories">
                            <div class="product-category-title">
                                <h6 class="filter-title mb-1">Tous</h6>
                            </div>
                            <ul class="list-unstyled categories-list">
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="filter" wire:model="filter" value="title" checked>
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Tous</span>
                                    </span>
                                </li>
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="shape" wire:model="shape" value="Master">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Master</span>
                                    </span>
                                </li>
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="shape" wire:model="shape" value="Camionnette">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Camionnette</span>
                                    </span>
                                </li>
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="shape" wire:model="shape" value="camion-benne">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Camion Benne</span>
                                    </span>
                                </li>
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="shape" wire:model="shape" value="camion-frigorifique">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Camion Frigorifique</span>
                                    </span>
                                </li>

                                </li>
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="filter" wire:model="filter" value="rating">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Top rated</span>
                                    </span>

                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="filter" wire:model="filter" value="reviews">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50"> Plus de reviews</span>
                                    </span>
                                </li>
                                <!--li>
                                                <span class="vs-radio-con vs-radio-primary py-25">
                                                    <input type="radio" name="filter" wire:model="filter" value="20">
                                                    <span class="vs-radio">
                                                        <span class="vs-radio--border"></span>
                                                        <span class="vs-radio--circle"></span>
                                                    </span>
                                                    <span class="ml-50">Proche de Centre Ville</span>
                                                </span>
                                            </li-->

                                <span class="vs-radio-con vs-radio-primary py-25">
                                    <input type="radio" name="filter" data-toggle="modal" data-target="#defaultSize">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="ml-50">Proche de Moi</span>
                                </span>


                            </ul>
                        </div>
                        <!-- Categories Ends -->
                        <hr>
                        <!-- Brands -->
                        <div class="brands">
                            <div class="brand-title mt-1 pb-1">
                                <h6 class="filter-title mb-0">Brands</h6>
                            </div>
                            <div class="brand-list" id="brands">
                                <ul class="list-unstyled">
                                    <!--li class="d-flex justify-content-between align-items-center py-25">
                                        <span class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="shape" id="shape" wire:model="shape"
                                                value="Master">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Master</span>
                                        </span>
                                        <span></span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center py-25">
                                        <span class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="shape" id="shape" wire:model="shape"
                                                value="Camionnette">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Camionnette</span>
                                        </span>
                                        <span></span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center py-25">
                                        <span class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="shape" id="shape" wire:model="shape"
                                                value="camion-benne">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Camion Benne</span>
                                        </span>
                                        <span></span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center py-25">
                                        <span class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="shape" id="shape" wire:model="shape"
                                                value="camion-frigorifique">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Camion Frigorifique</span>
                                        </span>
                                        <span></span>
                                    </li-->
                                    <li class="d-flex justify-content-between align-items-center py-25">
                                        <span class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="website" id="website" wire:model="website"
                                                value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Website</span>
                                        </span>
                                        <span>{{$withwebsite}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center py-25">
                                        <span class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="rating" id="rating" wire:model="rating"
                                                value="10">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">
                                                Rating
                                            </span>
                                        </span>
                                        <span>{{$withrating}}</span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center py-25">
                                        <span class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" wire:model="phone" name="phone" id="phone"
                                                value="15">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">
                                                Phone
                                            </span>
                                        </span>
                                        <span>{{$withphone}}</span>
                                    </li>


                                    <!--li class="d-flex justify-content-between align-items-center py-25">
                                            <span class="vs-checkbox-con vs-checkbox-primary">
                                                <input type="checkbox" name="ouvert" id="ouvert" wire:model="ouvert"
                                                    value="Ouvert 24h/24">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">Ouvert</span>
    
                                            </span>
                                            <span>1112</span>
                                        </li-->

                                </ul>
                            </div>
                        </div>
                        <!-- /Brand -->
                        <hr>
                        <!-- Rating section starts -->
                        <div id="ratings">
                            <div class="ratings-title mt-1 pb-75">
                                <h6 class="filter-title mb-0">Ratings</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <ul class="unstyled-list list-inline ratings-list mb-0">
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li>& up</li>
                                    @php
                                    $data = [];
                                    foreach ($ratings as $rating){


                                    $data['label'][] = $rating->rate;
                                    $data['data'][] = $rating->count;
                                    $data['rating_data'] = json_encode($data);

                                    }
                                    @endphp

                                </ul>
                                <div class="stars-received">({{$data['data'][0]}})</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <ul class="unstyled-list list-inline ratings-list mb-0">
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li>& up</li>
                                </ul>
                                <div class="stars-received">({{$data['data'][1]}})</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <ul class="unstyled-list list-inline ratings-list mb-0">
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li>& up</li>
                                </ul>
                                <div class="stars-received">({{$data['data'][2]}})</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <ul class="unstyled-list list-inline ratings-list mb-0 ">
                                    <li class="ratings-list-item"><i class="feather icon-star text-warning"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li class="ratings-list-item"><i class="feather icon-star text-light"></i>
                                    </li>
                                    <li>& up</li>
                                </ul>
                                <div class="stars-received">({{$data['data'][3]}})</div>
                            </div>
                        </div>
                        <!-- Rating section Ends -->
                        <hr>
                        <!-- Clear Filters Starts -->
                        <div id="clear-filters">
                            <button class="btn btn-block btn-primary" wire:click="clearFilters()">CLEAR ALL
                                FILTERS</button>
                        </div>
                        <!-- Clear Filters Ends -->

                    </div>
                </div>
            </div>
            <!-- Ecommerce Sidebar Ends -->

        </div>
    </div>
    <div class="modal fade text-left" id="danger2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="border-bottom-left-radius: 0;border-bottom-right-radius: 0">
                    <h5 class="modal-title" id="myModalLabel110">Ajouter le Service <span class="text-success"
                            id="servicename">

                        </span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="bg-transparent mb-0 px-2">

                        <div class="card-title">
                            <h4 class="mb-0">Login</h4>
                        </div>

                        <p class="px-2">Vous Devez s'inscrire pour faire cette action.</p>
                        <div class="card-content">
                            <div class="card-body pt-1">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="E-Mail Address" value="{{ old('email') }}" required
                                            autocomplete="email" autofocus>

                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                        <label for="email">E-Mail Address</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </fieldset>

                                    <fieldset class="form-label-group position-relative has-icon-left">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="Password" required autocomplete="current-password">

                                        <div class="form-control-position">
                                            <i class="feather icon-lock"></i>
                                        </div>
                                        <label for="password">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </fieldset>
                                    <div class="form-group d-flex justify-content-between align-items-center">
                                        <div class="text-left">
                                            <fieldset class="checkbox">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox">
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">Remember me</span>
                                                </div>
                                            </fieldset>
                                        </div>
                                        @if (Route::has('password.request'))
                                        <div class="text-right"><a class="card-link"
                                                href="{{ route('password.request') }}">
                                                Mot de Passe Oublié ?
                                            </a></div>
                                        @endif
                                    </div>
                                    <a href="#" data-toggle="modal" data-target="#large2" data-dismiss="modal"
                                        class="btn btn-outline-primary float-left btn-inline">Register</a>
                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="login-footer">

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade text-left" id="large2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel110">Ajouter le Service <span class="text-success"
                            id="servicename">

                        </span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="bg-transparent mb-0 px-2">


                        <div class="card-title">
                            <h4 class="mb-0">Register</h4>
                        </div>

                        <p class="px-2">Vous Devez s'inscrire pour faire cette action.</p>
                        <div class="card-content">
                            <div class="card-body pt-0">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-label-group">
                                        <!-- <input type="text" id="inputName" class="form-control" placeholder="Name" required> -->
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            placeholder="Name" value="{{ old('name') }}" required autocomplete="name"
                                            autofocus>
                                        <label for="name">Name</label>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-label-group">
                                        <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email" required> -->
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="Email" value="{{ old('email') }}" required
                                            autocomplete="email">
                                        <label for="email">Email</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-label-group">
                                        <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> -->
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="Password" required autocomplete="new-password">
                                        <label for="password">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-label-group">
                                        <!-- <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" required> -->
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" placeholder="Confirm Password" required
                                            autocomplete="new-password">
                                        <label for="password-confirm">Confirm Password</label>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <fieldset class="checkbox">
                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                    <input type="checkbox" checked>
                                                    <span class="vs-checkbox">
                                                        <span class="vs-checkbox--check">
                                                            <i class="vs-icon feather icon-check"></i>
                                                        </span>
                                                    </span>
                                                    <span class="">J'accepte les termes &
                                                        conditions</span>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <a href="{{route('login')}}"
                                        class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                    <button type="submit"
                                        class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel18">Definis Votre Addresse
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="sidebar-content">
                        <span class="sidebar-close-icon">

                            <div class="chat-fixed-search">
                                <h3 class="primary p-1 mb-0">Addresse</h3>
                                <div class="d-flex align-items-center">

                                    <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                        <input type="text" class="form-control round" name="searchPosition"
                                            wire:model="searchPosition" id="chat-search"
                                            placeholder="Rechercher une Addresse...">
                                        <div class="form-control-position">
                                            <i class="feather icon-search"></i>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div id="users-list" class="chat-user-list list-group position-relative mt-2">

                                <ul class="chat-users-list-wrapper media-list">
                                    @foreach ($addresses as $address)


                                    <li id="addresseZ">

                                        <div class="user-chat-info">
                                            <div class="contact-info">

                                                <p><i class="feather icon-map-pin"></i>&nbsp;
                                                    <span id="selectedPos">
                                                        {{$address->name}},&nbsp;{{$address->wilaya->name_en}},&nbsp;
                                                        Algerie</span></p>
                                            </div>

                                        </div>
                                    </li>
                                    @endforeach

                                </ul>

                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('scripts')

<script>
    $(document).ready(function () {
                  
                     $('#selectedWilaya').on('change', function (e) {
                        var data = $('#selectedWilaya').select2("val");
                        @this.set('selectedWilaya', data);
                        
                    });
                    $('#selectedWilaya').select2({
                        dropdownAutoWidth: true,
                width: '100%',
                selectOnClose: true
                });
                $('#selectedCommune').on('change', function (e) {
                   
                           
                      $('#selectedCommune').select2({
                            dropdownAutoWidth: true,
                    width: '100%',
                   
                    });     
                    var dataa = $('#selectedCommune').select2("text");
                    @this.set('selectedPosition',dataa );
                        //  livewire.emit('selectedCommunee', e.target.value)
                    });
                    
                    window.livewire.on('select2',()=>{ 
                           $('#selectedCommune').css("width","1") ;  });   
                    $('#selectedCommune').select2().on('change', function (e) {
                    var data = $('#selectedCommune').select2("val");
                    
                    
                            @this.set('selectedCommune', data);
                            
                            //console.log('halim');
                            
                        });     
            
            
                        $('#selectedPos').on('click', function (e) {
                        var data = e.target.innerHTML;
                        var communee= data.substr(0, data.indexOf(',')); 
                      // var communee= '"'+ communee + '"' ; 
                       var communeee=communee.replace(/(\r\n|\n|\r)/gm, "");
                        communeee=communeee.replace(/\s\s+/gm, '');
                        console.log(communeee);
                        @this.set('selectedPosition',communeee );
                        @this.set('filter','distance' );
                       $('#defaultSize').modal('toggle');
            
                        
                    });





                       });
                    
                       

               
            
            
</script>
<script>
    function addRow(ele) 
    {
        if($(ele).children().hasClass("fa-heart-o")){
        var id= $(ele).data('agency_id');
        var type= $(ele).data('type');
        console.log(id);  
        console.log(type);  
        @this.set('liked',true);
        @this.set('agencyLikedId',id);
        @this.set('agencyLikedType',type);
    }
        else{
            var id= $(ele).data('agency_id');
        var type= $(ele).data('type');
            console.log(false);
            console.log(id);  
        console.log(type);
        @this.set('liked',false );
        @this.set('agencyLikedId',id);
        @this.set('agencyLikedType',type);
        }
    }
</script>

@endpush