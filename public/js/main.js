
$(document).ready( function () {
    $('#socio_data').DataTable({
        "responsive": true,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    });

    $('#empleado_data').DataTable({
        "responsive": true,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    });

    $('#periodo_data').DataTable({
        "responsive": true,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    });

    $('#consumo_data').DataTable({
        "responsive": true,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
    });

} );

$(document).on("click","#btnnuevo", function(){
    $('#titulo_empleado').html('Empleado-Nuevo Registro');
    $('#btn').attr("name", "registro");
    $('#Clave').removeAttr("readonly");
    $('#Clave').attr("type", "text");
    $('#FechaRegistro').removeAttr("readonly");
    $('#empleado_form')[0].reset();
    $('#modal_empleado').modal('show');
});

$(document).on("click","#btnModificar", function(){
    CI = $(this).parents("tr").find("td").eq(0).html();
    Nombre = $(this).parents("tr").find("td").eq(1).html();
    Direccion = $(this).parents("tr").find("td").eq(2).html();
    Celular = $(this).parents("tr").find("td").eq(3).html();
    Cargo = $(this).parents("tr").find("td").eq(4).html();
    console.log(Cargo);
    Pass = $(this).parents("tr").find("td").eq(5).html();
    Fecha = $(this).parents("tr").find("td").eq(6).html();
    var date = Fecha.split(" ")[0];

    $('#titulo_empleado').html('Empleado-Modificar Registro');
    $('#btn').attr("name", "modificar");
    $('#CI').val(CI);
    $('#Apellidos_Nombres').val(Nombre);
    $('#Direccion').val(Direccion);
    $('#Celular').val(Celular);
    $('#Cargo').val(Cargo).trigger('sync');
    $('#Clave').val(Pass);
    $('#Clave').attr("readonly", "readonly");
    $('#Clave').attr("type", "password");
    $('#FechaRegistro').val(date);
    $('#FechaRegistro').attr("readonly", "readonly");
    $('#modal_empleado').modal('show');


});

$("#cerrarModal").click(function(){
    $("#modal_empleado").modal('hide')
});

$(document).on("click","#btnnuevosocio", function(){
    $('#titulo_socio').html('Socio-Nuevo Registro');
    $('#btnSocio').attr("name", "registro");
    $('#Cuenta').removeAttr("readonly");
    $('#FechaRegistro').removeAttr("readonly");
    $('#socio_form')[0].reset();
    $('#modal_socios').modal('show');
});

$(document).on("click","#btnModificarSocio", function(){
    Cuenta = $(this).parents("tr").find("td").eq(0).html();
    Nombre = $(this).parents("tr").find("td").eq(1).html();
    CI = $(this).parents("tr").find("td").eq(2).html();
    Direccion = $(this).parents("tr").find("td").eq(3).html();
    Celular = $(this).parents("tr").find("td").eq(4).html();
    Fecha = $(this).parents("tr").find("td").eq(5).html();
    var date = Fecha.split(" ")[0];

    $('#titulo_socio').html('Socios-Modificar Registro');
    $('#btnSocio').attr("name", "modificar");
    $('#Cuenta').val(Cuenta);
    $('#Cuenta').attr("readonly", "readonly");
    $('#ApellidosNombres').val(Nombre);
    $('#CI').val(CI);
    $('#Direccion').val(Direccion);
    $('#Celular').val(Celular);
    $('#FechaRegistro').val(date);
    $('#FechaRegistro').attr("readonly", "readonly");
    $('#modal_socios').modal('show');

});
$("#cerrarModalSocios").click(function(){
    $("#modal_socios").modal('hide')
    });

$(document).on("click","#btnnuevoperiodo", function(){
    $('#titulo_periodo').html('Periodo-Nuevo Registro');
    $('#btnPeriodo').attr("name", "registro");
    $('#IdPeriodo').removeAttr("readonly");
    // $('#FechaInicio').removeAttr("readonly");
    // $('#FechaFinal').removeAttr("readonly");
    $('#periodo_form')[0].reset();
    $('#modal_periodo').modal('show');
});


$(document).on("click","#btnModificarPeriodo", function(){
    IdPeriodo = $(this).parents("tr").find("td").eq(0).html();
    FechaInicio = $(this).parents("tr").find("td").eq(1).html();
    FechaFinal = $(this).parents("tr").find("td").eq(2).html();
    Tarifa = $(this).parents("tr").find("td").eq(3).html();
    var date1 = FechaInicio.split(" ")[0];
    var date2 = FechaFinal.split(" ")[0];
    $('#titulo_periodo').html('Periodo-Modificar Registro');
    $('#btnPeriodo').attr("name", "modificar");
    $('#IdPeriodo').val(IdPeriodo);
    $('#IdPeriodo').attr("readonly", "readonly");
    $('#FechaInicio').val(date1);
    $('#FechaFinal').val(date2);
    $('#Tarifa').val(Tarifa);
    $('#modal_periodo').modal('show');


});

$("#cerrarModalPeriodo").click(function(){
    $("#modal_Periodo").modal('hide')
    });

$(document).on("click","#btnnuevoconsumo", function(){
    $('#titulo_consumo').html('Consumo-Nuevo Registro');
    $('#btn').attr("name", "registro");
    $('#IdConsumo').removeAttr("readonly");
    // $('#IdPeriodo').removeAttr("readonly");
    $('#consumo_form')[0].reset();
    $('#modal_consumo').modal('show');
});

$(document).on("click","#btnModificar", function(){
    IdConsumo = $(this).parents("tr").find("td").eq(0).html();
    Cuenta = $(this).parents("tr").find("td").eq(1).html();
    IdPeriodo = $(this).parents("tr").find("td").eq(2).html();
    Cancelado = $(this).parents("tr").find("td").eq(3).html();
    FechaPago = $(this).parents("tr").find("td").eq(4).html();
    CIEmpleado = $(this).parents("tr").find("td").eq(5).html();
    var date = FechaPago.split(" ")[0];

    $('#titulo_consumo').html('Consumo-Modificar Registro');
    $('#btn').attr("name", "modificar");
    $('#IdConsumo').val(IdConsumo);
    $('#IdConsumo').attr("readonly", "readonly");
    $('#Cuenta').val(Cuenta);
    $('#IdPeriodo').val(IdPeriodo);
    $('#Cancelado').val(Cancelado);
    $('#FechaPago').val(date);
    $('#CIEmpleado').val(CIEmpleado);
    $('#modal_consumo').modal('show');

});

$("#cerrarModal").click(function(){
    $("#modal_Consumo").modal('hide')
    });


        $('#sidebarToggle').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
