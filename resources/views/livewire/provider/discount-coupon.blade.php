<div>

    @if (count($discounts))

    <!-- table discount section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="headcpn">
                    <div class="d-flex justify-content-between">
                        <h4 class="mb-0">Reduction</h4>

                        <button class="btn btn-success round float-right font-weight-bold" wire:click.prevent="addNew">
                            <i class="feather icon-plus"></i>Ajouter</button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive mt-1">
                        <table class="table table-hover-animation mb-0">
                            <thead>
                                <tr>
                                    <th>SERVICE</th>
                                    <th>NOM</th>

                                    <th>TAUX</th>
                                    <th>POPULARITE</th>
                                    <th>STATUS</th>
                                    <th>J'USQUA</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($discounts as $discount)
                                <tr>
                                    <td>
                                        <ul class="list-unstyled users-list m-0  d-flex align-items-center">
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-placement="bottom" data-original-title="Trina Lynes"
                                                class="avatar pull-up mr-1">
                                                <img class="media-object rounded-circle"
                                                    src="{{$discount->service->service_image_url}}" alt="Avatar"
                                                    height="30" width="30">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                data-placement="bottom" data-original-title="Lilian Nenez"
                                                class="font-weight-bold">
                                                {{$discount->service->title}}
                                            </li>

                                        </ul>
                                    </td>
                                    <td> {{$discount->title}}</td>

                                    <td>
                                        {{$discount->taux}}%
                                    </td>

                                    <td>
                                        @if ($discount->coupons->count()==0)
                                        {{$discount->coupons->count()}}
                                        @else
                                        <a href="{{url('provider/'.$discount->id.'/coupons')}}"
                                            class="text-primary">{{$discount->coupons->count()}}</a>
                                        @endif

                                    </td>
                                    <td>

                                        @if ($discount->status=="valid")
                                        <i class="bullet bullet-sm bullet-success mr-50"></i>{{$discount->status}}
                                        @else
                                        <i class="bullet bullet-sm bullet-warning mr-50"></i>{{$discount->status}}
                                        @endif
                                    </td>
                                    <td>{{$discount->valid_until}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">

                                            @if ($discount->status=="valid")
                                            <a href="#" class="mr-1" wire:click.prevent="update({{$discount->id}})"><i
                                                    class="font-weight-bold text-primary feather icon-edit"></i>
                                            </a>
                                            @endif
                                            @if ($discount->status=="invalid")
                                            <a class="mr-1" wire:click.prevent="confirmDelete({{$discount->id}})"
                                                href="#"><i
                                                    class="font-weight-bold text-danger feather icon-trash-2"></i>
                                            </a>
                                            @endif

                                            @if ($discount->status=="valid")
                                            <a class="mr-1" wire:click.prevent="unvalidate({{$discount->id}})" href="#">
                                                <i class="font-weight-bold text-warning feather icon-x-square"></i>
                                            </a>
                                            @endif
                                            @if ($discount->status=="valid")

                                            <a href="#" wire:click.prevent="showClientModal({{$discount->id}})"><i
                                                    class="font-weight-bold text-success feather icon-user-plus"></i>
                                            </a>



                                            @endif
                                        </div>
                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SERVICE</th>
                                    <th>NOM</th>

                                    <th>TAUX</th>
                                    <th>POPULARITE</th>
                                    <th>STATUS</th>
                                    <th>J'USQUA</th>
                                    <th>ACTION</th>
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


    <!-- create coupon section   -->
    <div class="modal fade" id="coupone" tabindex="-1" role="dialog" wire:ignore.self
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="mb-0 bg-transparent" style="border-bottom :1px solid #ededed">
                    <h5 class=" mt-2 text-center text-dark" id="exampleModalScrollableTitle"> <span class="text-center">
                            @if ($editMode)
                            <h4 class="font-weight-bold">Modifier Reduction</h4>
                            @else
                            <h4 class="font-weight-bold">Ajouter Reduction</h4>
                            @endif</span>
                    </h5>

                </div>
                <div class="text-center mt-2 p-50 m-0">
                    <div class="avatar-content">
                        <img class="round" src="../../../app-assets/images/icons/coupon.png" alt="avatar" height="50"
                            width="50">
                    </div>
                </div>
                <div class="modal-body ">

                    <form wire:submit.prevent="{{$editMode ? 'updateDiscount':'createDiscount'}}" method="POST">
                        @csrf
                        <h6 class="font-weight-bold ml-1 mb-2">Quel est
                            Votre Service ?</h6>
                        <div class="row">

                            <div class="col-6">

                                <fieldset class="form-group">
                                    <select id="product_service" wire:model="discount_service"
                                        class="custom-select service-input @error('discount_service') is-invalid @enderror"
                                        style="height:41px" id="product_service">
                                        <option value="" selected>Choisir Votre
                                            Service</option>
                                        @foreach ($services as $service)
                                        <option value="{{$service->id}}">
                                            {{$service->title}}</option>
                                        @endforeach



                                    </select>
                                    @error('discount_service')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </fieldset>
                            </div>
                            <div class="col-6">


                                <div class="form-label-group position-relative has-icon-left ">
                                    <input type="text" wire:model="discount_title" id="discount_title"
                                        class="form-control service-input @error('discount_title') is-invalid @enderror"
                                        style="height:41px" name="discount_title" placeholder="ex:Pentalon Levis">
                                    <div class="form-control-position">
                                        <i class="feather icon-tag"></i>
                                    </div>
                                    <label for="contact-floating-icon">Titre </label>
                                    @error('discount_title')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <h6 class="font-weight-bold ml-1 mb-2">le Taux et la Date de Validation</h6>
                        <div class="row">

                            <div class="col-6">


                                <div class="form-label-group position-relative has-icon-left ">
                                    <input type="number" id="rate" wire:model.defer="rate" class="form-control"
                                        style="height:41px" name="rate" placeholder="ex: 50%">
                                    <div class="form-control-position">
                                        <i class="feather icon-percent"></i>
                                    </div>
                                    <label for="contact-floating-icon">Taux </label>
                                    @error('rate')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">


                                <div class="form-label-group position-relative has-icon-left " wire:ignore>
                                    <input type="text" wire:model.lazy="valid_until" id="valid_until"
                                        class="form-control" style="height:41px" name="valid_untill"
                                        placeholder="ex:date">
                                    <div class="form-control-position">
                                        <i class="feather icon-calendar"></i>
                                    </div>
                                    <label for="contact-floating-icon">Date </label>
                                    @error('valid_until')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-danger rounded font-weight-bold ml-1"
                        style="border-radius:40px ! important;" data-toggle="modal" data-target="#coupone">
                        ANNULER</button>
                    <button type="submit" class="btn btn-primary rounded font-weight-bold mr-1"
                        style="border-radius:40px ! important;">
                        TERMINER</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- create coupon section end  -->

    <!-- no delete no update -->
    <div class="modal fade text-left" id="alreadygiven" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-white text-dark"
                    style="border-bottom-left-radius: 0;border-bottom-right-radius: 0">
                    <span style="color:green">Action non autorisé</span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="bg-transparent mb-0 px-2">



                        <div class="card-content">

                            <div class="card-body pt-1">
                                <div class="text-center mb-2"> <i class="feather icon-alert-triangle text-danger"
                                        style="font-size:4rem"></i>
                                </div>
                                <h6 class="text-center mb-1">Votre Réduction est Utilisée par des clients vous ne pouvez
                                    ni la modifiée ni la supprimée
                                </h6>
                            </div>
                        </div>
                        <div class="login-footer">

                            <div class="footer-btn d-inline">


                                <a href="" data-dismiss="modal" class="font-weight-bold text-primary float-right" style="padding: 0;
                            border: none;
                            background: none;">Compris</span></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!--confirm delete Modal -->
    <div class="modal fade text-left" id="confirmdelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header  bg-transparent white"
                    style="border-radius:0.6rem 0.6rem 0px  0px !important; ">
                    <h5 class="modal-title text-danger" id="myModalLabel120">
                        Confirmation
                    </h5>

                </div>

                <div class="modal-body text-center">
                    <div class="text-center mb-2"> <i class="feather icon-x-circle text-danger"
                            style="font-size:4rem"></i>
                    </div>
                    <span class="font-weight-bold" id="serviceName"> Vous voule Vraiment
                        supprimer la Réduction
                        intitulée
                    </span>
                    <p class="text-primary">{{$deleted_discount_name}}</p>
                </div>

                <div class="modal-footer justify-content-between mt-1">
                    <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal"
                        style="padding: 0;border: none; background: none;">ANNULER</button>
                    <button type="submit" class="text-success font-weight-bold mr-1"
                        style="padding: 0;border: none;background: none;"
                        wire:click.prevent="deleteDiscount">TERMINER</button>
                </div>

            </div>
        </div>
    </div>
    <!--end confirm delete Modal -->

    <!-- add coupon to a client -->
    <div class="modal fade" id="clients" wire:ignore.self tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="mb-0 bg-transparent" style="border-bottom :1px solid #ededed">
                    <h4 class=" mt-2 text-center text-dark" id="exampleModalScrollableTitle"> <span class="text-center">
                            CHOISIR
                            CLIENT</span>
                    </h4>



                </div>

                <div class="modal-body">
                    <div class="alert alert-info ml-2 mr-2 mb-2" role="alert">
                        <button type="button" class="close text-primary font-weight-bold top-0" style="line-height:0.7"
                            data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="alert-heading"><i class="feather icon-star mr-1 align-middle"></i>
                            Remarque</h4>
                        <span>
                            Les coupons peuvent <strong> attirer</strong> des clients vers votre
                            service,
                            stimuler l'engagement des clients existants et générer de nouveaux <strong>
                                revenus</strong>.</span>

                    </div>
                    <div class="d-flex align-items-center mb-4 mt-1">

                        <fieldset class="form-group position-relative has-icon-left  my-0 w-100">
                            <input type="text" class="form-control round" style="background:#f7f8fa !important"
                                name="searchPosition" wire:model="search" placeholder="Rechercher un Client...">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
                        </fieldset>
                    </div>

                    @forelse ($clients as $client)

                    <div class="d-flex justify-content-between mt-2 mb-2 ">


                        <div class="d-flex justify-content-start ml-1">
                            <img class="media-object rounded mr-2" src="../../../app-assets/images/icons/client3.png"
                                alt="client" height="40" width="40">
                            <div class="d-flex flex-column">


                                <div class="default-collapse collapse-bordered">
                                    <div class="card collapse-header" style="box-shadow:none;">
                                        <div id="headingCollapse{{$client->id}}" data-toggle="collapse" role="button"
                                            data-target="#collapse{{$client->id}}" aria-expanded="false"
                                            aria-controls="collapse{{$client->id}}">
                                            <span class="lead collapse-title font-weight-bold text-dark cursor-pointer"
                                                style="font-size:1.2rem;">
                                                {{$client->name}} <i class="feather icon-chevron-down "></i>
                                            </span>
                                        </div>
                                        <div id="collapse{{$client->id}}" role="tabpanel"
                                            aria-labelledby="headingCollapse{{$client->id}}" wire:ignore.self
                                            class="collapse">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <p class="text-dark text-left font-weight-bold">Total: <span
                                                            class="text-danger">{{number_format($client->totalsale, 2, ',', ' ') }}
                                                            DA</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="" class="font-weight-bold"><i class="feather icon-settings"></i>
                                    {{$client->service->title}}</a>
                            </div>

                        </div>

                        <div class="mr-2" style="margin-top:0.4rem">
                            <a wire:click.prevent="giveCouponToClient({{$client->id}})" class="text-success"
                                style="font-size:2rem"> <i class="feather icon-user-check"></i></a>
                        </div>
                    </div>

                    @empty

                    @endforelse





                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a class="text-primary font-weight-bold" data-dismiss="modal"> FERMER</a>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script3')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    flatpickr("#valid_until", {
            altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
        
        });
    
</script>

@endsection