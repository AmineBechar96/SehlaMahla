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
    <title>Dashboard analytics - Vuexy - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/shepherd-theme-default.css">
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
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
    <!-- END: Custom CSS-->
    @livewireStyles
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
            <div class="content-header row">
            </div>
            <div class="content-body">
                @livewire('market')

            </div>
        </div>
    </div>
    <!-- END: Content-->
    <!-- Modal -->
    <div class="modal fade text-left" id="defaultSize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content" id="modcontent">
                <div class="modal-header" style="background:#1CA7EC !important; border-radius:8px 8px 0 0 ;">
                    <div class="row" style="width:100%;">
                        <div class="col-6">
                            <div class="text-6xl font-semibold">
                                <h1 style="color:white; font-weight:bold; font-size:45px;" id="temp"></h1>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h5 style="color:white; font-weight:bold; margin:0">feels like</h5>
                                </div>
                                <div class="col">
                                    <h5 style="color:white; font-weight:bold;" id="feels"></h5>
                                </div>



                            </div>
                        </div>

                        <div class="col-3 mt-2">
                            <div class="row">
                                <div class="col">
                                    <h6 style="color:white; font-weight:bold;" id="weather"></h6>
                                </div>
                                <div class="col">
                                    <h6 style="color:white; font-weight:bold;" id="location"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 mt-2" id="iconn" style="color:white"></div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-row">
                        <div class="pr-2">
                            <h2>MON</h2>
                        </div>
                        <div class="pr-1">

                        </div>
                        <div class="pr-5">
                            cloudy with possible rain
                        </div>
                        <div>
                            <div>19°C</div>
                            <div>19°C</div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="large" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
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
                    <div class="col-12">
                        <!-- gmaps Examples section start -->
                        <section id="gmaps-basic-maps" aria-labelledby="account-pill-general" aria-expanded="true">
                            <!-- Info Window -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">

                                        <div class="card-content">
                                            <div class="card-body">

                                                <div id="info-windoww" class="height-400">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </section>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('layouts.footer')
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../../../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="../../../app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBgjNW0WA93qphgZW-joXVR6VC3IiYFjfo"></script>
    <script src="../../../app-assets/vendors/js/charts/gmaps.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <script src="../../../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <!-- BEGIN: Page JS-->

    <!-- END: Page JS-->
    <!-- END: Page JS-->
    @livewireScripts
    <script src="../../../app-assets/js/scripts/popover/popover.js"></script>
    <script>
        function  toDyOfWeek(timestamp) {
              const newDate = new Date(timestamp * 1000);
              const days = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
              return days[newDate.getDay()];
            };
              
        
                $('#defaultSize').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget)
                        var lat = button.data('lat')
                        var long = button.data('long')
                        var location = button.data('location')
                        var modal = $(this)
                   fetch(`/api/weather?lat=${lat}&lng=${long}`)
                  .then(response => response.json())
                  .then(data => {
                    
                    var iconurl = "https://openweathermap.org/img/wn/" + data.current.weather[0].icon + ".png"; 
                    document.getElementById('temp').innerHTML = Math.round(data.daily[0].temp.day -273)+ " °C";
                    document.getElementById('feels').innerHTML =Math.round(data.current.feels_like) - 273+ " °C";
                    document.getElementById('weather').innerHTML = data.current.weather[0].main;
                    document.getElementById('location').innerHTML = location+", DZ";
                   // document.getElementById('min').innerHTML = "19";
                   // document.getElementById('max').innerHTML = "19";
                   console.log(data)
                  
                   var icons = document.querySelectorAll('.icons');
                 
                      Array.from(icons).forEach((icon) => icon.remove())
                
        
                    var img=document.createElement("img");
                    img.className='icons'
                    img.src=iconurl;
                  
                   
                    var bodies = document.querySelectorAll('.modal-body');
                 
                 Array.from(bodies).forEach((body) => body.remove())
                    document.getElementById('iconn').appendChild(img)
        var modalbody=document.createElement("div")
        modalbody.className='modal-body'     
        modalbody.style.backgroundColor="#4cb7ed"
        modalbody.style.borderRadius="0 0 8px 8px"
        modalbody.style.color="white"
        document.getElementById('modcontent').appendChild(modalbody)
        var length=data.daily.length
        for(let i=1; i<length-2;i++){
        var iconurl2 = "https://openweathermap.org/img/wn/" + data.daily[i].weather[0].icon + ".png"; 
        var flex=document.createElement("div")
        flex.className='row'
        var jour=document.createElement("div")
        jour.className='col'
        var h2=document.createElement("h2")
        var divicon=document.createElement("div")
        divicon.className='col'
        var img2=document.createElement("img");
                   
                    img2.src=iconurl2;
                    img2.style.marginBottom="5px"
        var divdesc=document.createElement("div")
        divdesc.className='col'
        var divtemp=document.createElement("div")
        divtemp.className='col'
        var divmax=document.createElement("div")
        var divmin=document.createElement("div")
        
        modalbody.appendChild(flex)
        flex.appendChild(jour)
        jour.appendChild(h2)
        flex.appendChild(divicon)
        flex.appendChild(divdesc)
        flex.appendChild(divtemp)
        divtemp.appendChild(divmax)
        divicon.appendChild(img2)
        divtemp.appendChild(divmin)
        h2.style.color="white"
        h2.innerHTML=toDyOfWeek(data.daily[i].dt)
        divdesc.innerHTML=data.daily[i].weather[0].description
        divmax.innerHTML=Math.round(data.daily[i].temp.max-273)+"°C"
        divmin.innerHTML=Math.round(data.daily[i].temp.min-273)+"°C"
        
                    }
                    
                    })
              
                });
        
            
    </script>

    <script>
        $('#large').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget)
                        var lat = button.data('lat')
                        var long = button.data('long')
                        var nom = button.data('nom')
                        var modal = $(this)
                       
            map = new GMaps({
                div: "#info-windoww",
                lat: 37.4046193722478,
                lng: 2.7974765053780812,
                zoom: 5,
                scaleControl: false,
                width: "100%",
                height: "300px"
            });
            map.addMarker({
                lat: lat,
                lng: long,
                title: nom,
                infoWindow: {
                    content: "<p>"+nom+"</p>"
                }
            });
                       // modal.find('.modal-body #type').innerHTML=model;
                       // modal.find('.modal-body #product_name').val(product_name);
                      
                    })
    </script>
</body>
<!-- END: Body-->

</html>