create procedure [dbo].[sp_socio_adm]
(
@Cuenta	int,
@ApellidosNombres	nchar (	70	),
@CI	nchar (	15	),
@Direccion	nchar (	200	),
@Celular	nchar (	8	),
@FechaRegistro	smalldatetime,
@Activo	bit,
@i_operacion char(1),	
@o_numerror	int=null out
)
AS
if @i_operacion='I' --adicionamos un nuevo registro
	BEGIN 
	begin tran
		INSERT INTO Socios(ApellidosNombres,CI,Direccion,Celular,FechaRegistro,Activo) VALUES 
        (@ApellidosNombres,@CI,@Direccion,@Celular,@FechaRegistro,@Activo)
		if @@error <> 0
		begin
			select @o_numerror = 10001
			rollback tran
			return 1
		end
	commit tran

	END
if @i_operacion='U' --adicionamos un nuevo registro
--llena datos de beneficiario del bono BJA
	BEGIN 
	begin tran
		UPDATE Socios SET ApellidosNombres=@ApellidosNombres,CI=@CI,Direccion=@Direccion,Celular=@Celular,FechaRegistro=@FechaRegistro,Activo=@Activo
		WHERE	Cuenta=@Cuenta	

		if @@error <> 0
		begin
			select @o_numerror = 10001
			rollback tran
			return 1
		end
	commit tran

	END
if @i_operacion='D' --Eliminamos
--elimina datos de la tabla (falta trabajarlo)
	BEGIN 
	begin tran
		UPDATE Socios SET ApellidosNombres=@ApellidosNombres,CI=@CI,Direccion=@Direccion,Celular=@Celular,FechaRegistro=@FechaRegistro,Activo=0
		WHERE	Cuenta=@Cuenta	

		if @@error <> 0
		begin
			select @o_numerror = 10001
			rollback tran
			return 1
		end
	commit tran

	END
if @i_operacion='S' --Selecciona un registro de la tabla
--Falta trabajarlo
	BEGIN 
	begin tran
		select * from Socios
		WHERE	Cuenta=@Cuenta	

		if @@error <> 0
		begin
			select @o_numerror = 10001
			rollback tran
			return 1
		end
	commit tran

	END