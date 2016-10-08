function openSidenav() {
    $('#menu .links').css('left', 0);
}

function closeSidenav() {
    $('#menu .links').css('left', '-300px');
}

$(document).ready(function(){
    $('.show-search').click(function(){
        $(this).css('display', 'none');
        $('#menu .form').css({width: '120px',right: '115px',display: 'block'});
        $('#menu .form input[type="text"]').focus();
    });

    var keyword = $('#menu .form input[type="text"]').attr('placeholder');
    $('#menu .form input[type="text"]').focus(function() {
        $(this).attr('placeholder', '');
    }).focusout(function() {
        $(this).attr('placeholder', keyword);
    });

    $('#headerLinks').html($('#header .links').html());
});
