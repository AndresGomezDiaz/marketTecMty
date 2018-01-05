$(function () {
    //var ligaActual = $('#ligaEquipo').val();
    $('#categoria').change(function(){
        var categoria =document.getElementById("categoria").value;
        // var producto = $(this).attr("categoriaAttri");
        var to=document.getElementById("Buscando");
        to.innerHTML="Buscando....";
        $.ajax({
            type: "POST",
            url: "buscar_producto",
            data: 'categoria='+categoria, // +'&producto='+producto
            success: function(a) {
                jQuery('#productoCat').html(a);
                var to=document.getElementById("Buscando");
                to.innerHTML="";
            }
        });
    })
    .change();
});

