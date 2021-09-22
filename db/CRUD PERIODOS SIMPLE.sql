INSERT INTO Periodos
-- (IdPeriodo, FechaInicio, FechaFinal, Tarifa)
VALUES (left(lower(DATENAME(month,  CONVERT(DATETIME, '2021-10-01 00:00:00', 102))),3)+format( CONVERT(DATETIME, '2021-10-01 00:00:00', 102),'yy'), CONVERT(DATETIME, '2021-10-01 00:00:00', 102), CONVERT(DATETIME, '2021-10-31 00:00:00', 102), 38)


UPDATE Periodos
SET FechaInicio = CONVERT(DATETIME, '2021-01-01 00:00:00', 102), FechaFinal = CONVERT(DATETIME, '2021-01-01 00:00:00', 102), Tarifa = 40
WHERE (IdPeriodo = N'oct21')

DELETE FROM Periodos
WHERE (IdPeriodo = N'oct21')

SELECT Periodos.*
FROM Periodos