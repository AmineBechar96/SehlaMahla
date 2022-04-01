<div>

    <!-- Checkout Customer Address Starts -->
    @if (!is_null($notif_type))
    <fieldset class="checkout-step-2 px-0">
        <section id="checkout-address" class="list-view product-checkout">
            <div class="card">
                <div class="card-header flex-column align-items-start">
                    <h3 class="card-title">{{$booking->title}} </h3>
                    <p class="{{$booking->bookingStatusColor($booking->status)}} font-weight-bold mt-25"><i
                            class="feather icon-activity mr-1"></i>{{trans('bookings.'.$booking->status)}}
                    </p>
                    <div class="d-flex justify-items-between mt-1">
                        <img src="{{$booking->service->service_image_url}}" style="border-radius:50%" width="50"
                            height="50" alt="" srcset="">
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
                                <div class="btn btn-warning delivery-address float-right"
                                    wire:click="accept({{$booking->id}})">
                                    <i class="feather icon-check"></i> ACCEPTER
                                </div>
                            </div>
                            @elseif( $booking->status=="accepted")
                            <div class="col-sm-6 offset-md-6 mt-3">
                                <div class="btn btn-primary delivery-address float-right">
                                    <i class="feather icon-message-circle"></i> DISCUTER
                                </div>
                            </div>
                            @elseif( $booking->status=="accepted")
                            <div class="col-sm-6 offset-md-6 mt-3">
                                <div class="btn btn-primary delivery-address float-right">
                                    <i class="feather icon-message-circle"></i> DISCUTER
                                </div>
                            </div>
                            @elseif( $booking->status=="pending")
                            <div class="col-sm-6 d-flex justify-content-between offset-md-6 mt-3">

                                <div class="btn btn-danger delivery-address float-right" data-toggle="modal"
                                    data-target="#danger2">
                                    <i class="feather icon-x-circle"></i> REJECTER
                                </div>
                                <div class="btn btn-primary delivery-address float-right"
                                    wire:click="accept({{$booking->id}})">
                                    <i class="feather icon-check-circle"></i> ACCEPTER
                                </div>
                            </div>
                            @elseif( $booking->status=="ongoing")
                            <div class="col-sm-6 offset-md-6 mt-3">
                                <div class="btn btn-primary delivery-address float-right">
                                    <i class="feather icon-message-circle"></i> DISCUTER
                                </div>
                            </div>
                            @elseif( $booking->status=="completed")
                            <div class="col-sm-6 d-flex justify-content-between offset-md-6 mt-3">

                                <div class="btn btn-primary delivery-address float-right">
                                    <i class="feather icon-message-circle"></i> DISCUTER
                                </div>

                                <div class="btn btn-warning delivery-address float-right">
                                    <a href="{{url()->previous()}}" class="text-white"> <i
                                            class="feather icon-arrow-left"></i> RETOUR</a>
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
                        <h4 class="card-title">{{$booking->user->name}} </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body actions">
                            <p class="mb-0"><i class="feather icon-tag mr-1"></i>{{$booking->service->commune->name}} ,
                                {{$booking->service->commune->wilaya->name_en}} , Algerie</p>
                            <p><i class="feather icon-map-pin mr-1"></i>A {{$booking->address}}</p>
                            @if ($booking->lastBooking($booking->user_id,$booking->service_id ) >
                            1)
                            @if ($booking->is_reported($booking->user_id))
                            <p class="shipping text-danger">
                                <i class="feather icon-user"></i>
                                Client Signalé
                            </p>
                            @else
                            <p class="shipping text-success">
                                <i class="feather icon-user"></i>
                                Client Fidèle
                            </p>
                            @endif

                            @else
                            <p class="shipping text-success">
                                <i class="feather icon-user"></i>
                                Nouveau Client
                            </p>

                            @endif

                            <p><i class="feather icon-calendar mr-1"></i>{{$booking->user->created_at}}
                            </p>
                            <hr>
                            <div class="btn btn-primary btn-block delivery-address"><a style="color:white"
                                    href="{{url('provider/users-list')}}"><i class="feather icon-eye "></i> VOIR LISTE
                                    DE
                                    CLIENTS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </fieldset>
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

                        <a class="btn btn-primary  mt-2" href="{{url('provider/dashboard')}}">RETOUR</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- error 404 end -->

    @endif


    <!-- Checkout Customer Address Ends -->


    <!--Reject Booking Modal -->
    <div class="modal fade text-left" id="danger2" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header  bg-transparent white"
                    style="border-radius:0.6rem 0.6rem 0px  0px !important; ">
                    <h5 class="modal-title text-danger" id="myModalLabel120">Réjécter une reservation</h5>

                </div>

                <div class="modal-body text-center">
                    <input type="hidden" name="service_id" id="service_id" value="">
                    <div class="text-center mb-2"> <i class="feather icon-x-circle text-danger"
                            style="font-size:4rem"></i></div>
                    Vous Voulez Vraiment réfuser la <span class="text-primary font-weight-bold"
                        id="serviceName">{{$booking->title}}</span>
                    <p>de <span class="text-success">{{ucwords($booking->user->name)}}</span></p>
                </div>

                <div class="modal-footer justify-content-between mt-1">
                    <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal" style="padding: 0;
                      border: none;
                      background: none;">ANNULER</button>
                    <button type="submit" class="text-primary font-weight-bold mr-1" style="padding: 0;
                  border: none;
                  background: none;" data-toggle="modal" data-target="#danger"
                        wire:click="reject({{$booking->id}})">CONFIRMER</button>
                </div>

            </div>
        </div>
    </div>
    <!--Accepting the  Booking request  Modal -->
    <div class="modal fade text-left" id="NotifyClientAcceptPendingFromNotification" wire:ignore.self tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header  bg-transparent white"
                    style="border-radius:0.6rem 0.6rem 0px  0px !important; ">
                    <h5 class="modal-title text-success" id="myModalLabel120">Prochaine Etape
                    </h5>

                </div>

                <div class="modal-body text-center">
                    <input type="hidden" name="service_id" id="service_id" value="">
                    <div class="text-center mb-2"> <i class="feather icon-bell text-success" style="font-size:4rem"></i>
                    </div>
                    <span class="text-primary font-weight-bold" id="serviceName"> Une notification a été envoyer a
                        {{ucwords($booking->user->name)}}</span>
                    <p>Vous pouvez mainentant discuter avec votre client et negociez les details de sa demande
                </div>

                <div class="modal-footer justify-content-between mt-1">
                    <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal" style="padding: 0;
                                  border: none;
                                  background: none;"></button>
                    <button type="submit" class="text-primary font-weight-bold mr-1" style="padding: 0;
                              border: none;
                              background: none;" data-toggle="modal"
                        data-target="#NotifyClientAcceptPendingFromNotification">COMPRIS</button>
                </div>

            </div>
        </div>
    </div>
</div>