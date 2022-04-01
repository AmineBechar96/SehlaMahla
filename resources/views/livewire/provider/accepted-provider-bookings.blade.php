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
                        <a href="{{url('provider/'.$booking->id.'/booking')}}" class="mobile-space">
                            <img src="{{$booking->service->service_image_url}}" style="border-radius:50%" height="200"
                                width="200" alt="img-placeholder">
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="item-name">
                            <a href="{{url('provider/services-list')}}">{{$booking->title}}</a>
                            <span></span>
                            <p class="item-company">Pour <span class="company-name">{{$booking->service->title}}</span>
                            </p>
                            <p class="stock-status-in {{$booking->bookingStatusColor($booking->status)}}">
                                {{trans('bookings.'.$booking->status)}}</p>
                        </div>
                        <hr>
                        <div class="item-quantity">
                            <p class="quantity-title">Description</p>
                            <div class="input-group quantity-counter-wrapper">
                                <p class="ml-1 text-muted">{{$booking->description}}</p>
                            </div>
                        </div>

                        <p class="delivery-date" style="margin-top:1rem;"><i class="feather icon-calendar"></i> Réservé
                            pour le:
                            {{$booking->booking_date}}, {{ date('h:i A', strtotime($booking->booking_time))}} </p>
                        <p class="offers"><i class="feather icon-map-pin"></i> {{$booking->address}}</p>
                    </div>
                    <div class="item-options text-center">
                        <div class="item-wrapper">
                            <div class="item-rating">
                                <div class="badge badge-primary badge-md">
                                    {{number_format($booking->service->ratings->avg('number_of_starts'), 2, '.', '')}}
                                    <i class="feather icon-star ml-25"></i>
                                </div>
                            </div>
                            <div class="item-cost">
                                <h6 class="item-price">
                                    {{ucwords($booking->user->name)}}
                                </h6>
                                @if ($booking->lastBooking($booking->user_id,$booking->service_id ) >
                                1)
                                @if ($booking->is_reported($booking->user_id))
                                <p style="font-size:13px;" class="font-weight-bold shipping text-danger">
                                    <i class="feather icon-user"></i>
                                    Client Signalé
                                </p>
                                @else
                                <p style="font-size:13px;" class="font-weight-bold shipping text-success">
                                    <i class="feather icon-user"></i>
                                    Client Fidèle
                                </p>
                                @endif

                                @else
                                <p style="font-size:13px;" class="font-weight-bold shipping text-success">
                                    <i class="feather icon-user"></i>
                                    Nouveau Client
                                </p>

                                @endif
                            </div>
                        </div>
                        <div class="wishlist">
                            <a href="{{url('provider/chat')}} " class="text-dark"><i
                                    class="feather icon-message-circle align-middle"></i>
                                DISCUTER</a>
                        </div>
                        <div class="cartt bg-primary text-white " wire:click="start({{$booking->id}})">
                            <i class="feather icon-briefcase mr-25"></i> COMMENCER
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
                                    Vous aves aucun Réservation acceptée , notez qu'accepter plus rapidement peut aider
                                    à améliorer l'expérience du client


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
                                Reservations Accéptées
                            </div>
                            <div class="detail-amt">
                                {{$number_of_bookings_accepted}}
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
                            <div class="detail-title detail-total">Nombre de Clients</div>
                            <div class="detail-amt total-amt">{{$number_of_client}}</div>
                        </div>
                        <div class="btn btn-primary btn-block place-order"><a
                                href="{{url('provider/provider-analytics')}}" class="text-white"> VOIR PLUS</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Starting Booking request  Modal -->
    <div class="modal fade text-left" id="NotifyClient" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header  bg-transparent white"
                    style="border-radius:0.6rem 0.6rem 0px  0px !important; ">
                    <h5 class="modal-title text-success" id="myModalLabel120">Avis d'envois
                    </h5>

                </div>

                <div class="modal-body text-center">
                    <input type="hidden" name="service_id" id="service_id" value="">
                    <div class="text-center mb-2"> <i class="feather icon-bell text-success" style="font-size:4rem"></i>
                    </div>
                    <span class="text-primary font-weight-bold" id="serviceName"> Une notification a été envoyer a
                        {{ucwords($loaded_client_name_to_start)}}</span>
                    <p>une fois il accepte le service passera a l'execuction sinon la reservation sera annulée ,
                        vous pouvez le contacter pour plus d'information.
                </div>

                <div class="modal-footer justify-content-between mt-1">
                    <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal" style="padding: 0;
                          border: none;
                          background: none;"></button>
                    <button type="submit" class="text-primary font-weight-bold mr-1" style="padding: 0;
                      border: none;
                      background: none;" data-toggle="modal" data-target="#NotifyClient">COMPRIS</button>
                </div>

            </div>
        </div>
    </div>

</div>
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#bookdate", {
                altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
            });
            flatpickr("#booktime", {
                enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "00:00"
            });
        
</script>
@endsection