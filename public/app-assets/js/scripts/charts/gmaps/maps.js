/*=========================================================================================
    File Name: maps.js
    Description: google maps
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Gmaps Maps
// ------------------------------

$(window).on("load", function() {
    // Basic Map
    // ------------------------------

    // Info Window
    // ------------------------------

    map = new GMaps({
        div: "#info-window",
        lat: 37.4046193722478,
        lng: 2.7974765053780812,
        zoom: 5,
        scaleControl: false,
        width: "100%",
        height: "300px"
    });
    map.addMarker({
        lat: 36.732728552314136,
        lng: 3.496124168796373,
        title: "سوق السيارات تيجلابين",
        infoWindow: {
            content: "<p>سوق السيارات تيجلابين</p>"
        }
    });
    map.addMarker({
        lat: 36.19348613335321,
        lng: 5.404130812250333,
        title: "marché de véhicules, Setif",
        infoWindow: {
            content: "<p>marché de véhicules, Setif</p>"
        }
    });
    map.addMarker({
        lat: 35.50900489073041,
        lng: 2.909155626193486,
        title: "البيض",
        infoWindow: {
            content: "<p>البيض</p>"
        }
    });

    map.addMarker({
        lat: 34.875077907699584,
        lng: 5.702609411071279,
        title: "سوق السيارات المستعملة، Biskra",
        infoWindow: {
            content: "<p>سوق السيارات المستعملة، Biskra</p>"
        }
    });
    map.addMarker({
        lat: 35.450862456590464,
        lng: 2.9005284534164857,
        title: "Rue Jughurta، عين وسارة،",
        infoWindow: {
            content: "<p>Rue Jughurta، عين وسارة،</p>"
        }
    });
    map.addMarker({
        lat: 36.46317667978551,
        lng: 6.179873984130801,
        title: "سوق السيارات، N79, Zeraïa",
        infoWindow: {
            content: "<p>سوق السيارات، N79, Zeraïa</p>"
        }
    });
    map.addMarker({
        lat: 36.15924796752518,
        lng: 6.155907060574298,
        title: "سوق السيارات شلغوم العيد",
        infoWindow: {
            content: "<p> سوق السيارات شلغوم العيد</p>"
        }
    });
    map.addMarker({
        lat: 35.84581373033934,
        lng: 5.8733671515312915,
        title: "السوق الأسبوعي للسيارات اولاد سلام",
        infoWindow: {
            content: "<p>السوق الأسبوعي للسيارات اولاد سلام</p>"
        }
    });
    map.addMarker({
        lat: 35.22806401046645,
        lng: 4.171656428792043,
        title: "سوق السيارات الاسبوعي بوسعادة",
        infoWindow: {
            content: "<p>سوق السيارات الاسبوعي بوسعادة</p>"
        }
    });
    map.addMarker({
        lat: 35.271121831143894,
        lng: 7.577806074270539,
        title: "السوق الأسبوعي للسيارات المزرعة",
        infoWindow: {
            content: "<p>السوق الأسبوعي للسيارات المزرعة</p>"
        }
    });
    map.addMarker({
        lat: 33.285645442928036,
        lng: 6.895297197533904,
        title: "سوق السيارات بالرباح",
        infoWindow: {
            content: "<p>سوق السيارات بالرباح</p>"
        }
    });
    map.addMarker({
        lat: 33.551579282802976,
        lng: 6.982082739869937,
        title: "سوق السيارات حاسى خليفه",
        infoWindow: {
            content: "<p>سوق السيارات حاسى خليفه</p>"
        }
    });
    map.addMarker({
        lat: 35.36625323627079,
        lng: 5.89671853712794,
        title: "سوق السيارات عين توتة",
        infoWindow: {
            content: "<p>سوق السيارات عين توتة </p>"
        }
    });
    map.addMarker({
        lat: 36.859485454724,
        lng: 7.7808066841425365,
        title: "سوق السيارات  El Bouni",
        infoWindow: {
            content: "<p>سوق السيارات  El Bouni</p>"
        }
    });
    map.addMarker({
        lat: 36.41152196145174,
        lng: 6.600744749309213,
        title: "N3, Hamma Bouziane",
        infoWindow: {
            content: "<p>N3, Hamma Bouziane</p>"
        }
    });
    map.addMarker({
        lat: 36.13594657128214,
        lng: 2.921963954843532,
        title: "البرواقية،،, Berrouaghia",
        infoWindow: {
            content: "البرواقية،،, Berrouaghia"
        }
    });
    map.addMarker({
        lat: 36.732843985688376,
        lng: 4.1490805025203255,
        title: "Automobile d'occasion سوق تلا عثمان للسيارات  ",
        infoWindow: {
            content: "<p>Automobile d'occasion سوق تلا عثمان للسيارات .</p>"
        }
    });
    map.addMarker({
        lat: 35.93635743469333,
        lng: 5.530713336741754,
        title: "Aïn Lahdjar",
        infoWindow: {
            content: "<p>Aïn Lahdjar </p>"
        }
    });
});
