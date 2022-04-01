<div>
    @if (! is_null($notif_type))
    <fieldset class="checkout-step-2 px-0">
        <section id="checkout-address" class="list-view product-checkout">
            <div class="card">
                <div class="card-header flex-column align-items-start">
                    <h3 class="card-title">{{$coupon->discount->title}} </h3>
                    <p class="text-success mt-25"><i class="feather icon-activity mr-1"></i>{{$coupon->status}}</p>
                    <div class="d-flex justify-items-between mt-1">
                        <img src="{{$coupon->discount->service->service_image_url}}" class="round" width="50"
                            height="50" alt="" srcset="">
                        <p class="text-muted" style="margin-top:15px; margin-left:5px;">
                            {{$coupon->discount->service->title}}</p>
                    </div>





                </div>
                <hr>
                <span class="ml-auto pr-1"><i class="feather icon-calendar mr-1"></i>{{$coupon->created_at}}</span>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <h6>Description</h6>
                                <p>{{$coupon->code}}</p>
                            </div>


                            <div class="col-md-12 col-sm-12 mt-2">

                                <h6>Valide jusqu'a Date</h6>
                                <p> <i class="feather icon-calendar mr-1"></i>{{$coupon->discount->valid_until}}</p>
                            </div>




                            <div class="col-sm-6 d-flex justify-content-between offset-md-6 mt-3">
                                <div class="btn btn-outline-primary delivery-address float-left" data-toggle="modal"
                                    data-target="#composeForm">
                                    <i class="feather icon-arrow-left"></i> VOIR TOUT
                                </div>
                                @if( $coupon->status=="unused")
                                <div class="btn btn-success delivery-address float-right" id="code"
                                    data-clipboard-text="{{$coupon->code}}">
                                    <i class="feather icon-copy"></i> COPIER CODE
                                </div>
                                @elseif( $coupon->status=="used")
                                <div class="btn btn-warning delivery-address float-right"><a class="text-white"
                                        href="{{url('client/'.$coupon->service->type->name.'/agency-details/'.$coupon->service->id)}}">
                                        <i class="feather icon-eye"></i> CONSULTER</a>
                                </div>
                                @endif
                            </div>






                        </div>
                    </div>
                </div>
            </div>
            <div class="customer-card">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$coupon->discount->service->title}} </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body actions">
                            <p class="mb-0"><i
                                    class="feather icon-tag mr-1"></i>{{$coupon->discount->service->commune->name}} ,
                                {{$coupon->discount->service->commune->wilaya->name_en}} , Algerie</p>
                            <p><i class="feather icon-map-pin mr-1"></i>{{$coupon->discount->service->address}}</p>
                            <p><i
                                    class="feather icon-star mr-1"></i>{{trans('types.'.$coupon->discount->service->type->name)}}
                            </p>
                            <p><i class="feather icon-calendar mr-1"></i>{{$coupon->discount->service->created_at}}
                            </p>
                            <hr>
                            <div class="btn btn-primary btn-block delivery-address"><a style="color:white"
                                    href="{{url('client/'.$coupon->discount->service->type->name.'/agency-details/'.$coupon->discount->service->id)}}"><i
                                        class="feather icon-eye "></i> CONSULTER</a>
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
                        <p class="p-2">
                            paraphonic unassessable foramination Caulopteris worral Spirophyton encrimson esparcet
                            aggerate chondrule
                            restate whistler shallopy biosystematy area bertram plotting unstarting quarterstaff.
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