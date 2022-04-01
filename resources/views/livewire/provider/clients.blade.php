<div>

    @if (count($clients)<1) <!-- First client -->

        @if (count($clien)<1) <section id="basic-button-icons " style="margin-top:50px;">

            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-8 ">
                    <div class="card">
                        <div class="card-header justify-content-center d-flex flex-column">
                            <div class="avatar bg-primary mb-2">
                                <span class="avatar-content" style="width:100px; height:100px;"><i
                                        class="avatar-icon feather icon-users" style="font-size:3rem"></i></span>

                            </div>
                            <h6 class="card-title font-medium-2 text-center ">Ajouter Votre Premier Client

                            </h6>
                            <p class="text-center">Inserer les Information Qui Sont reliées a votre client vous pouvez
                                le contacter avec notre service de messagerie </p>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row match-height">
                                    <div class="col-12 text-center">
                                        <!-- Buttons with Icon -->

                                        <button type="button" class="btn btn-primary font-weight-bold mr-1 mt-2 mb-5"
                                            style="height:47px; border-radius:40px" data-toggle="modal"
                                            data-target="#large"><i class="feather icon-plus-circle "></i>
                                            AJOUTER</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>
            @else
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Clients : {{$total}}</h4>
                                <h6 class="pull-right"> <i class="feather icon-more-horizontal"></i></h6>

                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="d-flex align-items-center mr-2">

                                            <fieldset class=" form-group position-relative has-icon-left my-0 ">
                                                <input type=" text" class="form-control round" name="searchPosition"
                                                    wire:click="searchagency()" wire:model="search"
                                                    placeholder="Rechercher un Client...">
                                                <div class="form-control-position">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class=""><button wire:click="addNew()"
                                                class="btn  btn-primary round font-weight-bold  "><i
                                                    class="feather icon-plus"></i>
                                                AJOUTER</button></div>

                                    </div>
                                    <div class="table-responsive">
                                        <div class="table-responsive mt-1">
                                            <table class="table table-hover-animation mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>NOM</th>
                                                        <th>TELEPHONE</th>
                                                        <th>EMAIL</th>
                                                        <th>SERVICE</th>

                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="8" class="text-center">
                                                            <h4 class="text-primary mt-5 mb-5"><i
                                                                    class="feather icon-alert-triangle"></i> Aucun
                                                                Client
                                                                Trouvé !</h4>
                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif


            <!-- End First client -->


            @else
            <!-- clients -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Clients : {{$total}}</h4>
                                <h6 class="pull-right"> <i class="feather icon-more-horizontal"></i></h6>

                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="d-flex align-items-center mr-2">

                                            <fieldset class=" form-group position-relative has-icon-left my-0 ">
                                                <input type=" text" class="form-control round" name="searchPosition"
                                                    wire:click="searchagency()" wire:model="search"
                                                    placeholder="Rechercher un Client...">
                                                <div class="form-control-position">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class=""><button wire:click="addNew()"
                                                class="btn  btn-primary round font-weight-bold  "><i
                                                    class="feather icon-plus"></i>
                                                AJOUTER</button></div>

                                    </div>
                                    <div class="table-responsive">
                                        <div class="table-responsive mt-1">
                                            <table class="table table-hover-animation mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>NOM</th>
                                                        <th>TELEPHONE</th>
                                                        <th>EMAIL</th>
                                                        <th>SERVICE</th>

                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($clients as $client)
                                                    <tr>
                                                        <td class="p-1">

                                                            <ul
                                                                class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="{{$client->name}}"
                                                                    class=" pull-up">

                                                                    <img class="media-object rounded"
                                                                        src="../../../app-assets/images/icons/client3.png"
                                                                        alt="client" height="50" width="50">
                                                                </li>
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="{{$client->name}}"
                                                                    class=" ml-1 font-weight-bold pull-up">
                                                                    {{ucwords($client->name)}}
                                                                </li>

                                                            </ul>
                                                        </td>


                                                        <td>

                                                            <div class="chip chip-warning mr-1">
                                                                <div class="chip-body">

                                                                    <span class="chip-text">{{$client->phone}} </span>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td>{{$client->email}}</td>
                                                        <td class="font-weight-bold ">{{$client->service->title}}</td>

                                                        <td class="text-center">
                                                            <div class="d-flex justify-content-start">
                                                                <a href=""
                                                                    wire:click.prevent="editClient({{$client->id}})"
                                                                    class="pr-1 text-success"><i
                                                                        class="feather icon-edit font-medium-3"></i></a>
                                                                <a href="" class="pr-1 text-danger"
                                                                    wire:click.prevent="confirmDelete({{$client->id}})"><i
                                                                        class="feather icon-trash font-medium-3"></i></a>
                                                                <a href="{{url('provider/checkout/'.$client->id)}}"
                                                                    class="pr-1 text-primary"><i
                                                                        class="feather icon-shopping-cart font-medium-3"></i></a>
                                                            </div>


                                                        </td>
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center align-items-center mt-1 mb-1 ">
                                                {{$clients->links()}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End clients -->
            @endif



            <!--confirm delete Modal -->
            <div class="modal fade text-left" id="confirmdelete" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel120" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header  bg-transparent white"
                            style="border-radius:0.6rem 0.6rem 0px  0px !important; ">
                            <h5 class="modal-title text-danger" id="myModalLabel120">Confirmation
                            </h5>

                        </div>

                        <div class="modal-body text-center">
                            <div class="text-center mb-2"> <i class="feather icon-x-circle text-danger"
                                    style="font-size:4rem"></i>
                            </div>
                            <span class="font-weight-bold" id="serviceName"> Vous voule Vraiment supprimer le Client
                                nommé
                            </span>
                            <p class="text-primary">{{ucwords($deleted_client_name)}}</p>
                        </div>

                        <div class="modal-footer justify-content-between mt-1">
                            <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal" style="padding: 0;
          border: none;
          background: none;">ANNULER</button>
                            <button type="submit" class="text-success font-weight-bold mr-1" style="padding: 0;
      border: none;
      background: none;" wire:click.prevent="deleteClient">TERMINER</button>
                        </div>

                    </div>
                </div>
            </div>
            <!--end confirm delete Modal -->

            <!-- Create client -->
            <div class="modal fade text-left" wire:ignore.self id="large" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel17" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">

                        </div>
                        <form class="form" wire:submit.prevent="{{$editMode ? 'updateClient':'addClient'}}"
                            method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <div class="avatar bg-primary">
                                        <span class="avatar-content" style="width:50px; height:50px;"><i
                                                class="avatar-icon feather icon-box font-medium-5"></i></span>

                                    </div>
                                    @if ($editMode)
                                    <h4 class="font-weight-bold">Modifier Client</h4>
                                    @else
                                    <h4 class="font-weight-bold">Ajouter Client</h4>
                                    @endif

                                </div>

                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-6">
                                            <h6 class="font-weight-bold ml-1 mb-2">A Quel service appartient Votre
                                                Client ?
                                            </h6>
                                            @if ($editMode)
                                            <fieldset class="form-group">
                                                <select wire:model="client_service" disabled
                                                    class="custom-select service-input @error('client_service') is-invalid @enderror"
                                                    style="height:41px" id="client_service">
                                                    <option value="" selected>Choisir Votre Service</option>

                                                    @foreach ($services as $service)
                                                    <option value="{{$service->id}}">{{$service->title}}</option>
                                                    @endforeach


                                                </select>
                                                @error('client_service')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </fieldset>
                                            @else
                                            <fieldset class="form-group">
                                                <select wire:model="client_service"
                                                    class="custom-select service-input @error('client_service') is-invalid @enderror"
                                                    style="height:41px" id="client_service">
                                                    <option value="" selected>Choisir Votre Service</option>

                                                    @foreach ($services as $service)
                                                    <option value="{{$service->id}}">{{$service->title}}</option>
                                                    @endforeach


                                                </select>
                                                @error('client_service')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </fieldset>
                                            @endif

                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold ml-1 mb-2">Quel est le Nom de Votre Client ?
                                            </h6>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" wire:model.defer="client_name" id="client_name"
                                                    class="form-control @error('client_service') is-invalid @enderror service-input"
                                                    style="height:41px" name="client_name" placeholder="ex:JHON DOE ">
                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                                <label for="contact-floating-icon">Nom </label>
                                                @error('client_name')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-6">


                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" wire:model.defer="client_phone" id="client_phone"
                                                    class="form-control @error('client_service') is-invalid @enderror service-input"
                                                    style="height:41px" name="client_phone"
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
                                                    class="form-control @error('client_service') is-invalid @enderror service-input"
                                                    style="height:41px" name="client_email"
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

                                                <textarea
                                                    class="form-control @error('client_service') is-invalid @enderror service-input"
                                                    wire:model="client_address" name="client_address"
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
                                            class="btn btn-warning font-weight-bold"
                                            data-dismiss="modal">ANNULER</button>
                                        <button type="submit" style="border-radius: 40px"
                                            class="btn btn-primary font-weight-bold">
                                            @if ($editMode)
                                            MODIFIER
                                            @else
                                            TERMINER
                                            @endif

                                        </button>


                                    </div>
                        </form>
                    </div>
                </div>

            </div>
            <!--End  Create client -->

</div>