/*
*autor: ismael heras
*fecha: 4/11/2019
*/
--base de datos a insertar
use DAW209DBdepartamentos2;
--hacemos un insert into a la tabla Departamentos que habiamos.
INSERT INTO Departamento  (CodDepartamento,DescDepartamento,VolumenNegocio)  VALUES
(

'DWS','Desarrollo WEB entorno servidor','1100'),

('DWC','Desarrollo WEB entorno cliente','1200'),

('DAW','Despliege de aplicaciones WEB','1200'),

('DIW','Desarrollo interfaces WEB','1000'),

('EIE','Empresa e inciativa Emprendedora','1500');

--mostramos todos los valores que hemos introducido.
SELECT * FROM Departamento;