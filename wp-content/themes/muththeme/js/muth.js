jQuery(document).ready(function($) {

	testimonial_manual_click_slider();
    var testimonial_timer = 5000,
	    timer = setTimeout(testimonial_slider_timer, testimonial_timer);


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
});