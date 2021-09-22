SELECT '@'+COLUMN_NAME,DATA_TYPE+' (',CHARACTER_MAXIMUM_LENGTH,'),'
FROM Information_Schema.Columns
WHERE TABLE_NAME = 'socios'

SELECT COLUMN_NAME
FROM Information_Schema.Columns
WHERE TABLE_NAME = 'socios'

SELECT COLUMN_NAME,'=@'+COLUMN_NAME+','
FROM Information_Schema.Columns
WHERE TABLE_NAME = 'socios'

SELECT 'AND (@'+COLUMN_NAME+' IS NULL OR ','@'+COLUMN_NAME,'='+COLUMN_NAME+')'
FROM Information_Schema.Columns
WHERE TABLE_NAME = 'Empleados'

--ctrl+k+x snipplets
--F7 rowcount
--Ctrl+shift+m templates CTRL+ALT+T
--mostrar resultados de abajo ctrl+R
--CTRL+SHIFT+U	Cambiar texto a mayúsculas
--CTRL+SHIFT+L	Cambiar texto a minúsculas
--CTRL+K+C	Comentar el texto seleccionado
--CTRL+K+U	Descomentar el texto seleccionado

--(8) SELECT (9) DISTINCT (11) <TOP quantidade> <lista de campos de retorno>
-- (1) FROM <tabela>
-- (3) <tipo de junção> JOIN <tabela> ON (2) <condições da junção>
-- (4) WHERE <condições where >
-- (5) GROUP BY <lista de agrupamento>
-- (6) WITH {CUBE | ROLLUP}
-- (7) HAVING <condições having>
--(10) ORDER BY <lista de campos>

UPDATE       Consumos
SET                Cancelado = 0
FROM            Consumos INNER JOIN
                         Periodos ON Consumos.IdPeriodo = Periodos.IdPeriodo
WHERE        (Periodos.IdPeriodo = N'sep21')
