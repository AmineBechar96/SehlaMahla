<div class="content-wrapper">
    <div class="form-group breadcrum-left">
        <div class="dropdown">
            <a class=" btn btn-primary btn-round" href="{{url()->previous()}}">
                <i class="feather icon-arrow-left"></i> RETOUR</a>

        </div>
    </div>
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
                                    {{$total}} Résultats Trouvés

                                </div>
                            </div>
                            <div class="view-options">
                                <div class="btn-group mt-2" style="margin-right:10px;">

                                    <div class="form-group" wire:ignore>
                                        <select class="price-options form-control" name="filter" wire:model="filter"
                                            id="filter">
                                            <option value="title">Tous</option>
                                            <option value="distance"> Plus Proche</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="view-btn-option">

                                    <button class="btn btn-white view-btn grid-view-btn active">
                                        <i class="feather icon-grid"></i>
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
                {{ $services->links('') }}
            </div>
            @if (count($services)>0)
            @php
            $display="grid-view"
            @endphp
            @else
            @php
            $display="list-view"
            @endphp
            @endif
            <section id="ecommerce-products" class="{{$display}}">
                @if (count($services)>0)
                @foreach ($services as $service)

                <div class="card ecommerce-card">
                    <div class="card-content" id="prod1">

                        <div class="item-img text-center">
                            <a href="{{url('client/'.$service->type->name.'/agency-details/'.$service->id)}}">
                                <img class="img-fluid image-resize" src="{{$service->service_image_url}}"
                                    alt="img-placeholder"></a>
                        </div>
                        <div class="card-body">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        <span>{{number_format($service->ratings->avg('number_of_starts'), 2, '.', '')}}</span>

                                        <i class="feather icon-star"></i>


                                    </div>
                                </div>
                                <div>
                                    <h5 class="item-price text-success">
                                        @if ($filter=="distance")
                                        {{number_format($service->distance, 1, '.', '')}} KM
                                        @endif
                                    </h5>
                                </div>
                            </div>
                            <div class="item-name">
                                <a href="app-ecommerce-details.html">{{$service->title}}</a>
                                <p class="item-company">
                                    By
                                    <span class="company-name">Google</span>
                                </p>
                            </div>
                            <div>
                                <p class="item-description">
                                    {{$service->body}}
                                </p>
                            </div>
                        </div>
                        <div class="item-options text-center">
                            <div class="item-wrapper">
                                <div class="item-rating">
                                    <div class="badge badge-primary badge-md">
                                        <span>{{$service->ratings->avg('number_of_starts')}}</span>
                                        @for ($i = 0; $i < $service->ratings->avg('number_of_starts'); $i++)
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
                                <span>J'ADORS</span>
                            </div>
                            @else

                            @if (Auth::user()->hasVerifiedEmail())
                            @can('isClient')
                            <div class="wishlistt" wire:click="addLike({{$service->id}})">
                                <i class="fa fa-heart{{$service->isLiked() ? ' text-danger' :'-o'}}"></i>
                                <span>{{$service->isLiked() ? "J'ADORS Pas" : "J'ADORS"}}</span>
                            </div>
                            @endcan

                            @else

                            <div class="wishlistt">
                                <i class="fa fa-heart-o"></i>
                                <span>J'ADORS</span>
                            </div>
                            @endif
                            @endguest

                            <div class="cart">
                                @guest
                                <i class="feather icon-shopping-cart"></i>
                                <span class="add-to-cart">Enregistrer
                                </span> <a href="#" data-title="{{$service->title}}" data-toggle="modal"
                                    data-target="#danger2" class="view-in-cart d-none">S'inscrire
                                </a>
                                @else
                                @if (Auth::user()->hasVerifiedEmail())
                                @can('isClient')
                                <i class="feather icon-shopping-cart"></i>

                                <span class="add-to-cart" wire:click="store({{$service->id}})">Enregistrer
                                </span>

                                @else
                                <i class="feather icon-shopping-cart"></i>
                                <span class="add-to-cart">Enregistrer
                                </span> <a href="{{url('email/verify')}}"
                                    class="view-in-cart {{$isSetClicked  ? "" : "d-none"}}">Verifier
                                    Email</a>
                                @endif
                                @endcan



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
                                        Vous n'avez aimé aucun service, vous pouvez ajouter des services en cliquant
                                        sur le bouton ci-dessous


                                    </p>
                                    <br>

                                    <a class="btn btn-primary btn-lg mt-2" href="{{url('client/categories')}}">Parcourir
                                        Les Services
                                    </a>

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
                        <h6 class="filter-heading d-none d-lg-block">Filtres</h6>
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
                                <h6 class="filter-title mb-0">Categories</h6>
                            </div>
                        </div>
                        <hr>

                        <!-- Categories Starts -->
                        <div id="product-categories">

                            <ul class="list-unstyled categories-list">
                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="type" wire:click="clearFilters()" checked value="">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">Tous</span>
                                    </span>
                                </li>
                                @foreach ($types as $type)

                                <li>
                                    <span class="vs-radio-con vs-radio-primary py-25">
                                        <input type="radio" name="type" wire:model="type" value="{{$type->type_id}}">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="ml-50">{{trans('types.'.$type->name)}}</span>
                                    </span>
                                </li>
                                @endforeach



                            </ul>
                        </div>
                        <!-- Categories Ends -->
                        <hr>
                        <!-- Brands -->
                        <div class="brands">
                            <div class="brand-title mt-1 pb-1">
                                <h6 class="filter-title mb-0">FILTRES</h6>
                            </div>
                            <div class="brand-list" id="brands">
                                <ul class="list-unstyled">
                                    <li class="d-flex justify-content-between align-items-center py-25">
                                        <span class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" name="website" id="website" wire:model="website"
                                                value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">SiteWeb</span>
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
                                                Téléphone
                                            </span>
                                        </span>
                                        <span>{{$withphone}}</span>
                                    </li>


                                    <li class="d-flex justify-content-between align-items-center py-25">
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
                                        <span>{{$withopenstate}}</span>
                                    </li>

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
                                    if(count($ratings)){
                                    $data = [];
                                    foreach ($ratings as $rating){


                                    $data['label'][] = $rating->rate;
                                    $data['data'][] = $rating->count;
                                    $data['rating_data'] = json_encode($data);

                                    }}
                                    @endphp

                                </ul>
                                <div class="stars-received">@if (isset($data['data'][0]))
                                    ({{$data['data'][0]}})
                                    @else
                                    (0)
                                    @endif</div>
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
                                <div class="stars-received">@if (isset($data['data'][1]))
                                    ({{$data['data'][1]}})
                                    @else
                                    (0)
                                    @endif</div>
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
                                <div class="stars-received">@if (isset($data['data'][2]))
                                    ({{$data['data'][2]}})
                                    @else
                                    (0)
                                    @endif</div>
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
                                <div class="stars-received">@if (isset($data['data'][3]))
                                    ({{$data['data'][3]}})
                                    @else
                                    (0)
                                    @endif</div>
                            </div>
                        </div>
                        <!-- Rating section Ends -->
                        <hr>
                        <!-- Clear Filters Starts -->
                        <div id="clear-filters">
                            <button class="btn btn-block btn-primary" wire:click="clearFilters()">EFFACER
                                FILTRES</button>
                        </div>
                        <!-- Clear Filters Ends -->

                    </div>
                </div>
            </div>
            <!-- Ecommerce Sidebar Ends -->

        </div>
    </div>


