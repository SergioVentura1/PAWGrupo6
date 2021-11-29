$(document).ready(function() {
    /* carga contenido Empleados*/
    $(".empleados").click(function(event) {
        $("#contenido-panel").load("./views/panel/empleados/principal.php");
        event.preventDefault();
    });
    /* Despliega Modal Regsitro Empleado*/
    $("a.BtnNewEmpleado").click(function(event) {
        $("#ModalNewEmpleado").modal("show");
        $("#DataFormEmpleado").load("./views/panel/empleados/form_empleado.php");
        event.preventDefault();
    });
    /* Despliega Modal Editar Empleado*/
    $("a.BtnEditEmpleado").click(function() {
        var idempleado = $(this).attr("id-empleado");
        $("#ModalEditEmpleado").modal("show");
        $("#DataEditEmpleado").load("./views/panel/empleados/edit_form_empleado.php?idempleado=" + idempleado);
    });
    /* Nuevo Empleado*/
    $("#NewEmpleado").on("submit", function(event) {
        var tipo = $('#id-user').val();
        if (tipo == 0) {
            alertify.alert("Registro Empleado", "No seleciono el usuario...");
            event.preventDefault();
        } else {
            var formData = new FormData(document.getElementById("NewEmpleado"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/empleados/insert.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#ModalNewEmpleado").modal("hide");
                    $("#contenido-panel").html(res);
                });
        }
        event.preventDefault();
    });
    /* Eliminar Empleado */
    $("a.BtnDelEmpleado").click(function(event) {
        var idempleado = $(this).attr("id-empleado");
        var valor = $(this).attr("valor");
        $("#contenido-panel").load("./views/panel/empleados/del.php?idempleado=" + idempleado+"&valor="+valor);
        event.preventDefault();
    });
    /* Editar Empleado*/
    $("#UpdateEmpleado").on("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("UpdateEmpleado"));
        formData.append("dato", "valor");
        $.ajax({
                url: "./views/panel/empleados/update.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(res) {
                $("#ModalEditEmpleado").modal("hide");
                $("#contenido-panel").html(res);
            });
    });
    /* Paginado*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/empleados/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });
    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/empleados/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    /* Busca empleado*/
    $("#like").on('change', function(event) {
        var valor;
        valor = $("#like").val();
        if (valor.trim() == "") {
            alertify.alert("Busca Empleado", "No ingreso el nombre ó código de empleado a buscar...");
            
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/empleados/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
        event.preventDefault();
    });
});