
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

$('#submitCobro').on('click', function() {
    var inputs = {};
    inputs.Cuenta = $('#Cuentas').val();
    inputs.IdPeriodo = $('#IdPeriodo').val();
    $.ajax({
        url: '../modelo/pagarConsumo.php',
        type: 'POST',
        data: inputs,
        success: function () {
            alert("Pago realizado");
            window.location.href="../vista/vst_cobros.php";
        },
        error: function (xhr, textStatus, errorThrown) {
            alert(errorThrown);
        }
    })
});