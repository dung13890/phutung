$(document).ready(function(){
    // toggle mobile menu
    $('#menu .toggle-menu').click(function(){
        var display = $(this).attr('display');
        if (display == 0) {
            $(this).attr('display', 1);
            $('#menu .links > ul').css('height', $(window).height());
            $('#menu .links').animate({'left': '-15%'}, 450, function(){
                $('body').css({
                    'overflow-y': 'hidden'
                });
            });
        } else {
            $(this).attr('display', 0);
            $('#menu .links').animate({'left': '-100%'}, 450, function(){
                $('body').css({
                    'overflow-y': 'scroll'
                });
            });

            $('#menu .links > ul').css('height', 0);
        }
    });

    $('.show-search').click(function(){
        $(this).css('display', 'none');
        $('#menu .form').css({
            'width': '120px',
            'right': '115px',
            'display': 'block'
        });
        $('#menu .form input[type="text"]').focus();
    });

    $('#menu .form input[type="text"]').focusout(function(){
        $('#menu .form').css('display', 'none');
        $('.show-search').css('display', 'block');
    });

    $('#headerLinks').html($('#header .links').html());
});
