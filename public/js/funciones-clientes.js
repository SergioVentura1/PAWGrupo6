$(document).ready(function() {
    /* carga contenido Clientes*/
    $(".clientes").click(function(event) {
        $("#contenido-panel").load("./views/panel/clientes/principal.php");
        event.preventDefault();
    });

    /* Paginado*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/clientes/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/clientes/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

     /* Busca cliente*/
     $("#like").on('change', function(event) {
        var valor;
        valor = $("#like").val();
        if (valor.trim() == "") {
            alertify.alert("Busca Cliente", "No ingreso el nombre ó código del cliente a buscar...");
            
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/clientes/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
        event.preventDefault();
    });

    /* Despliega Modal Regsitro Cliente*/
    $("a.BtnNewCliente").click(function(event) {
        $("#ModalNewCliente").modal("show");
        $("#DataFormCliente").load("./views/panel/clientes/form_cliente.php");
        event.preventDefault();
    });

    /* Nuevo Cliente*/
    $("#NewCliente").on("submit", function(event) {
        
            var formData = new FormData(document.getElementById("NewCliente"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/clientes/insert.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#ModalNewCliente").modal("hide");
                    $("#contenido-panel").html(res);
                });
        
        event.preventDefault();
    });

     /* Despliega Modal Editar Cliente*/
     $("a.BtnEditCliente").click(function() {
        var idcliente = $(this).attr("id-cliente");
        $("#ModalEditCliente").modal("show");
        $("#DataEditCliente").load("./views/panel/clientes/edit_form_cliente.php?idcliente=" + idcliente);
    });

    /* Editar Cliente*/
    $("#UpdateCliente").on("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("UpdateCliente"));
        formData.append("dato", "valor");
        $.ajax({
                url: "./views/panel/clientes/update.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(res) {
                $("#ModalEditCliente").modal("hide");
                $("#contenido-panel").html(res);
            });
    });

    /* Eliminar Cliente */
    $("a.BtnDelCliente").click(function(event) {
        var idcliente = $(this).attr("id-cliente");
        alertify.confirm('Eliminar Cliente', '¿Seguro/a de eliminar este Cliente?',
            function() {
                $("#contenido-panel").load("./views/panel/clientes/del.php?idcliente=" + idcliente);
                event.preventDefault();
            },
            function() {
                alertify.error('Proceso cancelado...');
            });
        event.preventDefault();
    });

});