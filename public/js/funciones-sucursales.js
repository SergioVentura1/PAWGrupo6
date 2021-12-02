$(document).ready(function() {
    /* carga contenido Sucursales*/
    $(".sucursales").click(function(event) {
        $("#contenido-panel").load("./views/panel/sucursales/principal.php");
        event.preventDefault();
    });

    /* Paginado*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/sucursales/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/sucursales/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

     /* Buscar Sucursal*/
     $("#like").on('change', function(event) {
        var valor;
        valor = $("#like").val();
        if (valor.trim() == "") {
            alertify.alert("Buscar Sucursal", "No ingreso el nombre ó código de la sucursal a buscar...");
            
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/sucursales/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
        event.preventDefault();
    });

    /* Despliega Modal Registro Sucursal*/
    $("a.BtnNewSucursal").click(function(event) {
        $("#ModalNewSucursal").modal("show");
        $("#DataFormSucursal").load("./views/panel/sucursales/form_sucursal.php");
        event.preventDefault();
    });

    /* Nueva Sucursal*/
    $("#NewSucursal").on("submit", function(event) {
        
            var formData = new FormData(document.getElementById("NewSucursal"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/sucursales/insert.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#ModalNewSucursal").modal("hide");
                    $("#contenido-panel").html(res);
                });
        
        event.preventDefault();
    });

     /* Despliega Modal Editar Sucursal*/
     $("a.BtnEditSucursal").click(function() {
        var idempresa = $(this).attr("id-sucursal");
        $("#ModalEditSucursal").modal("show");
        $("#DataEditSucursal").load("./views/panel/sucursales/edit_form_sucursal.php?idempresa=" + idempresa);
    });

    /* Editar Sucursal*/
    $("#UpdateSucursal").on("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("UpdateSucursal"));
        formData.append("dato", "valor");
        $.ajax({
                url: "./views/panel/sucursales/update.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(res) {
                $("#ModalEditSucursal").modal("hide");
                $("#contenido-panel").html(res);
            });
    });

    /* Eliminar Sucursal */
    $("a.BtnDelSucursal").click(function(event) {
        var idempresa = $(this).attr("id-sucursal");
        alertify.confirm('Eliminar Sucursal', '¿Seguro/a de eliminar esta sucursal del registro?',
            function() {
                $("#contenido-panel").load("./views/panel/sucursales/del.php?idempresa=" + idempresa);
                event.preventDefault();
            },
            function() {
                alertify.error('Proceso cancelado...');
            });
        event.preventDefault();
    });

});