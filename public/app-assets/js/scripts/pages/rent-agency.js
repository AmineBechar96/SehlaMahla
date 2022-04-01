$(document).ready(function() {
    $("#large").on("show.bs.modal", function(event) {
        var button = $(event.relatedTarget);
        var lat = button.data("lat");
        var long = button.data("long");
        var nom = button.data("nom");
        var modal = $(this);

        map = new GMaps({
            div: "#info-windoww",
            lat: lat,
            lng: long,
            zoom: 7,
            scaleControl: false,
            width: "100%",
            height: "300px"
        });
        map.addMarker({
            lat: lat,
            lng: long,
            title: nom,
            infoWindow: {
                content: "<p>" + nom + "</p>"
            }
        });
        // modal.find('.modal-body #type').innerHTML=model;
        // modal.find('.modal-body #product_name').val(product_name);
    });
    function collapse(x){
        if(x==0){
            document.getElementById('bookDate').classList.add("d-none")
            document.getElementById('bookTime').classList.add("d-none");
        }
        else{
            document.getElementById('bookDate').classList.remove("d-none");
            document.getElementById('bookTime').classList.remove("d-none");
        }
        return;
    }
});
