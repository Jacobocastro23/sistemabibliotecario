SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS sistemabiblioteca;

USE sistemabiblioteca;

DROP TABLE IF EXISTS administrador;

CREATE TABLE `administrador` (
  `CodigoAdmin` varchar(70) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `Clave` varchar(535) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`CodigoAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO administrador VALUES("I09876543Y2018A1N5845","Activo","Administrador Principal","SuperAdministrador","YnRXSjhwRTNTRXJpV3k0MUtVSTloQT09","ejemplo@dominio.com");



DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(100) NOT NULL,
  `CodigoUsuario` varchar(70) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `Fecha` varchar(30) NOT NULL,
  `Entrada` varchar(30) NOT NULL,
  `Salida` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `PrimaryKey` (`CodigoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO bitacora VALUES("1","UKI09876543Y2018A1N5845N7464-1","I09876543Y2018A1N5845","Administrador","18-08-2025","01:36:08","01:37:57");
INSERT INTO bitacora VALUES("2","UKI09876543Y2018A1N5845N6022-2","I09876543Y2018A1N5845","Administrador","18-08-2025","01:38:00","01:43:50");
INSERT INTO bitacora VALUES("3","UKI09876543Y2018A1N5845N4360-3","I09876543Y2018A1N5845","Administrador","18-08-2025","01:44:19","01:48:12");
INSERT INTO bitacora VALUES("4","UKI09876543Y2018A1N5845N7441-4","I09876543Y2018A1N5845","Administrador","18-08-2025","01:48:13","01:49:37");
INSERT INTO bitacora VALUES("5","UKI09876543Y2018A1N5845N9894-5","I09876543Y2018A1N5845","Administrador","18-08-2025","01:51:13","01:55:18");
INSERT INTO bitacora VALUES("6","UKI09876543Y2018A1N5845N1314-6","I09876543Y2018A1N5845","Administrador","18-08-2025","01:55:20","02:05:37");
INSERT INTO bitacora VALUES("7","UKI09876543Y2018A1N5845N5809-7","I09876543Y2018A1N5845","Administrador","18-08-2025","02:05:51","02:37:54");
INSERT INTO bitacora VALUES("8","UKI09876543Y2018A1N5845N9584-8","I09876543Y2018A1N5845","Administrador","18-08-2025","02:37:55","Sin registrar");
INSERT INTO bitacora VALUES("9","UKI09876543Y2018A1N5845N8570-9","I09876543Y2018A1N5845","Administrador","18-08-2025","02:41:57","10:20:11");
INSERT INTO bitacora VALUES("10","UKI09876543Y2018A1N5845N1451-10","I09876543Y2018A1N5845","Administrador","18-08-2025","03:23:26","Sin registrar");
INSERT INTO bitacora VALUES("11","UKI09876543Y2018A1N5845N3617-11","I09876543Y2018A1N5845","Administrador","18-08-2025","10:20:43","Sin registrar");
INSERT INTO bitacora VALUES("12","UKI09876543Y2018A1N5845N0811-12","I09876543Y2018A1N5845","Administrador","18-08-2025","11:25:59","Sin registrar");



DROP TABLE IF EXISTS categoria;

CREATE TABLE `categoria` (
  `CodigoCategoria` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`CodigoCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO categoria VALUES("1","Novelas");



DROP TABLE IF EXISTS docente;

CREATE TABLE `docente` (
  `DUI` varchar(20) NOT NULL,
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `Clave` varchar(535) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Especialidad` varchar(40) NOT NULL,
  `Jornada` varchar(50) NOT NULL,
  PRIMARY KEY (`DUI`),
  KEY `CodigoSeccion` (`CodigoSeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS encargado;

CREATE TABLE `encargado` (
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS estudiante;

CREATE TABLE `estudiante` (
  `NIE` varchar(20) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `Clave` varchar(535) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Parentesco` varchar(50) NOT NULL,
  PRIMARY KEY (`NIE`),
  KEY `DUI` (`DUI`),
  KEY `CodigoSeccion` (`CodigoSeccion`),
  CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`DUI`) REFERENCES `encargado` (`DUI`),
  CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`CodigoSeccion`) REFERENCES `seccion` (`CodigoSeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS institucion;

CREATE TABLE `institucion` (
  `CodigoInfraestructura` varchar(30) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `NombreDirector` varchar(100) NOT NULL,
  `NombreBibliotecario` varchar(100) NOT NULL,
  `Moneda` varchar(2) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Year` int(4) NOT NULL,
  PRIMARY KEY (`CodigoInfraestructura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO institucion VALUES("123456789","UNIVERSIDAD TECNOLOGICA DEL ESTADO DE ZACATECAS","UTZAC","Gabriel Lopez Rodriguez","","49816547","2025");



DROP TABLE IF EXISTS libro;

CREATE TABLE `libro` (
  `CodigoLibro` varchar(100) NOT NULL,
  `CodigoLibroManual` varchar(100) NOT NULL,
  `CodigoCategoria` varchar(20) NOT NULL,
  `CodigoProveedor` varchar(70) NOT NULL,
  `CodigoInfraestructura` varchar(20) NOT NULL,
  `Autor` varchar(70) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  `Year` varchar(7) NOT NULL,
  `Estimado` decimal(30,2) NOT NULL,
  `Titulo` varchar(77) NOT NULL,
  `Edicion` varchar(50) NOT NULL,
  `Ubicacion` varchar(50) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Editorial` varchar(70) NOT NULL,
  `Existencias` int(7) NOT NULL,
  `Prestado` int(20) NOT NULL,
  `Imagen` varchar(535) NOT NULL,
  `PDF` varchar(535) NOT NULL,
  `Download` varchar(5) NOT NULL,
  `Descripcion` text NOT NULL,
  PRIMARY KEY (`CodigoLibro`),
  KEY `CodigoCategoria` (`CodigoCategoria`),
  KEY `CodigoProveedor` (`CodigoProveedor`),
  KEY `CodigoInfraestructura` (`CodigoInfraestructura`),
  CONSTRAINT `libro_ibfk_3` FOREIGN KEY (`CodigoCategoria`) REFERENCES `categoria` (`CodigoCategoria`),
  CONSTRAINT `libro_ibfk_4` FOREIGN KEY (`CodigoProveedor`) REFERENCES `proveedor` (`CodigoProveedor`),
  CONSTRAINT `libro_ibfk_5` FOREIGN KEY (`CodigoInfraestructura`) REFERENCES `institucion` (`CodigoInfraestructura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO libro VALUES("I123456789Y2025C1B1N4524","123456","1","I123456789Y2025P2N8257","123456789","Salvador de Madariaga","España","1942","58.00","El corazón de piedra verde","12","Utzac","Otros","zxczxc","8","0","I123456789Y2025C1B1N4524.jpg","I123456789Y2025C1B1N4524.pdf","yes","El corazón de piedra verde es una novela de Salvador de Madariaga (La Coruña, España, 1886 – Locarno, Suiza, 1978), publicada en 1942.\n\nEstá considerada como una de las mejores novelas históricas sobre la conquista del Nuevo Mundo escritas en habla española. Incluye en sus páginas personajes históricos como Moctezuma, Cristóbal Colón, Hernán Cortés, Cuauhtémoc, Bernal Díaz del Castillo, o Nezahualpilli, entre otros.\n\nLa historia transcurre a finales del período precolombino, en Ciudad de México, y en ella se describe detalladamente la vida cotidiana de los antiguos aztecas, tanto de sus clases humildes (comerciantes, sirvientes o guerreros) como de las clases ricas (sacerdotes, nobles y funcionarios del gobierno).\n\nLa novela se desarrolla en dos planos que van alternándose. La historia que transcurre en el Nuevo Mundo ofrece un gran fresco de costumbres, supersticiones, y referencias sociales y culturales del pueblo azteca. Por otro lado, la historia de una familia española, los Manrique, ofrece también numerosos detalles de la vida y las condiciones sociales, políticas y económicas de España, a finales del siglo XV.");



DROP TABLE IF EXISTS personal;

CREATE TABLE `personal` (
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `Clave` varchar(535) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS prestamo;

CREATE TABLE `prestamo` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `CodigoLibro` varchar(100) NOT NULL,
  `CodigoAdmin` varchar(70) NOT NULL,
  `FechaSalida` varchar(30) NOT NULL,
  `FechaEntrega` varchar(30) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  PRIMARY KEY (`CodigoPrestamo`),
  KEY `CodigoLibro` (`CodigoLibro`),
  KEY `CodigoAdmin` (`CodigoAdmin`),
  CONSTRAINT `prestamo_ibfk_5` FOREIGN KEY (`CodigoLibro`) REFERENCES `libro` (`CodigoLibro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS prestamodocente;

CREATE TABLE `prestamodocente` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  KEY `CodigoPrestamo` (`CodigoPrestamo`),
  KEY `DUI` (`DUI`),
  KEY `CodigoPrestamo_2` (`CodigoPrestamo`),
  CONSTRAINT `prestamodocente_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`),
  CONSTRAINT `prestamodocente_ibfk_2` FOREIGN KEY (`DUI`) REFERENCES `docente` (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS prestamoestudiante;

CREATE TABLE `prestamoestudiante` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `NIE` varchar(20) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  KEY `CodigoPrestamo` (`CodigoPrestamo`),
  KEY `NIE` (`NIE`),
  CONSTRAINT `prestamoestudiante_ibfk_1` FOREIGN KEY (`NIE`) REFERENCES `estudiante` (`NIE`),
  CONSTRAINT `prestamoestudiante_ibfk_2` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS prestamopersonal;

CREATE TABLE `prestamopersonal` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  KEY `CodigoPrestamo` (`CodigoPrestamo`),
  KEY `DUI` (`DUI`),
  CONSTRAINT `prestamopersonal_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`),
  CONSTRAINT `prestamopersonal_ibfk_2` FOREIGN KEY (`DUI`) REFERENCES `personal` (`DUI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS prestamovisitante;

CREATE TABLE `prestamovisitante` (
  `CodigoPrestamo` varchar(70) NOT NULL,
  `DUI` varchar(20) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Institucion` varchar(70) NOT NULL,
  KEY `CodigoPrestamo` (`CodigoPrestamo`),
  CONSTRAINT `prestamovisitante_ibfk_1` FOREIGN KEY (`CodigoPrestamo`) REFERENCES `prestamo` (`CodigoPrestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS proveedor;

CREATE TABLE `proveedor` (
  `CodigoProveedor` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Direccion` varchar(70) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `ResponAtencion` varchar(50) NOT NULL,
  PRIMARY KEY (`CodigoProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO proveedor VALUES("I123456789Y2025P2N8257","jacobo","jacobo@gmail.com","calle del leon","4981205614","Rodrigo");
INSERT INTO proveedor VALUES("I132558789655852Y2541P1N9572","adsdscds","jc277123812@gmail.com","calle sata maria","254689745","scvcvdf");



DROP TABLE IF EXISTS seccion;

CREATE TABLE `seccion` (
  `CodigoSeccion` varchar(70) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`CodigoSeccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




SET FOREIGN_KEY_CHECKS=1;