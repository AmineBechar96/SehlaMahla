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
                            <p class="stock-status-in text-warning">{{trans('bookings.'.$booking->status)}}</p>
                        </div>
                        <hr>
                        <div class="item-quantity">
                            <p class="quantity-title"> <i class="feather icon-bookmark"></i>{{$booking->title}}</p>
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
                        <div class="wishlist" style="background:#f6f6f6; color:#2c2c2c"
                            wire:click="loadDataToCancel({{$booking->id}})">
                            <i class="feather icon-x align-middle"></i> ANNULER
                        </div>
                        <div class="cartt" wire:click="loadData({{$booking->id}})">
                            <i class="feather icon-edit mr-25"></i> MODIFIER
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
                                    Vous aves aucun Réservation En Attente , notez que vous pouvez bénéficier de
                                    réductions et de coupons auprès de fournisseurs de services



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
                                Reservations En Attentes
                            </div>
                            <div class="detail-amt">
                                {{$number_of_bookings_pending}}
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
                                class="text-white">VOIR PLUS</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Cancel Booking Modal -->
    <div class="modal fade text-left" id="danger" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header  bg-transparent white "
                    style="border-radius:0.6rem 0.6rem 0px  0px !important;">
                    <h5 class="modal-title text-danger" id="myModalLabel120">Annuler une reservation</h5>

                </div>

                <div class="modal-body text-center">
                    <input type="hidden" name="service_id" id="service_id" value="">
                    <div class="text-center mb-2"> <i class="feather icon-x-circle text-danger"
                            style="font-size:4rem"></i></div>
                    Vous Voulez Vraiment Annulez le <span class="text-primary font-weight-bold"
                        id="serviceName">{{$loaded_booking_service_to_cancel}}</span>
                    <p>pour <span class="text-success">{{$loaded_booking_title_to_cancel}}</span></p>
                </div>

                <div class="modal-footer justify-content-between mt-1">
                    <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal" style="padding: 0;
                  border: none;
                  background: none;">ANNULER</button>
                    <button type="submit" class="text-primary font-weight-bold mr-1" style="padding: 0;
              border: none;
              background: none;" data-toggle="modal" data-target="#danger"
                        wire:click="cancel({{$loaded_booking_id_to_cancel}})">CONFIRMER</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Edit Booking Modal -->
    <div class="modal fade text-left" id="composeForm" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="emailCompose" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header  bg-transparent text-center" style="display:block;">
                    <h3 class="modal-title text-warning text-text-bold-200" id="emailCompose">
                        <span class="text-warning">Modifier une Reservation</span></h3>

                </div>
                <div class="modal-body pt-1" x-data="{ open: @entangle('open') }">
                    <form wire:submit.prevent="updateBooking({{$loaded_booking_id}})" method="POST">
                        @csrf
                        <p for="radiocolor" class="mb-1 font-weight-bold" style="font-size:0.85rem;"> Quel est le
                            Titre de Votre
                            Reservation ?</p>

                        <div class="form-label-group mt-1">

                            <input type="text" id="emailTo" class="form-control" wire:model="booking_title"
                                placeholder="Titre" name="booking_title">
                            @error('booking_title')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                            <div class="form-control-position">
                                <i class="feather icon-bookmark"></i>
                            </div>
                            <label for="emailTo">Titre</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="emailSubject" class="form-control" wire:model="booking_address"
                                placeholder="Adresse" name="booking_addresse">
                            @error('booking_address')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                            <div class="form-control-position">
                                <i class="feather icon-home"></i>
                            </div>
                            <label for="emailSubject">Addresse</label>
                        </div>
                        <label for="radiocolor" class="mb-1 font-weight-bold"> Quand vous voulez cette service
                            ?</label>
                        <ul class="list-unstyled ">
                            <li class="d-inline-block mr-2">

                                <fieldset>
                                    <div class="vs-radio-con vs-radio-warning">
                                        <input id="same" type="radio" @click="open = false" wire:model="aboutDate"
                                            name="radiocolor" value="same" checked>

                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="">Mème Date</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="d-inline-block">
                                <fieldset>
                                    <div class="vs-radio-con vs-radio-warning">
                                        <input type="radio" id="change" wire:model="aboutDate" @click="open = true"
                                            name="radiocolor" value="change">
                                        <span class="vs-radio">
                                            <span class="vs-radio--border"></span>
                                            <span class="vs-radio--circle"></span>
                                        </span>
                                        <span class="">Changer la Date
                                        </span>
                                    </div>
                                </fieldset>
                            </li>
                            @error('aboutDate')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </ul>

                        <div class="form-label-group mt-1" wire:ignore x-show="open"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:leave="transition ease-in duration-300" id="bookDate">

                            <input id="bookdate" wire:model.lazy="booking_date" name="booking_date" class="form-control"
                                type="text" placeholder="Choisissez une Date">
                            <div class="form-control-position">

                            </div>

                        </div>
                        @error('booking_date')
                        <span class="text-danger mb-1" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                        <div class="form-label-group" x-show="open"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:leave="transition ease-in duration-300" id="bookTime">

                            <input type="text" id="booktime" wire:model.lazy="booking_time" name="booking_time"
                                class="form-control" type="text" placeholder="Choisissez le Temps">
                            <div class="form-control-position">
                                <i class="feather icon-clock"></i>
                            </div>
                            @error('booking_time')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror

                        </div>




                        <fieldset class="form-label-group mt-1">
                            <textarea class="form-control" name="booking_description" id="label-textarea" rows="4"
                                style="resize: none;" wire:model="booking_description"
                                placeholder="Decrire Votre Demande"></textarea>
                            @error('booking_description')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                            <label for="label-textarea">Decrire Votre Demande</label>
                        </fieldset>

                </div>
                <div class="modal-footer justify-content-between">
                    <button class="text-primary font-weight-bold ml-1" data-dismiss="modal" style="padding: 0;
                border: none;
                background: none;">ANNULER</button>
                    <button style="padding: 0;
                    border: none;
                    background: none;" type="submit" class="text-danger font-weight-bold mr-1">TERMINER</button>

                </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Dashboard Analytics end -->
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