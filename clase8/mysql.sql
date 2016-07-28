INSERT INTO localidades (`descripcion`) VALUES ("Avellaneda")
INSERT INTO localidades (`descripcion`) VALUES ("Lanús"),("Moreno")



INSERT INTO `alumnos`(`nombre`, `idLocalidad`) VALUES ("Pablo",1) ,("Martin",1), ("Jorge",2),("Osvaldo",2),("Nicolás",3),("Emiliano",3)

update alumnos set nombre="María" where id=3


select nombre, idlocalidad from alumnos



select a.nombre,l.descripcion as 'Localidad'
from alumnos as a, localidades as l
where l.id=a.idLocalidad
order by a.id asc


alter table alumnos add foreign key (idlocalidad) references localidades (id)



DELETE FROM ALUMNOS WHERE ID=1

select COUNT(*) as 'cantidad Alum de Moreno' from alumnos
where idlocalidad=3


insert into aulas (materia) values ('PRO1'),('LABIV'),('PPS')


insert into alumnoaula (idaula,IDALUMNO,ANIO)
 VALUES (1,2,2015),(1,3,2015),(1,4,2015),(1,5,2015),(1,6,2015),
(2,3,2015),(2,3,2015),(2,2,2015),(3,2,2015),(3,2,2015)


SELECT AU.MATERIA,AL.NOMBRE,L.DESCRIPCION AS 'LOCALIDAD'
FROM ALUMNOS AS AL, LOCALIDADES AS L, AULAS AS AU, ALUMNOAULA AS AA


SELECT AU.MATERIA,AL.NOMBRE,L.DESCRIPCION AS 'LOCALIDAD'
FROM ALUMNOS AS AL, LOCALIDADES AS L, AULAS AS AU, ALUMNOAULA AS AA
WHERE AU.ID=AA.IDAULA AND AL.ID=AA.IDALUMNO AND AL.IDLOCALIDAD=L.ID


