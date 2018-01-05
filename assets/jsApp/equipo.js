$(function () {
    var ligaActual = $('#ligaEquipo').val();
    jQuery('#marca').change(function(){
        var marca =document.getElementById("marca").value;
        var equipo = jQuery(this).attr("equipoAttri");
        var to=document.getElementById("Buscando");
        to.innerHTML="Buscando....";
        jQuery.ajax({
            type: "POST",
            url: ligaActual,
            data: 'marca='+marca+'&equipo='+equipo,
            success: function(a) {
                jQuery('#equipo').html(a);
                var to=document.getElementById("Buscando");
                to.innerHTML="";
            }
        });
    })
    .change();
});

