<?php
    $Cuenta = $_POST['Cuenta'];
    $IdPeriodo = $_POST['IdPeriodo'];

    $con = new PDO("sqlsrv:server=DESKTOP-KM93IFJ ; Database = sisrecocoap", "", "");

    $sql = "update Consumos set Cancelado=1,FechaPago=getdate()where IdPeriodo = '$IdPeriodo' AND Cuenta = $Cuenta";

    $query = $con->prepare($sql);

    $query->execute();

    $resu = $query->fetch(PDO::FETCH_ASSOC);

