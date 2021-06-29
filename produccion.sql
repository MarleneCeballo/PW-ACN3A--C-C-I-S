-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2021 a las 02:09:35
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `produccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zapatillas`
--

CREATE TABLE `zapatillas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `precio` int(15) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `id_genero` int(1) NOT NULL,
  `imagenmini` varchar(200) NOT NULL,
  `imagengrande` varchar(200) NOT NULL,
  `nuevo` varchar(2) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zapatillas`
--

INSERT INTO `zapatillas` (`id`, `nombre`, `descripcion`, `precio`, `id_marca`, `modelo`, `id_genero`, `imagenmini`, `imagengrande`, `nuevo`, `activo`) VALUES
(1, 'Zapatilla Rosa Adidas Entrap II', 'Nuevas Zapatilla Rosa Adidas Entrap II!', 9500, 1, 'Entrap', 1, 'inc/img/adidasmujer/adidas-rosa-entrap-mini.jpg', 'inc/img/adidasmujer/adidas-rosa-entrap-grande.jpg', 'si', 1),
(2, 'Zapatilla Negra Adidas Entrap', NULL, 6369, 1, 'Entrap', 2, 'inc/img/adidasmujer/adidas-negra-entrap-mini.jpg', 'inc/img/adidasmujer/adidas-negra-entrap-grande.jpg', 'no', 1),
(3, 'Zapatilla Rosa Adidas Runfalcon', NULL, 5299, 1, 'Runfalcon', 2, 'inc/img/adidasmujer/adidas-rosa-runfalcon-mini.jpg', 'inc/img/adidasmujer/adidas-rosa-runfalcon-grande.jpg', 'no', 1),
(4, 'Zapatilla Blanca Adidas Superstar', NULL, 8999, 1, 'Superstar', 2, 'inc/img/adidasmujer/adidas-blanca-superstar-mini.jpg', 'inc/img/adidasmujer/adidas-blanca-superstar-grande.jpg', 'no', 1),
(5, 'Zapatilla Negra Adidas Advantage Bold', NULL, 5299, 1, 'Advantage Bold', 1, 'inc/img/adidashombre/adidas-negra-advantagebold-mini.jpg', 'inc/img/adidashombre/adidas-negra-advantagebold-grande.jpg', 'si', 1),
(6, 'Zapatilla Naranja Adidas Fabela Rise', NULL, 9199, 1, 'Fabela Rise', 1, 'inc/img/nikehombre/nike-roja-airmaxbellatr2-mini.jpg', 'inc/img/nikehombre/nike-negra-airmaxbellatr2y-grande.jpg', 'no', 1),
(7, 'Zapatilla Azul Adidas Astrarun', NULL, 6499, 1, 'Astrarun', 1, 'inc/img/adidashombre/adidas-azul-astrarun-mini.jpg', 'inc/img/adidashombre/adidas-azul-astrarun-grande.jpg', 'no', 1),
(8, 'Zapatilla Blanca Adidas Solar Trainer', NULL, 6299, 1, 'Solar Trainer', 1, 'inc/img/adidashombre/adidas-blanca-solartrainer-mini.jpg', 'inc/img/adidashombre/adidas-blanca-solartrainer-grande.jpg', 'no', 1),
(9, 'Zapatilla Blanca Adidas Grand Court K', NULL, 4999, 1, 'Court K', 3, 'inc/img/adidasmujer/adidas-grandcourt-mini.jpg', 'inc/img/adidasmujer/adidas-grandcourt-grande.jpg', 'no', 1),
(10, 'Zapatilla Blanca Adidas Originals Superstar', NULL, 5499, 1, 'Superstar', 3, 'inc/img/adidasniño/adidas-blanca-superestar-mini.jpg', 'inc/img/adidasniño/adidas-blanca-superestar-grande.jpg', 'si', 1),
(11, 'Zapatilla Rosa Nike Air Max Command', NULL, 11599, 2, 'Air Max Command', 2, 'inc/img/nikemujer/nike-rosa-airmaxcommand-mini.jpg', 'inc/img/nikemujer/nike-rosa-airmaxcommand-grande.jpg', 'no', 1),
(12, 'Zapatilla Blanca Nike RENEW RUN', NULL, 9299, 2, 'Renew Run', 2, 'inc/img/nikemujer/nike-blanca-renewrun-mini.jpg', 'inc/img/nikemujer/nike-blanca-renewrun-grande.jpg', 'si', 1),
(13, 'Zapatilla Gris Nike Md Runner 2 Se', NULL, 5039, 2, 'Md Runner 2 Se', 2, 'inc/img/nikemujer/nike-gris-mdrunner2se-mini.jpg', 'inc/img/nikemujer/nike-gris-mdrunner2se-grande.jpg', 'no', 1),
(14, 'Zapatilla Negra Nike AMIXA', NULL, 8399, 2, 'Amixa', 2, 'inc/img/nikemujer/nike-negra-amixa-mini.jpg', 'inc/img/nikemujer/nike-negra-amixa-grande.jpg', 'si', 1),
(15, 'Zapatilla Azul Nike Zoom Rival Fly', NULL, 5287, 2, 'Rival Fly', 2, 'inc/img/nikehombre/nike-azul-rivalfly-grandemini.jpg', 'inc/img/nikehombre/nike-azul-rivalfly-grande.jpg', 'no', 1),
(16, 'Zapatilla Negra Nike AIR MAX BELLA TR 2', NULL, 8699, 2, 'Air max Bella TR 2', 2, 'inc/img/nikehombre/nike-roja-airmaxbellatr2-mini.jpg', 'inc/img/nikehombre/nike-negra-airmaxbellatr2y-grande.jpg', 'no', 1),
(17, 'Zapatilla Bordó Nike Air Max Axis', NULL, 7969, 2, 'Air Max Axis', 2, 'inc/img/nikehombre/nike-negraroja-airmaxaxis-mini.jpg', 'inc/img/nikehombre/nike-negraroja-airmaxaxis-grande.jpg', 'no', 1),
(18, 'Zapatilla Negra Nike Renew Lucent', NULL, 8389, 2, 'Renew Lucent', 2, 'inc/img/nikehombre/nike-blancanegra-renewlucent-mini.jpg', 'inc/img/nikehombre/nike-blancanegra-renewlucent-grande.jpg', 'no', 1),
(19, 'Zapatilla Negra Converse Chuck Taylor All Star Monochro', NULL, 5199, 3, 'Monochro', 2, 'inc/img/conversemujer/converse-negra-taylor-mini.jpg', 'inc/img/conversemujer/converse-negra-taylor-grande.jpg', 'no', 1),
(20, 'Zapatilla Roja Converse Chuck Taylor All Star Core OX', NULL, 4995, 3, 'Core Ox', 2, 'inc/img/conversemujer/converse-roja-taylor-mini.jpg', 'inc/img/conversemujer/converse-roja-taylor-grande.jpg', 'si', 1),
(21, 'Zapatilla Blanca Converse Chuck Taylor All Star Metallic', NULL, 3369, 3, 'Core Ox', 2, 'inc/img/conversemujer/converse-blanca-taylor-mini.jpg', 'inc/img/conversemujer/converse-blanca-taylor-grande.jpg', 'no', 1),
(22, 'Zapatilla Azul Converse Stoke Ox', NULL, 4089, 3, 'Stoke Ox', 1, 'inc/img/conversehombre/converse-azul-stoke-mini.jpg', 'inc/img/conversehombre/converse-azul-stoke-grande.jpg', 'no', 1),
(23, 'Zapatilla Negra Converse RIVAL OX', NULL, 6399, 3, 'Rival Ox', 1, 'inc/img/conversehombre/converse-negra-rival-mini.jpg', 'inc/img/conversehombre/converse-negra-rival-grande.jpg', 'no', 1),
(24, 'Zapatilla Verde Converse Stoke Ox Faded', NULL, 4039, 3, 'Stoke Od Faded', 2, 'inc/img/conversemujer/converse-verde-stoke-ok-faded-mini.jpg', 'inc/img/conversemujer/converse-verde-stoke-ok-faded-grande.jpg', 'no', 1),
(25, 'Zapatilla Verde Converse CTAS LIFT OX', NULL, 6199, 3, 'Lift Ox', 2, 'inc/img/conversehombre/converse-verde-lift-mini.jpg', 'inc/img/conversehombre/converse-verde-lift-grande.jpg', 'si', 1),
(26, 'Zapatilla Bordó Converse Chuck Taylor All Star Hi Maroo', NULL, 4999, 3, 'Hi Maroo', 2, 'inc/img/conversemujer/converse-bordo-taylor-mini.jpg', 'inc/img/conversemujer/converse-bordo-taylor-grande.jpg', 'no', 1),
(27, 'Zapatilla Tribeka Dc Se', NULL, 8299, 4, 'Tribeka', 2, 'inc/img/dcsshoesmujer/dcshoes-rosa-tribeka-mini.jpg', 'inc/img/dcsshoesmujer/dcshoes-rosa-tribeka-grande.jpg', 'si', 1),
(28, 'Zapatilla DC Heathrow Ia', NULL, 6399, 4, 'Heathrow Ia', 2, 'inc/img/dcsshoesmujer/dcshoes-gris-heathrow-mini.jpg', 'inc/img/dcsshoesmujer/dcshoes-gris-heathrow-grande.jpg', 'no', 1),
(29, 'Zapatilla Tribeka Dc Se Dorada', NULL, 8299, 4, 'Tribeka', 2, 'inc/img/dcsshoesmujer/dcshoes-rosa-oro-tribeka-ia-mini.jpg', 'inc/img/dcsshoesmujer/dcshoes-rosa-oro-tribeka-ia-grande.jpg', 'no', 1),
(30, 'Zapatilla DC Heathrow', NULL, 8299, 4, 'Heathrow', 2, 'inc/img/dcsshoesmujer/dcshoes-roja-heathrow-ia-mini.jpg', 'inc/img/dcsshoesmujer/dcshoes-roja-heathrow-ia-grande.jpg', 'si', 1),
(31, 'Zapatilla DC Heathrow SE', NULL, 7299, 4, 'Heathrow', 3, 'inc/img/dcshoesniños/dcshoes-gris-heathrow-se-mini.jpg', 'inc/img/dcshoesniños/dcshoes-gris-heathrow-se-grande.jpg', 'no', 1),
(32, 'Zapatilla DC Trase Tx', NULL, 5799, 4, 'Trase Tx', 3, 'inc/img/dcshoesniños/dcshoes-blanca-trase-tx-mini.jpg', 'inc/img/dcshoesniños/dcshoes-blanca-trase-tx-grande.jpg', 'no', 1),
(33, 'Zapatilla DC Trase Tx Se', NULL, 6999, 4, 'Trase Tx Se', 3, 'inc/img/dcshoesniños/dcshoes-azul-trase-mini.jpg', 'inc/img/dcshoesniños/dcshoes-azul-trase-grande.jpg', 'no', 1),
(34, 'Zapatilla DC Heathrow', NULL, 6999, 4, 'Trase Tx', 3, 'inc/img/dcshoesniños/dcshoes-negra-heathrow-mini.jpg', 'inc/img/dcshoesniños/dcshoes-negra-heathrow-grande.jpg', 'si', 1),
(35, 'Zapatilla U Vans Sport', NULL, 6900, 5, 'Sport', 1, 'inc/img/vanshombre/vans-azul-sport-mini.jpg', 'inc/img/vanshombre/vans-azul-sport-grande.jpg', 'no', 1),
(36, 'Zapatilla U Vans Authentic', NULL, 4900, 5, 'Authentic', 1, 'inc/img/vanshombre/vans-negra-authentic-mini.jpg', 'inc/img/vanshombre/vans-negra-authentic-grande.jpg', 'si', 1),
(37, 'Zapatilla U Vans Doheny', NULL, 5100, 5, 'Doheny', 1, 'inc/img/vanshombre/vans-negra-doheny-mini.jpg', 'inc/img/vanshombre/vans-negra-doheny-grande.jpg', 'no', 1),
(38, 'Zapatilla U Vans Sk8-Hi', NULL, 7700, 5, 'Sk8-Hi', 1, 'inc/img/vanshombre/vans-negra-sk8-mini.jpg', 'inc/img/vanshombre/vans-negra-sk8-grande.jpg', 'no', 1),
(39, 'Zapatilla U Vans Sk8-Hi', NULL, 7700, 5, 'Sk8-Hi', 1, 'inc/img/vansmujer/vans-amarilla-sk8-mini.jpg', 'inc/img/vansmujer/vans-amarilla-sk8-grande.jpg', 'si', 0),
(40, 'Zapatilla U Vans Authentic Elastic Lace', NULL, 1200, 5, 'Authentic Elastic La', 3, 'inc/img/vansmujer/vans-roja-authentic-elastic-mini.jpg', 'inc/img/vansmujer/vans-roja-authentic-elastic-grande.jpg', 'si', 0),
(41, 'Zapatilla U Vans T Classic Slip-on', NULL, 1800, 5, 'Classic Slip-on', 3, 'inc/img/vansmujer/vans-classic-slip-mini.jpg', 'inc/img/vansmujer/vans-classic-slip-grande.jpg', 'no', 0),
(42, 'Zapatilla U Vans T Sk8-Hi Zip', NULL, 2200, 5, 'T Sk8-Hi Zip', 3, 'inc/img/vansmujer/vans-bordo-sk8-mini.jpg', 'inc/img/vansmujer/vans-bordo-sk8-grande.jpg', 'si', 0),
(44, 'Zapatilla de Carlitos', 'Zapa de Carlitos', 120, 0, 'Precio amigo para Ca', 0, '', '', '', 1),
(45, 'Carlitos', 'Sale', 9000, 2, 'Entrap II', 3, '', '', '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `zapatillas`
--
ALTER TABLE `zapatillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
