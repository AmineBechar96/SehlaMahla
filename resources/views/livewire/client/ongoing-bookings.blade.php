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
                            <p class="item-company">Type <span
                                    class="company-name">{{trans('types.'.$booking->service->type->name)}}</span></p>
                            <p class="stock-status-in text-primary">{{trans('bookings.'.$booking->status)}}</p>
                        </div>
                        <div class="item-quantity">
                            <p class="quantity-title"> <i class="feather icon-bookmark"></i>{{$booking->title}}</p>
                            <div class="input-group quantity-counter-wrapper">
                                <p class="ml-1 text-muted">{{$booking->description}}</p>
                            </div>
                        </div>
                        <p class="delivery-date"><i class="feather icon-calendar"></i> Réservé pour le:
                            {{$booking->booking_date}} à {{ date('h:i A', strtotime($booking->booking_time))}} </p>
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
                        <div class="wishlist " style="background-color: #f2f2f2;
                        color: #2c2c2c;" wire:click="loadDataToFinish({{$booking->id}})" data-toggle="modal"
                            data-target="#danger">
                            <a href="{{url('client/chat')}}" class="text-dark"><i
                                    class="feather icon-message-circle align-middle"></i> DISCUTER</a>
                        </div>
                        <div class="cartt bg-success" tyle="
                        color: #fff;" wire:click="loadDataToFinish({{$booking->id}})">
                            <i class="feather icon-check mr-25"></i> TERMINER
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
                                    Vous aves aucun Réservation En Cours , notez que vous pouvez toujours contacter les
                                    fournisseurs de services avec notre système de chat.

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
                                Reservations En Cours
                            </div>
                            <div class="detail-amt">
                                {{$number_of_bookings_ongoing}}
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

    <!--finish Booking Modal -->
    <div class="modal fade text-left" id="danger" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header  bg-transparent white"
                    style="border-radius:0.6rem 0.6rem 0px  0px !important; ">
                    <h5 class="modal-title text-primary" id="myModalLabel120">Terminer une reservation</h5>

                </div>

                <div class="modal-body text-center">

                    <div class="text-center mb-2"> <i class="feather icon-check-circle text-success"
                            style="font-size:4rem"></i></div>
                    Vous voulez Vraiment Terminer le service de <span class="text-primary font-weight-bold"
                        id="serviceName">{{$loaded_booking_service_to_finish}}</span>
                    <p>pour <span class="text-success">{{$loaded_booking_title_to_finish}}</span></p>
                </div>

                <div class="modal-footer justify-content-between mt-1">
                    <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal" style="padding: 0;
          border: none;
          background: none;">ANNULER</button>
                    <button type="submit" class="text-success font-weight-bold mr-1" style="padding: 0;
      border: none;
      background: none;" data-toggle="modal" data-target="#danger"
                        wire:click="finish({{$loaded_booking_id_to_finish}})">CONFIRMER</button>
                </div>

            </div>
        </div>
    </div>


    <!--greating  Modal -->
    <div class="modal fade text-left" id="danger2" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header  bg-transparent white"
                    style="border-radius:0.6rem 0.6rem 0px  0px !important; ">
                    Remerciement
                </div>

                <div class="modal-body text-center">

                    <div class="text-center mb-2"> <i class="fas fa-handshake text-success" style="font-size:4rem"></i>
                    </div>
                    Merci d'avoir Utiliser Nos Services Mr <span class="text-primary font-weight-bold"
                        id="serviceName">{{auth()->user()->name}}</span>

                </div>

                <div class="modal-footer justify-content-between mt-1">
                    <button type="button" class="text-danger font-weight-bold mr-1" style="padding: 0;
          border: none;
          background: none;"></button>
                    <button type="submit" class="text-success font-weight-bold mr-1" style="padding: 0;
      border: none;
      background: none;" data-toggle="modal" data-target="#danger2">FERMER</button>
                </div>

            </div>
        </div>
    </div>


    <!-- shippper modal -->
    <div class="modal fade" id="shippers" tabindex="-1" wire:ignore.self role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="mb-0 bg-transparent" style="border-bottom :1px solid #ededed">
                    <h5 class=" mt-2 text-center text-dark" id="exampleModalScrollableTitle"> <span class="text-center">
                            Livraison Proche</span>
                    </h5>
                </div>

                <div class="modal-body">

                    @if (!empty($shippers))


                    <div class="p-2" id="resultsection">

                        @forelse ($shippers as $shipper)

                        <div class="d-flex justify-content-between p-1 cursor-pointer rounded" id="resultline"
                            wire:click="redirectToShipper({{$shipper['serviceID']}})">

                            <div class="d-flex align-items-start">



                                <img src="{{$shipper['service_image_url']}}" class="round mr-1" width="40" height="40"
                                    alt="" srcset="">



                                <p class="font-weight-bold text-dark" style="margin-top:0.6rem">
                                    {{$shipper['title']}}
                                </p>
                            </div>
                            <div style="margin-top:0.5rem;">

                                @for ($i = 0; $i < $shipper['number_of_starts']; $i++) <i
                                    class="feather icon-star text-warning"></i>
                                    @endfor
                            </div>

                        </div>

                        @empty

                        @endforelse
                    </div>
                    @endif

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a class="text-primary font-weight-bold" wire:click="closeShipper"> FERMER</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Dashboard Analytics end -->
</div>
@section('scripts2')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#bookdate2", {
        altInput: true,
altFormat: "F j, Y",
dateFormat: "Y-m-d",
    });
    flatpickr("#booktime2", {
        enableTime: true,
noCalendar: true,
dateFormat: "H:i",
defaultDate: "00:00"
    });

</script>

@endsection