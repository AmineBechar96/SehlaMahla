<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item"><a class="navbar" href="{{url('home')}}">
                    <div class="brand-logo"><img src="../../../app-assets/images/logo/llll.png" height="85" width="120"
                            alt=""></div>
                </a></li>
        </ul>
    </div>
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                @guest
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link  hidden-xs"
                                href="{{ route('login') }}"><span>
                                    <img class="" src="../../../app-assets/images/icons/home.png" alt="avatar"
                                        height="25" width="25"></span></a>
                        </li>

                        <li id="logsm" class="nav-item d-xl-none ml-md-5
        
                                    ml-2">
                            <a class="nav link" href="{{url('home')}}">
                                <div class="brand-logo"><img src="../../../app-assets/images/logo/llll.png" height="65"
                                        width="85" alt=""></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block "><a class="nav-link font-weight-bold "
                                href="{{ route('login') }}" data-toggle="tooltip" data-placement="top"
                                title="Dashboard"><span>
                                    <img src="../../../app-assets/images/icons/home.png" alt="avatar" height="25"
                                        width="25"></span></a></li>


                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <!--li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                    class="selected-language">English</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"
                                    data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a
                                    class="dropdown-item" href="#" data-language="fr"><i
                                        class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"
                                    data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a
                                    class="dropdown-item" href="#" data-language="pt"><i
                                        class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                        </li-->

                    <li class="dropdown dropdown-user nav-item"><a class="nav-link dropdown-user-link"
                            href="{{ route('login') }}">
                            <div class="user-nav d-sm-flex d-none mt-1 "><span
                                    class="user-name text-bold-600">S'inscrire
                                </span></div><span><span>
                                    <img class="round mt-1" src="../../../app-assets/images/icons/login.png"
                                        alt="avatar" height="25" width="25"></span>
                        </a>

                    </li>
                </ul>
                @else
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>

                        <li id="logsm" class="nav-item d-xl-none ml-md-5
        
                                    ml-2">
                            <a class="nav link" href="{{url('home')}}">
                                <div class="brand-logo"><img src="../../../app-assets/images/logo/llll.png" height="65"
                                        width="85" alt=""></div>
                            </a>
                        </li>
                    </ul>
                    @can('isClient')
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{ url('client/dashboard') }}"
                                data-toggle="tooltip" data-placement="top" title="Dashboard"><span>
                                    <img src="../../../app-assets/images/icons/home.png" alt="avatar" height="25"
                                        width="25"></span></a></li>


                    </ul>
                    @endcan
                    @can('isProvider')
                    <ul class="nav navbar-nav bookmark-icons">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link font-weight-bold "
                                href="{{ url('provider/dashboard') }}" data-toggle="tooltip" data-placement="top"
                                title="Dashboard"><span>
                                    <img src="../../../app-assets/images/icons/home.png" alt="avatar" height="25"
                                        width="25"></span></a></li>


                    </ul>
                    @endcan

                </div>
                <ul class="nav navbar-nav float-right">
                    <!--li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link"
                                id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span
                                    class="selected-language">English</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-flag"><a class="dropdown-item" href="#"
                                    data-language="en"><i class="flag-icon flag-icon-us"></i> English</a><a
                                    class="dropdown-item" href="#" data-language="fr"><i
                                        class="flag-icon flag-icon-fr"></i> French</a><a class="dropdown-item" href="#"
                                    data-language="de"><i class="flag-icon flag-icon-de"></i> German</a><a
                                    class="dropdown-item" href="#" data-language="pt"><i
                                        class="flag-icon flag-icon-pt"></i> Portuguese</a></div>
                        </li-->
                    <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#"
                            data-toggle="dropdown">@if (auth()->user()->unreadNotifications->count()>0)
                            <i class="ficon feather icon-bell"></i><span
                                class="badge badge-pill badge-primary badge-up">{{auth()->user()->unreadNotifications->count()}}</span>
                            @else
                            <i class="ficon feather icon-bell"></i>
                            @endif</a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">{{auth()->user()->unreadNotifications->count()}} Nouveau</h3>
                                    <span class="notification-title">App
                                        Notifications</span>
                                </div>
                            </li>
                            @can('isProvider')
                            <li class="scrollable-container media-list">
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                @if ($notification->type=="App\Notifications\NewServiceBooking" or
                                $notification->type=="App\Notifications\BookingHasBeenRescheduled" or
                                $notification->type=="App\Notifications\JobDone")

                                <a class="d-flex justify-content-between"
                                    href="{{url('provider/'.$notification->data['booking_id'].'/notification/'.$notification->id)}}">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="{{$notification->data['color']}} media-heading ">
                                                {{$notification->data['title']}}
                                            </h6>
                                            <small class="notification-text">
                                                <span class="font-weight-bold">
                                                    {{$notification->data['user_name']}}</span>
                                                {{$notification->data['sub_title']}}
                                                <span
                                                    class="font-weight-bold">{{$notification->data['service_name']}}</span></small>
                                        </div><small>
                                            <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                            </time></small>
                                    </div>
                                </a>
                                @else
                                <a class="d-flex justify-content-between" href="{{url('provider/users-list')}}">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="{{$notification->data['color']}} media-heading ">
                                                {{$notification->data['title']}}
                                            </h6>
                                            <small class="notification-text">
                                                <span class="font-weight-bold">
                                                    {{$notification->data['user_name']}}</span>
                                                {{$notification->data['sub_title']}}
                                                <span
                                                    class="font-weight-bold">{{$notification->data['service_name']}}</span></small>
                                        </div><small>
                                            <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                            </time></small>
                                    </div>
                                </a>
                                @endif

                                @endforeach
                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                    href="{{url('provider/markasread')}}">Tout marquer comme lu</a></li>

                            @endcan
                            @can('isClient')
                            <li class="scrollable-container media-list">
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                @if ($notification->type=="App\Notifications\Client\BookingHasBeenAccepted" or
                                $notification->type=="App\Notifications\Client\BookingHasBeenStarted" or
                                $notification->type=="App\Notifications\Client\BookingHasBeenFinished")

                                <a class="d-flex justify-content-between"
                                    href="{{url('client/'.$notification->data['booking_id'].'/notification/'.$notification->id)}}">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6
                                                class="{{$notification->data['color']}} media-heading font-weight-bold ">
                                                {{$notification->data['title']}}
                                            </h6>
                                            <small class="notification-text">
                                                <span class="font-weight-bold">
                                                    {{$notification->data['service_name']}}</span>
                                                {{$notification->data['sub_title']}}
                                            </small>
                                        </div><small>
                                            <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                            </time></small>
                                    </div>
                                </a>
                                @elseif($notification->type=="App\Notifications\Client\NewProviderCoupon")
                                <a class="d-flex justify-content-between"
                                    href="{{url('client/'.$notification->data['coupon_id'].'/coupon/'.$notification->id)}}">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6
                                                class="{{$notification->data['color']}} media-heading font-weight-bold ">
                                                {{$notification->data['title']}}
                                            </h6>
                                            <small class="notification-text">
                                                <span class="font-weight-bold">
                                                    {{$notification->data['service_name']}}</span>
                                                {{$notification->data['sub_title']}}
                                            </small>
                                        </div><small>
                                            <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                            </time></small>
                                    </div>
                                </a>
                                @else
                                <!--a class="d-flex justify-content-between" href="{{url('provider/users-list')}}">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left"><i
                                                class="feather {{$notification->data['icon']}} font-medium-5 {{$notification->data['color']}}"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="{{$notification->data['color']}} media-heading ">
                                                {{$notification->data['title']}}
                                            </h6>
                                            <small class="notification-text">
                                                <span class="font-weight-bold">
                                                    {{$notification->data['user_name']}}</span>
                                                {{$notification->data['sub_title']}}
                                                <span
                                                    class="font-weight-bold">{{$notification->data['service_name']}}</span></small>
                                        </div><small>
                                            <time class="media-meta">{{$notification->created_at->diffForHumans()}}
                                            </time></small>
                                    </div>
                                </a-->
                                @endif

                                @endforeach
                            <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center"
                                    href="{{url('client/markasread')}}">Tout marquer comme lu</a></li>
                            @endcan

                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                    class="user-name text-bold-600">{{ucwords(Auth::user()->name)}}</span><span
                                    class="user-status">@if (!is_null(Auth::user()->email_verified_at))
                                    <span class="text-success"><i class="feather icon-check"></i>Verifié</span>
                                    @else
                                    <span class="text-warning"><i class="feather icon-x"></i>Non Verifié</span>
                                    @endif</span></div>

                            @if (Auth::user()->role=='Client')
                            <span>
                                <img class="round" src="../../../app-assets/images/icons/client3.png" alt="avatar"
                                    height="30" width="30"></span>
                            @else
                            <span>
                                <img class="round" src="../../../app-assets/images/icons/provider3.png" alt="avatar"
                                    height="30" width="30"></span>
                            @endif


                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!--a class="dropdown-item"
                                href="page-user-profile.html"><i class="feather icon-user"></i> Edit Profile</a><a
                                class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> My
                                Inbox</a><a class="dropdown-item" href="app-todo.html"><i
                                    class="feather icon-check-square"></i> Task</a><a class="dropdown-item"
                                href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>
                            <div class="dropdown-divider"></div--><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                      document.getElementById('logout-formm').submit();"><i
                                    class="feather icon-power"></i> Logout</a>
                            <form id="logout-formm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                @endguest
            </div>
        </div>
    </div>
</nav>

<!-- END: Header-->