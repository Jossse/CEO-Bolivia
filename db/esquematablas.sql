SELECT Table_Name, COUNT(*) As NumCampos
FROM Information_Schema.Columns
GROUP BY Table_Name
ORDER BY Table_Name