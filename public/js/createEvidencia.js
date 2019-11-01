
var modulo = $("#modulo");
var afirmacion = $("#afirmacion");

$(document).ready(function(){
    modulo.on("change", function(event){
        event.preventDefault();
        var value = modulo.val();
        if(value !== "selected"){
            $.get('/icfes/evidencia/create/get_afirmaciones?modulo_id=' + value, function(response){
                afirmacion.attr("disabled", false);
                afirmacion.empty();
                afirmacion.append("<option value='selected' selected>-- Seleccionar --</option>");
                $.each(response, function(key, value){
                    afirmacion.append("<option value='" + value.id + "'>" + value.name + "</option>");
                });
            });
        }
    });
});
