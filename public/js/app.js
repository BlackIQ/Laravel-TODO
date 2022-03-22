$('.editing').click(function () {
    if ($(this).text() == 'Edit') {
        $(this).text('Close');
        $(this).parent('.float-end').parent('h4').next('.edit').fadeIn(500);
    } else {
        $(this).text('Edit');
        $(this).parent('.float-end').parent('h4').next('.edit').hide(500);
    }
});
