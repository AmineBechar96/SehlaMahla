<div>

    @if ($discount)
    @if (count($coupons))

    <!-- table discount section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="headcpn">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0">Reduction</h4>

                        <a class="btn btn-success round float-right font-weight-bold"
                            href="{{url('provider/discounts')}}">
                            <i class="feather icon-plus"></i>Ajouter</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>SERVICE</th>
                                    <th>NOM</th>

                                    <th>CODE</th>
                                    <th>CLIENT</th>
                                    <th>STATUS</th>
                                    <th>UTILISE</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                <tr>
                                    <td>
                                        <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-placement="bottom" data-original-title="Trina Lynes"
                                                class="avatar pull-up mr-1">
                                                <img class="media-object rounded-circle"
                                                    src="{{$coupon->discount->service->service_image_url}}" alt="Avatar"
                                                    height="30" width="30">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-placement="bottom" data-original-title="Lilian Nenez"
                                                class="font-weight-bold">
                                                {{$coupon->discount->service->title}}
                                            </li>

                                        </ul>
                                    </td>
                                    <td> {{$coupon->discount->title}}</td>

                                    <td>
                                        {{$coupon->code}}
                                    </td>

                                    <td>

                                        {{$coupon->client->name}}


                                    </td>
                                    <td>

                                        @if ($coupon->status=="unused")
                                        <i class="bullet bullet-sm bullet-success mr-50"></i>{{$coupon->status}}
                                        @elseif($coupon->status=="used")
                                        <i class="bullet bullet-sm bullet-danger mr-50"></i>{{$coupon->status}}
                                        @else
                                        <i class="bullet bullet-sm bullet-warning mr-50"></i>{{$coupon->status}}
                                        @endif
                                    </td>
                                    <td>{{$coupon->using_date}}</td>


                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SERVICE</th>
                                    <th>NOM</th>

                                    <th>CODE</th>
                                    <th>CLIENT</th>
                                    <th>STATUS</th>
                                    <th>UTILISE</th>

                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- discount table section end  -->
    @else
    <!-- no discount section -->
    <section id="statistics-card">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="  p-50 m-0">
                            <div class="avatar-content">
                                <img class="round" src="../../../app-assets/images/icons/coupon.png" alt="avatar"
                                    height="40" width="40">
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1">0</h2>
                        <h5 class="mb-1">Vous avez pas de reduction !</h5>
                    </div>
                    <div class="card-content">

                        <p class="ml-2 mb-2"> Vous pouvez créez des reduction pour votre clients </p>
                        <div class="alert alert-success ml-2 mr-2 mb-2" role="alert">
                            <h4 class="alert-heading"><i class="feather icon-star mr-1 align-middle"></i>
                                Remarque</h4>
                            <span>
                                Les coupons peuvent <strong> attirer</strong> des clients vers votre
                                service,
                                stimuler l'engagement des clients existants et générer de nouveaux <strong>
                                    revenus</strong>.</span>
                        </div>
                        <button class="btn btn-primary round font-weight-bold ml-2 mb-1"
                            wire:click="addNew">Créer</button>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- // no coupon section end-->
    @endif
    @else
    <!-- maintenance -->
    <section class="row flexbox-container">
        <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-center">
            <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                <div class="card-content">
                    <div class="card-body text-center">
                        <img src="../../../app-assets/images/pages/not-authorized.png"
                            class="img-fluid align-self-center" alt="branding logo">
                        <h1 class="font-large-2 my-2">You are not authorized!</h1>
                        <p class="p-2">
                            paraphonic unassessable foramination Caulopteris worral Spirophyton encrimson esparcet
                            aggerate chondrule
                            restate whistler shallopy biosystematy area bertram plotting unstarting quarterstaff.
                        </p>
                        <a class="btn btn-primary btn-lg mt-2" href="index.html">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- maintenance end -->
    @endif



</div>