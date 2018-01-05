$(function () {
    var ligaActual = $('#liga').val();
    jQuery('#plan').change(function(){
        var plan =document.getElementById("plan").value;
        var equipo = jQuery(this).attr("equipoAttri");
        var to=document.getElementById("Buscando");
        to.innerHTML="Buscando....";
        jQuery.ajax({
            type: "POST",
            url: ligaActual,
            data: 'plan='+plan+'&equipo='+equipo,
            success: function(a) {
                jQuery('#equipo').html(a);
                var to=document.getElementById("Buscando");
                to.innerHTML="";
            }
        });
    })
    .change();
});

