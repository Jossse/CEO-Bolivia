CREATE PROCEDURE dbo.spEmpleado 
@CI	nchar (	15	),
@Apellidos_Nombres	nvarchar (	50	),
@Direccion	nvarchar (	200	),
@Celular	nvarchar (	50	),
@Cargo	nvarchar (	50	),
@Clave	nvarchar (	50	),
@FechaRegistro	smalldatetime,
@Activo	bit
AS
    SELECT *
	FROM Empleados
	WHERE   (@CI IS NULL OR 	@CI=CI)
		AND (@Apellidos_Nombres IS NULL OR @Apellidos_Nombres=Apellidos_Nombres)
		AND (@Direccion IS NULL OR @Direccion=Direccion)
		AND (@Celular IS NULL OR	@Celular=Celular)
		AND (@Cargo IS NULL OR @Cargo=Cargo)
		AND (@Clave IS NULL OR @Clave=Clave)
		AND (@FechaRegistro IS NULL OR @FechaRegistro=FechaRegistro)
		AND (@Activo IS NULL OR @Activo=Activo)
RETURN 0 
