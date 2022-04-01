/*=========================================================================================
	File Name: noui-slider.js
	Description: noUiSlider is a lightweight JavaScript range slider library.
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
	Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/
var value5 = 10;
$(document).ready(function() {
    // RTL Support
    var direction = 'ltr';
    if ($('html').data('textdirection') == 'rtl') {
        direction = 'rtl';
    }

    /********************************************
     *				Slider values				*
     ********************************************/

    /************************************************
     *				Slider behaviour				*
     ************************************************/

    /****************************************************
     *				Slider Scales / Pips				*
     ****************************************************/

    /********************************************
     *				Slider Colors				*
     ********************************************/

    /********************************************
     *				Slider Sizing				*
     ********************************************/

    /********************************************
     *				Vertical Slider				*
     ********************************************/

    var sliderWithInput2 = document.getElementById('slider-with-input-annee');

    noUiSlider.create(sliderWithInput2, {
        start: [2010, 2018],
        direction: direction,
        connect: true,
        range: {
            min: 1980,
            max: 2021
        }
    });

    var inputNumber4 = document.getElementById('slider-input-annee');
    var inputNumber3 = document.getElementById('slider-input-annee2');

    sliderWithInput2.noUiSlider.on('update', function(values, handle) {
        var value3 = values[handle];

        if (handle) {
            inputNumber3.value = Math.round(value3);
        } else {
            inputNumber4.value = Math.round(value3);
        }
    });

    sliderWithInput2.noUiSlider.on('update', function(values2, handle2) {
        var value4 = values2[handle2];

        if (handle2) {
            inputNumber4.value2 = Math.round(value4);
        } else {
            inputNumber3.value2 = Math.round(value4);
        }
    });

    inputNumber3.addEventListener('change', function() {
        sliderWithInput2.noUiSlider.set([this.value3, null]);
    });

    inputNumber4.addEventListener('change', function() {
        sliderWithInput2.noUiSlider.set([null, this.value3]);
    });

    /****************************************************
     *				 Slider With Input				*
     ****************************************************/

    var sliderWithInput = document.getElementById('slider-with-input');

    noUiSlider.create(sliderWithInput, {
        start: [100, 300],
        direction: direction,
        connect: true,
        range: {
            min: 0,
            max: 999
        }
    });

    var inputNumber = document.getElementById('slider-input-number');
    var inputNumber2 = document.getElementById('slider-input-number2');

    sliderWithInput.noUiSlider.on('update', function(values, handle) {
        var value = values[handle];

        if (handle) {
            inputNumber2.value = Math.round(value);
        } else {
            inputNumber.value = Math.round(value);
        }
    });

    sliderWithInput.noUiSlider.on('update', function(values2, handle2) {
        var value2 = values2[handle2];

        if (handle2) {
            this.value5 = value2;
            inputNumber.value2 = Math.round(value2);
        } else {
            this.value5 = value2;
            inputNumber2.value2 = Math.round(value2);
        }
    });

    inputNumber2.addEventListener('change', function() {
        sliderWithInput.noUiSlider.set([this.value, null]);
    });

    inputNumber.addEventListener('change', function() {
        document.write(this.value);
        sliderWithInput.noUiSlider.set([null, this.value]);
    });
});
