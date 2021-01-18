-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2021 a las 01:17:12
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ricodellidb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar` (IN `idProduct` INT, IN `nombreProduct` VARCHAR(50), IN `idTipoProduct` INT, IN `idUnidadMedid` INT, IN `fechaIngresoProduct` DATE, IN `fechaVencimientoProduct` DATE, IN `estadoProduct` VARCHAR(1), IN `idSucursa` INT, IN `costoProduct` FLOAT, IN `stockProduct` INT)  NO SQL
BEGIN 
UPDATE producto set nombreProducto =nombreProduct, idTipoProducto =idTipoProduct, idUnidadMedida =idUnidadMedid, fechaIngresoProducto =fechaIngresoProduct, FechaVencimientoProducto=fechaVencimientoProduct, estadoProducto=estadoProduct, idSucursal=idSucursa, costoProducto=costoProduct, stockProducto=stockProduct WHERE idProducto=idProduct;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `eliminar` (IN `idProduct` INT)  NO SQL
begin
update Producto set estadoProducto='E' where idProducto=idProduct;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `validaUsuarioLogin` (IN `useri` VARCHAR(50), IN `clave` VARCHAR(50))  NO SQL
begin 
select usuario.idUsuario as idUsuario, usuario.usuario as usuario, usuario.contrasena as contrasena, sucursal.direccionSucursal as direccionSucursal, municipio.descripcionMunicipio as descMunicipio, tipousuario.descripcionTipoUsuario as rolUsuario, sucursal.idSucursal codSucursal from sucursal, usuario, tipousuario, municipio
where 
usuario=useri and 
contrasena=clave and 
sucursal.idSucursal=usuario.idSucursal and 
municipio.idMunicipio=usuario.idMunicipio and 
usuario.idTipoUsuario=tipousuario.idTipoUsuario and 
sucursal.idMunicipio=municipio.idMunicipio and 
usuario.estadousuario="A" and 
sucursal.estadoSucursal="A";

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `dpiCliente` varchar(13) DEFAULT NULL,
  `nitCliente` varchar(13) DEFAULT NULL,
  `nombreCliente` varchar(45) DEFAULT NULL,
  `apellidoCliente` varchar(45) DEFAULT NULL,
  `fechaNacCliente` date DEFAULT NULL,
  `direccionCliente` varchar(45) DEFAULT NULL,
  `municipioCliente` int(11) DEFAULT NULL,
  `telefonoCliente` varchar(13) DEFAULT NULL,
  `correoCliente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompras` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `CantidadProducto` float DEFAULT NULL,
  `totalCompras` float DEFAULT NULL,
  `fechaHoraCompras` datetime DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `descripcionDepartamento` varchar(45) DEFAULT NULL,
  `estadoDepartamento` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `descripcionDepartamento`, `estadoDepartamento`) VALUES
(1, 'SUCHITEPEQUEZ', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `idDetalleFactura` int(11) NOT NULL,
  `idFactura` int(11) DEFAULT NULL,
  `idOrden` int(11) DEFAULT NULL,
  `totalDetalleFactura` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor`
--

