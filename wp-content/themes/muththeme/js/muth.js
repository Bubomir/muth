jQuery(document).ready(function($) {
    $('#myModal').on('shown.bs.modal', function () {
        ('#myInput').focus()
    })

    var testimonial_text = $('.muth-testimonial-text'),
        testimonial_controller = $('.muth-testimonial-controller');
       
    //podmienka pre zobrazenie iba tam kde sa nachadza testimonial container
    if (testimonial_text.length && testimonial_controller.length) {
        var testimonial_timer = 5000,
            timer = setTimeout(testimonial_slider_timer, testimonial_timer);
        testimonial_manual_click_slider();
    }
    //podmienka pre zobrazenie mapy iba tam kde treba t.j. contact page 
    if ($('.muth-google-map').length) {
        initMap(49.2197919, 18.749553900000024);
    }
    if ($('.muth-contact-form-name-input').length) {
        add_animation_element_input();
    }
    if ($('.muth-contact-form-text-textarea').length) {
        add_animation_element_textarea();
    }
    if ($('.muth-button').length) {
        add_animation_element_button();
    }

    if($('.muth-service-name-h4').length){
        calculation_vertical_align($('.muth-service-name-h4'));
    }
    if($('.muth-reference-name-h3').length){
        calculation_vertical_align($('.muth-reference-name-h3'));
    }
    
   
    //funkcie pre vypocet zachytneho bodu pre animaciu na titulnej stranke
    function calculation_vertical_align(element){
        for (var i = 0; i < element.length; i++) {
            var heightOfParentEle = element.parent().get(i).clientHeight;
           // console.log(heightOfParentEle);
            var paddingTop = (heightOfParentEle-element[i].clientHeight)/2;
            element[i].style.paddingTop = paddingTop+'px';
        }
    }

    //funkcie pre pridanie elementu aplikujuceho animaciu v contakt forme
    function add_animation_element_input() {
        $('.muth-contact-form-name-input').after('<span class="muth-contact-form-name-span"></span>');
    }

    function add_animation_element_textarea() {
        $('.muth-contact-form-text-textarea').after('<span class="muth-contact-form-text-span"></span>');
    }
    //funkcia pre pridanie elemntu do button tagu pre animciu v kontakt forme
    function add_animation_element_button() {
        var btn_value = $('.muth-button').val();
        $('.muth-button').after('<span class="muth-button-animation-span" value= "' + btn_value + '"></span>');
    }
    /*
    =========================
    Funkcie pre automaticke prehravanie a manualne prepinanie slidera
    funguje na principe pridavania a odoberania active css triedy
    =========================
    */
    function testimonial_slider_timer() {
        var ul_controller_children = $('#muth-testimonial-controller-id').children(),
            start_index = $('.muth-controller-activated')[0].value,
            fadeIn_element,
            fadeOut_element,
            time_animation = 300,
            class_animation = 'testimonial-activated';
        if (start_index < (ul_controller_children.length - 1)) {
            fadeIn_element = $('#muth-testimonial-list-' + (start_index + 1));
            fadeOut_element = $('#muth-testimonial-list-' + start_index);
            testimonial_text_animation(fadeIn_element, fadeOut_element, time_animation, class_animation);
            $('#muth-controller-' + start_index).removeClass('muth-controller-activated');
            $('#muth-controller-' + (start_index + 1)).addClass('muth-controller-activated');
        } else {
            fadeIn_element = $('#muth-testimonial-list-' + (0));
            fadeOut_element = $('#muth-testimonial-list-' + start_index);
            testimonial_text_animation(fadeIn_element, fadeOut_element, time_animation, class_animation);
            $('#muth-controller-' + start_index).removeClass('muth-controller-activated');
            $('#muth-controller-' + (0)).addClass('muth-controller-activated');
        }
        timer = setTimeout(testimonial_slider_timer, testimonial_timer);
    }
    //funkcia pre manualne ovladanie testimonial slidera
    function testimonial_manual_click_slider() {
        var ul_controller_children = $('#muth-testimonial-controller-id').children(),
            time_animation = 300,
            class_animation = 'testimonial-activated';
        for (var i = 0; i < ul_controller_children.length; i++) {
            $('#muth-controller-' + i).on('click', function(e) {
                var index = e.currentTarget.value,
                    fadeOut_element = $('.testimonial-activated'),
                    fadeIn_element = $('#muth-testimonial-list-' + index);
                //nulovanie timeru kvoli synchronizacii medzi manualnym preklikavanim a automatickym posuvanim
                clearTimeout(timer);
                testimonial_text_animation(fadeIn_element, fadeOut_element, time_animation, class_animation);
                $('.muth-controller-activated').removeClass('muth-controller-activated');
                $('#muth-controller-' + index).addClass('muth-controller-activated');
                //opätovne spustenie automatickej animacie po manualnom prekliknuti
                timer = setTimeout(testimonial_slider_timer, testimonial_timer);
            });
        }
    }
    //funkcia pre animaciu textu testimonial pridava a odobera css triedu pre aktivaciu
    function testimonial_text_animation(fadeIn_element, fadeOut_element, time, class_animation) {
        fadeOut_element.fadeOut(time, function() {
            fadeOut_element.removeClass(class_animation);
            fadeIn_element.fadeIn(time, function() {
                fadeIn_element.addClass(class_animation);
            });
        });
    }

    function initMap(lattitude, longtitude) {
        var myLatLng = {
            lat: lattitude,
            lng: longtitude
        };
        var map = new google.maps.Map(document.getElementById('muth-google-map-id'), {
            center: myLatLng,
            zoom: 16
        });
        var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: image
        });
    }
});