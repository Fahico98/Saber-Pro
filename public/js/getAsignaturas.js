
var searchBox = $("#searchBox");
var tableContent = $("#tableContent");

$(document).ready(function(){
    searchBox.on("keyup", function(){
        $.get("/unipana/getAsignaturas", function(response){

        });
    });
});
