SELECT        sum(Periodos.Tarifa)
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                         Socios ON Consumos.Cuenta = Socios.Cuenta
WHERE        (Consumos.Cancelado = 0) AND (Socios.Cuenta = 400)