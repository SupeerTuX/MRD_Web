//Campos 

Folio: int
Datetime: Datetime
Direccion de recepcion: Varchar
Motivo de inventario: Varchar

Vehiculo marca: Varchar
Tipo: Varchar
Modelo: Varchar
Color: Varchar
Placas: Varchar
No. Serie: Varchar
Conductor del vehiculo o propietario: Varchar
Llaves: Boolean
Tel: Varchar
Grua: Varchar
Clave Operador: Varchar
Autotidad o empresa solicitante: Varchar

Estado en el que se recive el vehiculo
1: Exterior
Defensa delantera: Varchar
Carroceria sin golpes: Varchar
Parrilla: Varchar
Faros: Varchar
Cofre: Varchar
Parabrisas: Varchar
Limpiadores: Varchar
Emblemas: Varchar
Portezuela IZQ: Varchar
Cristales lat IZQ: Varchar
Medallon: Varchar
Cajuela: Varchar
Defensa Trasera: Varchar
Portezuela DER: Varchar
Cristal Lat DER: Varchar
Antenas: Varchar
Espejos: Varchar
Tapones ruedas: Varchar
Tapon Gasolina: Varchar
Salpicadera DER: Varchar
Salpicadera IZQ: Varchar

2: Interior
Tablero: Varchar
Volante: Varchar
Radio: Varchar
Equipo de sonido: Varchar
Encendedor: Varchar
Espejo: Varchar
Asientos: Varchar
Tapetes de alfombre: Varchar
Tapetes de hule: Varchar
Extintor: Varchar
Gato y maneral: Varchar
Triangulo de seguridad: Varchar
Bocinas: Varchar
Luces: Varchar
Tag: Varchar
Vial pass: Varchar
Sim card: Varchar

3: Motor
Radiador: Varchar
Motoventilador: Varchar
Alternador: Varchar
Cable de bujias: Varchar
Depurador: Varchar
Carburador: Varchar
Filtro de aire: Varchar
Inyectores: Varchar
Compresor: Varchar
Computadpra: Varchar
Bateria: Varchar
Marca: Varchar

Llantas:
Marca: Varchar
Medida: Varchar
Cantidad: Varchar

Tanque de gasolina: Numeric


Carga consistente en: Varchar
Observaciones: Varchar


Nombre y firma de la persona que entrega 
vehiculo de conformidad

Nombre y firma de oficial que intervino

Nombre y firma de operador que recibe
vehiculo de conformidad




-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'Servicios'
-- Contiene la informacion de los servicios realizados
-- ---

DROP TABLE IF EXISTS `Servicios`;
		
