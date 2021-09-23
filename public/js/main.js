/*var tabla;

function init(){
    $("#empleado_form").on("submit",function(e){
        guardaryeditar(e);
    });

}

$(document).ready(function(){

    tabla= $('#empleado_data').DataTable({

        "ajax":{
            url:"../../app/controlador/ctrl_empleado.php?op=listar",
            type : "post",
            data : {tag: 'getData'},
            dataType : 'json',
            success : function(data){
              if (data.success){
                  $.each(data, function (index, record) {
                      if ($.isNumeric(index)){
                          var row = $("<tr />");
                          $("<td />").text(record.CI).appendTo(row);
                          $("<td />").text(record.Apellidos_Nombres).appendTo(row);
                          $("<td />").text(record.Direccion).appendTo(row);
                          $("<td />").text(record.Celular).appendTo(row);
                          $("<td />").text(record.Cargo).appendTo(row);
                          $("<td />").text(record.FechaRegistro).appendTo(row);
                          row.appendTo('table');
                      }
                  })
              }
            },
            error: function(e){
                console.log(e.responseText);
            },
        },
        "searching": false,
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "order": [[ 0, "desc" ]],
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

});

function editar(CI){
    $.post("../../app/controlador/ctrl_empleado.php?op=mostrar",{CI : CI}, function(data, status){
        data = JSON.parse(data);
        $('#titulo_empleado').html('Empleado-Editar Registro');
        $('#CI').val(data.CI);
        $('#Apellidos_Nombres').val(data.Apellidos_Nombres);
        $('#Direccion').val(data.Direccion);
        $('#Celular').val(data.Celular);
        $('#Cargo').val(data.Cargo);
        $('#FechaRegistro').val(data.Cargo);
    });
    $("#modal_empleado").modal('show');
}

function eliminar(CI){
    swal.fire({
        title: "Eliminar!",
        text: "Desea Eliminar el Registro?",
        icon: "error",
        confirmButtonText: "<span><i class='la la-check'></i><span>Si</span></span>",
        confirmButtonClass: "btn btn-danger kt-btn kt-btn--pill kt-btn--air kt-btn--icon",
        showCancelButton: true,
        cancelButtonText: "<span><i class='la la-close'></i><span>No</span></span>",
        cancelButtonClass: "btn btn-secondary kt-btn kt-btn--pill kt-btn--icon"
    }).then((result) => {
        if (result.value) {
            $.post("../../app/controlador/ctrl_empleado.php?op=activarydesactivar",{CI : CI}, function(data, status){
                $('#empleado_data').DataTable().ajax.reload();
                Swal.fire('Eliminado!','Registro Eliminado Correctamente.','success');
            });
        }
    });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#empleado_form")[0]);
    $.ajax({
        url: "../../app/controlador/ctrl_empleado.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#empleado_form')[0].reset();
            $("#modal_empleado").modal('hide');
            $('#empleado_data').DataTable().ajax.reload();
            Swal.fire('Guardado!','Registro Guardado Correctamente.','success')
        }
    });
}

init();*/
$(document).on("click","#btnnuevo", function(){
    $('#titulo_empleado').html('Empleado-Nuevo Registro');

    $('#empleado_form')[0].reset();
    $('#modal_empleado').modal('show');
});