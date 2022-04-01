<div>
    <!-- Dashboard Analytics Start -->

    <section id="place-order" class="list-view product-checkout">


        <div class="checkout-items">
            <div class="row mb-1">

                <div class="col-12">
                    <div class="chat-fixed-search">

                        <div class="d-flex align-items-center">

                            <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                <input type="text" class="form-control round" name="searchPosition"
                                    wire:click="searchagency()" wire:model="search"
                                    placeholder="Rechercher une Reservation...">
                                <div class="form-control-position">
                                    <i class="feather icon-search"></i>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-between search-result-info mt-1 mb-1">
                <div class="col-sm-8 float-left">
                    <p class="mt-1 font-weight-bold">Total : {{$total}}</p>
                </div>
                <div class="col-sm-4 float-right text-sm-right">
                    <div class="btn-group">
                        <div class="dropdown">
                            <fieldset class="form-group">
                                <select class="custom-select" id="dateOfNews" wire:model="date">
                                    <option class="dropdown-item" value="any">Tous</option>
                                    <option class="dropdown-item" value="yesterday">Dernières 24 heures</option>
                                    <option class="dropdown-item" value="lastweek">Semaine Passée
                                    </option>
                                    <option class="dropdown-item" value="lastmonth">Mois Passé</option>
                                </select>
                            </fieldset>




                        </div>
                    </div>
                </div>
            </div>
            @if (count($bookings)>0)
            @foreach ($bookings as $booking)
            <div class="card ecommerce-card">
                <div class="card-content">
                    <div class="item-img text-center">
                        <a href="{{url('client/'.$booking->id.'/booking')}}" class="mobile-space">
                            <img src="{{$booking->service->service_image_url}}" style="border-radius:50%" height="200"
                                width="200" alt="img-placeholder">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="item-name">
                            <a
                                href="{{url('client/'.$booking->service->type->name.'/agency-details/'.$booking->service->id)}}">{{$booking->service->title}}</a>
                            <span></span>
                            <p class="item-company"><i class="feather icon-star"></i> <span
                                    class="company-name">{{trans('types.'.$booking->service->type->name)}}</span></p>
                            <p class="stock-status-in text-success">{{trans('bookings.'.$booking->status)}}</p>
                        </div>
                        <div class="item-quantity">
                            <p class="quantity-title"> <i class="feather icon-bookmark"></i>{{$booking->title}}</p>
                            <div class="input-group quantity-counter-wrapper">
                                <p class="ml-1 text-muted">{{$booking->description}}</p>
                            </div>
                        </div>
                        <p class="delivery-date"><i class="feather icon-calendar"></i> Réservé pour le:
                            {{$booking->booking_date}}, {{ date('h:i A', strtotime($booking->booking_time))}} </p>
                        <p class="offers"><i class="feather icon-map-pin"></i> {{$booking->address}}</p>
                    </div>
                    <div class="item-options text-center">
                        <div class="item-wrapper">
                            <div class="item-rating">
                                <div
                                    class="badge {{$booking->is_reported($booking->service->user_id) ? 'badge-danger' : 'badge-primary'}} badge-md">
                                    {{number_format($booking->service->ratings->avg('number_of_starts'), 2, '.', '')}}
                                    <i class="feather icon-star ml-25"></i>
                                </div>
                            </div>
                            <div class="item-cost">
                                <h6 class="item-price">
                                    {{$booking->service->commune->name}}
                                </h6>
                                <p class="shipping">
                                    <i class="feather icon-shopping-cart"></i> @if ($booking->service->shipping)
                                    Avec Livraison
                                    @else
                                    Pas de Livraison
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="wishlist" style="color:#2c2c2c; background:#f6f6f6;">
                            <a href="{{url('client/'.$booking->service->type->name.'/agency-details/'.$booking->service->id)}}"
                                style="color:#2c2c2c"><i class="feather icon-star align-middle"></i> Donner Avis</a>


                        </div>
                        <div class="cartt bg-danger" style="color:#fff;">
                            <a href="" wire:click.prevent="showReportModal({{$booking->id}})" style="color:#fff"><i
                                    class="feather icon-alert-circle mr-25"></i> SIGNALER </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="d-flex justify-content-center align-items-center mt-1 mb-1 ">
                {{$bookings->links()}}
            </div>

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
                                    Vous aves aucun Réservation Terminée ,notez que pour chaque service terminé avec
                                    succès, vous obtenez plus de points


                                </p>
                                <a href="{{url()->previous()}}" class="btn btn-primary"> <i
                                        class="feather icon-arrow-left"></i> RETOUR</a>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- error 404 end -->
            @endif
        </div>
        <div class="checkout-options ">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <p class="options-title">Activité</p>
                        <div class="coupons">
                            <div class="coupons-title">
                                <p>Badge</p>
                            </div>
                            <div class="apply-coupon">
                                <div class=" d-flex mt-0" title="Platinium">
                                    <img src="../../../app-assets/images/icons/{{$badge_color}}.png" class="" width="40"
                                        height="40" alt="">

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="price-details">
                            <p>Reservation Détails</p>
                        </div>
                        <div class="detail">
                            <div class="detail-title">
                                Nombre de Services
                            </div>
                            <div class="detail-amt">
                                {{$number_of_services}}
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-title">
                                Nombre de Reservations
                            </div>
                            <div class="detail-amt discount-amt">
                                {{$number_of_bookings}}
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-title">
                                Reservations Terminées
                            </div>
                            <div class="detail-amt">
                                {{$number_of_bookings_completed}}
                            </div>
                        </div>

                        <div class="detail">
                            <div class="detail-title">
                                Nombre de Points
                            </div>
                            <div class="detail-amt discount-amt">
                                {{auth()->user()->points->number_of_points}}
                            </div>
                        </div>
                        <hr>
                        <div class="detail">
                            <div class="detail-title detail-total">Nombre de Communes</div>
                            <div class="detail-amt total-amt">{{$number_of_communes}}</div>
                        </div>
                        <div class="btn btn-primary btn-block place-order"> <a href="{{url('client/client-analytics')}}"
                                class="text-white"></a> VOIR PLUS</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="report" tabindex="-1" wire:ignore.self role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="mb-0 bg-transparent" style="border-bottom :1px solid #ededed">
                    <h5 class=" mt-2 text-center text-dark" id="exampleModalScrollableTitle"> <span class="text-center">
                            <i class="feather icon-alert-circle"></i> Signaler un Client</span>
                    </h5>
                </div>

                <div class="modal-body text-center" x-data="{isOpen:false}">
                    <form wire:submit.prevent="report" method="POST">
                        @csrf
                        <h5 class="text-dark  mb-1 mt-1 text-left">Decrire le cause de votre signal</h5>
                        <fieldset class="mb-1  text-center">

                            <div class="vs-radio-con vs-radio-warning">
                                <input type="radio" wire:model="description" @click="isOpen=false" name="radiocolor"
                                    value="1">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-1 font-weight-bold text-dark">
                                    mauvaise qualité du produit ou du service</span>
                            </div>
                        </fieldset>

                        <fieldset class="mb-1 text-center">

                            <div class="vs-radio-con vs-radio-warning">
                                <input type="radio" wire:model="description" @click="isOpen=false" name="radiocolor"
                                    value="2">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-1 font-weight-bold text-dark">comportement inapproprié du Service
                                </span>
                            </div>
                        </fieldset>
                        <fieldset class="mb-1 mt-1 text-center">

                            <div class="vs-radio-con vs-radio-warning">
                                <input type="radio" wire:model="description" @click="isOpen=false" name="radiocolor"
                                    value="3">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-1 font-weight-bold text-dark">accord préalable non respecté


                                </span>
                            </div>
                        </fieldset>
                        <fieldset class="mb-1 text-center">

                            <div class="vs-radio-con vs-radio-warning">
                                <input type="radio" @click="isOpen=true" name="radiocolor" value="">
                                <span class="vs-radio">
                                    <span class="vs-radio--border"></span>
                                    <span class="vs-radio--circle"></span>
                                </span>
                                <span class="ml-1 font-weight-bold text-dark">autre</span>
                            </div>
                        </fieldset>
                        <fieldset class="form-label-group" x-show="isOpen">
                            <textarea class="form-control" wire:model="description" name="review" id="label-textarea"
                                rows="7" style="resize: none;" placeholder="Label in Textarea"></textarea>
                            <label for="label-textarea">Donner Avis</label>
                            @error('description')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </fieldset>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-danger rounded font-weight-bold ml-1" style="border-radius:40px ! important;"
                        data-toggle="modal" data-target="#report">
                        ANNULER</button>
                    <button type="submit" data-toggle="modal" data-target="#report"
                        class="btn btn-primary rounded font-weight-bold mr-1" style="border-radius:40px ! important;">
                        TERMINER</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Dashboard Analytics end -->
</div>