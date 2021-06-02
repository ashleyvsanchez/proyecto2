create table if not exists tipodocumento(
	idtipo serial not null,
	nombretipo varchar(50) not null,
	primary key(idtipo)
);

insert into tipodocumento values ('1','memo');
insert into tipodocumento values ('2','servicio');
insert into tipodocumento values ('3','refrigerio');

create table if not exists estatus(
	idEstatus serial not null,
	nombreE varchar (50) not null,
	primary key(idEstatus)
);

insert into estatus values ('1','REVISION');
insert into estatus values ('2','APROBADO');
insert into estatus values ('3','NEGADO');



create table if not exists Servicio(
	nos serial not null,
	dep int not null,
	trabajo varchar (50) not null,
	lugar varchar (30) not null,
	descripcion varchar (50) not null,
	iddoc int not null,
	primary key (nos),
	constraint documentoservicio
		foreign key (iddoc)
		references documento(iddoc)

);

create table if not exists Refrigerio(
	idr varchar(50) not null,
	dependencia int not null,
	cursoevento varchar (50) not null,
	iddoc int not null,
	primary key (idr),
	constraint documentorefrigerio
		foreign key (iddoc)
		references documento(iddoc)
);
	
create table if not exists eventocurso(
	ideventocurso serial not null,
	fecha varchar(50) not null,
	hora varchar (50) not null,
	lugar varchar (50) not null,
	participantes varchar(10) not null,
	idr varchar(50) not null,
	primary key (ideventocurso),
	constraint eventocursorefrigerio
		foreign key (idr)
		references refrigerio(idr)
);
	
create table if not exists serviciosolicitado(
	idserviciosolicitado serial not null,
	tiposervicio varchar(50) not null,
	personassugeridas varchar(10) not null,
	menu varchar (50) not null,
	costomenu varchar (50) not null,
	costototal varchar (50) not null,
	idr varchar(50) not null,
	primary key (idserviciosolicitado),
	constraint serviciosolicitadorefrigerio
		foreign key (idr)
		references refrigerio(idr)
);




create table if not exists correspondencia(
	idCorrespondencia serial not null,
	emisor varchar (50) not null,
	receptor varchar (50) not null,
	fechaEnvio date not null,
	horaEnvio time not null,
	asuntoC varchar (100),
	mensajeC varchar (700),
	iddoc int not null,
	primary key (idCorrespondencia),
	foreign key(iddoc) references documento(iddoc)

);


create table if not exists memo(
	idMemo varchar (30),
	de int not null,
	para int not null,
	asunto varchar (80) not null,
	descripcion varchar (800) not null,
	iddoc int not null,
	
	primary key(idMemo),
	foreign key (iddoc) references documento(iddoc)
);


create table if not exists imgEncabezado(
	idimg serial,
	fecha varchar,
	ruta varchar,
	
	primary key(idimg)

);


create table if not exists documento(
	iddoc serial not null,
	fechad varchar(20) not null,
	cedulad varchar (20) not null,
	estatus int not null,
	tipodoc int not null,
	idimg int not null,
	primary key(iddoc),
	foreign key (estatus) references estatus(idEstatus),
	foreign key (cedulad) references persona(cedulap),
	foreign key (tipodoc) references tipodocumento(idtipo),
	foreign key (idimg) references imgEncabezado(idimg)

);


create table if not exists departamento(
	idd serial not null,
	idDepa int not null,
	nombred varchar(50) not null,
	fechaCreacion varchar (20) not null,
	primary key(idd)
);



create table if not exists persona
(
  cedulap character varying(20) NOT NULL,
  nombrep character varying(50) NOT NULL,
  apellidop character varying(50) NOT NULL,
  direccionp character varying(50) NOT NULL,
  idd integer NOT NULL,
  idc integer NOT NULL,
  CONSTRAINT persona_pkey PRIMARY KEY (cedulap),
  CONSTRAINT personacargo FOREIGN KEY (idc)
      REFERENCES cargo (idc) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT personadepartamento FOREIGN KEY (idd)
      REFERENCES departamento (idd) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

insert into persona values ('27040064','NELSON','RIVAS','LOS TEQUES',1,1);


create table if not exists telefono
(
  numerot character varying(15) NOT NULL,
  tipot integer NOT NULL,
  cedulap character varying(20) NOT NULL,
  CONSTRAINT telefono_pkey PRIMARY KEY (numerot),
  CONSTRAINT telefonopersona FOREIGN KEY (cedulap)
      REFERENCES persona (cedulap) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);


create table if not exists correo
(
  direccionc character varying(30) NOT NULL,
  tipoc integer,
  cedulap character varying(20) NOT NULL,
  CONSTRAINT correo_pkey PRIMARY KEY (direccionc),
  CONSTRAINT correopersona FOREIGN KEY (cedulap)
      REFERENCES persona (cedulap) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);


create table if not exists cargo
(
  idc integer NOT NULL,
  nombrec character varying(50) NOT NULL,
  CONSTRAINT cargo_pkey PRIMARY KEY (idc)
);

insert into cargo values ('1','PERSONAL ADMINISTRATIVO');
insert into cargo values ('2','PERSONAL DOCENTE');
insert into cargo values ('3','PERSONAL OBRERO');
insert into cargo values ('4','BECARIO');

create table if not exists tipocorreo
(
  idtipoc integer NOT NULL,
  nombretipoc character varying(20),
  CONSTRAINT tipocorreo_pkey PRIMARY KEY (idtipoc)
);

insert into tipocorreo values ('1','PERSONAL');
insert into tipocorreo values ('2','INSTITUCIONAL');


create table if not exists tipotelefono
(
  idtipot integer NOT NULL,
  nombretipot character varying(20),
  CONSTRAINT tipotelefono_pkey PRIMARY KEY (idtipot)
);

insert into tipotelefono values ('1','CELULAR');
insert into tipotelefono values ('2','LOCAL');

create table if not exists rol
(
  idr serial NOT NULL,
  nombrer character varying NOT NULL,
  CONSTRAINT rol_pkey PRIMARY KEY (idr)
);

insert into rol values (1,'Administrador');
insert into rol values (2,'Jefe departamento');
insert into rol values (3,'Secretaria');


create table if not exists usuario
(
  idu serial NOT NULL,
  nombreu character varying(50) NOT NULL,
  contra character varying(16) NOT NULL,
  cedulap character varying(15) NOT NULL,
  idr integer,
  CONSTRAINT usuario_pkey PRIMARY KEY (idu),
  CONSTRAINT usuario_cedulap_fkey FOREIGN KEY (cedulap)
      REFERENCES persona (cedulap) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT usuario_idr_fkey FOREIGN KEY (idr)
      REFERENCES rol (idr) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
);

insert into usuario(nombreu,contra,cedulap,idr) values ('Nrivas','Nrivas1234.','27040064','1');



