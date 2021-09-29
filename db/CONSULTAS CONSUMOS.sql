SELECT Empleados.Apellidos_Nombres, Socios.ApellidosNombres, Periodos.IdPeriodo, Periodos.Tarifa, Consumos.IdConsumo
FROM     Consumos INNER JOIN
                  Empleados ON Consumos.CIEmpleado = Empleados.CI INNER JOIN
                  Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                  Socios ON Consumos.Cuenta = Socios.Cuenta
--Acumulado por Periodo
SELECT Consumos.IdPeriodo, SUM(Periodos.Tarifa) AS TotalPeriodo, Count(Consumos.Cuenta) as SociosEnEsePeriodo
FROM     Consumos INNER JOIN
                  Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo
WHERE Consumos.Cancelado=1
GROUP BY Consumos.IdPeriodo, Periodos.FechaInicio
ORDER BY Periodos.FechaInicio


--CUOTA por Periodo
SELECT Consumos.IdPeriodo, SUM(Periodos.Tarifa) AS CUOTA_TOTAL, Count(Consumos.Cuenta) as SociosEnEsePeriodo
FROM     Consumos INNER JOIN
                  Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo
GROUP BY Consumos.IdPeriodo, Periodos.FechaInicio
ORDER BY Periodos.FechaInicio



--SOCIOS QUE TIENEN DEUDAS ANTERIORES
SELECT Consumos.IdPeriodo, SUM(Periodos.Tarifa) AS TotalPeriodo, Count(Consumos.Cuenta) as SociosEnEsePeriodo
FROM     Consumos INNER JOIN
                  Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo
WHERE Consumos.Cancelado=0
GROUP BY Consumos.IdPeriodo, Periodos.FechaInicio
ORDER BY Periodos.FechaInicio


--DETALLE SOCIOS Y SUS DEUDAS POR PERIODO
SELECT Consumos.IdPeriodo, Consumos.Cuenta, Socios.ApellidosNombres
FROM     Consumos INNER JOIN
                  Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                  Socios ON Consumos.Cuenta = Socios.Cuenta
WHERE  (Consumos.Cancelado = 0)
GROUP BY Consumos.IdPeriodo, Periodos.FechaInicio, Consumos.Cuenta, Socios.ApellidosNombres
ORDER BY Periodos.FechaInicio


--DETALLE SOCIOS Y SUS DEUDAS POR PERIODO tarifa
SELECT Consumos.IdPeriodo, Consumos.Cuenta, Socios.ApellidosNombres, SUM(Periodos.Tarifa)
FROM     Consumos INNER JOIN
                  Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                  Socios ON Consumos.Cuenta = Socios.Cuenta
WHERE  (Consumos.Cancelado = 0)
GROUP BY Periodos.FechaInicio, Consumos.Cuenta, Socios.ApellidosNombres,Consumos.IdPeriodo
ORDER BY Periodos.FechaInicio

--DETALLE SOCIOS Y SUS DEUDAS POR PERIODO tarifa
SELECT *,
(SELECT SUM(Periodos.Tarifa) FROM Periodos WHERE Consumos.IdPeriodo=Periodos.IdPeriodo) as C
FROM Consumos

--deudas por pagar 
SELECT Consumos.Cuenta, SUM(Periodos.Tarifa),COUNT(Periodos.IdPeriodo)
FROM     Consumos INNER JOIN
                  Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo
WHERE Consumos.Cancelado=0
GROUP BY Consumos.Cuenta
--ORDER BY Consumos.Cuenta

SELECT Consumos.Cuenta,Socios.ApellidosNombres, SUM(Periodos.Tarifa) AS Expr1, COUNT(Periodos.IdPeriodo) AS Expr2
FROM     Consumos INNER JOIN
                  Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo INNER JOIN
                  Socios ON Consumos.Cuenta = Socios.Cuenta
WHERE  Consumos.Cancelado = 0
GROUP BY Consumos.Cuenta,Socios.ApellidosNombres
HAVING COUNT(Periodos.IdPeriodo)>1