$(document).ready(function() {
    $("button#leer").on("click", function() {
        $("#paraLeer").show();
    });

    $("#paraLeer").on("submit", function(e) {
        e.preventDefault();
        $("#paraLeer").hide();

        $.ajax({
            type:"POST",
            url:'index.php',
            data: ({
                'horas':$('input[name="horas"]').val(),
                'minutos':$('input[name="minutos"]').val(),
                'segundos':$('input[name="segundos"]').val()
            }),
            success: function(data){ 
                $("#datos").html(data);
                $("#validar").show();
                $("#print").show();
            }
        })
    });

    $("#print").on("click", function(){
        $("#mostrar").show();
    })
})
