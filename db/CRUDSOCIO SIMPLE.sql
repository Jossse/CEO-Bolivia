--CRUD
--INSERT SOCIOS
INSERT INTO Socios
 (ApellidosNombres, CI, Direccion, Celular, FechaRegistro, Activo)
VALUES ('Manzanero Tomas','433232','Calle perdido','72737273','2/8/1990',1)

--UPDATE SOCIOS
UPDATE Socios
SET ApellidosNombres = N'Perez Torrez Mario', CI = N'8392938', Direccion = N'las ramas', Celular = N'728382', FechaRegistro = CONVERT(DATETIME, '2021-02-02 00:00:00', 102), Activo = 1
WHERE (Cuenta = 1)

--DELETE (BAJA) SOCIOS
UPDATE Socios
SET Activo = 0
WHERE (Cuenta = 1)

--READ SELECT SOCIOS 
SELECT Cuenta, ApellidosNombres, CI, Direccion, Celular, FechaRegistro, Activo
FROM Socios
WHERE (@Cuenta IS NULL OR @Cuenta=Cuenta)
		   AND (@ApellidosNombres IS NULL OR @ApellidosNombres=ApellidosNombres)
		   AND (@CI IS NULL OR @CI=CI)
		   AND (@Direccion IS NULL OR @Direccion=Direccion)
		   AND (@Celular IS NULL OR @Celular=Celular)
		   AND (@FechaRegistro IS NULL OR @FechaRegistro=FechaRegistro)
		   AND (@Activo IS NULL OR @Activo=Activo)