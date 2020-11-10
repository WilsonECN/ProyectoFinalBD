$(document).ready(function(){
    tablaClientes = $("#tablaClientes").DataTable({
        "columnDefs":[{
            "targets": -1,
            "data": null,
            "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-warning btnEditar'><span class='material-icons'>edit</span></button><button class='btn btn-danger btnBorrar'><span class='material-icons'>remove_circle</span></button></div></div>"
        }],
        
        "language": {
            "lengthMenu" : "Mostrar _MENU_ registros",
            "zeroRecords" : "No se encontraron resultados",
            "info"       : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty"  : "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered":"(filtrado de un total de _MAX_ registros)",
            "sSearch"    : "Buscar:",
            "oPaginate"  : {
                "sFirst" : "Primero",
                "sLast"  : "Último",
                "sNext"  : "Siguiente",
                "sPrevious":"Anterior"
            },
            "sProcessing": "Procesando...",
        }
        
    });
    
    $("#btnNuevo").click(function(){
        $("#formClientes").trigger("reset");
        $(".modal-header").css("background-color", "#28A745");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Nuevo Cliente");
        $("#modalCRUD").modal("show");
        id=null;
        opcion=1;//nuevo usuario
    });
    
    var fila;//editar o borar registro

    $(document).on("click", ".btnEditar", function(){
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        nombre = fila.find('td:eq(1)').text();
        //nombre = (document.getElementById('ID_USUARIO').value);
        apellido = fila.find('td:eq(2)').text();
        Fch_Nacimiento = fila.find('td:eq(3)').text();
        Genero = fila.find('td:eq(4)').text();
        Direccion = fila.find('td:eq(5)').text();
        Telefono = fila.find('td:eq(6)').text();
        NIT = fila.find('td:eq(7)').text();
        Descripcion = fila.find('td:eq(8)').text();
        
        $("#Nombre").val(nombre);
        $("#Apellido").val(apellido);
        $("#NIT").val(NIT);
        $("#Fch_Nacimiento").val(Fch_Nacimiento);
        $("#Genero").val(Genero);
        $("#Direccion").val(Direccion);
        $("#Telefono").val(Telefono);
        $("#NIT").val(NIT);
        $("#Descripcion").val(Descripcion);
        opcion = 2; //editar
        
        $(".modal-header").css("background-color", "#FFD454");
        $(".modal-header").css("color", "black");
        $(".modal-title").text("Editar Persona");
        $("#modalCRUD").modal("show");
    });
    
    
    $(document).on("click", ".btnBorrar", function(){
       fila = $(this);
        id = parseInt($(this).closest("tr").find('td:eq(0)').text());
        opcion = 3; //borrar dato
        console.log(id);
        console.log(opcion);
        var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
        if(respuesta){
            $.ajax({
               url: "bd/crud.php",
                type: "POST",
                dataType: "json",
                data: {opcion: opcion, id: id},
                success: function(){
                    tablaClientes.row(fila.parents('tr')).remove().draw();
                } 
            });
        }
    });
    
    $("#formClientes").submit(function(e){
        e.preventDefault();
        nombre = $.trim($("#Nombre").val());
        apellido = $.trim($("#Apellido").val());
        nit = $.trim($("#NIT").val());
        fch_nacimiento = $.trim($("#Fch_Nacimiento").val());
        genero = $.trim($("#Genero").val());
        direccion = $.trim($("#Direccion").val());
        telefono = $.trim($("#Telefono").val());
        descripcion = $.trim($("#Descripcion").val());

        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {
                id:id,
                nombre:nombre, 
                apellido:apellido,
                nit:nit,
                fch_nacimiento:fch_nacimiento,
                genero:genero,
                direccion:direccion,
                telefono:telefono,
                descripcion:descripcion,
                opcion:opcion
            },
            success: function(data){
                console.log(data);
                id = data[0].ID_Cliente;
                nombre = data[0].Nombre;
                apellido = data[0].Apellido;
                nit = data[0].NIT;
                fch_nacimiento = data[0].Fch_Nacimiento;
                direccion = data[0].Direccion;
                telefono = data[0].Telefono;
                descripcion = data[0].Descripcion;
                genero = data[0].Genero;
                if(opcion == 1){
                    tablaClientes.row.add([id,nombre,apellido,fch_nacimiento,genero,direccion,telefono,nit,descripcion]).draw();    
                    
                }else{  tablaClientes.row(fila).data([id,nombre,apellido,fch_nacimiento,genero,direccion,telefono,nit,descripcion]).draw();
                }
            }
        });        
        
    $("#modalCRUD").modal("hide");
    
    });
    
});
