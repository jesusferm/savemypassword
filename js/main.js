jQuery(document).ready(function($) {
    $('.slideshow').slides({
        generateNextPrev: true
    });

    // Init social media buttons
    $('.sharrre-buttons').sharrre({
        share: {
            googlePlus: true,
            facebook: true,
            twitter: true
        },
        enableHover: false,
        enableCounter: false,
        enableTracking: true
    });

    $('.go-top').on('click', function(ev) {
        ev.preventDefault();

        $('html,body').animate({
            scrollTop: 0
        });
    });
    
    $('input:text').click(stringNormalize);
    $('input:text').focusin(stringNormalize);

    $('#citizens-form #asunto').bind('change', function() {
        var value = $(this).val(),
                req_class = '#requirements .' + value;

        if (value !== 'otro' && value !== '') {
            $.fancybox.open(req_class);

            $('#citizens-form :input:not(#asunto)').attr('disabled', 'disabled');
        } else {
            $('#citizens-form :input:not(#asunto)').removeAttr('disabled');
        }
    });


    $('#citizens-form').submit(function(ev) {
        ev.preventDefault();

        var form = $(this),
                fields = form.find(':input'),
                messages = form.find('.form-messages'),
                data = form.serialize();

        fields.attr('disabled', 'disabled');
        messages.hide().removeClass('error success').html('');

        $.post('/wp-admin/admin-ajax.php?action=citizens_contact', data, function(response) {
            $.each(response.message, function(i, message) {
                messages.append('<li>' + message + '</li>');
            });

            if (response.success === true) {
                messages.addClass('success');
                fields.attr('disabled', 'disabled');
            } else {
                messages.addClass('error');
                /*
                 if(response.requirement != 'none') {
                 var req_window = '#requirements .' + response.requirement;
                 $.fancybox.open(req_window);
                 }
                 */
            }

            messages.fadeIn();
            fields.removeAttr('disabled');
        });
    });
});