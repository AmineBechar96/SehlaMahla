<div>
    @if ($invoice)
    @if ($param)
    <section id="place-order" class="list-view product-checkout">
        <div class="card">
            <div class="c-header mb-3">
                <div class="d-flex justify-content-between">
                    <h4 class="mt-1">PRODUITS</h4>
                    <div class="d-flex align-items-center">

                        <fieldset class="form-group position-relative has-icon-left  my-0 w-100">
                            <input type="text" class="form-control round" name="searchPosition"
                                wire:click="searchagency()" wire:model="search" placeholder="Rechercher un Produit...">
                            <div class="form-control-position">
                                <i class="feather icon-search"></i>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="checkout-items">

                    <section id="bg-variants">
                        <p class="font-weight-bold text-dark mb-1"> Total : {{count($total)}}</p>
                        <div class="row">
                            @forelse ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class=" shadow card text-center bg-transparent cursor-pointer" style="box-shadow: 0 0.5rem 1rem rgb(34 41 47 / 25%) !important;
                                }
                                
                                ">
                                    <div class="card-content">
                                        <img src="{{$product->product_image_url}}" alt="element 04"
                                            class="img-fluid prod">
                                        <div class="card-body">
                                            <h6 class="">{{$product->name}}</h6>
                                            <p class="card-text mb-25 font-weight-bold text-primary">
                                                {{$product->unit_price}} DA / <span
                                                    class="text-success">{{$product->pay_type}}</span></p>

                                            <button wire:click="addItem({{$product->id}})" class="btn btn-info mt-1"><i
                                                    class="feather icon-shopping-cart"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty

                            <div class="col-lg-12 mt-5">
                                <h4 class="text-primary text-center"><i class="feather icon-alert-triangle"></i> Aucun
                                    Produit Trouvé
                                </h4>
                            </div>
                            @endforelse

                        </div>
                    </section>

                </div>
                <div class="d-flex justify-content-center align-items-center mt-1 mb-1 ">
                    {{$products->links()}}
                </div>
            </div>
        </div>
        <div class="checkout-options">
            @if ($coupon)
            <div class="alert alert-danger ml-2 mr-2 mb-2" role="alert">
                <h4 class="alert-heading"><i class="feather icon-bell mr-1 align-middle"></i>
                    Coupone</h4>
                <span>
                    <strong> {{ucwords($coupon->client->name)}}</strong>
                    a utiliser le coupone <strong> {{$coupon->code}}</strong> sur cet achat n'oubliez pas
                    d'appliquer
                    </strong>.</span>
            </div>@endif
            <div class="card">
                <div class="card-content">

                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="options-title mt-1">Panier
                            </p>
                            <div class="float-right pt-0">
                                <div class="avatar bg-primary ">
                                    <div class="avatar-content position-relative">
                                        <i class="avatar-icon feather icon-shopping-cart"></i>
                                        @if (count($carts)<1) @else <span
                                            class="badge badge-pill badge-danger badge-sm badge-up">
                                            {{count($carts)}}</span>
                                            @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-1">
                            <table class="table table-hover-animation mb-0 ">
                                <thead style="border-top:none" class="text-dark">
                                    <tr>
                                        <th class="noborder" scope="1">NOM</th>
                                        <th class="noborder" scope="1">QUANTITE</th>
                                        <th class="noborder" scope="1">MONTANT</th>
                                        <th class="noborder" scope="1"></th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @forelse ($carts as $index=>$cart)
                                    <tr>

                                        <td class="font-weight-bold" style="font-size:0.9rem">
                                            {{$cart['name']}}</td>
                                        <td class="text-center">
                                            <a href="" wire:click.prevent="increaseQty('{{$cart['rowId']}}')"
                                                class="btn btn-primary font-medium-1"
                                                style="padding:5px; width:20px; height:20px; line-height: 0.8; margin-right:0.4rem;">+</a>
                                            {{$cart['qty']}}
                                            <a href="" wire:click.prevent="decreaseQty('{{$cart['rowId']}}')"
                                                class="btn btn-info font-medium-1"
                                                style="padding:5px; width:20px; height:20px; line-height: 0.8; margin-left:0.4rem;">-</a>

                                        </td>
                                        <td class="text-center text-success font-weight-bold" style="font-size:0.9rem">
                                            {{$cart['price']}} DA</td>
                                        <td colspan="1" class="mr-0 pr-0">

                                            <a href="" wire:click.prevent="removeItem('{{$cart['rowId']}}')"
                                                class="text-danger  mr-0 pr-0"> <i
                                                    class="feather icon-trash-2 font-medium-1 "></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <div class=" text-center">
                                            <h6 class="font-weight-bold text-warning"> VOTRE PANIER EST VIDE</h6>
                                        </div>
                                    </tr>

                                    @endforelse
                                </tbody>
                                <thead style="border-top:none" class="text-dark">
                                    <tr>

                                        <th class="noborder" scope="1">NOM</th>
                                        <th class="noborder" scope="1">QUANTITE</th>
                                        <th class="noborder" scope="1">MONTANT</th>
                                        <th class="noborder" scope="1"></th>
                                    </tr>
                                </thead>
                            </table>


                            <!--div class="col-12 mt-5">
                                <h6 class="font-weight-bold  text-center mb-2">Souhaitez-vous inclure une Réduction ?
                                </h6>
                                <fieldset class="form-group">
                                    <select class="custom-select font-weight-bold text-success text-center"
                                        wire:model="discount" style="height:41px" id="pay_type">
                                        <option value="0%" class="pb-1">Non, je n'inclurai pas les frais
                                        </option>

                                        <option class="p-1" value="5%">Oui, j'inclurai les frais

                                        </option>

                                    </select>
                                    @error('pay_type')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </fieldset>
                            </div-->


                        </div>

                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="options-title">DETAILS DE PRIX</p>
                            <a wire:click.prevent="editParam">
                                <i class="feather icon-settings font-medium-4 cursor-pointer"></i>
                            </a>
                        </div>
                        <hr>
                        <div class="price-details">
                            <p>Récapitulatif du Panier
                            </p>
                        </div>
                        <div class="detail">
                            <div class="detail-title">
                                SOUS-TOTAL

                            </div>
                            <div class="detail-amt">
                                {{ number_format($summary['sub_total'], 2, ',', ' ') }} DA
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-title">
                                TAX
                            </div>
                            <div class="detail-amt discount-amt">
                                {{number_format($summary['tva'], 2, ',', ' ') }} DA
                            </div>
                        </div>


                        <div class="detail">
                            <div class="detail-title">
                                LIVRAISON
                            </div>
                            <div class="detail-amt discount-amt">
                                {{number_format((($summary['shipping']*$summary['sub_total'])/100), 2, ',', ' ') }} DA
                            </div>
                        </div>
                        <div class="detail">
                            <div class="detail-title">
                                REDUCTION
                            </div>
                            <div class="detail-amt discount-amt">
                                {{number_format((($summary['discount']*$summary['sub_total'])/100), 2, ',', ' ') }} DA
                            </div>
                        </div>



                        <div class="detail">
                            <div class="detail-title detail-total">TOTAL</div>
                            <div class="detail-amt total-amt">
                                {{ number_format(($summary['total']+(($summary['shipping']*$summary['sub_total'])/100)-(($summary['discount']*$summary['sub_total'])/100)), 2, ',', ' ') }}
                                DA
                            </div>
                        </div>
                        <hr>

                        <!--div class="row">
                            <h6 class="ml-1 mb-2 mt-1">Vous Voulez Ajouter le TVA ?</h6>
                            <div class="col-sm-6">
                                <div wire:click="enableTVA"
                                    class="btn btn-primary btn-block cursor-pointer  place-order  mb-1">
                                    <i class="feather icon-plus-circle"></i> OUI</div>
                            </div>
                            <div class="col-sm-6">
                                <div wire:click="disableTVA"
                                    class="btn btn-warning btn-block cursor-pointer place-order   mb-2">
                                    <i class="feather icon-x-circle"></i> NON</div>
                            </div>
                        </div-->


                        <div class="btn btn-success btn-block cursor-pointer place-order font-weight-bold "
                            wire:click="saveTransaction"><i class="feather icon-save"></i> ENREGESTRER FACTURE</div>

                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- Basic Button Icon end -->
    @endif
    @else
    <!-- maintenance -->
    <section class="row flexbox-container">
        <div class="col-xl-12 col-md-12 col-12 d-flex justify-content-center">
            <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                <div class="card-content">
                    <div class="card-body text-center">
                        <img src="../../../app-assets/images/pages/not-authorized.png"
                            class="img-fluid align-self-center" alt="branding logo">
                        <h1 class="font-large-2 my-2">You are not authorized!</h1>
                        <p class="p-2">
                            paraphonic unassessable foramination Caulopteris worral Spirophyton encrimson esparcet
                            aggerate chondrule
                            restate whistler shallopy biosystematy area bertram plotting unstarting quarterstaff.
                        </p>
                        <a class="btn btn-primary btn-lg mt-2" href="index.html">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- maintenance end -->

    @endif


    <!-- Create product -->
    <div class="modal fade text-left" wire:ignore.self id="large" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel17" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-transparent">

                </div>
                <form class="form" wire:submit.prevent="updateParam" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="text-center mb-3">
                            <div class="avatar bg-primary">
                                <span class="avatar-content" style="width:50px; height:50px;"><i
                                        class="avatar-icon feather icon-file-text font-medium-5"></i></span>

                            </div>

                            <h4 class="font-weight-bold">Modifier Paramèters</h4>


                        </div>

                        <div class="form-body">
                            <div class="row">



                                <div class="col-12">

                                    <fieldset class="form-group">
                                        <label for="">REDUCTION</label>

                                        <select class="custom-select" wire:model="discountRate" style="height:41px"
                                            id="discountRate">
                                            <option selected>REDUCTION</option>


                                            <option value="0%">0%</option>
                                            @if ($coupon)
                                            <option value="{{$coupon->discount->taux."%"}}">{{$coupon->code}}
                                            </option>
                                            @endif

                                        </select>
                                    </fieldset>

                                </div>
                                <div class="col-12">
                                    <fieldset class="form-group">
                                        <label for="">TVA</label>

                                        <select class="custom-select" wire:model="tvaRate" style="height:41px"
                                            id="tvaRate">
                                            <option selected>TVA</option>

                                            <option value="0%">0%</option>
                                            <option value="1%">1%</option>

                                            <option value="2%">2%</option>
                                            <option value="3%">3%</option>
                                            <option value="4%">4%</option>
                                            <option value="5%">5%</option>
                                            <option value="6%">6%</option>
                                            <option value="7%">7%</option>
                                            <option value="8%">8%</option>
                                            <option value="9%">9%</option>
                                            <option value="10%">10%</option>
                                        </select>
                                    </fieldset>
                                </div>



                                <div class="col-12">
                                    <fieldset class="form-group">
                                        <label for="">LIVRAISON</label>

                                        <select class="custom-select" wire:model="shippingRate" style="height:41px"
                                            id="shippingRate">
                                            <option selected>LIVRAISON</option>
                                            <option value="0%">0%</option>
                                            <option value="1%">1%</option>
                                            <option value="2%">2%</option>
                                            <option value="3%">3%</option>
                                            <option value="4%">4%</option>
                                            <option value="5%">5%</option>
                                            <option value="6%">6%</option>
                                            <option value="7%">7%</option>
                                            <option value="8%">8%</option>
                                            <option value="9%">9%</option>
                                            <option value="10%">10%</option>
                                        </select>
                                    </fieldset>
                                </div>






                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" style="border-radius: 40px"
                                    class="btn btn-warning font-weight-bold" data-dismiss="modal">ANNULER</button>
                                <button type="submit" style="border-radius: 40px"
                                    class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#large">

                                    MODIFIER


                                </button>


                            </div>
                </form>
            </div>
        </div>

    </div>
    <!--End  Create product -->




</div>