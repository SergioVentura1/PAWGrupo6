$(document).ready(function(){
    
    /**Modal Agregar producto a carrito */
    $(".AddCart").click(function(){
        var idproducto = $(this).attr("id-producto");
        var idinventario = $(this).attr("id-inventario");
        $("#ModalAddCart").modal("show");
        $("#DataFormAddCart").load("./views/panel/inventarios/form_add.php?idproducto=" + idproducto+"&idinventario="+idinventario);
    });

    /**Agregar Nuevo producto */

    $("#NewAddProducto").on("submit", function(event) {
        event.preventDefault();
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
              
    });

    /**Paginado */
    $("a.pagina").click(function(event) {
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido").load("./views/panel/inventarios/principal.php?num=" + num + "&num_reg=" + reg);
        event.preventDefault();
    });
    
    /* Buscar */
    $("#like").on('change', function(event) {
        var valor;
        valor = $("#like").val();
        if (valor.trim() == "") {
            alertify.alert("Buscar Producto", "No ingreso el nombre ó código de producto a buscar");
            event.preventDefault();
        } else {
            //alert(valor);
            $("#contenido").load("./views/panel/inventarios/principal.php?like=1&valor=" + valor);
            //event.preventDefault();
        }
    });
    /* Aumenta N° registros para el paginado*/
    $("#select-reg").on('change', function(event) {
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido").load("./views/panel/inventarios/principal.php?num_reg=" + valor);
        event.preventDefault();
    });
    
});

