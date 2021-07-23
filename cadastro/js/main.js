$(function () {

     $('nav.mobile').click(function () {
        var listaMenu = $('nav.mobile ul');
        
        if (listaMenu.is(':hidden') == true) {
            var icone = $('.botao-menu-mobile').find('i');
            icone.removeClass('fa-bars');
            icone.addClass('fa-times');
            listaMenu.slideToggle();
        } else {
            var icone = $('.botao-menu-mobile').find('i');
            icone.removeClass('fa-times');
            icone.addClass('fa-bars');
            listaMenu.slideToggle();
        }
        
    });

    $('[actionBtn=delet]').click(function () {
        var r = confirm("Deseja excluir ?");
        if (r == true) {
            return true;
        } else {
            return false;
        }
    })

})