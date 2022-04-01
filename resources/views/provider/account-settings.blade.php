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
    <title>Compte - Paramètres - SAHLA MAHLA </title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/llll.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/llll.png">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.css">

    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/validation/form-validation.css">
    <!-- END: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/sweetalert2.min.css">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover"
    data-menu="horizontal-menu" data-col="2-columns">


    <!-- BEGIN: Header-->
    @include('layouts.header')

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('layouts.horizontal-menu-features')
    <!-- END: Main Menu-->


    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="form-group breadcrum-left">
                <div class="dropdown">
                    <a class=" btn btn-primary btn-round" href="{{url()->previous()}}">
                        <i class="feather icon-arrow-left"></i> RETOUR</a>

                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <!-- left menu section -->
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                                        href="#account-vertical-general" aria-expanded="true">
                                        <i class="feather icon-globe mr-50 font-medium-3"></i>
                                        Info Générales
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                        href="#account-vertical-password" aria-expanded="false">
                                        <i class="feather icon-lock mr-50 font-medium-3"></i>
                                        Changer Mot de Passe
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill"
                                        href="#account-vertical-social" aria-expanded="false">
                                        <i class="feather icon-camera mr-50 font-medium-3"></i>
                                        Abonnement
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-connections" data-toggle="pill"
                                        href="#account-vertical-connections" aria-expanded="false">
                                        <i class="feather icon-trash-2 mr-50 font-medium-3"></i>
                                        Supprimer Mon Compte
                                    </a>
                                </li>
                                <!--li class="nav-item">
                                    <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill"
                                        href="#account-vertical-notifications" aria-expanded="false">
                                        <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                                        Notifications
                                    </a>
                                    </li-->
                            </ul>
                        </div>
                        <!-- right content section -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                                aria-labelledby="account-pill-general" aria-expanded="true">
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img src="../../../app-assets/images/icons/provider3.png"
                                                            class="round mr-75" alt="profile image" height="64"
                                                            width="64">
                                                    </a>

                                                </div>
                                                <hr>

                                                <div>
                                                    <h4>{{auth()->user()->name}}</h4>
                                                    <p class="text-muted">Fournisseur de Service</p>
                                                </div>
                                                <div class="p-2">
                                                    <div class="d-flex justify-content-between  mb-1">
                                                        <h5>Email</h5>
                                                        <p>{{auth()->user()->email}}</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-1">
                                                        <h5>Date de Rejoindre</h5>
                                                        <p>{{auth()->user()->created_at}}</p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <h5>Nombre de Services</h5>
                                                        <p>{{$services}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                                aria-labelledby="account-pill-password" aria-expanded="false">
                                                <h5 class="mb-3">Changer le Mot de Pass</h5>


                                                <form action="{{route('change-ppassword')}}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-old-password">Ancien
                                                                        Mot de Passe</label>
                                                                    <input type="password" name="old_password"
                                                                        class="form-control @error('old_password') is-invalid @enderror service-input"
                                                                        id="account-old-password" required
                                                                        placeholder="Old Password"
                                                                        data-validation-required-message="This old password field is required">
                                                                    @error('old_password')
                                                                    <span
                                                                        class="text-danger font-weight-bold">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-new-password">Nouveau
                                                                        Mot de Passe</label>
                                                                    <input type="password" name="new_password"
                                                                        id="account-new-password"
                                                                        class="form-control @error('new_password') is-invalid @enderror service-input"
                                                                        placeholder="New Password" required
                                                                        data-validation-required-message="The password field is required"
                                                                        minlength="6">
                                                                    @error('new_password')
                                                                    <span
                                                                        class="text-danger font-weight-bold">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <div class="controls">
                                                                    <label for="account-retype-new-password">Confimer le
                                                                        Mot de Passe</label>
                                                                    <input type="password" name="confirm_password"
                                                                        class="form-control @error('confirm_password') is-invalid @enderror service-input"
                                                                        required id="account-retype-new-password"
                                                                        data-validation-match-match="password"
                                                                        placeholder="New Password"
                                                                        data-validation-required-message="The Confirm password field is required"
                                                                        minlength="6">
                                                                    @error('confirm_password')
                                                                    <span
                                                                        class="text-danger font-weight-bold">{{$message}}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                            <button type="submit"
                                                                class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                                changes</button>
                                                            <button type="reset"
                                                                class="btn btn-outline-warning">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                                aria-labelledby="account-pill-info" aria-expanded="false">


                                                <div class="d-flex justify-content-between">
                                                    <h5>Satus de MemberShip</h5>
                                                    <p>15/02/2022</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h5>Date de Debut</h5>
                                                    <p>15/02/2022</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h5>Date de Fin</h5>
                                                    <p>15/02/2022</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <h5>Date de Payement</h5>
                                                    <p>15/02/2022</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                                                aria-labelledby="account-pill-social" aria-expanded="false">
                                                @if ($membership->status=="ongoing")
                                                <div class="alert alert-success" role="alert">

                                                    <h4 class="alert-heading">En Cours</h4>
                                                    <p class="mb-0">
                                                        votre carte de membre est toujours valable vous pouvez utiliser
                                                        notre service jusqu'à une date ultérieure.
                                                    </p>
                                                </div>
                                                @elseif($membership->status=="overdue")
                                                <div class="alert alert-warning" role="alert">

                                                    <h4 class="alert-heading">Terminé</h4>
                                                    <p class="mb-0">
                                                        votre abonnement est terminé vous devez le réactiver pour
                                                        utiliser notre service
                                                    </p>
                                                </div>
                                                @endif

                                                <div class="p-3">
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <h5>Satus de MemberShip</h5>
                                                        <p>{{$membership->status}}</p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <h5>Date de Debut</h5>
                                                        <p>{{$membership->start_date}}</p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <h5>Date de Fin</h5>
                                                        <p>{{$membership->end_date}}</p>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-1">
                                                        <h5>Date de Payement</h5>
                                                        <p>{{$membership->payment_date}}</p>
                                                    </div>
                                                </div>
                                                <!---div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                        changes</button>
                                                    <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                                </div-->
                                            </div>
                                            <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
                                                aria-labelledby="account-pill-connections" aria-expanded="false">
                                                <div class="alert alert-danger mb-2" role="alert">

                                                    <h4 class="alert-heading"><i
                                                            class="feather icon-alert-triangle mr-1"></i> Attentiont !
                                                    </h4>
                                                    <p class="mb-0">
                                                        en cliquant sur le bouton supprimer vous ne pourrez
                                                        plus accéder à votre compte, s'il vous plaît soyez sûr avant de
                                                        continue.
                                                    </p>
                                                </div>
                                                <form action="{{route('delete-provider-account')}}" method="post"
                                                    id="dele_acc">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="accountTextarea"
                                                                    class=" font-weight-bold font-medium-2 mb-1">Dites
                                                                    nous pourquoi Vous
                                                                    voulez
                                                                    nous
                                                                    quitter</label>
                                                                <textarea class="form-control service-input"
                                                                    id="accountTextarea" rows="3" name="why"
                                                                    placeholder="pourquoi partir
                                                                ..."></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0 show_confirm">
                                                            Supprimer</button>
                                                        <button type="reset"
                                                            class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--div class="tab-pane fade" id="account-vertical-notifications"
                                                role="tabpanel" aria-labelledby="account-pill-notifications"
                                                aria-expanded="false">
                                                <div class="row">
                                                    <h6 class="m-1">Activity</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked
                                                                id="accountSwitch1">
                                                            <label class="custom-control-label mr-1"
                                                                for="accountSwitch1"></label>
                                                            <span class="switch-label w-100">Email me when someone
                                                                comments
                                                                onmy
                                                                article</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked
                                                                id="accountSwitch2">
                                                            <label class="custom-control-label mr-1"
                                                                for="accountSwitch2"></label>
                                                            <span class="switch-label w-100">Email me when someone
                                                                answers on
                                                                my
                                                                form</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="accountSwitch3">
                                                            <label class="custom-control-label mr-1"
                                                                for="accountSwitch3"></label>
                                                            <span class="switch-label w-100">Email me hen someone
                                                                follows
                                                                me</span>
                                                        </div>
                                                    </div>
                                                    <h6 class="m-1">Application</h6>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked
                                                                id="accountSwitch4">
                                                            <label class="custom-control-label mr-1"
                                                                for="accountSwitch4"></label>
                                                            <span class="switch-label w-100">News and
                                                                announcements</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="accountSwitch5">
                                                            <label class="custom-control-label mr-1"
                                                                for="accountSwitch5"></label>
                                                            <span class="switch-label w-100">Weekly product
                                                                updates</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-1">
                                                        <div class="custom-control custom-switch custom-control-inline">
                                                            <input type="checkbox" class="custom-control-input" checked
                                                                id="accountSwitch6">
                                                            <label class="custom-control-label mr-1"
                                                                for="accountSwitch6"></label>
                                                            <span class="switch-label w-100">Weekly blog digest</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                            changes</button>
                                                        <button type="reset"
                                                            class="btn btn-outline-warning">Cancel</button>
                                                    </div>
                                                </div>
                                            </div-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
            <!-- account setting page end -->
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
                                supprimer Votre Compte
                            </span>
                            <p class="text-primary">{{ucwords(auth()->user()->name)}}</p>
                        </div>

                        <div class="modal-footer justify-content-between mt-1">
                            <button type="button" class="text-danger font-weight-bold mr-1" data-dismiss="modal" style="padding: 0;
border: none;
background: none;">ANNULER</button>
                            <button type="submit" class="text-success font-weight-bold mr-1" id="yesdelete" style="padding: 0;
border: none;
background: none;">TERMINER</button>
                        </div>

                    </div>
                </div>
            </div>
            <!--end confirm delete Modal -->
        </div>
    </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-shadow">
        <p class="clearfix blue-grey lighten-2 mb-0"><span
                class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a
                    class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio"
                    target="_blank">Pixinvent,</a>All rights Reserved</span><span
                class="float-md-right d-none d-md-block">Hand-crafted & Made with<i
                    class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                    class="feather icon-arrow-up"></i></button>
        </p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>

    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/account-setting.js"></script>
    <!-- END: Page JS-->
    <script src="../../../app-assets/js/scripts/extensions/toastr.js"></script>

    @if (session('error'))
    <script>
        toastr.error('code copier avec success!',"Faite");
    </script>
    @elseif(session('success'))
    <script>
        toastr.success('code copier avec success!',"Faite");
    </script>
    @endif
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
             var form =  $('#dele_acc');
             var name = $(this).data("name");
             event.preventDefault();
             $('#confirmdelete').modal('show');
             $('#yesdelete').click(function(e){
                 form.submit()
             })
         });
     
    </script>
</body>
<!-- END: Body-->

</html>