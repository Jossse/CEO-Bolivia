<?php

    $Cuentas = $_POST['Cuentas'];

    $con = new PDO("sqlsrv:server=DESKTOP-KM93IFJ ; Database = sisrecocoap", "", "");

    $sql = "SELECT S.ApellidosNombres, S.CI, S.Direccion, P.IdPeriodo, P.FechaInicio, P.FechaFinal, P.Tarifa
            FROM Socios S
            INNER JOIN Consumos C ON S.Cuenta = C.Cuenta
            INNER JOIN Periodos P ON C.IdPeriodo = P.IdPeriodo
            WHERE S.Cuenta = $Cuentas AND C.Cancelado = 0";
    $query = $con->prepare($sql);
    $query->execute();

    while ($resu = $query->fetch(PDO::FETCH_ASSOC)){
        $resultado[] = array(
            'ApellidosNombres' => $resu['ApellidosNombres'],
            'CI' => $resu['CI'],
            'Direccion' => $resu['Direccion'],
            'IdPeriodo' => $resu['IdPeriodo'],
            'FechaInicio' => $resu['FechaInicio'],
            'FechaFinal' => $resu['FechaFinal'],
            'Tarifa' => $resu['Tarifa']
   );
}
    echo json_encode($resultado);
?>
