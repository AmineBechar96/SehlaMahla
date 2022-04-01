$(document).ready(function() {
    $('select[name="model"]').on("change", function() {
        var ModelId = $(this).val();
        if (ModelId) {
            $.ajax({
                url: "{{ URL::to('serie') }}/" + ModelId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="serie"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="serie"]').append(
                            '<option value="' + key + '">' + key + "</option>"
                        );
                    });
                }
            });
        }
    });
});
