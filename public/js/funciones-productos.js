$(document).ready(function() {
    /* carga contenido Productos*/
    $(".productos").click(function(event) {
        $("#contenido-panel").load("./views/panel/productos/principal.php");
        event.preventDefault();
    });

     /* Paginado*/
     $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/productos/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-panel").load("./views/panel/productos/principal.php?num_reg=" + valor);
        event.preventDefault();
    });

    /* Buscar Producto*/
    $("#like-product").on('change', function(event) {
        var valor;
        valor = $("#like-product").val();
        if (valor.trim() == "") {
            alertify.alert("Buscar Producto", "No ingreso el nombre ó código de producto a buscar...");
            event.preventDefault();
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/productos/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });

    /* Despliega Modal Registro Producto*/
    $("a.BtnNewProducto").click(function(event) {
        $("#ModalNewProducto").modal("show");
        $("#DataFormProducto").load("./views/panel/productos/form_producto.php");
        event.preventDefault();
    });

    /**Agregar Nuevo producto */

    $("#FormNewProducto").on("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("FormNewProducto"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/productos/insert.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#contenido-panel").html(res);
                });
              
    });

    /* Despliega Modal Editar Producto*/
    $("a.BtnEditProducto").click(function(event) {
        var idproducto=$(this).attr("id-producto");
        $("#ModalEditProducto").modal("show");
        $("#DataEditProducto").load("./views/panel/productos/edit_form_producto.php?idproducto="+idproducto);
    });

    /**Actualizar producto */
    $("#UpdateProducto").on("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("UpdateProducto"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/productos/update.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#contenido-panel").html(res);
                    $("#ModalEditProducto").modal("hide");
                });
            event.preventDefault();
    });
    /**Eliminar producto */
    $("a.BtnDelProducto").click(function(event) {
        var idproducto = $(this).attr("id-producto");
        alertify.confirm('Eliminar Producto', '¿Seguro/a de eliminar este producto?',
            function() {
                $("#contenido-panel").load("./views/panel/productos/del.php?idproducto=" + idproducto);
                event.preventDefault();
            },
            function() {
                alertify.error('Proceso cancelado...');
            });
        event.preventDefault();
    });
                /**PARTE DEL CODIGO REGISTRO DEL PRODUCTO */

    /* Boton Registro de Codigo de producto*/
    $(".cod-registro").click(function(event) {
        $("#contenido-panel").load("./views/panel/productos/principal_registro.php");
        event.preventDefault();
    });

    /* Despliega Modal Registro Nuevo Codigo de registro de producto*/
    $("a.BtnNewCR").click(function(event) {
        $("#ModalNewCR").modal("show");
        $("#DataFormCR").load("./views/panel/productos/form_CR.php");
        event.preventDefault();
    });

     /*Guardar nueva Codigo de registro de producto*/
    $("#NewCR").on("submit", function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById("NewCR"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/productos/insertCR.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#contenido-panel").html(res);
                });
              
    });

      /* Aumenta N° registros para el paginado de codigo registro producto*/
      $("#select-regCR").on('change', function(event) {
        var valor;
        valor = $("#select-regCR option:selected").val();
        $("#contenido-panel").load("./views/panel/productos/principal_registro.php?num_reg=" + valor);
        event.preventDefault();
    });

    /* Buscar Codigo Registro Producto*/
    $("#likeCR").on('change', function(event) {
        var valor;
        valor = $("#likeCR").val();
        if (valor.trim() == "") {
            alertify.alert("Buscar Codigo Registro", "No ingreso el nombre ó código de registro a buscar...");
            event.preventDefault();
        } else {
            //alert(valor);
            $("#contenido-panel").load("./views/panel/productos/principal_registro.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });

     /* Paginado para codigo registro*/
     $("a.paginaCR").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-panel").load("./views/panel/productos/principal_registro.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });

    /* Despliega Modal Editar Codigo/Serie Producto*/
    $("a.BtnEditCR").click(function(event) {
        var idcodreg=$(this).attr("id-codreg");
        $("#ModalEditCR").modal("show");
        $("#DataEditCR").load("./views/panel/productos/edit_form_CR.php?idcodreg="+idcodreg);
    });

    /* Actualizar Codigo/Serie Producto*/
    $("#UpdateCR").on("submit", function(event) {
        var tipo = $('#tipo-user').val();
        event.preventDefault();
       
            var formData = new FormData(document.getElementById("UpdateCR"));
            formData.append("dato", "valor");
            $.ajax({
                    url: "./views/panel/productos/updateCR.php",
                    type: "POST",
                    dataType: "html",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                })
                .done(function(res) {
                    $("#contenido-panel").html(res);
                    $("#ModalEditCR").modal("hide");
                });
        
    });

     /**Eliminar registro codigo producto */
     $("a.BtnDelCR").click(function(event) {
        var idcodreg = $(this).attr("id-codreg");
        alertify.confirm('Eliminar Producto', '¿Seguro/a de eliminar este codigo/registro del producto?',
            function() {
                $("#contenido-panel").load("./views/panel/productos/delCR.php?idcodreg=" + idcodreg);
                event.preventDefault();
            },
            function() {
                alertify.error('Proceso cancelado...');
            });
        event.preventDefault();
    });

});