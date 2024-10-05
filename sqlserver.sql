CREATE TABLE distrito
(
    idDistrito INT IDENTITY(1,1) PRIMARY KEY,
    nombre NVARCHAR(100) NULL
);

CREATE TABLE impuesto
(
    idImpuesto INT IDENTITY(1,1) PRIMARY KEY,
    tipoImpuesto NVARCHAR(50) NOT NULL -- Considera crear una tabla para los tipos de impuesto
);

CREATE TABLE propiedad
(
    idPropiedad INT IDENTITY(1,1) PRIMARY KEY,
    direccion NVARCHAR(255) NULL,
    codigoCatastral NVARCHAR(50) NOT NULL,
    idImpuesto INT NULL,
    CONSTRAINT propiedad_impuesto_fk FOREIGN KEY (idImpuesto) REFERENCES impuesto (idImpuesto)
);

CREATE TABLE persona
(
    idPersona INT IDENTITY(1,1) PRIMARY KEY,
    nombre NVARCHAR(100) NOT NULL,
    apellido_paterno NVARCHAR(100) NOT NULL,
    apellido_materno NVARCHAR(100) NOT NULL,
    direccion NVARCHAR(255) NULL,
    idDistrito INT NULL,
    idZona INT NULL,
    idPropiedad INT NULL,
    ci INT NULL,
    CONSTRAINT persona_ibfk_1 FOREIGN KEY (idPropiedad) REFERENCES propiedad (idPropiedad) ON DELETE CASCADE
);

CREATE TABLE usuarios
(
    id INT IDENTITY(1,1) PRIMARY KEY,
    persona_id INT NULL,
    password NVARCHAR(255) NULL, -- Aumenta la longitud para mayor seguridad
    usuario NVARCHAR(20) NULL,
    CONSTRAINT usuarios_persona_idPersona_fk FOREIGN KEY (persona_id) REFERENCES persona (idPersona) ON DELETE CASCADE
);

CREATE TABLE zona
(
    idZona INT IDENTITY(1,1) PRIMARY KEY,
    nombre NVARCHAR(100) NULL,
    idDistrito INT NULL,
    CONSTRAINT zona_ibfk_1 FOREIGN KEY (idDistrito) REFERENCES distrito (idDistrito)
);

CREATE INDEX idx_idDistrito ON zona (idDistrito);
