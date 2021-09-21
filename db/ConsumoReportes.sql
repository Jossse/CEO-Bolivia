SELECT        Consumos.IdConsumo AS c, Periodos.IdPeriodo AS p, Socios.ApellidosNombres AS s, FORMAT(Periodos.FechaInicio,'MMMM') AS Mes, FORMAT(Periodos.FechaInicio,'yyyy') AS Mes, Periodos.Tarifa, Consumos.Cancelado
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                         Socios ON Consumos.Cuenta = Socios.Cuenta
WHERE        (Consumos.Cancelado = 1)