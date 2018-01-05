function renombraProducto(){
	$("#tablaProductos #listaProductos tr td input.span12").each(function(i){
		$(this).attr('name', 'producto' + i);
	});
}

function renombraCantidad(){
	$("#tablaProductos #listaProductos tr td input.span10").each(function(i){
		$(this).attr('name', 'cantidad' + i);
	});
}

function validaBoton(){
	var rowCount = $('#tablaProductos #listaProductos tr').length;
    if(rowCount == 0){
    	 $("#guardarEntrada").attr('disabled','disabled');
    }else{
    	$("#guardarEntrada").removeAttr('disabled');
    }
}

$(document).ready(function(){
    $(".add-row").click(function(){
        var producto = document.getElementById("productoCat").value;
        var cantidad = document.getElementById("cantidadProducto").value;

        if(producto != "" && cantidad != ""){
            $("#errorProducto").hide();
            var markup = "<tr><td><input type='text' class='span12 m-wrap' name='producto' id='producto' required='required'></td><td><input type='text' class='span10 m-wrap' name='cantidad' id='cantidad'> Piezas</td><td  style='text-align: center;'><input type='checkbox' name='record'></td></tr>";
            $("#tablaProductos #listaProductos").append(markup);

            renombraProducto();
            renombraCantidad();
            validaBoton();
        }else{
            $("#errorProducto").show();
            setTimeout(function() {
                $('#errorProducto').fadeOut('fast');
            }, 1000);
        }
    });

    // Buscamos las lineas que hay que borrar para borrarlas
    $(".delete-row").click(function(){
        $("#tablaProductos #listaProductos").find('input[name="record"]').each(function(){
            if($(this).is(":checked")){
                $(this).parents("tr").remove();
            }
        });
        renombraProducto();
		renombraCantidad();
		validaBoton();
    });
});
