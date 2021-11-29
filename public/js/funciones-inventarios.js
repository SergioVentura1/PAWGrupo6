$(document).ready(function() {
   /* Modal Agregar Producto a carrito*/
    $(".AddCart").click(function() {
        var idproducto = $(this).attr("id-producto");
        var idinventario = $(this).attr("id-inventario");
        $("#ModalAddCart").modal("show");
        $("#DataFormAddCart").load("./views/panel/inventarios/form_add.php?idproducto="+idproducto+"&idinventario="+idinventario);
    });
    /* Agregar Producto a carrito*/
    $("#NewAddProducto").on("submit", function(event) {
        var formData = new FormData(document.getElementById("NewAddProducto"));
        formData.append("dato", "valor");
        $.ajax({
                url: "./views/panel/inventarios/insert.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(res) {
                $("#ModalAddCart").modal("hide");
                $('body').removeClass('modal-open'); 
                $('.modal-backdrop').remove();
                $("#contenido").html(res);
            });
        event.preventDefault();
    });
    /* Registrar VEnta*/
    $("#realizar-pago").on("submit", function(event) {
        var formData = new FormData(document.getElementById("realizar-pago"));
        formData.append("dato", "valor");
        $.ajax({
                url: "./views/panel/inventarios/reg_venta.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
            .done(function(res) {
               
                $("#contenido").html(res);
            });
        event.preventDefault();
    });
    /* Preventas */
    $("a.ver-carrito").click(function(event) {
        $("#contenido").load("./views/panel/inventarios/preventa.php");
        event.preventDefault();
    });
    /* Remover Producto de carrito*/
    $("a.remover-producto").click(function(event) {
        var iddpv, idproducto;
        iddpv = $(this).attr("id-dpv");
        idproducto = $(this).attr("id-producto");
        $("#contenido").load("./views/panel/inventarios/remover_producto.php?iddpv=" + iddpv + "&idproducto=" + idproducto);
        event.preventDefault();
    });
    /* Paginado*/
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("./views/panel/inventarios/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });
    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido").load("./views/panel/inventarios/principal.php?num_reg=" + valor);
        event.preventDefault();
    });
    /* Buscar*/
    $("#like").on('change', function(event) {
        var valor;
        valor = $("#like").val();

        if (valor.trim() == "") {
            alertify.alert("Busca Servicio", "No ingreso el servicio a buscar...");
            event.preventDefault();
        } else {
            //alert(valor);
            $("#contenido").load("./views/panel/inventarios/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });
});