USE campusland_dayismar;
SELECT campers.idCamper, campers.nombreCamper, campers.apellidoCamper, campers.fechaNac, region.nombreReg FROM campers INNER JOIN region ON campers.idReg = region.idReg;
SELECT campers.idCamper AS camper_ID, campers.nombreCamper AS Nombre, campers.apellidoCamper AS Apellido, campers.fechaNac AS fecha_de_Nacimiento, region.nombreReg AS Region FROM campers INNER JOIN region ON campers.idReg = region.idReg;
ALTER TABLE pais MODIFY COLUMN nombrePais VARCHAR(50);
INSERT INTO pais (nombrePais) VALUES ('Colombia');
INSERT INTO region (nombreReg, idDep ) VALUES ('Bucaramanga', 1);
INSERT INTO campers(idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES("1", "dayismar", "rodriguez", "2044-05-06", "1");
INSERT INTO campers(idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES(:identificador,:nombre, :apelllido, :fechaNacimiento, :region);
ALTER TABLE campers MODIFY COLUMN fechaNac DATE;