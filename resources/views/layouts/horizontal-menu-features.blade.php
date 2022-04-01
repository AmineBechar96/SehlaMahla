<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

<div class="horizontal-menu-wrapper">
    <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border"
        role="navigation" data-menu="menu-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item "><a class="navbar brand ml-3" href="{{url('home')}}">
                        <div class="brand-logo"><img src="../../../app-assets/images/logo/llll.png" height="75"
                                width="110" alt=""></div>

                    </a></li>
                <li class="nav-item nav-toggle ml-auto"><a class="nav-link modern-nav-toggle pr-0"
                        data-toggle="collapse"><i
                            class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                            class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                            data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
            <!-- include ../../../includes/mixins-->
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
                @if (Auth::user() and Auth::user()->hasVerifiedEmail())
                @can('isClient')
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href=""
                        data-toggle="dropdown"><i class="feather icon-home"></i><span
                            data-i18n="Dashboard">Accueil</span></a>

                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('home')}}" data-toggle="dropdown"
                                data-i18n="Email"><i class="feather icon-home"></i>
                                Accueil
                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/dashboard')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-activity"></i>Tableau de
                                bord
                            </a>
                        </li>



                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-box"></i><span data-i18n="Others">
                            Services
                        </span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/categories')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-grid"></i>Touts les
                                Services</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/my-services')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-shopping-bag"></i>Mes
                                Services</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/liked-services')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-heart"></i>Services
                                Aimés</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/recommended')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-star"></i>
                                Recommendées</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown" data-menu="dropdown"><a class=" nav-link" href="{{url('client/chat')}}"><i
                            class="feather icon-message-circle"></i><span>
                            Conversation
                        </span></a>

                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-check-square"></i><span data-i18n="Others">
                            Réservations
                        </span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/bookings')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-grid"
                                    style="color:#626262;"></i>
                                Tous

                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/pending/bookings')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-clock"
                                    style="color:#626262;"></i>
                                En Attente

                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/accepted/bookings')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i
                                    class="feather icon-user-check"></i>Acceptées</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/ongoing/bookings')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-repeat"
                                    style="color:#626262;"></i>
                                En Cours

                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/completed/bookings')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-check"></i>Terminées</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/canceled/bookings')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i
                                    class="feather icon-x-circle"></i>Annulées</a>
                        </li>

                        <li data-menu=""><a class="dropdown-item" href="{{url('client/rejected/bookings')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-user-x"></i>Réjectées</a>
                        </li>
                    </ul>

                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-gift"></i><span data-i18n="Apps">Coupones &
                            Cadeaux</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/coupons')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-trending-up"
                                    style="color:#6e706f"></i>Coupones
                                Fournisseur</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="weekly-markets" data-toggle="dropdown"
                                data-i18n="Chat"><i class="feather icon-gift" style="color:#6e706f"></i>Coupones
                                Sahla</a>
                        </li>
                        <!--li data-menu=""><a class="dropdown-item" href="app-todo.html" data-toggle="dropdown"
                            data-i18n="Todo"><i class="feather icon-check-square"></i>Nos Partenaires</a>
                    </li-->

                    </ul>
                </li>

                <li class="dropdown nav-item" data-menu="dropdown"><a class="nav-link"
                        href="{{url('client/client-analytics')}}"><i class="feather icon-bar-chart-2"></i><span
                            data-i18n="Others">
                            Statistiques</span></a>

                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle  nav-link"
                        data-toggle="dropdown"><i class="feather icon-sliders"></i><span data-i18n="Apps">
                            Autres</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('client/settings')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-settings"
                                    style="color:#6e706f"></i>Paramètres</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('general-rules')}}" data-toggle="dropdown"
                                data-i18n="Chat"><i class="feather icon-help-circle" style="color:#6e706f"></i>Aide</a>
                        </li>
                        <!--li data-menu=""><a class="dropdown-item" href="app-todo.html" data-toggle="dropdown"
                    data-i18n="Todo"><i class="feather icon-check-square"></i>Nos Partenaires</a>
            </li-->

                    </ul>
                </li>
                @endcan


                @else
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href=""
                        data-toggle="dropdown"><i class="feather icon-home"></i><span
                            data-i18n="Dashboard">Accueil</span></a>
                    <ul class="dropdown-menu">




                    </ul>
                </li>
                @endif
                @can('isProvider')
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href=""
                        data-toggle="dropdown"><i class="feather icon-home"></i><span
                            data-i18n="Dashboard">Accueil</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('home')}}" data-toggle="dropdown"
                                data-i18n="Email"><i class="feather icon-home"></i>
                                Accueil
                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/dashboard')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-activity"></i>Tableau de
                                bord
                            </a>
                        </li>




                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-users"></i><span data-i18n="Others">
                            Clients
                        </span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/clients')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-users"
                                    style="color:#626262;"></i>Clients
                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/users-list')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-users"
                                    style="color:#626262;"></i>Subscribers
                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/users-list')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-heart"></i>Favoris</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-box"></i><span data-i18n="Others">
                            Services
                        </span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/services-list')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-list"></i>Mes
                                Services</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/categories')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-plus-circle"></i>Ajouter
                                Service</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown nav-item"><a class="nav-link" href="{{url('provider/chat')}}"><i
                            class="feather icon-message-circle"></i><span data-i18n="Others">
                            Conversation
                        </span></a>

                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-check-square"></i><span data-i18n="Others">
                            Réservations
                        </span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/bookings')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-grid"
                                    style="color:#626262;"></i>
                                Tous

                            </a>

                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/pending/bookings')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-clock"
                                    style="color:#626262;"></i>
                                En Attente

                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/accepted/bookings')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-user-check"
                                    style="color:#626262;"></i>
                                Acceptées

                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/ongoing/bookings')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-repeat"
                                    style="color:#626262;"></i>
                                En Cours

                            </a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/completed/bookings')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-check"></i>Terminées</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/canceled/bookings')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i
                                    class="feather icon-x-circle"></i>Annulées</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/rejected/bookings')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-user-x"></i>Réjétées</a>
                        </li>
                    </ul>

                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-shopping-cart"></i><span data-i18n="Apps">
                            Point de Vente</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/products')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-box"
                                    style="color:#6e706f"></i>Produits</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/invoices')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-file-text"
                                    style="color:#6e706f"></i>Factures</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/discounts')}}"
                                data-toggle="dropdown" data-i18n="Chat"><i class="feather icon-percent"
                                    style="color:#6e706f"></i>Réductions</a>
                        </li>
                        <!--li data-menu=""><a class="dropdown-item" href="app-todo.html" data-toggle="dropdown"
                data-i18n="Todo"><i class="feather icon-check-square"></i>Nos Partenaires</a>
        </li-->

                    </ul>
                </li>



                <li class="dropdown nav-item" data-menu="dropdown"><a class="nav-link"
                        href="{{url('provider/provider-analytics')}}"><i class="feather icon-bar-chart-2"></i><span
                            data-i18n="Others">
                            Statistiques</span></a>

                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle  nav-link"
                        data-toggle="dropdown"><i class="feather icon-sliders"></i><span data-i18n="Apps">
                            Autres</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="{{url('provider/membership')}}"
                                data-toggle="dropdown" data-i18n="Email"><i class="feather icon-settings"
                                    style="color:#6e706f"></i>Paramètres</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="{{url('general-rules')}}" data-toggle="dropdown"
                                data-i18n="Chat"><i class="feather icon-help-circle" style="color:#6e706f"></i>Aide</a>
                        </li>
                        <!--li data-menu=""><a class="dropdown-item" href="app-todo.html" data-toggle="dropdown"
                data-i18n="Todo"><i class="feather icon-check-square"></i>Nos Partenaires</a>
        </li-->

                    </ul>
                </li>
                @endcan
                <!--li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-settings"></i><span data-i18n="Others">
                            Entretien Automobile
                        </span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="general-mechanic" data-toggle="dropdown"
                                data-i18n="Email"><i class="fas fa-tools" style="color:#626262;"></i>Mécanicien
                                Général</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="detached-pieces-stores" data-toggle="dropdown"
                                data-i18n="Chat"><i class="feather icon-settings"></i>Pièces Détachés</a>
                        </li>
                    </ul>
                </li>



                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class='bx bx-car'></i><span data-i18n="Pages">Location de
                            voitures</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="rent-agencies" data-toggle="dropdown"
                                data-i18n="Profile"><i class='bx bx-car'></i></i>Agences Location de Voitures</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="page-account-settings.html"
                                data-toggle="dropdown" data-i18n="Account Settings"><i
                                    class="feather icon-settings"></i>Voitures de Lux</a>
                        </li>



                    </ul>
                </li>
                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-truck"></i><span
                            data-i18n="Charts &amp; Maps">Depannages &amp; Transport</span></a>
                    <ul class="dropdown-menu">
                        <li data-menu=""><a class="dropdown-item" href="recovery-truck" data-i18n="Charts"><i
                                    class="fas fa-truck-loading" style="color:#6e706f"></i>Depannages</a>

                        </li>
                        <li data-menu=""><a class="dropdown-item" href="transport-operators" data-toggle="dropdown"
                                data-i18n="Google Maps"><i class="feather icon-truck"
                                    style="color:#6e706f"></i>Véhicules de Transport</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link" href="#"
                        data-toggle="dropdown"><i class="feather icon-bar-chart-2"></i><span data-i18n="Others">
                            Statistiques</span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                class="dropdown-item dropdown-toggle" href="#" data-toggle="dropdown"
                                data-i18n="Menu Levels"><i class="feather icon-menu"></i>rent agencies</a>

                        </li>
                        <li class="disabled" data-menu=""><a class="dropdown-item" href="" data-toggle="dropdown"
                                data-i18n="Disabled Menu"><i class="feather icon-eye-off"></i>Disabled Menu</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item"
                                href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation"
                                data-toggle="dropdown" data-i18n="Documentation"><i
                                    class="feather icon-folder"></i>Documentation</a>
                        </li>
                        <li data-menu=""><a class="dropdown-item" href="https://pixinvent.ticksy.com/"
                                data-toggle="dropdown" data-i18n="Raise Support"><i
                                    class="feather icon-life-buoy"></i>Raise
                                Support</a>
                        </li>
                    </ul>
                </li-->
            </ul>
        </div>
    </div>
</div>
<!-- END: Main Menu-->