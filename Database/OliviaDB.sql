-- Script to create local database with predetermined tables

CREATE DATABASE IF NOT EXISTS OliviaDB; -- create database Olivia if doesnt exist

USE OliviaDB;

CREATE TABLE if not exists Caso ( 
    folio_id VARCHAR(255) PRIMARY KEY,
    Fecha DATETIME NOT NULL
);

CREATE TABLE if not exists UsuarioInformacionGeneral (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    folio_id VARCHAR(255) REFERENCES Caso (folio_id) NOT NULL,
    NombreUsuario VARCHAR(255),
    FechaNacimiento DATE,
    Telefono INTEGER,
    Entidad VARCHAR(255),
    Municipio VARCHAR(255),
    Colonia VARCHAR(255),
    Domicilio VARCHAR(255),
    CP INTEGER,
    TrabajadorSocial VARCHAR(255),
    FolioBANAVIM VARCHAR(255)
);

CREATE TABLE if not exists UsuarioInformacionSociodemografica (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    folio_id VARCHAR(255) REFERENCES Caso (folio_id),
    Edad VARCHAR(255),
    EstadoCivil VARCHAR(255),
    LeerYEscribir VARCHAR(255),
    Escolaridad VARCHAR(255),
    Sexo VARCHAR(255),
    Ocupacion VARCHAR(255),
    Ingreso VARCHAR(255),
    IngresoDividido VARCHAR(255),
    Seguro VARCHAR(255),
    Vivienda VARCHAR(255)
);