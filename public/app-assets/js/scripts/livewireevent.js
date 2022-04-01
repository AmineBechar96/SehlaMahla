$(document).ready(function() {
    window.addEventListener("swal:success", function(e) {
        Swal.fire(e.detail);
    });
    window.addEventListener("swal:existed", function(e) {
        Swal.fire(e.detail);
    });
});
