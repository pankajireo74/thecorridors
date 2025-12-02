jQuery(document).ready(function($) {
    //check for popup cookie if set don't open the dialog.

    if (!Get_Cookie('popout')) {
        $(window).on('load',function() {
            setTimeout(function() {
                $('#main-pop').modal('show');
            }, 2000);
        });
    }

    $('.modal .btn-close').click(function() {
        Set_Cookie('popout', 'it works', '', '/', '', '');
    });

});