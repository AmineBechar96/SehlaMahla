(function(window, undefined) {
    'use strict';
    $(document).ready(function() {
        $('select[name="model"]').on('change', function() {
            var ModelId = $(this).val();
            if (ModelId) {
                $.ajax({
                    url: "{{ URL::to('serie') }}/" + ModelId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="serie"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="serie"]').append(
                                '<option value="' +
                                    key +
                                    '">' +
                                    key +
                                    '</option>'
                            );
                        });
                    }
                });

                $.ajax({
                    url: "{{ URL::to('type') }}/" + ModelId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="type"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="type"]').append(
                                '<option value="' +
                                    key +
                                    '">' +
                                    key +
                                    '</option>'
                            );
                        });
                    }
                });
                $.ajax({
                    url: "{{ URL::to('engine') }}/" + ModelId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="litre"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="litre"]').append(
                                '<option value="' +
                                    value +
                                    '">' +
                                    value +
                                    '</option>'
                            );
                        });
                    }
                });
                $.ajax({
                    url: "{{ URL::to('power') }}/" + ModelId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="ch"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="ch"]').append(
                                '<option value="' +
                                    value +
                                    '">' +
                                    value +
                                    '</option>'
                            );
                        });
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
    $(document).ready(function() {
        $('select[name="brands"]').on('change', function() {
            var BrandId = $(this).val();
            if (BrandId) {
                $.ajax({
                    url: "{{ URL::to('model') }}/" + BrandId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="model"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="model"]').append(
                                '<option value="' +
                                    key +
                                    '">' +
                                    key +
                                    '</option>'
                            );
                        });
                    }
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

    new Swiper('.clients-slider', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 40
            },
            480: {
                slidesPerView: 3,
                spaceBetween: 60
            },
            640: {
                slidesPerView: 4,
                spaceBetween: 80
            },
            992: {
                slidesPerView: 6,
                spaceBetween: 120
            }
        }
    });

    /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */
})(window);
