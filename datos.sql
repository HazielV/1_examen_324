--distrito
INSERT INTO distrito (nombre) VALUES ('Centro');
INSERT INTO distrito (nombre) VALUES ('Norte');

--zona
INSERT INTO zona (nombre, idDistrito) VALUES ('Zona 1', 1);
INSERT INTO zona (nombre, idDistrito) VALUES ('Zona 2', 1);
INSERT INTO zona (nombre, idDistrito) VALUES ('Zona 3', 2);

--impuesto
INSERT INTO impuesto (tipoImpuesto) VALUES (1, 'Alto');
INSERT INTO impuesto (tipoImpuesto) VALUES (2, 'Medio');
INSERT INTO impuesto (tipoImpuesto) VALUES (3, 'Bajo');


--propiedad
INSERT INTO propiedad (direccion, codigoCatastral, idImpuesto) VALUES ('admin', '0000', 1);
INSERT INTO propiedad (direccion, codigoCatastral, idImpuesto) VALUES ('Calle Falsa 400', '1002', 2);
INSERT INTO propiedad (direccion, codigoCatastral, idImpuesto) VALUES ('Av. Libertad 789', '1003', 3);
INSERT INTO propiedad (direccion, codigoCatastral, idImpuesto) VALUES ('Calle Rosendo Gutierres', '1004', 2);
INSERT INTO propiedad (direccion, codigoCatastral, idImpuesto) VALUES ('calle de prueba', '1010', 2);
INSERT INTO propiedad (direccion, codigoCatastral, idImpuesto) VALUES ('calle armentia', '1020', 3);

--persona 
INSERT INTO persona (nombre, apellido_paterno, apellido_materno, direccion, idDistrito, idZona, idPropiedad, ci) VALUES ( 'admin', 'admin', 'admin', null, null, null, 1, 123456);
INSERT INTO persona (nombre, apellido_paterno, apellido_materno, direccion, idDistrito, idZona, idPropiedad, ci) VALUES ('maria', 'Gómez', 'Mamani', 'Calle Falsa 400', 2, 2, 2, 9874513);
INSERT INTO persona (nombre, apellido_paterno, apellido_materno, direccion, idDistrito, idZona, idPropiedad, ci) VALUES ('Carlos', 'López', 'Alvarez', 'Av. Libertad 789', 3, 1, 3, 654321);
INSERT INTO persona (nombre, apellido_paterno, apellido_materno, direccion, idDistrito, idZona, idPropiedad, ci) VALUES ('oscar', 'sanjinez', 'gonzales', 'calle de prueba', 4, 2, 4, 677889);
INSERT INTO persona (nombre, apellido_paterno, apellido_materno, direccion, idDistrito, idZona, idPropiedad, ci) VALUES ( 'manuel', 'rojas', 'estrada', 'calle armentia', 5, 3, 5, 112233);

--usuarios
INSERT INTO usuarios (id, persona_id, password, usuario) VALUES ( 1, '123456', 'admin');
INSERT INTO usuarios (id, persona_id, password, usuario) VALUES ( 3, '123456', 'carlos');
INSERT INTO usuarios (id, persona_id, password, usuario) VALUES ( 4, '123456', 'oscar');
INSERT INTO usuarios (id, persona_id, password, usuario) VALUES ( 5, '112233', 'manuel');
INSERT INTO usuarios (id, persona_id, password, usuario) VALUES ( 2, '9874513', 'maria');