</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@push('scripts')
<script>
    $(document).ready(function () {
         $('#filter').on('change', function (e) {
                            var data = $('#filter').select2("val");
                            @this.set('filter', data);
                            
                        });
                        $('#filter').select2({
                            dropdownAutoWidth: true,
                    width: '100%',
                    selectOnClose: true
                });
});
        
</script>
<script>
    var id=null;
var type=null;
    $('.wishlisttt').on('click', function (e) {
                    var button = $(this);
                     id= $(button).data('agency_id');
             type= $(button).data('type');
            console.log(id);  
            console.log(type);  
            @this.set('likeed',true);
            @this.set('agencyLikedId',id);
            @this.set('agencyLikedType',type);
            id=null;
 type=null;
 button=null;
                });
    /*  function addRow(ele) 
      {
            var _this=ele;
          //  if($(ele).children().hasClass("fa-heart-o")){
            var id= $(_this).data('agency_id');
            var type= $(_this).data('type');
            console.log(id);  
            console.log(type);  
            @this.set('likeed',true);
            @this.set('agencyLikedId',id);
            @this.set('agencyLikedType',type);
        
      /*  }
            else{
            var idd= $(ele).data('agency_id');
            var typee= $(ele).data('type');
                console.log(false);
                console.log(id);  
            console.log(type);
            @this.set('likeed',false );
            @this.set('agencyLikedId',idd);
            @this.set('agencyLikedType',typee);
            }
        }*/
</script>
@endpush