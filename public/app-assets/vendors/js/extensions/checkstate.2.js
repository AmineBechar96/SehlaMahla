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

            $.ajax({
                url: "{{ URL::to('type') }}/" + ModelId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="type"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="type"]').append(
                            '<option value="' + key + '">' + key + "</option>"
                        );
                    });
                }
            });
            $.ajax({
                url: "{{ URL::to('engine') }}/" + ModelId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="litre"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="litre"]').append(
                            '<option value="' +
                                value +
                                '">' +
                                value +
                                "</option>"
                        );
                    });
                }
            });
            $.ajax({
                url: "{{ URL::to('power') }}/" + ModelId,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="ch"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="ch"]').append(
                            '<option value="' +
                                value +
                                '">' +
                                value +
                                "</option>"
                        );
                    });
                }
            });
        } else {
            console.log("AJAX load did not work");
        }
    });
});
