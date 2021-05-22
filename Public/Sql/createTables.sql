create table `airportcontroller` . `companies` (
    cnpj bigint PRIMARY KEY NOT NULL,
    razaoSocial varchar(50) NOT NULL,
    nomeFantasia varchar(50)
);

create table `airportcontroller` . `aircraft` (
	id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    marca varchar(30) NOT NULL,
    tipoMotor varchar(30),
    maxPassageiros integer,
    compania bigint,
    CONSTRAINT fk_compania FOREIGN KEY (compania) REFERENCES companies(cnpj)
);

create table `airportcontroller` . `cities` (
	cep integer PRIMARY KEY NOT NULL,
    nome varchar(30) NOT NULL,
    pais varchar(30) NOT NULL,
    estado varchar(30) NOT NULL
);

create table `airportcontroller` . `airports` (
	id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(100) NOT NULL unique,
    porte varchar(15) NOT NULL,
    distancia real NOT NULL,
    cep integer NOT NULL,
    CONSTRAINT fk_cep FOREIGN KEY (cep) REFERENCES cities(cep)
);

create table `airportcontroller` . `crew` (
	id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome varchar(30) NOT NULL,
    idade integer,
    email varchar(50) NOT NULL,
    senha varchar(30) NOT NULL,
    tipo varchar(20) NOT NULL
);

create table `airportcontroller` . `tickets` (
	id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
    aeroportoDestino varchar(100) NOT NULL,
    dataSaida date NOT NULL,
    preco real NOT NULL,
    CONSTRAINT fk_aeroportoDestino FOREIGN KEY (aeroportoDestino) REFERENCES airports(nome)
);

create table `airportcontroller` . `user` (
	id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
	email varchar(50) NOT NULL,
    senha varchar(30) NOT NULL
);

INSERT INTO User (email, senha) VALUES ('admin@admin', '123');

SELECT * FROM Cities;
SELECT * FROM Crew;
SELECT * FROM Companies;
SELECT * FROM Tickets;
SELECT * FROM Aircraft;
SELECT * FROM Airports;