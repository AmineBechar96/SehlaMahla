<div class="content-area-wrapper">

    <div class="sidebar-left mb-0">
        <div class="sidebar">
            <div class="sidebar-content email-app-sidebar d-flex">
                <span class="sidebar-close-icon">
                    <i class="feather icon-x"></i>
                </span>
                <div class="email-app-menu">
                    <div class="form-group form-group-compose text-center compose-btn">
                        <button type="button" class="btn btn-primary btn-block my-2" data-toggle="modal"
                            data-target="#composeForm"><i class="feather icon-clipboard"></i> Liste
                            Réservalistions</button>
                    </div>
                    <div class="sidebar-menu-list">
                        <div class="list-group list-group-messages font-medium-1" wire:ignore>
                            <input type="radio" name="booking_status_all" wire:model="bookingStatus" value="all"
                                id="booking_status_all" hidden>
                            <label for="booking_status_all" style="font-size:1.1rem;"
                                class="list-group-item  cursor-pointer list-group-item-action border-0 pt-0 active">
                                <i class="font-medium-5 feather icon-list mr-50"></i> Tous <span
                                    class="badge badge-pill  float-right">{{count($bookings)}}</span>
                            </label>
                            <input type="radio" name="booking_status" wire:model="bookingStatus" value="pending"
                                id="booking_status_pending" hidden>
                            <label style="font-size:1.1rem;" for="booking_status_pending"
                                class="list-group-item cursor-pointer list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-clock mr-50"></i> En Attente
                                @if ($pending>0)
                                <span class="badge badge-warning badge-pill float-right">{{$pending}}</span>
                                @endif
                            </label>
                            <input type="radio" name="booking_status" wire:model="bookingStatus" value="accepted"
                                id="booking_status_accepted" hidden>
                            <label style="font-size:1.1rem;" for="booking_status_accepted"
                                class="list-group-item cursor-pointer list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-user-check mr-50"></i> Acceptées
                                @if ($accepted>0)
                                <span class="badge badge-accepted badge-pill float-right">{{$accepted}}</span>
                                @endif
                            </label>
                            <input type="radio" name="booking_status" wire:model="bookingStatus" value="ongoing"
                                id="booking_status_ongoing" hidden>
                            <label style="font-size:1.1rem;" for="booking_status_ongoing"
                                class="list-group-item cursor-pointer list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-check-circle mr-50"></i> En Cours
                                @if ($ongoing>0)
                                <span class="badge badge-primary badge-pill float-right">{{$ongoing}}</span>
                                @endif
                            </label>


                            <input type="radio" name="booking_status" wire:model="bookingStatus" value="completed"
                                id="booking_status_completed" hidden>
                            <label style="font-size:1.1rem;" for="booking_status_completed"
                                class="list-group-item  cursor-pointer list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-check mr-50"></i> Terminées
                                @if ($completed>0)
                                <span class="badge badge-success badge-pill float-right">{{$completed}}</span>
                                @endif
                            </label>
                            <input type="radio" name="booking_status" wire:model="bookingStatus" value="canceled"
                                id="booking_status_canceled" hidden>
                            <label style="font-size:1.1rem;" for="booking_status_canceled"
                                class="list-group-item cursor-pointer list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-x-circle mr-50"></i>
                                Annulées
                                @if ($canceled>0)
                                <span class="badge badge-danger badge-pill float-right">{{$canceled}}</span>
                                @endif
                            </label>
                            <input type="radio" name="booking_status" wire:model="bookingStatus" value="rejected"
                                id="booking_status_rejected" hidden>
                            <label style="font-size:1.1rem;" for="booking_status_rejected"
                                class="list-group-item cursor-pointer list-group-item-action border-0"><i
                                    class="font-medium-5 feather icon-user-x mr-50"></i>
                                Réjetées
                                @if ($rejected>0)
                                <span class="badge badge-rejected badge-pill float-right">{{$rejected}}</span>
                                @endif
                            </label>

                        </div>
                        <hr>
                        <h5 class="my-2 pt-25">Labels</h5>
                        <div class="list-group list-group-labels font-medium-1">
                            <a href="#"
                                class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-warning mr-1"></span> En attente</a>
                            <a href="#"
                                class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-accepted mr-1"></span> Acceptées</a>
                            <a href="#"
                                class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-primary mr-1"></span> En Cours</a>
                            <a href="#"
                                class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-success mr-1"></span> Terminées</a>
                            <a href="#"
                                class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-danger mr-1"></span> Annulées</a>
                            <a href="#"
                                class="list-group-item list-group-item-action border-0 d-flex align-items-center"><span
                                    class="bullet bullet-rejected mr-1"></span> Réjétées</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="content-right">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="app-content-overlay"></div>
                <div class="email-app-area">
                    <!-- Email list Area -->
                    <div class="email-app-list-wrapper">
                        <div class="email-app-list">
                            <div class="app-fixed-search">
                                <div class="sidebar-toggle d-block d-lg-none"><i class="feather icon-menu"></i>
                                </div>
                                <fieldset class="form-group position-relative has-icon-left m-0">
                                    <input type="text" class="form-control" id="email-search"
                                        placeholder="Search email">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="app-action">


                                <div class="action-right ml-auto">
                                    <ul class="list-inline m-0">
                                        <!--li class="list-inline-item">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" id="folder" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-folder"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="folder">
                                                        <a class="dropdown-item d-flex font-medium-1" href="#"><i
                                                                class="font-medium-3 feather icon-edit-2 mr-50"></i>
                                                            Draft</a>
                                                        <a class="dropdown-item d-flex font-medium-1" href="#"><i
                                                                class="font-medium-3 feather icon-info mr-50"></i>
                                                            Spam</a>
                                                        <a class="dropdown-item d-flex font-medium-1" href="#"><i
                                                                class="font-medium-3 feather icon-trash mr-50"></i>
                                                            Trash</a>
                                                    </div>
                                                </div>
                                            </li-->
                                        <!--li class="list-inline-item">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" id="tag" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-x-cirlce"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">
                                                        <a href="#" class="dropdown-item font-medium-1"><span
                                                                class="mr-1 bullet bullet-success bullet-sm"></span>
                                                            Personal</a>
                                                        <a href="#" class="dropdown-item font-medium-1"><span
                                                                class="mr-1 bullet bullet-primary bullet-sm"></span>
                                                            Company</a>
                                                        <a href="#" class="dropdown-item font-medium-1"><span
                                                                class="mr-1 bullet bullet-warning bullet-sm"></span>
                                                            Important</a>
                                                        <a href="#" class="dropdown-item font-medium-1"><span
                                                                class="mr-1 bullet bullet-danger bullet-sm"></span>
                                                            Private</a>
                                                    </div>
                                                </div>
                                            </li-->

                                        @if ($bookingStatus=="pending")<li class="list-inline-item mail-unread"
                                            title="Annuler"><a href="{{url('provider/pending/bookings')}}"
                                                class="btn btn-warning" id="cancel_details_btn"
                                                style="padding-left:7px;  padding-top:6px; padding-bottom:6px;padding-right:7px;"><i
                                                    class="feather icon-x-circle font-medium-2"></i> Annuler </a></li>

                                        @elseif ($bookingStatus=="ongoing")<li class="list-inline-item mail-unread"
                                            title="Terminer"><a href="{{url('provider/ongoing/bookings')}}"
                                                class="btn btn-primary" id="cancel_details_btn"
                                                style="padding-left:7px;  padding-top:6px; padding-bottom:6px;padding-right:7px;"><i
                                                    class="feather icon-check font-medium-2"></i> Terminer </a></li>

                                        @elseif ($bookingStatus=="completed")<li class="list-inline-item mail-unread"
                                            title="Terminer"><a href="{{url('provider/completed/bookings')}}"
                                                class="btn btn-success" id="cancel_details_btn"
                                                style="padding-left:7px;  padding-top:6px; padding-bottom:6px;padding-right:7px;"><i
                                                    class="feather icon-eye font-medium-2"></i> Consulter </a></li>
                                        @elseif ($bookingStatus=="canceled")<li class="list-inline-item mail-unread"
                                            title="Terminer"><a href="{{url('provider/canceled/bookings')}}"
                                                class="btn btn-danger" id="cancel_details_btn"
                                                style="padding-left:7px;  padding-top:6px; padding-bottom:6px;padding-right:7px;"><i
                                                    class="feather icon-eye font-medium-2"></i> Consulter </a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="email-user-list list-group khra">
                                <ul class="users-list-wrapper media-list">
                                    @foreach ($bookings as $booking)
                                    <li class="media mail-read halim" data-id="{{$booking->id}}"
                                        data-user="{{$booking->user->name}}"
                                        data-service_image="{{$booking->service->service_image_url}}"
                                        data-service_title="{{$booking->service->title}}"
                                        data-booking_status="{{trans('bookings.'.$booking->status)}}"
                                        data-booking_title="{{$booking->title}}"
                                        data-booking_date="{{$booking->booking_date}}"
                                        data-booking_time="{{ date('h:i A', strtotime($booking->booking_time))}}"
                                        data-booking_description="{{$booking->description}}"
                                        data-booking_address="{{$booking->address}}">
                                        <div class="media-left pr-50 salim">
                                            <div class="avatar">
                                                <img src="{{$booking->service->service_image_url}}"
                                                    alt="avtar img holder">
                                            </div>
                                            <div class="user-action">

                                                <span class="favorite"><i class="feather icon-star"></i></span>
                                            </div>

                                        </div>

                                        <div class="media-body">
                                            <div class="user-details">
                                                <div class="mail-items">
                                                    <h5 class="list-group-item-heading text-bold-600 mb-25">
                                                        {{ucwords($booking->user->name)}}</h5>
                                                    <span
                                                        class="list-group-item-text text-truncate">{{$booking->title}}</span>

                                                </div>

                                                <div class="mail-meta-item">
                                                    <span class="float-right">
                                                        <span
                                                            class="mr-1 bullet bullet-{{$booking->status}} bullet-sm"></span><span
                                                            class="mail-date">{{ $booking->created_at->diffForHumans()}}
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mail-message">
                                                <p class="list-group-item-text truncate mb-0">
                                                    {{$booking->description}}</p>
                                            </div>
                                        </div>
                                    </li>

                                    @endforeach


                                </ul>
                                <div class="no-results">
                                    <h5>No Items Found</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Email list Area -->
                    <!-- Detailed Email View -->
                    <div class="email-app-details">
                        <div class="email-detail-header">
                            <div class="email-header-left d-flex align-items-center mb-1">
                                <span class="go-back mr-1"><i class="feather icon-arrow-left font-medium-4"></i></span>
                                <h3 id="booking_title"></h3>
                            </div>
                            <div class="email-header-right mb-1 ml-2 pl-1">
                                <ul class="list-inline m-0">


                                </ul>
                            </div>
                        </div>
                        <div class="email-scroll-area ">
                            <div class="row">
                                <div class="col-12">
                                    <div class="email-label ml-2 my-2 pl-1">
                                        <span class="mr-1 bullet bullet-sm" id="status_color"></span><small
                                            class="mail-label" id="booking_status">Company</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="card px-1">
                                        <div class="card-header email-detail-head ml-75">
                                            <div
                                                class="user-details d-flex justify-content-between align-items-center flex-wrap">
                                                <div class="avatar mr-75">
                                                    <img id="service_image" src="" alt="avtar img holder" width="61"
                                                        height="61">
                                                </div>
                                                <div class="mail-items">
                                                    <h4 class="list-group-item-heading mb-0" id="service_title">
                                                    </h4>
                                                    <div class="email-info-dropup dropdown">
                                                        <span class="dropdown-toggle font-small-3"
                                                            id="dropdownMenuButton200" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">

                                                        </span>
                                                        <div class="dropdown-menu dropdown-menu-right p-50"
                                                            aria-labelledby="dropdownMenuButton200">
                                                            <div class="px-25 dropdown-item">de: <strong
                                                                    id="service_name">
                                                                </strong></div>
                                                            <div class="px-25 dropdown-item">à: <strong>
                                                                    {{ucwords(auth()->user()->name)}} </strong></div>
                                                            <div class="px-25 dropdown-item">Date: <strong
                                                                    id="booking_date_time"> 4:25
                                                                    AM 13 Jan 2018 </strong></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mail-meta-item ml-auto">
                                                <div class="mail-time mb-1" id="booking_time">4:14 AM</div>
                                                <div class="mail-date" id="booking_date">17 May 2018</div>
                                            </div>
                                        </div>
                                        <div class="card-body mail-message-wrapper pt-2 mb-0">
                                            <div class="mail-message">
                                                <p> <i class="feather icon-tag font-medium-3 mr-50"></i> Service Réservé
                                                </p>
                                                <p id="booking_service_name" class="font-weight-bold text-success ml-1">

                                                </p>
                                                <p> <i class="feather icon-map-pin font-medium-3 mr-50"></i> Addresse de
                                                    Reservation
                                                </p>
                                                <p id="booking_address" class="font-weight-bold ml-1">

                                                    domainbe mansouri el chaib sour el ghoelane
                                                    bouira alageria</p>

                                            </div>
                                            <hr>
                                            <div class="mail-message">
                                                <p> <i class="feather icon-align-left font-medium-3 mr-50"></i>
                                                    Description</p>
                                                <p id="booking_description" class="font-weight-bold ml-1"></p>

                                            </div>

                                        </div>
                                        <div class="mail-files py-2">
                                            <div class="chip chip-primary">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/ Detailed Email View -->
                </div>

            </div>
        </div>
    </div>
</div>
<script>


</script>