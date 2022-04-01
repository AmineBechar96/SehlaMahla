<div>

    <!-- Column selectors with Export Options and print table -->
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header mb-2">
                        <h4 class="card-title">Factures</h4>
                        <h6 class="pull-right"> <i class="feather icon-more-horizontal"></i></h6>

                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center mr-2">

                                    <fieldset class=" form-group position-relative has-icon-left my-0 ">
                                        <input type=" text" class="form-control round" name="searchPosition"
                                            wire:model="searchInvoice" placeholder="Rechercher un Client...">
                                        <div class="form-control-position">
                                            <i class="feather icon-search"></i>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class=""><button class="btn btn-primary round btn-block font-weight-bold "
                                        wire:click="chooseClient"><i class="feather icon-plus"></i>
                                        AJOUTER</button> </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                            <th>Numero</th>
                                            <th>Date</th>
                                            <th>Client</th>
                                            <th>Telephone</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Date</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse ($invoices as $invoice)
                                        <tr>
                                            <td class="text-primary font-weight-bold">
                                                {{$invoice->invoice_number}}</td>
                                            <td>{{$invoice->invoice_date}}</td>
                                            <td><a wire:click.prevent="showClientDetails({{$invoice->client->id}})"
                                                    class="text-info">{{$invoice->client->name}}</a>
                                            </td>
                                            <td>{{$invoice->client->phone}}</td>
                                            <td class="font-weight-bold">
                                                {{ number_format($invoice->total, 2, ',', ' ') }} DA </td>
                                            <td>
                                                @if ($invoice->status=="paid")
                                                <span
                                                    class="btn btn-sm btn-outline-success text-success font-weight-bold">{{trans('invoice.'.$invoice->status)}}</span>
                                                @elseif($invoice->status=="partially_paid")
                                                <span
                                                    class="btn btn-sm btn-outline-warning text-warning font-weight-bold">{{trans('invoice.'.$invoice->status)}}</span>
                                                @else
                                                <span
                                                    class="btn btn-sm btn-outline-danger text-danger font-weight-bold">{{trans('invoice.'.$invoice->status)}}</span>
                                                @endif

                                            </td>
                                            <td class="">{{$invoice->created_at}}
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <i class="feather icon-more-horizontal pr-1 text-secondary cursor-pointer"
                                                        id="dropdownMenuButton2" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"></i>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                                        <a class="dropdown-item"
                                                            href="{{url('provider/invoices/edit/'.$invoice->id)}}"> <i
                                                                class="feather icon-edit  text-primary cursor-pointer"></i>&nbsp;
                                                            Modifier</a>
                                                        <a class="dropdown-item" href="#"
                                                            wire:click.prevent="confirmDelete({{$invoice->id}})"><i
                                                                class="feather icon-trash-2  text-danger cursor-pointer"></i>&nbsp;
                                                            Supprimer</a>
                                                        <a class="dropdown-item"
                                                            href="{{url('provider/invoices/'.$invoice->id)}}"><i
                                                                class="feather icon-eye text-info cursor-pointer"></i>&nbsp;
                                                            Voir</a>
                                                        <div class="dropdown-divider"></div>
                                                        <div class="ml-2 text-dark ">Marquer Comme:
                                                        </div>
                                                        <div class="dropdown-divider"></div>

                                                        @if ($invoice->status=="paid")
                                                        <a class="dropdown-item"
                                                            wire:click.prevent="changeStatus({{$invoice->id}},'unpaid')">
                                                            <i
                                                                class="feather icon-credit-card text-danger cursor-pointer"></i>&nbsp;
                                                            Non Payé</a>
                                                        <a class="dropdown-item"
                                                            wire:click.prevent="changeStatus({{$invoice->id}},'partially_paid')"><i
                                                                class="feather icon-credit-card text-warning cursor-pointer"></i>&nbsp;
                                                            Parciallement Payé</a>
                                                        @elseif($invoice->status=="partially_paid")
                                                        <a class="dropdown-item"
                                                            wire:click.prevent="changeStatus({{$invoice->id}},'paid')">
                                                            <i
                                                                class="feather icon-credit-card text-success cursor-pointer"></i>&nbsp;
                                                            Payé</a>
                                                        <a class="dropdown-item"
                                                            wire:click.prevent="changeStatus({{$invoice->id}},'unpaid')"><i
                                                                class="feather icon-credit-card text-danger cursor-pointer"></i>&nbsp;
                                                            Non Payé</a>
                                                        @else
                                                        <a class="dropdown-item"
                                                            wire:click.prevent="changeStatus({{$invoice->id}},'paid')">
                                                            <i
                                                                class="feather icon-credit-card text-success cursor-pointer"></i>&nbsp;
                                                            Payé</a>
                                                        <a class="dropdown-item"
                                                            wire:click.prevent="changeStatus({{$invoice->id}},'partially_paid')"><i
                                                                class="feather icon-credit-card text-warning cursor-pointer"></i>&nbsp;
                                                            Parciallement Payé</a>
                                                        @endif



                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="mt-5 mb-5">
                                            <td class="text-center" colspan="8"> YOU HAVE NO INVOICE YET</td>
                                        </tr>
                                        @endforelse


                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Numero</th>
                                            <th>Date</th>
                                            <th>Client</th>
                                            <th>Telephone</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Column selectors with Export Options and print table -->


    <!-- Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">

                <div class="modal-header bg-transparent">

                </div>

                <div class="modal-body">


                    <div class="text-center mb-3">
                        <div class="avatar bg-primary mb-5">
                            <span class="avatar-content" style="width:50px; height:50px;"><img
                                    class="media-object rounded" src="../../../app-assets/images/icons/client3.png"
                                    alt="client" height="80" width="80"></span>

                        </div>

                        <h3 class="font-weight-bold">{{$clientName}}</h3>
                        <p class="text-muted">{{$clientEmail}}</p>

                    </div>
                    <div class="text-center">
                        <h5>Service</h5>
                        <p>{{$clientService}}</p>
                        <h5>Addresse</h5>
                        <p>{{$clientAddress}}</p>
                        <h5>Téléphone</h5>
                        <p>{{$clientPhone}}</p>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a class="text-primary font-weight-bold" data-dismiss="modal">FERMER</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable" wire:ignore.self tabindex="-1" role="dialog"
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

                    <div class="d-flex align-items-center mb-4 mt-1">

                        <fieldset class="form-group position-relative has-icon-left  my-0 w-100">
                            <input type="text" class="form-control round" style="background:#f7f8fa !important"
                                name="searchPosition" wire:model="search" placeholder="Rechercher un Produit...">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
                        </fieldset>
                    </div>
                    @forelse ($clients as $client)
                    <a href="{{url('provider/checkout/'.$client->id)}}">
                        <div class="d-flex   justify-content-between mt-2 mb-2 ">


                            <div class="d-flex justify-content-start ml-1"><img class="media-object rounded mr-2"
                                    src="../../../app-assets/images/icons/client3.png" alt="client" height="45"
                                    width="45"></span>
                                <div class="d-flex flex-column">
                                    <h6 class="">{{$client->name}}</h6>
                                    <p><i class="feather icon-settings"></i> {{$client->service->title}}</p>
                                </div>

                            </div>

                            <div class="mr-2" style="margin-top:0.4rem">
                                <a href="{{url('provider/checkout/'.$client->id)}}" class="text-success"
                                    style="font-size:2rem"> <i class="feather icon-user-check"></i></a>
                            </div>
                        </div>
                    </a>
                    @empty

                    @endforelse





                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a class="text-primary font-weight-bold" data-dismiss="modal"> FERMER</a>
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
                    <h5 class="modal-title text-danger" id="myModalLabel120">Confirmation
                    </h5>

                </div>

                <div class="modal-body text-center">
                    <div class="text-center mb-2"> <i class="feather icon-x-circle text-danger"
                            style="font-size:4rem"></i>
                    </div>
                    <span class="font-weight-bold" id="serviceName"> Vous voule Vraiment supprimer la Facture
                        Numéro
                    </span>
                    <p class="text-primary">{{$deleted_invoice_name}}</p>
                </div>

                <div class="modal-footer justify-content-between mt-1">
                    <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal" style="padding: 0;
border: none;
background: none;">ANNULER</button>
                    <button type="submit" class="text-success font-weight-bold mr-1" style="padding: 0;
border: none;
background: none;" wire:click.prevent="deleteInvoice">TERMINER</button>
                </div>

            </div>
        </div>
    </div>
    <!--end confirm delete Modal -->


</div>