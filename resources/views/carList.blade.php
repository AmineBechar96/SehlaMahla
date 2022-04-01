<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    @include('layouts.head')
</head>

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">
    @include('layouts.header')
    @include('layouts.horizontal-menu')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">

                <div class="modal fade text-left" id="large" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel17" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel17">Fiche technique de la voiture
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="../../../app-assets/images/features/feat5.png" alt=""
                                            class="img-fluid" alt="" srcset=""></div>
                                    <div class="col-6">
                                        <div class="table-responsive">

                                            <table class="table table mt-3">

                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Type</th>
                                                        <td id="type"></td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Energie</th>
                                                        <td id="energie"></td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Transmission</th>
                                                        <td id="transmission"></td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Type Moteur</th>
                                                        <td id="moteur"></td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Nombre de chevaux</th>
                                                        <td id="ch"></td>

                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Cylindre</th>
                                                        <td id="tdi"></td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
                            </div>
                        </div>
                    </div>
                </div>








                <!-- Table Hover Animation start -->
                <div class="row" id="table-hover-animation table-striped">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <i class="ri-list-check-2"></i>
                                    Voitures disponibles avec le prix estimé</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                    <div class="table-responsive  mt-10">
                                        <table class="table table-hover-animation table-striped mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Model</th>
                                                    <th scope="col">Brand</th>
                                                    <th scope="col">Notes</th>
                                                    <th scope="col">Année</th>
                                                    <th scope="col">Prix</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($aff_Vehicules as $aff_Vehicule)

                                                <tr class="cursor-pointer" data-toggle="modal" data-target="#large"
                                                    data-type="{{$aff_Vehicule->type}}"
                                                    data-energie="{{$aff_Vehicule->energie}}"
                                                    data-transmission="{{$aff_Vehicule->transmission}}"
                                                    data-ch="{{$aff_Vehicule->ch}}" data-tdi="{{$aff_Vehicule->tdi}}"
                                                    data-moteur="{{$aff_Vehicule->litre}}">



                                                    <th scope="row"></th>
                                                    <td>{{$aff_Vehicule->model}}</td>
                                                    <td style="color:#1CA7EC">{{$aff_Vehicule->brand}}</td>
                                                    <td>{{$aff_Vehicule->notes}}</td>
                                                    <td>{{$aff_Vehicule->proDate}}</td>
                                                    <td style="color:red;">{{round($aff_Vehicule->prix)}}.000 DZD</td>
                                                </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Table head options end -->


            </div>
        </div>
    </div>
    <!-- END: Content-->
    @include('layouts.footer')
    @include('layouts.footer-scripts')
    <script>
        var $table = $('#table')
  
        $(function() {
          $('#modalTable').on('shown.bs.modal', function () {
            $table.bootstrapTable('resetView')
          })
        })
    </script>

    <script>
        $('#large').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var type = button.data('type')
            var energie = button.data('energie')
            var transmission = button.data('transmission')
            var moteur = button.data('moteur')
            var tdi = button.data('tdi')
            var ch = button.data('ch')
            var modal = $(this)
            document.getElementById('type').innerHTML = type;
            document.getElementById('energie').innerHTML = energie;
            document.getElementById('transmission').innerHTML = transmission;
            document.getElementById('moteur').innerHTML = moteur;
            document.getElementById('tdi').innerHTML = tdi;
            document.getElementById('ch').innerHTML = ch;
           // modal.find('.modal-body #type').innerHTML=model;
           // modal.find('.modal-body #product_name').val(product_name);
          
        })
    </script>
</body>
<!-- END: Body-->

</html>