<div>
    <!-- Dashboard Analytics Start -->
    <section id="dashboard-analytics">
        <div class="row mb-2">
            <div class="col-1"></div>
            <div class="col-10 text-center">
                <div class="chat-fixed-search">
                    <h3 class="primary p-1 mb-0">Marchés Hebdomadaires</h3>
                    <div class="d-flex align-items-center">

                        <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                            <input type="text" class="form-control round" name="searchPosition"
                                wire:click="searchagency()" wire:model="search"
                                placeholder="Rechercher une Addresse...">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        @if (count($markets)>0)
                        <div class="table-responsive mt-1">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                    <tr style="color:#878686;">
                                        <th><i class="fas fa-tag"></i>&nbsp;NOM</th>
                                        <th><i class="fas fa-map-marker-alt"></i>&nbsp;WILAYA</th>
                                        <th><i class="fas fa-calendar-day"></i>&nbsp;STATUS</th>
                                        <th><i class="fas fa-arrows-alt-h"></i>&nbsp;DISTANCE</th>
                                        <th><i class="fas fa-map-marked"></i>&nbsp;LOCALISATION</th>
                                        <th>&nbsp;<i class="fas fa-cloud"></i>&nbsp;METEO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    \Carbon\Carbon::setLocale('es');
                                    $date = \Carbon\Carbon::now()->locale('fr')->dayName;
                                    //$day=strtolower($date->format('l'));
                                    @endphp
                                    @foreach ($markets as $market)
                                    <tr>
                                        <td>{{$market->commune->name}}</td>
                                        <td>
                                            {{$market->commune->wilaya->name_en}}
                                        </td>
                                        <span></span>
                                        <td class="p-1">
                                            @if ($market->open_state==$date)
                                            <i class="fa fa-circle font-small-3 text-success mr-50 cursor-pointer"
                                                data-toggle="popover"
                                                data-content="Cette marché est programmé pour le {{$market->open_state}}"
                                                data-trigger="hover" data-original-title="Jour de Semaine"></i>Ouvert


                                            @else
                                            <i class="fa fa-circle font-small-3 text-warning mr-50 cursor-pointer"
                                                data-toggle="popover"
                                                data-content="Cette marché est programmé pour le {{$market->open_state}} "
                                                data-trigger="hover" data-original-title="Jour de Semaine"></i>Fermé

                                            @endif



                                        </td>

                                        <td>
                                            <span>{{round($market->distance)}} KM</span>
                                            @if ($market->open_state==$date)
                                            <div class="progress progress-bar-success mt-1 mb-0">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{round($market->distance)}}%"
                                                    aria-valuenow="{{round($market->distance)}}" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            @else
                                            <div class="progress progress-bar-warning mt-1 mb-0">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: {{round($market->distance)}}%"
                                                    aria-valuenow="{{round($market->distance)}}" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>


                                            @endif
                                        </td>
                                        <td class="pl-5"><a href="" class="cursor-pointer" data-toggle="modal"
                                                data-target="#large" data-nom="{{$market->title}}"
                                                data-lat="{{$market->latitude}}" data-long="{{$market->longitude}}"><i
                                                    class="fas fa-external-link-alt"></i></a></td>
                                        <td class="pl-3"><a href="" class="cursor-pointer" data-toggle="modal"
                                                data-target="#defaultSize"
                                                data-location="{{$market->commune->wilaya->name_en}}"
                                                data-lat="{{$market->latitude}}" data-long="{{$market->longitude}}"><i
                                                    class="fas fa-cloud-sun"></i></a></td>

                                    </tr>
                                    @endforeach


                                    <thead>
                                        <tr style="color:#878686;">
                                            <th><i class="fas fa-tag"></i>&nbsp;NOM</th>
                                            <th><i class="fas fa-map-marker-alt"></i>&nbsp;WILAYA</th>
                                            <th><i class="fas fa-calendar-day"></i>&nbsp;STATUS</th>
                                            <th><i class="fas fa-arrows-alt-h"></i>&nbsp;DISTANCE</th>
                                            <th><i class="fas fa-map-marked"></i>&nbsp;LOCALISATION</th>
                                            <th>&nbsp;<i class="fas fa-cloud"></i>&nbsp;METEO</th>
                                        </tr>
                                    </thead>
                                </tbody>
                            </table>
                        </div>
                        @else
                        <!-- error 404 -->
                        <section class="row flexbox-container">
                            <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-center">
                                <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                                    <div class="card-content">
                                        <div class="card-body text-center">
                                            <img src="../../../app-assets/images/pages/location/nocontent.svg"
                                                class="img-fluid align-self-center" alt="branding logo">
                                            <h1 class="font-large-2 my-1">Oups -No Content
                                                Found!</h1>
                                            <p class="p-2">
                                                Nous sommes désolés, il n'y a pas de contenu disponible,
                                                aidez-nous à améliorer notre contenu en nous informant sur les marchés
                                                de votre région
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- error 404 end -->
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="d-flex justify-content-center align-items-center mt-1 mb-1 ">
        {{ $markets->links('') }}
    </div>
    <!-- Dashboard Analytics end -->
</div>