CREATE TABLE `Servicios` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `fecha` DATETIME NULL DEFAULT NULL COMMENT 'Fecha de realizacion de servicio',
  `Direccion` VARCHAR(150) NULL DEFAULT NULL COMMENT 'Direccion de recepcion de la unidad',
  `MotivoInventario` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Motivo del inventario',
  `VahiculoMarca` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Marca del vehiculo',
  `Tipo` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Tipo de vehiculo',
  `Modelo` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Modelo del vehiculo',
  `Color` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Color de vehiculo',
  `Placas` VARCHAR(10) NULL DEFAULT NULL COMMENT 'Placas del vehiculo',
  `NoSerie` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Numero de serie del vehiculo',
  `NombreConductor` VARCHAR(75) NULL DEFAULT NULL COMMENT 'Nombre del conductor o propietario',
  `Llaves` VARCHAR(10) NULL DEFAULT NULL COMMENT 'Llaves',
  `Telefono` VARCHAR(15) NULL DEFAULT NULL COMMENT 'Telefono',
  `Grua` VARCHAR(25) NULL DEFAULT NULL COMMENT 'Ckave de grua',
  `ClaveOperador` VARCHAR(50) NULL DEFAULT NULL,
  `Solicitante` VARCHAR(100) NULL DEFAULT NULL COMMENT 'Autoridad o empresa solicitante',
  `DefensaDelantera` VARCHAR(15) NULL DEFAULT NULL COMMENT 'Defensa delantera',
  `CarroceriaSinGolpes` VARCHAR(15) NULL DEFAULT NULL COMMENT 'Carroceria sin golpes',
  `Parrilla` VARCHAR(15) NULL DEFAULT NULL,
  `Faros` VARCHAR(15) NULL DEFAULT NULL,
  `Cofre` VARCHAR(15) NULL DEFAULT NULL,
  `Parabrisas` VARCHAR(15) NULL DEFAULT NULL,
  `Limpiadores` VARCHAR(15) NULL DEFAULT NULL,
  `Emblemas` VARCHAR(15) NULL DEFAULT NULL,
  `PortezuelaIzq` VARCHAR(15) NULL DEFAULT NULL COMMENT 'Portezuela Izquierda',
  `CristalLatIzq` VARCHAR(15) NULL DEFAULT NULL COMMENT 'Cristal lateral izquierdo',
  `Medallon` VARCHAR(15) NULL DEFAULT NULL,
  `Cajuela` VARCHAR(15) NULL DEFAULT NULL,
  `DefensaTrasera` VARCHAR(15) NULL DEFAULT NULL,
  `PortezuelaDer` VARCHAR(15) NULL DEFAULT NULL,
  `CristalLatDer` VARCHAR(15) NULL DEFAULT NULL COMMENT 'Cristal Lateral Derecho',
  `Antenas` VARCHAR(15) NULL DEFAULT NULL,
  `Espejos` VARCHAR(15) NULL DEFAULT NULL,
  `TaponesRuedas` VARCHAR(15) NULL DEFAULT NULL,
  `TaponGasolina` VARCHAR(15) NULL DEFAULT NULL,
  `SalpicaderaDer` VARCHAR(15) NULL DEFAULT NULL,
  `SalpicaderaIzq` VARCHAR(15) NULL DEFAULT NULL,
  `Tablero` VARCHAR(15) NULL DEFAULT NULL,
  `Volante` VARCHAR(15) NULL DEFAULT NULL,
  `Radio` VARCHAR(15) NULL DEFAULT NULL,
  `EquipoSonido` VARCHAR(15) NULL DEFAULT NULL,
  `Encendedor` VARCHAR(15) NULL DEFAULT NULL,
  `Espejo` VARCHAR(15) NULL DEFAULT NULL,
  `Asientos` VARCHAR(15) NULL DEFAULT NULL,
  `TapetesAlfombra` VARCHAR(15) NULL DEFAULT NULL,
  `TapetesHule` VARCHAR(15) NULL DEFAULT NULL,
  `Extintor` VARCHAR(15) NULL DEFAULT NULL,
  `GatoYManeral` VARCHAR(15) NULL DEFAULT NULL,
  `TrianguloDeSeguridad` VARCHAR(15) NULL DEFAULT NULL,
  `Bocinas` VARCHAR(15) NULL DEFAULT NULL,
  `Luces` VARCHAR(15) NULL DEFAULT NULL,
  `Tag` VARCHAR(15) NULL DEFAULT NULL,
  `VialPass` VARCHAR(15) NULL DEFAULT NULL,
  `SimCard` VARCHAR(15) NULL DEFAULT NULL,
  `Radiador` VARCHAR(15) NULL DEFAULT NULL,
  `Motoventilador` VARCHAR(15) NULL DEFAULT NULL,
  `Alternador` VARCHAR(15) NULL DEFAULT NULL,
  `CableDeBujias` VARCHAR(15) NULL DEFAULT NULL,
  `Depurador` VARCHAR(15) NULL DEFAULT NULL,
  `Carburador` VARCHAR(15) NULL DEFAULT NULL,
  `FiltroAire` VARCHAR(15) NULL DEFAULT NULL,
  `Inyectores` VARCHAR(15) NULL DEFAULT NULL,
  `Compresor` VARCHAR(15) NULL DEFAULT NULL,
  `Computadora` VARCHAR(15) NULL DEFAULT NULL,
  `Bateria` VARCHAR(15) NULL DEFAULT NULL,
  `MarcaMotor` VARCHAR(15) NULL DEFAULT NULL,
  `MarcaLlantas` VARCHAR(25) NULL DEFAULT NULL,
  `MedidaLlantas` VARCHAR(25) NULL DEFAULT NULL,
  `CantidadLlantas` INTEGER NULL DEFAULT NULL COMMENT 'Cantidad de llantas',
  `TanqueGasolina` FLOAT NULL DEFAULT NULL COMMENT 'Cantidad de gasolina en el tanque',
  `CargaConsistente` VARCHAR(300) NULL DEFAULT NULL,
  `Observaciones` VARCHAR(300) NULL DEFAULT NULL,
  `NombreEntrega` VARCHAR(100) NULL DEFAULT NULL COMMENT 'Nombre de la persona que entrega el vehiculo',
  `NombreDeOficial` VARCHAR(100) NULL DEFAULT NULL COMMENT 'Nombre del ofician que intervino',
  `NombreOperador` VARCHAR(100) NULL DEFAULT NULL COMMENT 'Nombre del operador que recive el vehiculo',
  PRIMARY KEY (`id`)
) COMMENT 'Contiene la informacion de los servicios realizados';

-- ---
-- Foreign Keys 
-- ---


-- ---
-- Table Properties
-- ---

-- ALTER TABLE `Servicios` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `Servicios` (`id`,`fecha`,`Direccion`,`MotivoInventario`,`VahiculoMarca`,`Tipo`,`Modelo`,`Color`,`Placas`,`NoSerie`,`NombreConductor`,`Llaves`,`Telefono`,`Grua`,`ClaveOperador`,`Solicitante`,`DefensaDelantera`,`CarroceriaSinGolpes`,`Parrilla`,`Faros`,`Cofre`,`Parabrisas`,`Limpiadores`,`Emblemas`,`PortezuelaIzq`,`CristalLatIzq`,`Medallon`,`Cajuela`,`DefensaTrasera`,`PortezuelaDer`,`CristalLatDer`,`Antenas`,`Espejos`,`TaponesRuedas`,`TaponGasolina`,`SalpicaderaDer`,`SalpicaderaIzq`,`Tablero`,`Volante`,`Radio`,`EquipoSonido`,`Encendedor`,`Espejo`,`Asientos`,`TapetesAlfombra`,`TapetesHule`,`Extintor`,`GatoYManeral`,`TrianguloDeSeguridad`,`Bocinas`,`Luces`,`Tag`,`VialPass`,`SimCard`,`Radiador`,`Motoventilador`,`Alternador`,`CableDeBujias`,`Depurador`,`Carburador`,`FiltroAire`,`Inyectores`,`Compresor`,`Computadora`,`Bateria`,`MarcaMotor`,`MarcaLlantas`,`MedidaLlantas`,`CantidadLlantas`,`TanqueGasolina`,`CargaConsistente`,`Observaciones`,`NombreEntrega`,`NombreDeOficial`,`NombreOperador`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');