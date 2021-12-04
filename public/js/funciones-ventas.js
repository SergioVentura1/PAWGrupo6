$(document).ready(function() {
    /* carga contenido Empleados*/
    $(".ventas").click(function(event) {
        $("#contenido-panel").load("./views/panel/ventas/principal.php");
        event.preventDefault();
    });
    
    /* Paginado*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/ventas/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });
    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/ventas/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    /* Busca venta*/
    $("#like").on('change', function(event) {
        var valor;
        valor = $("#like").val();
        if (valor.trim() == "") {
            alertify.alert("Buscar Ventas", "No ingreso el nombre ó código a buscar");
            
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/ventas/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
        event.preventDefault();
    });
});