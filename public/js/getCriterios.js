
var resultado = $("#resultado");
var criterio = $("#criterio");
var modulo = $("#modulo");
var afirmacion = $("#afirmacion");
var evidencia = $("#evidencia");

$(document).ready(function(){
    resultado.on("change", function(event){
        event.preventDefault();
        var value = resultado.val();
        if(value !== "selected"){
            $.get("/relacion/get_criterios?resultado_id=" + value, function(response){
                criterio.attr("disabled", false);
                criterio.empty();
                criterio.append("<option value='selected' selected>-- Seleccionar --</option>");
                $.each(response, function(key, value){
                    criterio.append("<option value='" + value.id + "'>" + value.name + "</option>");
                });
            });
        }else{
            criterio.attr("disabled", true);
        }
    });
    modulo.on("change", function(event){
        event.preventDefault();
        var value = modulo.val();
        if(value !== "selected"){
            $.get("/relacion/get_afirmaciones?modulo_icfes_id=" + value, function(response){
                afirmacion.attr("disabled", false);
                afirmacion.empty();
                afirmacion.append("<option value='selected' selected>-- Seleccionar --</option>");
                $.each(response, function(key, value){
                    afirmacion.append("<option value='" + value.id + "'>" + value.name + "</option>");
                });
            });
        }else{
            afirmacion.attr("disabled", true);
        }
    });
    afirmacion.on("change", function(event){
        event.preventDefault();
        var value = afirmacion.val();
        if(value !== "selected"){
            $.get("/relacion/get_evidencias?afirmacion_id=" + value, function(response){
                evidencia.attr("disabled", false);
                evidencia.empty();
                evidencia.append("<option value='selected' selected>-- Seleccionar --</option>");
                $.each(response, function(key, value){
                    evidencia.append("<option value='" + value.id + "'>" + value.name + "</option>");
                });
            });
        }else{
            evidencia.attr("disabled", true);
        }
    });
});
