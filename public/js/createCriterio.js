
var asignatura = $("#asignatura");
var resultado = $("#resultado");

$(document).ready(function(){
    asignatura.on("change", function(event){
        event.preventDefault();
        var value = asignatura.val();
        if(value !== "selected"){
            $.get('/unipana/criterio/create/get_resultados?asignatura_id=' + value, function(response){
                resultado.attr("disabled", false);
                resultado.empty();
                resultado.append("<option value='selected' selected>-- Seleccionar --</option>");
                $.each(response, function(key, value){
                    resultado.append("<option value='" + value.id + "'>" + value.name + "</option>");
                });
            });
        }
    });
});
