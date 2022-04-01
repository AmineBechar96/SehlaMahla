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
            <!-- Ecommerce Products Ends -->
            <section id="ecommerce-products" class="grid-view">

                @foreach ($agencies as $agency)
                <div class="card ecommerce-card">
                    <div class="card-content" id="prod1">
                        <div class="item-img text-center">
                            <a href="agency-details/{{$agency->ID}}">
                                <img class="img-fluid" src="../../../app-assets/images/pages/location/44.jpg"
                                    alt="img-placeholder"></a>
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
                            <div class="wishlist">
                                <i class="fa fa-heart-o"></i>
                                <span>Wishlist</span>
                            </div>
                            <div class="cart">
                                <i class="feather icon-shopping-cart"></i>
                                <span class="add-to-cart">Add
                                    to cart</span> <a href="app-ecommerce-checkout.html"
                                    class="view-in-cart d-none">View
                                    In Cart</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach



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
                                <h6 class="filter-title mb-0">Slider</h6>
                            </div>
                            <div class="price-slider">
                                <div class="price_slider_amount mb-2">
                                </div>
                                <div class="form-group">
                                    <div class="slider-sm my-1 range-slider" id="price-slider">
                                    </div>
                                </div>
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

    <!-- Modal -->
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
                                                        {{$address->name}},&nbsp;{{$address->wilaya->name_en}},&nbsp;</span>
                                                    Algerie</p>
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

@endpush