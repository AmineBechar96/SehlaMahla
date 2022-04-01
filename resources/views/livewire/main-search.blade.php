<div>
    <div x-data="{isOpen:true}" @click.away="isOpen=false">
        <div class="row">
            <div class="col-12">
                <div class="card faq-bg white">
                    <div class="card-content">
                        <div class="card-body p-sm-2 p-1">

                            <form>

                                <div class="row">
                                    <div class="col-8 col-md-9 col-lg-10">
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" style="border:none;" class="form-control form-control"
                                                id="searchbar" wire:model.debounce.1000ms="query"
                                                placeholder="Rechercher une Service..." @focus="isOpen=true">
                                            <div wire:loading class="spinner-border text-warning position-absolute"
                                                style="top:5px; right:0;" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <div class="form-control-position">
                                                <i class="feather icon-search px-1 text-warning font-medium-4"></i>

                                            </div>

                                        </fieldset>
                                    </div>
                            </form>
                            <div class="col-2">
                                <a id="filter" wire:click.prevent="showFilters"
                                    class="btn btn-secondary text-dark font-weight-bold"
                                    style="background:#e6e9eb !important ">Filtrer<i
                                        class="feather icon-filter font-weight-bold"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        @if (strlen($query) > 2)
        @if (count($services)>0)
        <div class="position-absolute shadow rounded bg-white p-2" id="resultsection" x-show.transition.opacity="isOpen"
            @keydown.escape.window="isOpen=false">
            @foreach ($services as $service)


            <div class="d-flex justify-content-between p-1 cursor-pointer rounded"
                wire:click="redirectToService({{$service['id']}})" id="resultline">

                <div class="d-flex align-items-start">



                    <img src="{{$service['service_image_url']}}" class="round mr-1" width="40" height="40" alt=""
                        srcset="">




                    <p class="font-weight-bold text-dark" style="margin-top:0.6rem">
                        {{$service['title']}}
                    </p>
                </div>
                <div>

                    <img class="img-fluid rounded cursor-pointer " style="margin-top:0.6rem"
                        title="{{trans('types.'.$service['type']['name'])}}" width="20" height="20"
                        src="../../../app-assets/images/types/{{$service['type']['name']}}.png" alt="img placeholder">
                </div>

            </div>





            @endforeach
        </div>
        @else
        <div class="position-absolute shadow rounded bg-white p-2" id="resultsection">

            <div class="d-flex justify-content-center p-1">

                <img class="img-fluid rounded cursor-pointer text-center mb-2" style="margin-top:0.6rem" width="40"
                    height="40" src="../../../app-assets/images/icons/noresult.png" alt="img placeholder">
                <h6 class="text-dark text-center mt-2 ml-2">No result Found</h6>

            </div>
        </div>
        @endif


        @endif



    </div>
    <!-- Modal -->
    <div class="modal fade" id="filterResults" tabindex="-1" wire:ignore.self role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="mb-0 bg-transparent" style="border-bottom :1px solid #ededed">
                    <h5 class=" mt-2 text-center text-dark" id="exampleModalScrollableTitle"> <span class="text-center">
                            FILTRER</span>
                    </h5>
                </div>

                <div class="modal-body">

                    <!-- Collapse start -->
                    <section id="collapsible">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card collapse-icon accordion-icon-rotate bg-transparent"
                                    style="box-shadow:none;">

                                    <div class="card-content">
                                        <div class="card-body">

                                            <div class="default-collapse collapse-bordered">
                                                <div class="card collapse-header">
                                                    <div id="headingCollapse1" class="card-header"
                                                        data-toggle="collapse" role="button" data-target="#collapse1"
                                                        aria-expanded="false" aria-controls="collapse1">
                                                        <span class="lead collapse-title font-weight-bold text-dark">
                                                            Service Disponible
                                                        </span>
                                                    </div>
                                                    <div id="collapse1" role="tabpanel"
                                                        aria-labelledby="headingCollapse1" wire:ignore.self
                                                        class="collapse">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <fieldset>
                                                                    <div class="vs-checkbox-con vs-checkbox-warning">
                                                                        <input type="checkbox" wire:model="available"
                                                                            checked value="true">
                                                                        <span class="vs-checkbox">
                                                                            <span class="vs-checkbox--check">
                                                                                <i
                                                                                    class="vs-icon feather icon-check"></i>
                                                                            </span>
                                                                        </span>
                                                                        <span class=" ml-1">Disponible Seulement</span>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card collapse-header">
                                                    <div id="headingCollapse2" class="card-header collapse-header"
                                                        data-toggle="collapse" role="button" data-target="#collapse2"
                                                        aria-expanded="false" aria-controls="collapse2">
                                                        <span class="lead collapse-title font-weight-bold text-dark">
                                                            Types</span>
                                                    </div>
                                                    <div id="collapse2" role="tabpanel"
                                                        aria-labelledby="headingCollapse2" class="collapse"
                                                        aria-expanded="false" wire:ignore.self>
                                                        <div class="card-content">
                                                            <div class="card-body">

                                                                @foreach ($types as $type)
                                                                <fieldset class="mb-1">

                                                                    <div class="vs-radio-con vs-radio-warning">
                                                                        <input type="radio" wire:model="typeId"
                                                                            name="radiocolor" value="{{$type->id}}">
                                                                        <span class="vs-radio">
                                                                            <span class="vs-radio--border"></span>
                                                                            <span class="vs-radio--circle"></span>
                                                                        </span>
                                                                        <span
                                                                            class="ml-1 font-bold-300">{{trans('types.'.$type->name)}}</span>
                                                                    </div>
                                                                </fieldset>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Collapse end -->

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <a class="text-primary font-weight-bold" data-dismiss="modal"> TERMINER</a>
                </div>
            </div>
        </div>
    </div>

</div>