--INSERT EMPLEADO
INSERT INTO Empleados
 --(CI, Apellidos_Nombres, Direccion, Celular, Cargo, Clave, FechaRegistro, Activo)
VALUES (N'367565', N'Medrano Juan', N'nose', N'7382893', N'Cajero', N'123456', GetDate(),1)

--UPDATE EMPLEADO
UPDATE Empleados
SET Apellidos_Nombres = N'Camargo Paola', Direccion = N'nose', Celular = N'738823', Cargo = N'secretaria', Clave = N'321', FechaRegistro = CONVERT(DATETIME, '2021-01-01 00:00:00', 102), Activo=1
WHERE (CI = N'555555')

--DELETE (baja)
UPDATE Empleados
SET Activo=0
WHERE (CI = N'555555')

SELECT  *      
FROM Empleados

