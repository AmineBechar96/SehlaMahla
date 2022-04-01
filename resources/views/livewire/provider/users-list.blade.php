<div>
    <div id="user-profile">

        <section id="profile-info">
            <div class="row ">

                <div class="col-lg-12 col-12">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Clients</h4>
                            <i class="feather icon-more-horizontal cursor-pointer"></i>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs justify-content-start" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab-end" data-toggle="tab"
                                        href="#home-align-end" aria-controls="home-align-end" role="tab"
                                        aria-selected="false"><i class="feather icon-users"></i>
                                        Abonnées &nbsp;{{count($users)}} </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="service-tab-end" data-toggle="tab" href="#service-align-end"
                                        aria-controls="service-align-end" role="tab" aria-selected="false"><i
                                            class="feather icon-heart"></i>
                                        Favoris &nbsp;{{count($likers)}} </a>
                                </li>

                                <!--li class="nav-item">
                                    <a class="nav-link" id="account-tab-end" data-toggle="tab" href="#account-align-end"
                                        aria-controls="account-align-end" role="tab" aria-selected="false"><i
                                            class="feather icon-activity"></i>
                                        Statistiques</a>
                                </li-->
                            </ul>
                            <div class="tab-content match-height">
                                <div class="tab-pane active" id="home-align-end" aria-labelledby="home-tab-end"
                                    role="tabpanel">
                                    <div class="row mt-3">
                                        @foreach ($users as $user)
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar mr-50">
                                                    <img src="../../../app-assets/images/icons/client3.png"
                                                        alt="avtar img holder" height="35" width="35">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0">{{ucwords($user->name)}}</h6>
                                                    <span class="font-small-2">{{$user->title}}</span>
                                                </div>
                                                @if ($user->checkUser($user->serviceID,$user->id))
                                                <button type="button" class="btn btn-secondary btn-icon ml-auto"
                                                    disabled><i class="feather icon-user-check"></i></button>
                                                @else
                                                <button type="button"
                                                    wire:click="addClient({{$user->serviceID}},{{$user->id}},'subscriber')"
                                                    class="btn btn-outline-primary btn-icon ml-auto"><i
                                                        class="feather icon-user-plus"></i></button>

                                                @endif

                                            </div>
                                        </div>
                                        @endforeach


                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-12 text-center">
                                            <button type="button" wire:click="loadUsers"
                                                class="btn btn-primary block-element mb-1">Load
                                                More</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane" id="service-align-end" aria-labelledby="service-tab-end"
                                    role="tabpanel">
                                    <div class="row mt-3">
                                        @foreach ($likers as $liker)
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar mr-50">
                                                    <img src="../../../app-assets/images/icons/client3.png"
                                                        alt="avtar img holder" height="35" width="35">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0">{{ucwords($liker->name)}}</h6>
                                                    <span class="font-small-2">{{$liker->title}}</span>
                                                </div>
                                                @if ($user->checkUser($liker->serviceID,$user->id))
                                                <button type="button" class="btn btn-secondary btn-icon ml-auto"
                                                    disabled><i class="feather icon-user-check"></i></button>
                                                @else
                                                <button type="button"
                                                    wire:click="addClient({{$liker->serviceID}},{{$liker->id}},'liker')"
                                                    class="btn btn-outline-primary btn-icon ml-auto"><i
                                                        class="feather icon-user-plus"></i></button>

                                                @endif
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-12 text-center">
                                            <button type="button" wire:click="loadLikers"
                                                class="btn btn-primary block-element mb-1">Load
                                                More</button>
                                        </div>
                                    </div>

                                </div>
                                <!--div class="tab-pane" id="account-align-end" aria-labelledby="account-tab-end"
                                    role="tabpanel">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Polls</h4>
                                        </div>
                                        <div class="card-body">
                                            <h6>Who is the best actor in Marvel Cinematic Universe?</h6>
                                            <div class="polls-info mt-1">
                                                <div class="d-flex justify-content-between">
                                                    <div class="vs-radio-con vs-radio-primary">
                                                        <input type="radio" name="vueradio" value="false">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">RDJ</span>
                                                    </div>
                                                    <div class="text-right">58%</div>
                                                </div>
                                                <div class="progress progress-bar-primary my-50">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="58"
                                                        aria-valuemin="58" aria-valuemax="100" style="width:58%"></div>
                                                </div>
                                                <ul class="list-unstyled users-list d-flex">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Tonia Seabold"
                                                        class="avatar pull-up ml-0">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-12.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Carissa Dolle"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-5.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Kelle Herrick"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-9.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Len Bregantini"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-10.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="John Doe"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-11.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Tonia Seabold"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-12.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Dirk Fornili"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-2.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="polls-info mt-1">
                                                <div class="d-flex justify-content-between">
                                                    <div class="vs-radio-con vs-radio-primary">
                                                        <input type="radio" name="vueradio" value="false">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">Chris Hemswort</span>
                                                    </div>
                                                    <div class="text-right">16%</div>
                                                </div>
                                                <div class="progress progress-bar-primary my-50">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="16"
                                                        aria-valuemin="16" aria-valuemax="100" style="width:16%"></div>
                                                </div>
                                                <ul class="list-unstyled users-list d-flex">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Liliana Pecor"
                                                        class="avatar pull-up ml-0">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-6.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Kasandra NaleVanko"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-1.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="polls-info mt-1">
                                                <div class="d-flex justify-content-between">
                                                    <div class="vs-radio-con vs-radio-primary">
                                                        <input type="radio" name="vueradio" value="false">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">Mark Ruffalo</span>
                                                    </div>
                                                    <div class="text-right">8%</div>
                                                </div>
                                                <div class="progress progress-bar-primary my-50">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="8"
                                                        aria-valuemin="8" aria-valuemax="100" style="width:8%"></div>
                                                </div>
                                                <ul class="list-unstyled users-list d-flex">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Lorelei Lacsamana"
                                                        class="avatar pull-up ml-0">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-4.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="polls-info mt-1">
                                                <div class="d-flex justify-content-between">
                                                    <div class="vs-radio-con vs-radio-primary">
                                                        <input type="radio" name="vueradio" value="false">
                                                        <span class="vs-radio">
                                                            <span class="vs-radio--border"></span>
                                                            <span class="vs-radio--circle"></span>
                                                        </span>
                                                        <span class="">Chris Evans</span>
                                                    </div>
                                                    <div class="text-right">16%</div>
                                                </div>
                                                <div class="progress progress-bar-primary my-50">
                                                    <div class="progress-bar" role="progressbar" aria-valuenow="16"
                                                        aria-valuemin="16" aria-valuemax="100" style="width:16%"></div>
                                                </div>
                                                <ul class="list-unstyled users-list d-flex">
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="JeanieBulgrin"
                                                        class="avatar pull-up ml-0">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-8.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                    <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                        data-placement="bottom" data-original-title="Graig Muckey"
                                                        class="avatar pull-up">
                                                        <img class="media-object rounded-circle"
                                                            src="../../../app-assets/images/portrait/small/avatar-s-3.jpg"
                                                            alt="Avatar" height="30" width="30">
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                            </div>



                        </div>
                    </div>

                </div>
            </div>

        </section>
    </div>
    <!-- Create client -->
    <div class="modal fade text-left" wire:ignore.self id="large" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
            <div class="modal-content">
                <div class="modal-header bg-transparent">

                </div>
                <form class="form" wire:submit.prevent="saveClient" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <div class="avatar bg-primary">
                                <span class="avatar-content" style="width:50px; height:50px;"><i
                                        class="avatar-icon feather icon-user font-medium-5"></i></span>

                            </div>

                            <h4 class="font-weight-bold">Ajouter Client</h4>


                        </div>

                        <div class="form-body">
                            <div class="row">



                                <div class="col-6">


                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" wire:model.defer="client_phone" id="client_phone"
                                            class="form-control service-input" style="height:41px" name="client_phone"
                                            placeholder="ex:+213 559 56 87 98">
                                        <div class="form-control-position">
                                            <i class="feather icon-phone"></i>
                                        </div>
                                        <label for="contact-floating-icon">Téléphone </label>
                                        @error('client_phone')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-label-group position-relative has-icon-left">
                                        <input type="text" wire:model="client_email" id="client_email"
                                            class="form-control service-input" style="height:41px" name="client_email"
                                            placeholder="jhondoe@gmail.com">
                                        <div class="form-control-position">
                                            <i class="feather icon-mail"></i>
                                        </div>
                                        <label for="contact-floating-icon">Email</label>
                                        @error('client_email')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-label-group position-relative has-icon-left">

                                        <textarea class="form-control" wire:model="client_address" name="client_address"
                                            id="client_address" rows="3"
                                            placeholder="Entrer votre description ..."></textarea>
                                        <div class="form-control-position">
                                            <i class="feather icon-map-pin"></i>
                                        </div>
                                        <label for="accountTextarea">Addresse</label>
                                        @error('client_address')
                                        <span class="text-danger" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" style="border-radius: 40px"
                                    class="btn btn-warning font-weight-bold" data-dismiss="modal">ANNULER</button>
                                <button type="submit" style="border-radius: 40px"
                                    class="btn btn-primary font-weight-bold">

                                    TERMINER


                                </button>


                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!--End  Create client -->
</div>