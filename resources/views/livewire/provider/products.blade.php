<div>

    @if (count($products)<1) <!-- First Product -->
        @if (count($prod)<1) <section id="basic-button-icons " style="margin-top:70px;">

            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-8 ">
                    <div class="card">
                        <div class="card-header justify-content-center d-flex flex-column">
                            <div class="avatar bg-primary mb-2">
                                <span class="avatar-content" style="width:100px; height:100px;"><i
                                        class="avatar-icon feather icon-box" style="font-size:3rem"></i></span>

                            </div>
                            <h6 class="card-title font-medium-2 text-center ">Ajouter Votre Premier Produit

                            </h6>
                            <p class="text-center">Inserer les Information Qui Sont reliées a votre produi vendu
                                ou votre travail en
                                mentionant le prix </p>
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

            <!-- End First Product -->
            @else
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Produits : {{$total}}</h4>
                                <h6 class="pull-right"> <i class="feather icon-more-horizontal"></i></h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">

                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="d-flex align-items-center">

                                            <fieldset class=" form-group position-relative has-icon-left my-0 ">
                                                <input type=" text" class="form-control round" name="searchPosition"
                                                    wire:click="searchagency()" wire:model="search"
                                                    placeholder="Rechercher un Client...">
                                                <div class="form-control-position">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <button wire:click="addNew()" class="btn btn-primary font-weight-bold round"><i
                                                class="feather icon-plus"></i>
                                            AJOUTER</button>
                                    </div>
                                    <div class="table-responsive">
                                        <div class="table-responsive mt-1">
                                            <table class="table table-hover-animation mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>NOM</th>
                                                        <th>STATUS</th>
                                                        <th>SERVICE</th>
                                                        <th>PRIX</th>
                                                        <th>DATE CREATION</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="8" class="text-center ">
                                                            <h4 class="text-primary mt-5 mb-5"><i
                                                                    class="feather icon-alert-triangle"></i> Aucun
                                                                Produit
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



            @else
            <!-- Products -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> Produits : {{$total}}</h4>
                                <h6 class="pull-right"> <i class="feather icon-more-horizontal"></i></h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">

                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="d-flex align-items-center">

                                            <fieldset class=" form-group position-relative has-icon-left my-0 ">
                                                <input type=" text" class="form-control round" name="searchPosition"
                                                    wire:click="searchagency()" wire:model="search"
                                                    placeholder="Rechercher un Client...">
                                                <div class="form-control-position">
                                                    <i class="feather icon-search"></i>
                                                </div>
                                            </fieldset>
                                        </div>

                                        <button wire:click="addNew()" class="btn btn-primary font-weight-bold round"><i
                                                class="feather icon-plus"></i>
                                            AJOUTER</button>
                                    </div>

                                    <div class="table-responsive">
                                        <div class="table-responsive mt-1">
                                            <table class="table table-hover-animation mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>NOM</th>
                                                        <th>STATUS</th>
                                                        <th>SERVICE</th>
                                                        <th>PRIX</th>
                                                        <th>DATE CREATION</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($products as $product)
                                                    <tr>
                                                        <td class="p-1">

                                                            <ul
                                                                class="list-unstyled users-list m-0  d-flex align-items-center">
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Vinnie Mostowy"
                                                                    class=" pull-up">
                                                                    <img class="media-object rounded"
                                                                        src="{{$product->product_image_url}}"
                                                                        alt="Avatar" height="60" width="60">
                                                                </li>
                                                                <li data-toggle="tooltip" data-popup="tooltip-custom"
                                                                    data-placement="bottom"
                                                                    data-original-title="Elicia Rieske"
                                                                    class=" ml-1 font-weight-bold pull-up">
                                                                    {{$product->name}}
                                                                </li>

                                                            </ul>
                                                        </td>
                                                        <td>
                                                            @if ($product->status=="available")
                                                            <i
                                                                class="fa fa-circle font-small-3 text-success mr-50"></i>{{trans('products.'.$product->status)}}
                                                            @else
                                                            <i
                                                                class="fa fa-circle font-small-3 text-danger mr-50"></i>{{trans('products.'.$product->status)}}
                                                            @endif


                                                        </td>
                                                        <td class="p-1">
                                                            {{$product->service->title}}
                                                        </td>
                                                        <td class="text-danger">
                                                            {{$product->unit_price}} </td>

                                                        <td>{{$product->created_at}}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <a href=""
                                                                    wire:click.prevent="editProduct({{$product->id}})"
                                                                    class="pr-1 text-success"><i
                                                                        class="feather icon-edit font-medium-3"></i></a>
                                                                <a href="" class="pr-1 text-danger"
                                                                    wire:click.prevent="confirmDelete({{$product->id}})"><i
                                                                        class="feather icon-trash font-medium-3"></i></a>
                                                                @if($product->status=="available")
                                                                <a class="text-warning"
                                                                    wire:click.prevent="changeStatus({{$product->id}})"
                                                                    title="Marquer Comme NON DISPONIBLE"><i
                                                                        class="feather icon-alert-circle font-medium-3"></i></a>
                                                                @else
                                                                <a class="text-primary"
                                                                    wire:click.prevent="changeStatus({{$product->id}})"
                                                                    title="Marquer Comme  DISPONIBLE"><i
                                                                        class="feather icon-check-circle font-medium-3"></i></a>
                                                                @endif

                                                            </div>


                                                        </td>
                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                            <div class="d-flex justify-content-center align-items-center mt-1 mb-1 ">
                                                {{$products->links()}}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Products -->
            @endif



            <!--confirm delete Modal -->
            <div class="modal fade text-left" id="confirmdelete" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel120" aria-hidden="true">
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
                                supprimer le Produit
                                intitulé
                            </span>
                            <p class="text-primary">{{$deleted_product_name}}</p>
                        </div>

                        <div class="modal-footer justify-content-between mt-1">
                            <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal" style="padding: 0;
      border: none;
      background: none;">ANNULER</button>
                            <button type="submit" class="text-success font-weight-bold mr-1" style="padding: 0;
  border: none;
  background: none;" wire:click.prevent="deleteProduct">TERMINER</button>
                        </div>

                    </div>
                </div>
            </div>
            <!--end confirm delete Modal -->

            <!-- Create product -->
            <div class="modal fade text-left" wire:ignore.self id="large" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel17" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-transparent">

                        </div>
                        <form class="form" wire:submit.prevent="{{$editMode ? 'updateProduct':'addProduct'}}"
                            method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <div class="avatar bg-primary">
                                        <span class="avatar-content" style="width:50px; height:50px;"><i
                                                class="avatar-icon feather icon-box font-medium-5"></i></span>

                                    </div>
                                    @if ($editMode)
                                    <h4 class="font-weight-bold">Modifier Produit</h4>
                                    @else
                                    <h4 class="font-weight-bold">Ajouter Produit</h4>
                                    @endif

                                </div>

                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-6">
                                            <h6 class="font-weight-bold ml-1 mb-2">Quel est
                                                Votre Service ?</h6>
                                            @if ($editMode)
                                            <fieldset class="form-group">
                                                <select wire:model="product_service" disabled
                                                    class="custom-select service-input @error('product_service') is-invalid @enderror"
                                                    style="height:41px" id="product_service">
                                                    <option value="" selected>Choisir Votre
                                                        Service</option>
                                                    @foreach ($services as $service)
                                                    <option value="{{$service->id}}">
                                                        {{$service->title}}</option>
                                                    @endforeach


                                                </select>
                                                @error('product_service')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </fieldset>
                                            @else
                                            <fieldset class="form-group">
                                                <select wire:model="product_service"
                                                    class="custom-select service-input @error('product_service') is-invalid @enderror"
                                                    style="height:41px" id="product_service">
                                                    <option value="" selected>Choisir Votre
                                                        Service</option>
                                                    @foreach ($services as $service)
                                                    <option value="{{$service->id}}">
                                                        {{$service->title}}</option>
                                                    @endforeach


                                                </select>
                                                @error('product_service')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </fieldset>
                                            @endif

                                        </div>
                                        <div class="col-6">
                                            <h6 class="font-weight-bold ml-1 mb-2">Comment Vous
                                                Travailez ?</h6>
                                            <fieldset class="form-group">
                                                <select
                                                    class="custom-select service-input @error('pay_type') is-invalid @enderror"
                                                    wire:model="pay_type" style="height:41px" id="pay_type">
                                                    <option value="hour">Heure</option>

                                                    <option selected value="day">Jour</option>
                                                    <option value="week">Semaine</option>
                                                    <option value="month">Month</option>

                                                    <option value="piece">Piéce</option>
                                                    <option value="task">Tache</option>
                                                    <option value="check-up">Visite</option>
                                                    <option value="sergery">Operation</option>
                                                    <option value="meter">Mètre</option>
                                                    <option value="kilograme">Kilograme</option>
                                                    <option value="project">Projet</option>
                                                    <option value="shipping">Shipping</option>
                                                    <option value="event">Evenement</option>


                                                </select>
                                                @error('pay_type')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </fieldset>
                                        </div>


                                        <div class="col-6">


                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" wire:model.defer="product_name" id="product_name"
                                                    class="form-control service-input @error('product_name') is-invalid @enderror"
                                                    style="height:41px" name="product_name"
                                                    placeholder="ex:Pentalon Levis">
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                                <label for="contact-floating-icon">Nom </label>
                                                @error('product_name')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="number" wire:model="product_price" id="product_price"
                                                    class="form-control service-input @error('product_price') is-invalid @enderror"
                                                    style="height:41px" name="product_price" placeholder="2000 DA">
                                                <div class="form-control-position">
                                                    <i class="feather icon-credit-card"></i>
                                                </div>
                                                <label for="contact-floating-icon">Prix
                                                    Unitaire</label>
                                                @error('product_price')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">

                                                <textarea
                                                    class="form-control service-input @error('product_description') is-invalid @enderror"
                                                    wire:model="product_description" name="product_description"
                                                    id="product_description" rows="3"
                                                    placeholder="Entrer votre description ..."></textarea>
                                                <div class="form-control-position">
                                                    <i class="feather icon-list"></i>
                                                </div>
                                                <label for="accountTextarea">Description</label>
                                                @error('product_description')
                                                <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12">

                                            <div class="first-form">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        @if ($product_image)

                                                        @if ($product_image==$OldImage)
                                                        <img src="{{$state['product_image_url']}}" class="rounded mr-75"
                                                            alt="profile image" height="64" width="64">
                                                        @else
                                                        <img src="{{$product_image->temporaryUrl() }}"
                                                            class="rounded mr-75" alt="profile image" height="64"
                                                            width="64">
                                                        @endif

                                                        @else
                                                        <img src="./../../app-assets/images/banner/product.png"
                                                            class="rounded mr-75" alt="profile image" height="64"
                                                            width="64">
                                                        @endif

                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label
                                                                class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                                for="account-upload" name="product" id="product">


                                                                @if ($product_image)
                                                                @if ($product_image!=$OldImage)
                                                                {{$product_image->getClientOriginalName()}}
                                                                @else
                                                                changer Image
                                                                @endif
                                                                @else
                                                                {{trans('create-service.Choisir-une-Photo')}}
                                                                @endif
                                                            </label>
                                                            <input type="file" name="product_image" id="account-upload"
                                                                wire:model="product_image" hidden>
                                                            <button
                                                                class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                                        </div>
                                                        <p class="text-muted ml-75 mt-50">
                                                            <small>Allowed JPG, GIF or
                                                                PNG. Max
                                                                size of
                                                                800kB</small></p>
                                                    </div>
                                                    @error('product_image')
                                                    <span class="text-danger" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
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
            <!--End  Create product -->

</div>