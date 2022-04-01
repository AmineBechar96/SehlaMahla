<div>
    <!-- Checkout Customer Address Starts -->
    @if (! is_null($notif_type) and isset($booking))

    <fieldset class="checkout-step-2 px-0">
        <section id="checkout-address" class="list-view product-checkout">
            <div class="card">
                <div class="card-header flex-column align-items-start">
                    <h3 class="card-title">{{$booking->title}} </h3>
                    <p class="{{$booking->bookingStatusColor($booking->status)}} font-weight-bold mt-25"><i
                            class="feather icon-activity mr-1"></i>{{trans('bookings.'.$booking->status)}}
                    </p>
                    <div class="d-flex justify-items-between mt-1">
                        <img src="{{$booking->service->service_image_url}}" style="border-radius:50%" class="round"
                            width="50" height="50" alt="" srcset="">
                        <p class="text-muted" style="margin-top:15px; margin-left:5px;">
                            {{$booking->service->title}}</p>
                    </div>





                </div>
                <hr>
                <span class="ml-auto pr-1"><i class="feather icon-calendar mr-1"></i>{{$booking->created_at}}</span>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h6>Description</h6>
                                <p>{{$booking->description}}</p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <h6>Addresse</h6>
                                <p> <i class="feather icon-map-pin mr-1"></i>{{$booking->address}}</p>
                            </div>

                            <div class="col-md-6 col-sm-12 mt-2">

                                <h6>Date</h6>
                                <p> <i class="feather icon-calendar mr-1"></i>{{$booking->booking_date}}</p>
                            </div>
                            <div class="col-md-6 col-sm-12 mt-2">

                                <h6>Temps</h6>
                                <p> <i
                                        class="feather icon-clock mr-1"></i>{{ date('h:i A', strtotime($booking->booking_time))}}
                                </p>
                            </div>


                            @if ($booking->status=="rejected")
                            <div class="col-sm-6 offset-md-6 mt-3">
                                <div class="btn btn-warning delivery-address float-right">
                                    <i class="feather icon-clipboard"></i> RESERVER
                                </div>
                            </div>
                            @elseif( $booking->status=="accepted" and
                            $notif_type=="App\Notifications\Client\BookingHasBeenAccepted")
                            <div class="col-sm-6 d-flex justify-content-between offset-md-6 mt-3">
                                <div class="btn btn-primary delivery-address float-right" data-toggle="modal"
                                    data-target="#composeForm">
                                    <i class="feather icon-calendar"></i> REPLANIFIER
                                </div>
                                <div class="btn btn-outline-primary delivery-address float-right">
                                    <a href="{{url('client/chat')}}"><i class="feather icon-message-circle"></i>
                                        DISCUTER</a>
                                </div>

                            </div>
                            @elseif( $booking->status=="completed")

                            <div class="col-sm-6 offset-md-6 mt-3">
                                <div class="btn btn-warning delivery-address float-right"><a class="text-white"
                                        href="{{url('client/'.$booking->service->type->name.'/agency-details/'.$booking->service->id)}}">
                                        <i class="feather icon-eye"></i> CONSULTER</a>
                                </div>


                            </div>
                            @elseif( $booking->status=="accepted" and
                            $notif_type=="App\Notifications\Client\BookingHasBeenStarted")
                            <div class="col-sm-6 d-flex justify-content-between offset-md-6 mt-3">
                                <div class="btn btn-warning delivery-address float-right"
                                    wire:click="start({{$booking->id}})">
                                    <i class="feather icon-thumbs-up"></i> D'ACCORDS
                                </div>
                                <div class="btn btn-outline-primary delivery-address float-right">
                                    <a href="{{url('client/chat')}}"> <i class="feather icon-message-circle"></i>
                                        DISCUTER</a>
                                </div>

                            </div>
                            @elseif( $booking->status=="ongoing" and
                            $notif_type=="App\Notifications\Client\BookingHasBeenFinished" )
                            <div class="col-sm-6 d-flex justify-content-between offset-md-6 mt-3">
                                <div class="btn btn-primary delivery-address float-right">
                                    <a href="{{url('client/chat')}}" class="text-white"> <i
                                            class="feather icon-message-circle"></i> DISCUTER</a>
                                </div>
                                <div class="btn btn-success delivery-address float-right"
                                    wire:click="finish({{$booking->id}})">
                                    <i class="feather icon-check"></i> TERMINER
                                </div>
                            </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <div class="customer-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$booking->service->title}} </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body actions">
                            <p class="mb-0"><i class="feather icon-tag mr-1"></i>{{$booking->service->commune->name}} ,
                                {{$booking->service->commune->wilaya->name_en}} , Algerie</p>
                            <p><i class="feather icon-map-pin mr-1"></i>{{$booking->service->address}}</p>
                            <p><i class="feather icon-star mr-1"></i>{{trans('types.'.$booking->service->type->name)}}
                            </p>
                            <p><i class="feather icon-calendar mr-1"></i>{{$booking->service->created_at}}
                            </p>
                            <hr>
                            <div class="btn btn-primary btn-block delivery-address"><a style="color:white"
                                    href="{{url('client/'.$booking->service->type->name.'/agency-details/'.$booking->service->id)}}"><i
                                        class="feather icon-eye "></i> CONSULTER</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </fieldset>
    <!-- Edit Booking Modal -->
    <div class="modal fade text-left" id="composeForm" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="emailCompose" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header  bg-transparent">
                    <h3 class="modal-title text-warning text-text-bold-600" id="emailCompose">
                        <span class="text-primary">Replanifier une Reservation</span></h3>

                </div>
                <div class="modal-body pt-1">
                    <div class="text-center mb-2"> <i class="feather icon-calendar text-primary"
                            style="font-size:4rem"></i></div>
                    <form wire:submit.prevent="updateBooking({{$booking->id}})" method="POST">

                        @csrf

                        <div class="form-label-group mt-1" wire:ignore id="bookDate">
                            <input id="dateN" wire:model.lazy="booking_date" name="booking_date" class="form-control"
                                type="text" placeholder="Choisissez une Date">
                            <div class="form-control-position">
                                <i class="feather icon-calendar"></i>
                            </div>

                        </div>
                        @error('booking_date')
                        <span class="text-danger mb-1" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                        <div class="form-label-group" id="bookTime">

                            <input type="text" id="timeN" wire:model.lazy="booking_time" name="booking_time"
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

                </div>
                <div class="modal-footer justify-content-between">
                    <button class="text-danger font-weight-bold ml-1" data-dismiss="modal" style="padding: 0;
                    border: none;
                    background: none;">ANNULER</button>
                    <button style="padding: 0;
                        border: none;
                        background: none;" type="submit" class="text-primary font-weight-bold mr-1">TERMINER</button>

                </div>
                </form>

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

    <!--greating  Modal -->
    <div class="modal fade text-left" id="danger22" wire:ignore.self tabindex="-1" role="dialog"
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
      background: none;" data-toggle="modal" data-target="#danger22">FERMER</button>
                </div>

            </div>
        </div>
    </div>
    <!-- Dashboard Analytics end -->
    @else
    <!-- error 404 -->
    <section class="row flexbox-container">
        <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-center">
            <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                <div class="card-content">
                    <div class="card-body text-center">
                        <img src="../../../app-assets/images/pages/404.png" class="img-fluid align-self-center"
                            alt="branding logo">
                        <h1 class="font-large-2 my-1">404 - Page Not Found!</h1>
                        <p class="p-2">

                        </p>
                        <a class="btn btn-primary  mt-2" href="{{url('client/dashboard')}}">RETOUR</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- error 404 end -->
    @endif




</div>
@section('scripts4')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#dateN", {
            altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
        });
        flatpickr("#timeN", {
            enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    defaultDate: "00:00"
        });
    
</script>

@endsection