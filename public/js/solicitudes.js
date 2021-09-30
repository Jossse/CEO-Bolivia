
$('#Cuentas').on('change', function() {

    $.ajax({
        url: '../modelo/llenarGridCobros.php',
        type: 'POST',
        data: $('#Cuentas').serialize(),
        success: function (data) {
            var resp = $.parseJSON(data);
            $.map(resp, function(item) {
                $('#ApellidosNombres').val(item.ApellidosNombres);
                $('#CI').val(item.CI);
                $('#Direccion').val(item.Direccion);
                $('#IdPeriodo').val(item.IdPeriodo);
                $('#FechaInicio').val(item.FechaInicio);
                $('#FechaFinal').val(item.FechaFinal);
                $('#Tarifa').val(item.Tarifa);
            });
        },
        error: function (xhr, textStatus, errorThrown) {
            alert(errorThrown);
        }
    })

});