CREATE TABLE `distribuidor` (
  `idDistribuidor` int(11) NOT NULL,
  `nombreDistribuidor` varchar(45) DEFAULT NULL,
  `telefonoDistribuidor` varchar(45) DEFAULT NULL,
  `direccionDistribuidor` varchar(45) DEFAULT NULL,
  `nitDistribuidor` varchar(45) DEFAULT NULL,
  `estadoDistribuidor` varchar(1) DEFAULT NULL,
  `idProveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidor/producto`
--

CREATE TABLE `distribuidor/producto` (
  `idDistribuidor/Producto` int(11) NOT NULL,
  `descripcionDistribuidor/producto` varchar(45) DEFAULT NULL,
  `estadoDistribuidor/Producto` varchar(1) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idDistribuidor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idempresa` int(11) NOT NULL,
  `nombreEmpresa` varchar(45) DEFAULT NULL,
  `direccionEmpresa` varchar(45) DEFAULT NULL,
  `telefonoEmpresa` varchar(13) DEFAULT NULL,
  `nitEmpresa` varchar(12) DEFAULT NULL,
  `idMunicipio` int(11) DEFAULT NULL,
  `idPropietario` int(11) DEFAULT NULL,
  `estadoEmpresa` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idempresa`, `nombreEmpresa`, `direccionEmpresa`, `telefonoEmpresa`, `nitEmpresa`, `idMunicipio`, `idPropietario`, `estadoEmpresa`) VALUES
(1, 'RICODELI', '3AV PATULUL', '78719201', '123', 1, 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `fechaHoraFactura` datetime DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `NombreMenu` varchar(45) DEFAULT NULL,
  `descripcionMenu` varchar(45) DEFAULT NULL,
  `estadoMenu` varchar(1) DEFAULT NULL,
  `idPlatillo` int(11) DEFAULT NULL,
  `costoMenu` float DEFAULT NULL,
  `precioVentaMenu` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idMunicipio` int(11) NOT NULL,
  `descripcionMunicipio` varchar(45) DEFAULT NULL,
  `estadoMunicipio` varchar(45) DEFAULT NULL,
  `idDepartamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idMunicipio`, `descripcionMunicipio`, `estadoMunicipio`, `idDepartamento`) VALUES
(1, 'PATULUL', 'A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `idorden` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `idTipoOrden` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `cantidadMenu` varchar(45) DEFAULT NULL,
  `idMenu` int(11) DEFAULT NULL,
  `fechaCreacionOrden` date DEFAULT NULL,
  `fechaEntregaOrden` varchar(45) DEFAULT NULL,
  `LugarEntregaOrden` varchar(45) DEFAULT NULL,
  `totalOrden` float DEFAULT NULL,
  `recargoOrden` float DEFAULT NULL,
  `estadoOrden` varchar(1) DEFAULT NULL,
  `idUsuarioOrden` int(11) DEFAULT NULL,
  `idSucursalOrden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillo`
--

CREATE TABLE `platillo` (
  `idPlatillo` int(11) NOT NULL,
  `nombrePlatillo` varchar(45) DEFAULT NULL,
  `descripcionPlatillo` varchar(45) DEFAULT NULL,
  `estadoPlatillo` varchar(1) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `costoPlatillo` float DEFAULT NULL,
  `precioVentaPlatillo` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombreProducto` varchar(45) DEFAULT NULL,
  `idTipoProducto` int(11) DEFAULT NULL,
  `idUnidadMedida` int(11) DEFAULT NULL,
  `fechaIngresoProducto` date DEFAULT NULL,
  `FechaVencimientoProducto` date DEFAULT NULL,
  `estadoProducto` varchar(1) DEFAULT NULL,
  `idSucursal` int(11) DEFAULT NULL,
  `costoProducto` float DEFAULT NULL,
  `stockProducto` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombreProducto`, `idTipoProducto`, `idUnidadMedida`, `fechaIngresoProducto`, `FechaVencimientoProducto`, `estadoProducto`, `idSucursal`, `costoProducto`, `stockProducto`) VALUES
(4, 'PATATA', 1, 1, '2021-05-05', '2021-06-06', 'E', 1, 200, 21),
(6, 'TOMATE', 1, 1, '2021-12-12', '2021-12-12', 'E', 1, 20, 2),
(7, 'TOMATE', 1, 1, '2021-12-12', '2021-12-12', 'E', 1, 20, 2),
(8, 'TOMATE', 1, 1, '2021-05-05', '2021-05-05', 'A', 1, 12, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `idPropietario` int(11) NOT NULL,
  `dpiPropietario` varchar(13) DEFAULT NULL,
  `nitPropietario` varchar(12) DEFAULT NULL,
  `nombrePropietario` varchar(45) DEFAULT NULL,
  `apellidoPropietario` varchar(45) DEFAULT NULL,
  `fechaNacPropietario` varchar(45) DEFAULT NULL,
  `telefonoPropietario` varchar(45) DEFAULT NULL,
  `direccionPropietario` varchar(45) DEFAULT NULL,
  `codMunicipio` int(11) DEFAULT NULL,
  `estadoPropietario` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`idPropietario`, `dpiPropietario`, `nitPropietario`, `nombrePropietario`, `apellidoPropietario`, `fechaNacPropietario`, `telefonoPropietario`, `direccionPropietario`, `codMunicipio`, `estadoPropietario`) VALUES
(1, '123', '123', 'FRANCISCO ', 'RIO', '12-12-1962', '78719201', '3AV ', 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombreProveedor` varchar(45) DEFAULT NULL,
  `descripcionProveedor` varchar(45) DEFAULT NULL,
  `nitProveedor` varchar(45) DEFAULT NULL,
  `direccionProveedor` varchar(45) DEFAULT NULL,
  `telefonoProveedor` varchar(45) DEFAULT NULL,
  `estadoProveedor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `idSucursal` int(11) NOT NULL,
  `idEmpresa` int(11) DEFAULT NULL,
  `direccionSucursal` varchar(45) DEFAULT NULL,
  `NombreSucursal` varchar(45) DEFAULT NULL,
  `telefonoSucursal` varchar(13) DEFAULT NULL,
  `estadoSucursal` varchar(1) DEFAULT NULL,
  `idMunicipio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idSucursal`, `idEmpresa`, `direccionSucursal`, `NombreSucursal`, `telefonoSucursal`, `estadoSucursal`, `idMunicipio`) VALUES
(1, 1, '3av 1-34', '3av PATULUL SEDE', '78719292', 'A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoorden`
--

CREATE TABLE `tipoorden` (
  `idtipoOrden` int(11) NOT NULL,
  `descripcionTipoOrden` varchar(45) DEFAULT NULL,
  `estadoTipoOrden` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `idtipoProducto` int(11) NOT NULL,
  `descripcionTipoProducto` varchar(45) DEFAULT NULL,
  `estadoTipoProducto` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`idtipoProducto`, `descripcionTipoProducto`, `estadoTipoProducto`) VALUES
(1, 'VEGETAL', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoturno`
--

CREATE TABLE `tipoturno` (
  `idTipoTurno` int(11) NOT NULL,
  `descripcionTipoTurno` varchar(45) DEFAULT NULL,
  `horaInicio` varchar(45) DEFAULT NULL,
  `horaFinalizacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `descripcionTipoUsuario` varchar(45) NOT NULL,
  `estadoTipoUsuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `descripcionTipoUsuario`, `estadoTipoUsuario`) VALUES
(1, 'Administrador', 'A'),
(2, 'Mesero', 'A'),
(3, 'Cocinero', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE `turno` (
  `idTurno` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idTipoTurno` int(11) DEFAULT NULL,
  `fechaHoraIngreso` datetime DEFAULT NULL,
  `fechaHoraSalida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadmedida`
--

CREATE TABLE `unidadmedida` (
  `idUnidadMedida` int(11) NOT NULL,
  `descripcionUnidadMedida` varchar(45) DEFAULT NULL,
  `abrevieaturaUnidadMedida` varchar(45) DEFAULT NULL,
  `estadoUnidadMedida` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidadmedida`
--

INSERT INTO `unidadmedida` (`idUnidadMedida`, `descripcionUnidadMedida`, `abrevieaturaUnidadMedida`, `estadoUnidadMedida`) VALUES
(1, 'KILOGRAMO', 'KG', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `idTipoUsuario` int(11) DEFAULT NULL,
  `nombreUsuario` varchar(45) NOT NULL,
  `apellidoUsuario` varchar(45) DEFAULT NULL,
  `fechaNacUsuarioo` varchar(45) DEFAULT NULL,
  `telefonoUsuario` varchar(13) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `idSucursal` int(11) DEFAULT NULL,
  `direccionUsuario` varchar(45) DEFAULT NULL,
  `dpiUsuario` varchar(45) DEFAULT NULL,
  `idMunicipio` int(11) DEFAULT NULL,
  `estadousuario` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idTipoUsuario`, `nombreUsuario`, `apellidoUsuario`, `fechaNacUsuarioo`, `telefonoUsuario`, `usuario`, `contrasena`, `idSucursal`, `direccionUsuario`, `dpiUsuario`, `idMunicipio`, `estadousuario`) VALUES
(1, 1, 'GARY', 'GODOY', '1990-05-30', '42208473', 'GGODOY', 'GGODOY123', 1, 'COLONIA EL PORVENIR', '2462038541014', 1, 'A'),
(2, 2, 'JOSUE', 'XET', '1986-05-08', '55555555', 'JXET', 'JXET123', 1, 'SAN JULIAN', '1234567890123', 1, 'A'),
(3, 3, 'ALDER', 'DE LEON', '1986-15-12', '12345678', 'ADELEON', 'ADELEON123', 1, 'SAN JULIAN', '1234567890123', 1, 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idMunicipio` (`municipioCliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompras`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`idDetalleFactura`),
  ADD KEY `idFactura` (`idFactura`),
  ADD KEY `idOrden` (`idOrden`);

--
-- Indices de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD PRIMARY KEY (`idDistribuidor`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `distribuidor/producto`
--
ALTER TABLE `distribuidor/producto`
  ADD PRIMARY KEY (`idDistribuidor/Producto`),
  ADD KEY `idDistribuidorDP` (`idDistribuidor`),
  ADD KEY `idProductoDP` (`idProducto`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idempresa`),
  ADD KEY `idPropietarioEmpresa` (`idPropietario`),
  ADD KEY `idMunicipioEmpresa` (`idMunicipio`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idClienteFactura` (`idCliente`),
  ADD KEY `idUsuarioFactura` (`idUsuario`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`),
  ADD KEY `idPlatillo` (`idPlatillo`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`),
  ADD KEY `idDepartamento` (`idDepartamento`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`idorden`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idTipoOrden` (`idTipoOrden`),
  ADD KEY `idMenu` (`idMenu`);

--
-- Indices de la tabla `platillo`
--
ALTER TABLE `platillo`
  ADD PRIMARY KEY (`idPlatillo`),
  ADD KEY `idProductoProducto` (`idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idTipoProductoProducto` (`idTipoProducto`),
  ADD KEY `idUnidadMedidaProducto` (`idUnidadMedida`),
  ADD KEY `idSucursalProducto` (`idSucursal`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`idPropietario`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`idSucursal`),
  ADD KEY `idEmpresaSucursal` (`idEmpresa`),
  ADD KEY `idMunicipioSucursal` (`idMunicipio`);

--
-- Indices de la tabla `tipoorden`
--
ALTER TABLE `tipoorden`
  ADD PRIMARY KEY (`idtipoOrden`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`idtipoProducto`);

--
-- Indices de la tabla `tipoturno`
--
ALTER TABLE `tipoturno`
  ADD PRIMARY KEY (`idTipoTurno`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
  ADD PRIMARY KEY (`idTurno`),
  ADD KEY `idUsuarioTurno` (`idUsuario`),
  ADD KEY `idTipoTurnoTurno` (`idTipoTurno`);

--
-- Indices de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  ADD PRIMARY KEY (`idUnidadMedida`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuarioUsuario` (`idTipoUsuario`),
  ADD KEY `idSucursalUsuario` (`idSucursal`),
  ADD KEY `idMunicipioUsuario` (`idMunicipio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `idDetalleFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  MODIFY `idDistribuidor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distribuidor/producto`
--
ALTER TABLE `distribuidor/producto`
  MODIFY `idDistribuidor/Producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idempresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idMunicipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `platillo`
--
ALTER TABLE `platillo`
  MODIFY `idPlatillo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `idPropietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `idSucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `idtipoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipoturno`
--
ALTER TABLE `tipoturno`
  MODIFY `idTipoTurno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
  MODIFY `idTurno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidadmedida`
--
ALTER TABLE `unidadmedida`
  MODIFY `idUnidadMedida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `idMunicipio` FOREIGN KEY (`municipioCliente`) REFERENCES `municipio` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `idFactura` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idOrden` FOREIGN KEY (`idOrden`) REFERENCES `orden` (`idorden`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `distribuidor`
--
ALTER TABLE `distribuidor`
  ADD CONSTRAINT `idProveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `distribuidor/producto`
--
ALTER TABLE `distribuidor/producto`
  ADD CONSTRAINT `idDistribuidorDP` FOREIGN KEY (`idDistribuidor`) REFERENCES `distribuidor` (`idDistribuidor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idProductoDP` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `idMunicipioEmpresa` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idPropietarioEmpresa` FOREIGN KEY (`idPropietario`) REFERENCES `propietario` (`idPropietario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `idClienteFactura` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUsuarioFactura` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `idPlatillo` FOREIGN KEY (`idPlatillo`) REFERENCES `platillo` (`idPlatillo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `idDepartamento` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idMenu` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idTipoOrden` FOREIGN KEY (`idTipoOrden`) REFERENCES `tipoorden` (`idtipoOrden`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `platillo`
--
ALTER TABLE `platillo`
  ADD CONSTRAINT `idProductoProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `idSucursalProducto` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idTipoProductoProducto` FOREIGN KEY (`idTipoProducto`) REFERENCES `tipoproducto` (`idtipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUnidadMedidaProducto` FOREIGN KEY (`idUnidadMedida`) REFERENCES `unidadmedida` (`idUnidadMedida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `idEmpresaSucursal` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`idempresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idMunicipioSucursal` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `turno`
--
ALTER TABLE `turno`
  ADD CONSTRAINT `idTipoTurnoTurno` FOREIGN KEY (`idTipoTurno`) REFERENCES `tipoturno` (`idTipoTurno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idUsuarioTurno` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `idMunicipioUsuario` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idSucursalUsuario` FOREIGN KEY (`idSucursal`) REFERENCES `sucursal` (`idSucursal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idTipoUsuarioUsuario` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
