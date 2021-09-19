SELECT        Consumos.IdConsumo AS c, Periodos.IdPeriodo AS p, Socios.ApellidosNombres AS s, Periodos.FechaInicio, Periodos.FechaFinal, Periodos.Tarifa, Consumos.Cancelado
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                         Socios ON Consumos.Cuenta = Socios.Cuenta
WHERE        (Consumos.Cancelado = 0) AND (Socios.Cuenta = 400)
ORDER BY s