--Cantidad de Socios
SELECT COUNT(*) AS Cantidad_Socios FROM Socios

--El conteo de deudas anteriores 
SELECT        COUNT(*) AS Socios_Con_Deudas, sum(periodos.Tarifa) as Lo_Acumulado
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                         Socios ON Consumos.Cuenta = Socios.Cuenta
WHERE        (Consumos.Cancelado = 0) and  (Consumos.IdPeriodo <> left(lower(DATENAME(month, GetDate())),3)+format(GetDate(),'yy'))


--Datalle de los deudores antiguos
SELECT        Consumos.IdConsumo, Periodos.IdPeriodo AS Periodo, Socios.ApellidosNombres AS Socio, Periodos.FechaInicio, Periodos.FechaFinal, Periodos.Tarifa, Consumos.Cancelado
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                         Socios ON Consumos.Cuenta = Socios.Cuenta
WHERE        (Consumos.Cancelado = 0) and  (Consumos.IdPeriodo <> left(lower(DATENAME(month, GetDate())),3)+format(GetDate(),'yy'))


--Periodo Actual Automático
SELECT        Consumos.IdConsumo, Socios.ApellidosNombres, Consumos.IdPeriodo, Consumos.Cancelado, Consumos.FechaPago
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                         Socios ON Consumos.Cuenta = Socios.Cuenta
WHERE        (Consumos.IdPeriodo = LEFT(LOWER(DATENAME(month, GETDATE())), 3) + format(GETDATE(), 'yy'))

--Elegir un Periodo X
SELECT        Consumos.IdConsumo, Consumos.Cuenta, Consumos.IdPeriodo, Consumos.Cancelado, Consumos.FechaPago, Consumos.CIEmpleado
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo
WHERE        (Consumos.IdPeriodo = 'jan18')


SELECT        Consumos.IdConsumo, Consumos.Cuenta, Consumos.IdPeriodo, Consumos.Cancelado, Consumos.FechaPago, Consumos.CIEmpleado
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo



