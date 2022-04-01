<div>

    <form wire:submit.prevent="editService" method="POST">
        @csrf
        {{---First Form--}}
        @if ($CurrentForm==1)
        <div class="first-form">
            <div class="media">
                <a href="javascript: void(0);">
                    @if ($ServiceImage)
                    @if ($ServiceImage==$OldImage)
                    <img src="{{$state['service_image_url']}}" class="rounded mr-75" alt="profile image" height="64"
                        width="64">
                    @else
                    <img src="{{$ServiceImage->temporaryUrl() }}" class="rounded mr-75" alt="profile image" height="64"
                        width="64">
                    @endif

                    @else
                    <img src="{{$state['service_image_url']}}" class="rounded mr-75" alt="profile image" height="64"
                        width="64">
                    @endif

                </a>
                <div class="media-body mt-75">
                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer font-weight-bold"
                            for="account-upload">
                            @if ($ServiceImage)
                            @if ($ServiceImage!=$OldImage)
                            {{$ServiceImage->getClientOriginalName()}}
                            @else
                            changer Image
                            @endif
                            @else
                            {{trans('create-service.Choisir-une-Photo')}}
                            @endif



                        </label>
                        <input type="file" name="ServiceImage" id="account-upload" wire:model="ServiceImage" hidden>
                        <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                    </div>
                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or
                            PNG. Max
                            size of
                            800kB</small></p>
                </div>
                @error('ServiceImage')
                <span class="text-danger" role="alert">
                    {{ $message }}
                </span>
                @enderror
            </div>
            <hr>




            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <div class="controls">
                            <label class="font-weight-bold text-dark"
                                for="account-username">{{trans('create-service.service-name')}}</label>

                            <input type="text"
                                class="form-control service-input @error('ServiceTitle') is-invalid @enderror "
                                name="ServiceTitle" wire:model="ServiceTitle" id="account-username"
                                placeholder="Username" required>
                            @error('ServiceTitle')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <div class="controls">
                            <label class="font-weight-bold text-dark"
                                for="account-name">{{trans('create-service.service-wilaya')}}</label>
                            <select class="form-control service-input @error('selectedWilaya') is-invalid @enderror"
                                name="selectedWilaya" wire:model="selectedWilaya" id="selectedWilaya">
                                @foreach ($wilayas as $wilaya)
                                <option value="{{$wilaya->code}}">
                                    {{$wilaya->name_en}}
                                </option>
                                @endforeach
                            </select>
                            @error('selectedWilaya')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <div class="controls">
                            <label class="font-weight-bold text-dark"
                                for="account-name">{{trans('create-service.service-commune')}}</label>
                            <select type="text"
                                class="form-control service-input @error('selectedCommune') is-invalid @enderror"
                                name="selectedCommune" wire:model="selectedCommune" id="selectedCommune" placeholder=""
                                required>
                                @foreach ($communes as $commune)
                                <option value="{{$commune->id}}">{{$commune->name}}</option>
                                @endforeach
                            </select>
                            @error('selectedCommune')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <div class="controls">
                            <label class="font-weight-bold text-dark"
                                for="account-e-mail">{{trans('create-service.service-address')}}</label>
                            <input type="phone"
                                class="form-control service-input @error('ServiceAddress') is-invalid @enderror"
                                name="ServiceAddress" wire:model="ServiceAddress" id="account-e-mail"
                                placeholder="Bab Eloued Alger Algeria" required>
                            @error('ServiceAddress')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-1">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark"
                            for="account-company">{{trans('create-service.service-phone')}}</label>
                        <input type="text"
                            class="form-control service-input @error('ServicePhone') is-invalid @enderror"
                            name="ServicePhone" wire:model="ServicePhone" id="account-company"
                            placeholder="+213 559 63 78 45">
                        @error('ServicePhone')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>
        @endif

        @if ($CurrentForm==2)
        {{---Second Form--}}
        <div class="second-form">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark" for="accountTextarea">
                            {{trans('create-service.service-body')}}</label>
                        <textarea class="form-control service-input @error('ServiceBody') is-invalid @enderror"
                            name="ServiceBody" wire:model="ServiceBody" id="accountTextarea" rows="3"
                            placeholder="Entrer votre description ..."></textarea>
                        @error('ServiceBody')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 ">
                    <label class="font-weight-bold text-dark" for="accountTextarea">
                        {{trans('create-service.service-tags')}}</label>
                    <div class="form-group">
                        <input class="select2 form-control service-input @error('ServiceTags') is-invalid @enderror"
                            placeholder="#travail #service " name="ServiceTags" wire:model="ServiceTags" id="tagSelect">





                        @error('ServiceTags')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark"
                            for="account-company">{{trans('create-service.service-position')}}</label>
                        <input type="text"
                            class="form-control service-input @error('ServicePosition') is-invalid @enderror"
                            name="ServicePosition" wire:model="ServicePosition"
                            placeholder="ex: 36.66568982 , 5.265852629">
                        @error('ServicePosition')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12 mb-1">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark"
                            for="account-company">{{trans('create-service.service-website')}} <span class="text-muted"
                                style="font-size:10px;">(Optionel)</span></label>
                        <input type="text"
                            class="form-control service-input @error('ServiceWebsite') is-invalid @enderror"
                            name="ServiceWebsite" wire:model="ServiceWebsite" placeholder="www.service.com">
                        @error('ServiceWebsite')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>



            </div>
        </div>
        @endif

        @if ($CurrentForm==3)
        {{---third Form--}}
        <div class="third-form">


            <div class="row">
                @if ($TypeId==$sell_point_type_id)
                <div class="col-12">
                    <div class="select form-group">
                        <label class="font-weight-bold text-dark"
                            for="account-company">{{trans('create-service.service-home')}}</label>
                        <select type="text"
                            class="form-control service-input @error('ServiceHome') is-invalid @enderror"
                            name="ServiceHome" wire:model="ServiceHome" id="account-company" placeholder="ex: Peugeot">
                            <option value="Peugeot">Peugeot</option>
                            <option value="Renault">Renault</option>
                            <option value="Wolkswagen">Wolkswagen</option>
                        </select>
                        @error('ServiceHome')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark" for="account-facebook">
                            Gmail <span class="text-muted" style="font-size:10px;"></span></label>
                        <input type="email" id="account-gmail" name="ServiceGmail" wire:model="ServiceGmail"
                            class="form-control service-input" placeholder="service@gmail.com">
                        @error('ServiceGmail')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark" for="account-facebook">
                            {{trans('create-service.service-facebook')}} <span class="text-muted"
                                style="font-size:10px;">(Optionel)</span></label>
                        <input type="text" id="account-facebook" name="ServiceFacebook" wire:model="ServiceFacebook"
                            class="form-control service-input @error('ServiceFacebook') is-invalid @enderror"
                            placeholder="https://www.facebook.com">
                        @error('ServiceFacebook')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark"
                            for="account-linkedin">{{trans('create-service.service-linkedin')}} <span class="text-muted"
                                style="font-size:10px;">(Optionel)</span></label>
                        <input type="text" id="account-linkedin" name="ServiceLinkedIn" wire:model="ServiceLinkedIn"
                            class="form-control service-input @error('ServiceLinkedIn') is-invalid @enderror"
                            placeholder="https://www.linkedin.com">
                        @error('ServiceLinkedIn')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="col-12 mb-1">
                    <div class="form-group">
                        <label class="font-weight-bold text-dark"
                            for="account-instagram">{{trans('create-service.service-instagram')}} <span
                                class="text-muted" style="font-size:10px;">(Optionel)</span></label>
                        <input type="text" id="account-instagram" name="ServiceInstagram" wire:model="ServiceInstagram"
                            class="form-control service-input @error('ServiceInstagram') is-invalid @enderror"
                            placeholder="https://www.instagram.com">
                        @error('ServiceInstagram')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>


            </div>

        </div>
        @endif


        @if ($CurrentForm==4)
        {{---Ford Form--}}
        <div class="fourth-form">


            <div class="row">

                <div class="col-12">
                    <label class="font-weight-bold text-dark" for="accountTextarea" class="mb-1">
                        {{trans('create-service.service-days')}}</label>
                    <fieldset class="form-group">
                        <ul class="list-unstyled mb-0">
                            <li class="d-inline-block mr-2">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-success">
                                        <input type="checkbox" id="weekend" wire:model="ServiceDays" value="samedi">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Samedi</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="d-inline-block mr-1">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-success">
                                        <input type="checkbox" id="dimanche" wire:model="ServiceDays" value="dimanche">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Dimanche</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="d-inline-block mr-2">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-success">
                                        <input type="checkbox" id="lundi" wire:model="ServiceDays" value="lundi">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Lundi</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="d-inline-block mr-2">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-success">
                                        <input type="checkbox" id="mardi" wire:model="ServiceDays" value="mardi">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Mardi</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="d-inline-block">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-success">
                                        <input type="checkbox" id="mercredi" wire:model="ServiceDays" value="mercredi">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Mercredi</span>
                                    </div>
                                </fieldset>
                            </li>
                            <li class="d-inline-block">
                                <fieldset>
                                    <div class="vs-checkbox-con vs-checkbox-success">
                                        <input type="checkbox" id="jeudi" wire:model="ServiceDays" value="jeudi">
                                        <span class="vs-checkbox">
                                            <span class="vs-checkbox--check">
                                                <i class="vs-icon feather icon-check"></i>
                                            </span>
                                        </span>
                                        <span class="">Jeudi</span>
                                    </div>
                                </fieldset>
                            </li>
                        </ul>

                        @error('ServiceDays')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </fieldset>
                </div>
                <div class="col-6 mb-1">

                    <fieldset class="form-group">
                        <label class="font-weight-bold text-dark"
                            for="account-company">{{trans('create-service.service-start')}}</label>
                        <select class="form-control service-input @error('hourOfStart') is-invalid @enderror"
                            name="hourOfStart" id="basicSelect" placeholder="10:00 am" wire:model="hourOfStart">
                            <option value="">Choisir Heure de debut</option>
                            <option value="04:00">04:00 am</option>
                            <option value="05:00">05:00 am</option>
                            <option value="06:00">06:00 am</option>
                            <option value="07:00">07:00 am</option>
                            <option value="08:00">08:00 am</option>
                            <option value="09:00">09:00 am</option>
                            <option value="10:00">10:00 am</option>
                            <option value="11:00">11:00 am</option>
                            <option value="12:00">12:00 am</option>

                        </select>

                        @error('hourOfStart')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror

                    </fieldset>
                </div>
                <div class="col-6 mb-1">


                    <fieldset class="form-group">
                        <label class="font-weight-bold text-dark"
                            for="account-company">{{trans('create-service.service-end')}}</label>
                        <select id="basicSelect" name="hourOfEnd"
                            class="form-control service-input @error('hourOfEnd') is-invalid @enderror"
                            placeholder="16:00 am" wire:model="hourOfEnd">
                            <option value=""> Choisir heure de fin</option>

                            <option value="01:00">01:00 pm</option>
                            <option value="02:00">02:00 pm</option>
                            <option value="03:00">03:00 pm</option>
                            <option value="04:00">04:00 pm</option>
                            <option value="05:00">05:00 pm</option>
                            <option value="06:00">06:00 pm</option>
                            <option value="07:00">07:00 pm</option>
                            <option value="08:00">08:00 pm</option>
                            <option value="09:00">09:00 pm</option>
                            <option value="10:00">10:00 pm</option>
                            <option value="11:00">11:00 pm</option>
                            <option value="12:00">12:00 pm</option>
                        </select>

                        @error('hourOfEnd')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </fieldset>
                </div>




            </div>


        </div>
        @endif

        @if ($CurrentForm==5)
        {{-- Fifth Form--}}
        <div class="fifth-form">

            <div class="row">
                <h6 class="m-1">{{trans('create-service.service-activity')}} <span class="text-muted"
                        style="font-size:10px;">(Optionel)</span></h6>
                <div class="col-12 mb-1">
                    <div class="custom-control custom-switch custom-control-inline">
                        <input type="checkbox" name="ServiceShipping" class="custom-control-input"
                            wire:model="ServiceShipping" value="1" id="accountSwitch1">
                        <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                        <span class="switch-label w-100">{{trans('create-service.service-shipping')}}</span>
                        @error('ServiceShipping')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>

                </br>
                <h6 class="mb-1 ml-1">{{trans('create-service.service-shape')}} <span class="text-muted"
                        style="font-size:10px;">(Optionel)</span></h6>
                <div class="col-12 mb-1">
                    <ul class="list-unstyled mb-0">
                        <li class="d-inline-block mr-2">
                            <fieldset>
                                <div class="vs-radio-con vs-radio-warning">
                                    <input type="radio" name="VehiculeShape" wire:model="VehiculeShape" checked
                                        value="moto">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="">{{trans('create-service.service-moto')}}</span>
                                </div>
                            </fieldset>
                        </li>
                        <li class="d-inline-block mr-2">
                            <fieldset>
                                <div class="vs-radio-con vs-radio-warning">
                                    <input type="radio" name="VehiculeShape" wire:model="VehiculeShape" value="master">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="">{{trans('create-service.service-master')}}</span>
                                </div>
                            </fieldset>
                        </li>
                        <li class="d-inline-block mr-2">
                            <fieldset>
                                <div class="vs-radio-con vs-radio-warning">
                                    <input type="radio" name="VehiculeShape" wire:model="VehiculeShape"
                                        value="camionnette">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="">{{trans('create-service.service-camionnette')}}</span>
                                </div>
                            </fieldset>
                        </li>
                        <li class="d-inline-block mr-2">
                            <fieldset>
                                <div class="vs-radio-con vs-radio-warning">
                                    <input type="radio" name="VehiculeShape" wire:model="VehiculeShape" value="benne">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="">{{trans('create-service.service-camion-benne')}}</span>
                                </div>
                            </fieldset>
                        </li>
                        <li class="d-inline-block">
                            <fieldset>
                                <div class="vs-radio-con vs-radio-warning">
                                    <input type="radio" name="VehiculeShape" wire:model="VehiculeShape" value="frigo">
                                    <span class="vs-radio">
                                        <span class="vs-radio--border"></span>
                                        <span class="vs-radio--circle"></span>
                                    </span>
                                    <span class="">{{trans('create-service.service-frigo')}}</span>
                                </div>
                            </fieldset>
                        </li>

                    </ul>
                    @error('VehiculeShape')
                    <span class="text-danger" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="col-12 mb-1">
                    <label class="font-weight-bold text-dark" for="accountTextarea">
                        {{trans('create-service.service-covering-territory')}} <span class="text-muted"
                            style="font-size:10px;">(Optionel)</span></label>
                    <div class="form-group">
                        <select class="form-control service-input @error('ServiceTerritory') is-invalid @enderror"
                            wire:model="ServiceTerritory" name="ServiceTerritory" id="terriSelect">
                            <option value="local">{{trans('create-service.service-local')}}</option>
                            <option value="entreCommunes">{{trans('create-service.service-commune')}}</option>
                            <option value="entreWilayas">{{trans('create-service.service-wilaya')}}</option>
                            <option value="entreRegions">{{trans('create-service.service-region')}}</option>
                        </select>
                        @error('ServiceTerritory')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="col-12 mb-1">
                    <label for="accountTextarea">
                    </label>
                    <div class="form-group">

                        <fieldset>
                            <div class="vs-checkbox-con vs-checkbox-success">
                                <input type="checkbox" name="TermsAgreement" id="TermsAgreement"
                                    wire:model="TermsAgreement" value="ok">
                                <span class="vs-checkbox">
                                    <span class="vs-checkbox--check">
                                        <i class="vs-icon feather icon-check"></i>
                                    </span>
                                </span>
                                <span class="">{{trans('create-service.service-agree')}} <span
                                        class="text-primary">{{trans('create-service.service-terms')}}</span></span>
                            </div>
                        </fieldset>

                        @error('TermsAgreement')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>

            </div>

        </div>
        @endif

        <div class="col-12 d-flex flex-sm-row flex-column justify-content-between">
            @if ($CurrentForm==1)
            <div></div>
            @endif
            @if ($CurrentForm==2 || $CurrentForm==3 || $CurrentForm==4 || $CurrentForm==5)
            <button type="button" class="btn btn-outline-warning mb-1"
                wire:click="decreaseFormValue()">{{trans('create-service.service-back')}}</button>
            @endif
            @if ($CurrentForm==1 || $CurrentForm==2 || $CurrentForm==3 || $CurrentForm==4)
            <button type="button" class="btn btn-outline-primary mb-1"
                wire:click="increaseFormValue()">{{trans('create-service.service-next')}}</button>
            @endif
            @if ($CurrentForm==5)
            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-1">{{trans('create-service.service-send')}}
            </button>
            @endif


        </div>
    </form>
</div>
@push('scripts')

<script>
    /*    window.initSelectDrop=()=>{
                     $('#tagSelect').select2({
                        width: '100%',
                        });
                         
                         $('#daySelect').select2({
                            width: '100%',
                            });
                         $('#terriSelect').select2({
                            width: '100%',
                            });
                 }
                 initSelectDrop();
                
                 window.livewire.on('clixks',()=>{
                     initSelectDrop();
                 });*/
     
       
</script>
@endpush