create table distrito
(
    idDistrito int auto_increment
        primary key,
    nombre     varchar(100) null
);

create table impuesto
(
    idImpuesto   int auto_increment
        primary key,
    tipoImpuesto enum ('Alto', 'Medio', 'Bajo') not null
);

create table propiedad
(
    idPropiedad     int auto_increment
        primary key,
    direccion       varchar(255) null,
    codigoCatastral varchar(50)  not null,
    idImpuesto      int          null,
    constraint propiedad_impuesto_fk
        foreign key (idImpuesto) references impuesto (idImpuesto)
);

create table persona
(
    idPersona        int auto_increment
        primary key,
    nombre           varchar(100) not null,
    apellido_paterno varchar(100) not null,
    apellido_materno varchar(100) not null,
    direccion        varchar(255) null,
    idDistrito       int          null,
    idZona           int          null,
    idPropiedad      int          null,
    ci               int          null,
    constraint persona_ibfk_1
        foreign key (idPropiedad) references propiedad (idPropiedad)
            on delete cascade
);

create table usuarios
(
    id         int auto_increment
        primary key,
    persona_id int         null,
    password   varchar(20) null,
    usuario    varchar(20) null,
    constraint usuarios_persona_idPersona_fk
        foreign key (persona_id) references persona (idPersona)
            on delete cascade
);

create table zona
(
    idZona     int auto_increment
        primary key,
    nombre     varchar(100) null,
    idDistrito int          null,
    constraint zona_ibfk_1
        foreign key (idDistrito) references distrito (idDistrito)
);

create index idDistrito
    on zona (idDistrito);

