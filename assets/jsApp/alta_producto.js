 function desactivaCasillas(){
    $("#tablaColores #coloresLista").find("input[id='color']").each(function(){
        if($(this).is(":checked")){
            $('.colorSelect').prop('checked', false);
        }
    });
}

function desactivaVariosColores(){
    $('#varios_colores').prop('checked', false);
}

