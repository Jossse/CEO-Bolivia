SELECT        Consumos.IdConsumo, Consumos.Cuenta, Consumos.IdPeriodo, Consumos.Cancelado, Consumos.FechaPago, Consumos.CIEmpleado
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo
WHERE        (Consumos.IdPeriodo = left(lower(format(GetDate(),'MMMM')),3)+format(GetDate(),'yy'))
