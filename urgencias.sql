-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 06:01:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de datos: `urgencias`
--
-- --------------------------------------------------------
--
-- TABLA EXPEDIENTE
CREATE TABLE Expediente (
  Expediente INT AUTO_INCREMENT,
  Num INT,
  fecha DATE DEFAULT CURRENT_DATE,
  HoraLlegada TIME DEFAULT CURRENT_TIME,
  HoraAtencion TIME DEFAULT CURRENT_TIME,
  nombre VARCHAR(50),
  fecha_nacimiento DATE,
  CURP VARCHAR(50),
  edad INT,
  municipio VARCHAR(50),
  estado VARCHAR(50),
  sexo ENUM('Hombre', 'Mujer'),
  procedencia_fija ENUM(
    'Domicilio',
    'Consulta Externa',
    '1er. Nivel',
    '2do. Nivel'
  ),
  procedencia_otro VARCHAR(50),
  PRIMARY KEY (Expediente)
);

-- TABLA PADECIMIENTOS
CREATE TABLE Padecimientos (
  Expediente INT,
  MotivoConsultaFactorRiesgo ENUM(
    'Edad: Recién Nacidos y Menor de 3 meses con Fiebre o rechazo a la vía oral',
    'Intoxicados o Sospecha de ingesta de tóxico',
    'Ingesta cuerpo extraño',
    'Reingresa en menos de 72 horas'
  ),
  Inmunocomprometidos ENUM(
    'Paciente con cáncer',
    'Trasplantados',
    'Desnutridos'
  ),
  Inmunodeficiencias VARCHAR(50),
  DolorAgudo ENUM('7 - 10', '5 - 6 (Wong-Baker)'),
  EnfermedadesBase ENUM(
    'Cardiopatías',
    'Displasia Broncopulmonar',
    'Neumopatía crónica'
  ),
  HemorragiaNoTraumatica VARCHAR(50),
  RN7DiasIctericia VARCHAR(50),
  ClasificacionEspecial ENUM(
    'codigo 25',
    'codigo 100',
    'sx kempe',
    'hora dorada',
    'codigo sepsies'
  ),
  FOREIGN KEY (Expediente) REFERENCES Expediente(Expediente)
);

-- TABLA ESCALA DE DOLOR
CREATE TABLE EscalaDolor (
  Expediente INT,
  Barra1 INT CHECK (Barra1 >= 1 AND Barra1 <= 10),
  Barra2 INT CHECK (Barra2 >= 1 AND Barra2 <= 5),
  FOREIGN KEY (Expediente) REFERENCES Expediente(Expediente)
);


-- TABLA INDICADORES
CREATE TABLE Indicadores (
  Expediente INT,
  Apariencia ENUM(
    'Crisis',
    'Convulsivas',
    'Incapacidad para deambular',
    'Palidez',
    'Llanto extraño a los padres',
    'Somnolencia',
    'Irritabilidad / Llanto intenso',
    'Petequias / Equimosis',
    'Movimientos anormales',
    'Cianosis',
    'No reconoce a padres',
    'Piel marmórea',
    'Falta de respuesta a estímulos'
  ),
  Respiratorio ENUM(
    'Polipnea',
    'Estridor',
    'Bradipnea',
    'Sibilancias',
    'Retracciones',
    'Tiraje intercostal',
    'Respiracion jadeante'
  ),
  Hidratacion ENUM(
    'Diarrea',
    'Vómitos',
    'Rechazo a alimentarse',
    'Mucosas secas'
  ),
  Temperatura ENUM('Fiebre', 'Hipotermia'),
  Inmunologico ENUM(
    'Desnutrición y sospecha Infecciosa',
    'Oncológico',
    '< 3 meses y fiebre'
  ),
  Circulacion ENUM(
    'Pulsos débiles',
    'Piel fria',
    'Taquicardia',
    'Llenado capilar retrasado'
  ),
  Trauma ENUM(
    'TCE Menor con alteración neurologica',
    'Contusión y deformidad (Fractura)',
    'Herida abierta Necesidad de sutura',
    'Politraumatizado'
  ),
  FOREIGN KEY (Expediente) REFERENCES Expediente(Expediente)
);

-- TABLA DIAGNOSTICO
CREATE TABLE Diagnostico (
  Expediente INT,
  DiagnosticoProbable VARCHAR(50),
  Peso VARCHAR(50),
  FC VARCHAR(50),
  FR VARCHAR(50),
  Temp VARCHAR(50),
  SatO2 VARCHAR(50),
  SalaChoque VARCHAR(50),
  Observacion VARCHAR(50),
  CExterna VARCHAR(50),
  CSalud VARCHAR(50),
  SegundoNivel VARCHAR(50),
  Domicilio VARCHAR(50),
  NombreMedico VARCHAR(50),
  CedulaProfesional VARCHAR(50),
  FOREIGN KEY (Expediente) REFERENCES Expediente(Expediente)
);