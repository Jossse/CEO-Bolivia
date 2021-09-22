--INSERT INTO Consumos
----  (Cuenta, IdPeriodo, Cancelado, FechaPago, CIEmpleado)
--VALUES (100, N'oct21', 0, NULL, NULL)

--ASIGNA A TODOS LOS SOCIOS EL PERIODO ACTUAL DEL MES
--SE DEBERIA LLENAR ESTA TABLA AUTOMATICAMENTE E INMEDIATA DESPUES DE CREAR EL PEDIORO
	INSERT INTO Consumos([Cuenta],[IdPeriodo],[Cancelado])
	SELECT s.Cuenta, p.IdPeriodo,0
	FROM Socios s, Periodos p
	where p.IdPeriodo= left(lower(DATENAME(month, GetDate())),3)+format(GetDate(),'yy')

--ACTUALIZA DATOS DEL SOCIO COMO PAGADO DEL ACTUAL PERIODO
UPDATE Consumos
SET Cancelado = 1, FechaPago = CONVERT(DATETIME, '2021-10-10 00:00:00', 102)
WHERE(Cuenta = 100) AND (IdPeriodo = N'sep21')

--DELETE SOCIO SIN PAGO POR UNA EQUIVOCACION
UPDATE Consumos
SET Cancelado = 1, FechaPago = NULL
WHERE(Cuenta = 100) AND (IdPeriodo = N'sep21')

--SELECT MOSTRAR TODOS LOS REGISTROS DEL ACTUAL PERIODO DE PAGO
SELECT Consumos.IdConsumo, Consumos.Cuenta, Consumos.IdPeriodo, Consumos.Cancelado, Consumos.FechaPago, Consumos.CIEmpleado
FROM Consumos INNER JOIN
     Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo
WHERE (Consumos.IdPeriodo = left(lower(DATENAME(month, GetDate())),3)+format(GetDate(),'yy'))
