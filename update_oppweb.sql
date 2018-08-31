-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-08-2018 a las 21:38:15
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `update_oppweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `cod_banner` int(11) NOT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `enlace` varchar(250) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`cod_banner`, `imagen`, `titulo`, `enlace`, `orden`, `estado`) VALUES
(1, 'slide1.png', 'Edificio San Jose', '#', 0, 1),
(2, 'slide2.png', 'San Isidro', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `cod_contact` int(11) NOT NULL,
  `direction` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `map` varchar(9999) DEFAULT NULL,
  `form_mail` varchar(250) DEFAULT NULL,
  `cart_mail` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`cod_contact`, `direction`, `phone`, `mobile`, `email`, `map`, `form_mail`, `cart_mail`) VALUES
(1, 'Calle Aldabas NÂº 559 of. 403 - Surco', '2751241 / 2751254 / 6237723', '', 'raulupdate@gmail.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.184647155321!2d-77.02152004930426!3d-12.099508391390115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c871aeb024b9%3A0x858d2d926451337!2sAv.+Rep%C3%BAblica+de+Panam%C3%A1+3564%2C+San+Isidro+15036!5e0!3m2!1ses-419!2spe!4v1527892951935\"  height=\"620\" frameborder=\"0\" style=\"border:0; width: 100%\" allowfullscreen></iframe>', 'raulupdate@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `cod_contenido` int(11) NOT NULL,
  `titulo_contenido` varchar(250) DEFAULT NULL,
  `img_contenido` varchar(250) DEFAULT NULL,
  `contenido` text,
  `estado` int(1) DEFAULT NULL,
  `enlace` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`cod_contenido`, `titulo_contenido`, `img_contenido`, `contenido`, `estado`, `enlace`) VALUES
(1, 'Octavio Pedraza Porras E Hijos', 'logo_svg.svg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, NULL),
(2, 'logo_svg.svg', 'logosvgwhite.svg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since.', 1, NULL),
(3, 'San Miguel', 'bitmap.png', 'Condominios Las Brisas', 1, '#'),
(4, 'LOREN IPSUN', NULL, 'loren ipsun text da moret', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `cod_contacto` int(11) NOT NULL,
  `nombres` varchar(250) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `mensaje` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles`
--

CREATE TABLE `inmuebles` (
  `cod_inmueble` int(11) NOT NULL,
  `tipo` int(1) DEFAULT NULL,
  `cod_categoria` int(11) DEFAULT NULL,
  `cod_distrito` int(11) DEFAULT NULL,
  `cod_lugar` int(11) DEFAULT NULL,
  `alquiler` int(11) DEFAULT NULL,
  `slug` varchar(250) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `banos` int(11) DEFAULT NULL,
  `area` varchar(250) DEFAULT NULL,
  `cuartos` int(11) DEFAULT NULL,
  `descripcion` longtext,
  `comodidades` longtext,
  `ubicacion` varchar(9999) DEFAULT NULL,
  `parking` int(11) DEFAULT NULL,
  `fecha_ing` date DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inmuebles`
--

INSERT INTO `inmuebles` (`cod_inmueble`, `tipo`, `cod_categoria`, `cod_distrito`, `cod_lugar`, `alquiler`, `slug`, `titulo`, `imagen`, `precio`, `banos`, `area`, `cuartos`, `descripcion`, `comodidades`, `ubicacion`, `parking`, `fecha_ing`, `orden`, `estado`) VALUES
(5, 0, 2, 1, 1, 1, 'edificio-en-lima-peru', 'Edificio en Lima PerÃº', 'edificio234.jpg', 79000, 1, '75 mt2', 4, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'Parque Infantil, Canchas Deportivas, Sala de cine, Sala de Reuniones, Mesa de Billar  ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7802.371582752172!2d-77.019163!3d-12.09943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c871a9a55fe1%3A0xb50c2424234e93b5!2sPiso+7-Of.702%2C+Av.+Rep%C3%BAblica+de+Panam%C3%A1+3563%2C+San+Isidro+15036!5e0!3m2!1ses-419!2spe!4v1533935080730\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 1, '2018-08-11', 0, 1),
(6, 0, 3, 4, 1, 1, 'donec-luctus-tellus-non-eros-pretium-id-scelerisque-lorem-ornare', 'Donec luctus tellus non eros pretium, id scelerisque lorem ornare', 'edificio234.jpg', 79000, 2, '75 mt2', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris bibendum massa in quam posuere mollis. In pretium nunc in odio ornare tincidunt. Nam fringilla nibh sed tellus malesuada, at maximus augue pulvinar. Curabitur vitae tempor dolor, sed accumsan odio. Sed aliquam mi tellus, id posuere magna malesuada id. Vestibulum mattis purus pulvinar tellus rutrum accumsan. Vivamus vel justo ac mi viverra ultrices ac ut mi.</p><p>Quisque condimentum nibh id elit bibendum hendrerit. Mauris commodo laoreet iaculis. Phasellus ac eros et leo ornare maximus nec id enim. Proin auctor consequat viverra. Vestibulum posuere odio velit, non egestas tortor placerat varius. Praesent accumsan posuere tellus vel vulputate. Donec nisi nibh, feugiat et hendrerit id, volutpat sed risus. Donec quis felis mattis, volutpat tortor vitae, venenatis sem. Integer placerat libero eget lacus pretium eleifend eu a quam. Curabitur facilisis facilisis egestas. Nam mattis sed diam non cursus. Sed dapibus mollis lectus, at convallis nibh tincidunt ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer lobortis nisi ac massa congue, quis egestas felis dapibus. Curabitur venenatis magna id quam porttitor blandit.<br></p>', 'Parque Infantil, Canchas Deportivas, Sala de cine, Sala de Reuniones, Mesa de Billar  ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7802.371582752172!2d-77.019163!3d-12.09943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c871a9a55fe1%3A0xb50c2424234e93b5!2sPiso+7-Of.702%2C+Av.+Rep%C3%BAblica+de+Panam%C3%A1+3563%2C+San+Isidro+15036!5e0!3m2!1ses-419!2spe!4v1533935080730\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 2, '2018-08-11', 1, 1),
(7, 0, 4, 1, 1, 1, 'vivamus-accumsan-mauris-sit-amet-dolor-porta-finibus', 'Vivamus accumsan mauris sit amet dolor porta finibus', 'edificio234.jpg', 79000, 2, '72 mt2', 5, '<p>Praesent rhoncus ex vel orci vestibulum ullamcorper. Aliquam nec sapien leo. Cras eu lacinia nibh. Sed dapibus libero interdum sem efficitur, vitae efficitur velit luctus. Donec a condimentum ipsum, vel condimentum tellus. Curabitur consequat congue augue quis accumsan. Nulla neque orci, feugiat vitae fermentum id, dictum at massa. Nullam ut vestibulum nulla. Duis accumsan convallis semper. Quisque eget velit ut odio placerat tincidunt nec at ligula. Donec odio enim, lobortis vel ligula sit amet, malesuada auctor quam. Fusce viverra fringilla venenatis. Nunc ornare lobortis posuere. Mauris non purus ac tortor sagittis finibus. Morbi tincidunt sem nec lacinia lacinia.Â </p>', 'Parque Infantil, Canchas Deportivas, Sala de cine, Sala de Reuniones, Mesa de Billar  ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7802.371582752172!2d-77.019163!3d-12.09943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c871a9a55fe1%3A0xb50c2424234e93b5!2sPiso+7-Of.702%2C+Av.+Rep%C3%BAblica+de+Panam%C3%A1+3563%2C+San+Isidro+15036!5e0!3m2!1ses-419!2spe!4v1533935080730\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 4, '2018-08-11', 2, 1),
(8, 0, 2, 1, 1, 1, 'curabitur-venenatis-magna-id-quam-porttitor-blandit', 'Curabitur venenatis magna id quam porttitor blandit.', 'edificio234.jpg', 79000, 32, '75 mt2', 5, '<p>Quisque condimentum nibh id elit bibendum hendrerit. Mauris commodo laoreet iaculis. Phasellus ac eros et leo ornare maximus nec id enim. Proin auctor consequat viverra. Vestibulum posuere odio velit, non egestas tortor placerat varius. Praesent accumsan posuere tellus vel vulputate. Donec nisi nibh, feugiat et hendrerit id, volutpat sed risus. Donec quis felis mattis, volutpat tortor vitae, venenatis sem. Integer placerat libero eget lacus pretium eleifend eu a quam. Curabitur facilisis facilisis egestas. Nam mattis sed diam non cursus. Sed dapibus mollis lectus, at convallis nibh tincidunt ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer lobortis nisi ac massa congue, quis egestas felis dapibus.</p><div><br></div>', 'Parque Infantil, Canchas Deportivas, Sala de cine, Sala de Reuniones, Mesa de Billar  ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7802.371582752172!2d-77.019163!3d-12.09943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c871a9a55fe1%3A0xb50c2424234e93b5!2sPiso+7-Of.702%2C+Av.+Rep%C3%BAblica+de+Panam%C3%A1+3563%2C+San+Isidro+15036!5e0!3m2!1ses-419!2spe!4v1533935080730\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 2, '2018-08-11', 3, 1),
(9, 1, 2, 1, 1, 0, 'ut-scelerisque-suscipit-varius', 'Ut scelerisque suscipit varius', 'edificio234.jpg', 79000, 2, '70 mt2', 5, '<p>Donec luctus tellus non eros pretium, id scelerisque lorem ornare. Integer consequat eu ante ut condimentum. Donec sem risus, malesuada ac ipsum malesuada, eleifend consectetur enim. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc et porttitor nibh. Fusce facilisis erat magna, in euismod quam auctor vehicula. Praesent placerat justo sit amet odio tempor scelerisque. Proin justo lorem, dictum et urna nec, aliquet pharetra libero.&nbsp;</p>', 'Parque Infantil, Canchas Deportivas, Sala de cine, Sala de Reuniones, Mesa de Billar  ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7802.371582752172!2d-77.019163!3d-12.09943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c871a9a55fe1%3A0xb50c2424234e93b5!2sPiso+7-Of.702%2C+Av.+Rep%C3%BAblica+de+Panam%C3%A1+3563%2C+San+Isidro+15036!5e0!3m2!1ses-419!2spe!4v1533935080730\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 2, '2018-08-11', 4, 1),
(10, 1, 5, 4, 1, 0, 'nunc-bibendum-metus-eget-tellus-sodales', 'Nunc bibendum metus eget tellus sodales', 'edificio234.jpg', 79000, 2, '75 mt2', 5, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec posuere sapien non posuere auctor. Pellentesque convallis imperdiet feugiat. Aenean vitae maximus turpis. Nulla metus orci, maximus id felis quis, malesuada consectetur quam. Maecenas bibendum lectus eget mi pharetra dapibus. Proin pharetra enim non velit congue, sit amet venenatis odio congue. Vivamus lobortis faucibus arcu, at lobortis sem luctus sed. Nam eget elit vehicula, blandit ligula vitae, rutrum nulla.<br></p>', 'Parque Infantil, Canchas Deportivas, Sala de cine, Sala de Reuniones, Mesa de Billar  ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7802.371582752172!2d-77.019163!3d-12.09943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c871a9a55fe1%3A0xb50c2424234e93b5!2sPiso+7-Of.702%2C+Av.+Rep%C3%BAblica+de+Panam%C3%A1+3563%2C+San+Isidro+15036!5e0!3m2!1ses-419!2spe!4v1533935080730\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 2, '2018-08-20', 5, 1),
(11, 1, 7, 4, 1, 0, 'pellentesque-dictum-nisi-vel-convallis-semper', 'Pellentesque dictum nisi vel convallis semper', 'edificio234.jpg', 79000, 2, '75 mt2', 5, '<p>Cras mattis libero sit amet consequat pellentesque. Cras fringilla porta enim. Integer lobortis mi ac massa commodo ullamcorper. Aenean blandit finibus urna, fermentum posuere tortor varius ut. Quisque nisl odio, condimentum ut vestibulum sed, rhoncus eget nunc. Phasellus et lacus laoreet, euismod purus ut, tristique ipsum. Nullam massa massa, euismod nec facilisis ut, tempor a dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu eleifend nisl, vitae euismod mi. Pellentesque dictum nisi vel convallis semper.<br></p>', 'Parque Infantil, Canchas Deportivas, Sala de cine, Sala de Reuniones, Mesa de Billar  ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7802.371582752172!2d-77.019163!3d-12.09943!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c871a9a55fe1%3A0xb50c2424234e93b5!2sPiso+7-Of.702%2C+Av.+Rep%C3%BAblica+de+Panam%C3%A1+3563%2C+San+Isidro+15036!5e0!3m2!1ses-419!2spe!4v1533935080730\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 2, '2018-08-20', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles_categorias`
--

CREATE TABLE `inmuebles_categorias` (
  `cod_categoria` int(11) NOT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `categoria` varchar(250) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inmuebles_categorias`
--

INSERT INTO `inmuebles_categorias` (`cod_categoria`, `slug`, `categoria`, `orden`, `estado`) VALUES
(2, 'departamentos', 'Departamentos', 0, 1),
(3, 'casa', 'Casa', 1, 1),
(4, 'terrenos', 'Terrenos', 2, 1),
(5, 'oficinas', 'Oficinas', 3, 1),
(6, 'locales-comerciales', 'Locales Comerciales', 4, 1),
(7, 'oficinas-industriales', 'Oficinas Industriales', 5, 1),
(8, 'otros', 'Otros', 6, 1),
(9, 'almacen', 'AlmacÃ©n', 7, 1),
(10, 'cochera', 'Cochera', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles_distritos`
--

CREATE TABLE `inmuebles_distritos` (
  `cod_distrito` int(11) NOT NULL,
  `cod_lugar` int(11) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `distrito` varchar(250) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inmuebles_distritos`
--

INSERT INTO `inmuebles_distritos` (`cod_distrito`, `cod_lugar`, `slug`, `distrito`, `orden`, `estado`) VALUES
(1, 1, 'miraflores', 'Miraflores', 0, 1),
(4, 1, 'san-isidro', 'San Isidro', 1, 1),
(5, 1, 'san-miguel', 'San Miguel', 2, 1),
(6, 2, 'santiago', 'Santiago', 0, 1),
(7, 2, 'saylla', 'Saylla', 1, 1),
(8, 2, 'san-jeronimo', 'San JerÃ³nimo', 2, 1),
(9, 3, 'characato', 'Characato', 0, 1),
(10, 3, 'chiguata', 'Chiguata', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles_fotos`
--

CREATE TABLE `inmuebles_fotos` (
  `cod_foto` int(11) NOT NULL,
  `cod_inmueble` int(11) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inmuebles_fotos`
--

INSERT INTO `inmuebles_fotos` (`cod_foto`, `cod_inmueble`, `imagen`) VALUES
(2, 4, 'hoteles.jpg'),
(3, 5, 'edificio234.jpg'),
(4, 5, 'edificio234.jpg'),
(5, 5, 'edificio234.jpg'),
(6, 5, 'edificio234.jpg'),
(7, 5, 'edificio234.jpg'),
(8, 6, 'edificio234.jpg'),
(9, 6, 'edificio234.jpg'),
(10, 7, 'edificio234.jpg'),
(11, 9, 'edificio234.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmuebles_lugares`
--

CREATE TABLE `inmuebles_lugares` (
  `cod_lugar` int(11) NOT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `lugar` varchar(250) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inmuebles_lugares`
--

INSERT INTO `inmuebles_lugares` (`cod_lugar`, `slug`, `lugar`, `orden`, `estado`) VALUES
(1, 'lima', 'Lima', 0, 1),
(2, 'cusco', 'Cusco', 1, 1),
(3, 'arequipa', 'Arequipa', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metatags`
--

CREATE TABLE `metatags` (
  `cod_meta` int(11) NOT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `slogan` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `keywords` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `ico` varchar(250) DEFAULT NULL,
  `face1` varchar(250) DEFAULT NULL,
  `face2` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `metatags`
--

INSERT INTO `metatags` (`cod_meta`, `titulo`, `slogan`, `description`, `keywords`, `logo`, `url`, `ico`, `face1`, `face2`) VALUES
(1, 'Octavio Pedraza Porras E Hijos', 'Grupo Inmobiliario', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Ventas, Alquileres, Hipotecas, Departamentos, Casa, Oficinas, Almacenes', 'logovert.svg', 'http://localhost/proyectos/oppweb/', 'favicon.ico', 'face1.jpg', 'face2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `cod_noticia` int(11) NOT NULL,
  `cod_categoria` int(11) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `noticia` longtext,
  `fecha` date DEFAULT NULL,
  `autor` varchar(250) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`cod_noticia`, `cod_categoria`, `slug`, `titulo`, `imagen`, `noticia`, `fecha`, `autor`, `estado`) VALUES
(2, 1, 'real-state-life', 'Real state life', 'bitmap.png', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.&nbsp;</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&nbsp;</p>', '2018-07-26', 'Update Global Markerting', 1),
(3, 1, 'aliquam-erat-volutpat', 'Aliquam erat volutpat', 'bitmap.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim erat eu luctus sollicitudin. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut efficitur, massa in elementum convallis, mauris libero vulputate nulla, fermentum placerat nisi magna a ex. Mauris sem eros, ultricies tincidunt eleifend id, laoreet eu nulla. In hac habitasse platea dictumst. Aliquam eu lorem et orci ornare venenatis vel quis sapien. Phasellus ornare dolor ut pharetra cursus. Sed massa arcu, vehicula id est vel, posuere rutrum odio. Nam ornare nunc non vestibulum feugiat. Phasellus leo enim, ultricies at quam blandit, fermentum ullamcorper lectus.</p><p>Donec id risus nulla. Nunc tincidunt mi at tempor varius. Sed urna neque, ultrices ornare tempus quis, faucibus at nisl. Nullam porta ipsum nunc, vel egestas mauris molestie iaculis. Vivamus feugiat bibendum dui eu tincidunt. Cras molestie varius faucibus. Nulla purus enim, ultrices eget leo sit amet, facilisis tristique dui.</p><p>Vestibulum tincidunt elementum quam consectetur cursus. Nam pulvinar ultricies mi, in molestie mi rutrum sit amet. Nulla nec dui accumsan turpis aliquam consequat. Quisque nunc metus, laoreet vitae fringilla id, vestibulum ut ante. Sed tempor bibendum ex at vehicula. Fusce vitae sodales orci, pretium dignissim ante. Proin a accumsan nunc. Vivamus sit amet diam sed purus venenatis tristique non sed neque. Praesent in turpis eget erat commodo auctor. Mauris fermentum eu purus ac convallis. Donec interdum sem et mi imperdiet, id elementum mi tristique. Phasellus rutrum sit amet est a maximus. Aenean ut erat imperdiet mi pellentesque pretium.</p>', '2018-07-26', 'Update Global Markerting', 1),
(4, 1, 'quisque-nunc-metus-laoreet-vitae', 'Quisque nunc metus laoreet vitae', 'bitmap.png', '<p>Vestibulum tincidunt elementum quam consectetur cursus. Nam pulvinar ultricies mi, in molestie mi rutrum sit amet. Nulla nec dui accumsan turpis aliquam consequat. Quisque nunc metus, laoreet vitae fringilla id, vestibulum ut ante. Sed tempor bibendum ex at vehicula. Fusce vitae sodales orci, pretium dignissim ante. Proin a accumsan nunc. Vivamus sit amet diam sed purus venenatis tristique non sed neque. Praesent in turpis eget erat commodo auctor. Mauris fermentum eu purus ac convallis. Donec interdum sem et mi imperdiet, id elementum mi tristique. Phasellus rutrum sit amet est a maximus. Aenean ut erat imperdiet mi pellentesque pretium.</p><p>Maecenas sem velit, tristique nec faucibus vitae, vulputate et nulla. Morbi eu est nibh. Curabitur fermentum velit nec pretium vehicula. Nullam pretium congue lacus, eu interdum felis. Fusce ultricies tincidunt sem eget rhoncus. Proin sit amet malesuada mi, eget tristique enim. Curabitur lobortis volutpat nisl ut vestibulum. Maecenas bibendum tempor lacus quis condimentum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus vitae lacus posuere, maximus arcu in, rhoncus nisi. Praesent quis nulla sit amet nunc varius sollicitudin. Cras porttitor ligula quis pharetra scelerisque. In at lorem in nibh tincidunt efficitur vel at turpis. Quisque diam ante, euismod nec placerat eget, egestas eu odio.</p>', '2018-07-26', 'Update Global Markerting', 1),
(5, 2, 'vestibulum-at-diam-eget-mauris-semper-congue-eget-sit-amet-odio', 'Vestibulum at diam eget mauris semper congue eget sit amet odio', 'bitmap.png', '<p>Cras rutrum dui at felis ullamcorper cursus. Integer ut ipsum ut ipsum dignissim varius. Aliquam lobortis vel elit vel vulputate. Vestibulum sagittis tellus eget rhoncus dictum. In hac habitasse platea dictumst. Mauris quis nulla consequat, gravida dui quis, lacinia tortor. Nulla in sem volutpat neque egestas ullamcorper et sed ipsum. Etiam at eros id arcu ultricies vehicula. Morbi et varius urna. Cras ullamcorper, mauris at iaculis vehicula, risus diam varius dolor, in porta justo neque ut lorem. Integer nulla nisl, aliquet nec urna ut, varius egestas mi. Ut porta libero sit amet malesuada egestas. Phasellus dolor nulla, tempus a diam in, dapibus ornare nulla. Sed maximus diam tellus, vitae rhoncus neque ullamcorper ut.</p><p>Maecenas et ligula accumsan, interdum arcu in, interdum elit. Pellentesque suscipit pretium varius. Suspendisse at semper lectus, sit amet auctor justo. Fusce non suscipit risus, vitae interdum arcu. Suspendisse at nisi vel eros consectetur gravida at id turpis. Sed eget efficitur risus. Phasellus pretium et erat non gravida. Vestibulum molestie neque volutpat scelerisque commodo. Integer vel gravida risus, a gravida nibh. Quisque iaculis id nunc fermentum ultrices. Curabitur vitae odio ac est mollis viverra et nec orci. Cras eget leo varius dolor commodo dapibus.</p><p>Praesent malesuada tempor commodo. Etiam nisi odio, mattis eget orci non, hendrerit sagittis arcu. Donec blandit tellus et ligula dignissim efficitur. Ut pellentesque est eu elit accumsan pellentesque. Quisque laoreet nisl ac elit maximus imperdiet. In ac placerat magna. Proin id condimentum erat. Proin vehicula egestas sollicitudin. Praesent aliquam semper augue id feugiat. Aenean sagittis augue facilisis nunc pellentesque, quis porttitor est gravida.</p>', '2018-07-26', 'Update Global Markerting', 1),
(6, 1, 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'bitmap.png', '<p>Sed efficitur finibus sapien, id interdum justo. Sed vulputate pellentesque orci eget ultricies. Maecenas erat lorem, varius quis sollicitudin fermentum, luctus in lorem. Maecenas lacus ligula, lacinia non fermentum quis, luctus a nulla. Maecenas id volutpat purus, sit amet egestas risus. Curabitur tincidunt congue mauris vitae vehicula. Maecenas id felis in augue varius viverra.</p><p>Nulla in orci vitae dui gravida ornare. Ut urna urna, sollicitudin venenatis varius a, rhoncus in enim. Donec pulvinar nisi vel dolor interdum, ac ultricies enim porttitor. Praesent fermentum rhoncus rhoncus. Nunc id nisl sed nisi fringilla consectetur et ut magna. Fusce auctor nisi at dapibus hendrerit. In commodo dictum risus eget lobortis.</p><p>Cras rutrum dui at felis ullamcorper cursus. Integer ut ipsum ut ipsum dignissim varius. Aliquam lobortis vel elit vel vulputate. Vestibulum sagittis tellus eget rhoncus dictum. In hac habitasse platea dictumst. Mauris quis nulla consequat, gravida dui quis, lacinia tortor. Nulla in sem volutpat neque egestas ullamcorper et sed ipsum. Etiam at eros id arcu ultricies vehicula. Morbi et varius urna. Cras ullamcorper, mauris at iaculis vehicula, risus diam varius dolor, in porta justo neque ut lorem. Integer nulla nisl, aliquet nec urna ut, varius egestas mi. Ut porta libero sit amet malesuada egestas. Phasellus dolor nulla, tempus a diam in, dapibus ornare nulla. Sed maximus diam tellus, vitae rhoncus neque ullamcorper ut.</p>', '2018-07-26', 'Update Global Markerting', 1),
(7, 1, 'phasellus-dolor-nulla-tempus-a-diam-in-dapibus-ornare', 'Phasellus dolor nulla, tempus a diam in, dapibus ornare', 'bitmap.png', '<p>Maecenas et ligula accumsan, interdum arcu in, interdum elit. Vestibulum at diam eget mauris semper congue eget sit amet odio. Pellentesque suscipit pretium varius. Suspendisse at semper lectus, sit amet auctor justo. Fusce non suscipit risus, vitae interdum arcu. Suspendisse at nisi vel eros consectetur gravida at id turpis. Sed eget efficitur risus. Phasellus pretium et erat non gravida. Vestibulum molestie neque volutpat scelerisque commodo. Integer vel gravida risus, a gravida nibh. Quisque iaculis id nunc fermentum ultrices. Curabitur vitae odio ac est mollis viverra et nec orci. Cras eget leo varius dolor commodo dapibus.</p><p>Praesent malesuada tempor commodo. Etiam nisi odio, mattis eget orci non, hendrerit sagittis arcu. Donec blandit tellus et ligula dignissim efficitur. Ut pellentesque est eu elit accumsan pellentesque. Quisque laoreet nisl ac elit maximus imperdiet. In ac placerat magna. Proin id condimentum erat. Proin vehicula egestas sollicitudin. Praesent aliquam semper augue id feugiat. Aenean sagittis augue facilisis nunc pellentesque, quis porttitor est gravida.</p>', '2018-07-26', 'Update Global Markerting', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias_categorias`
--

CREATE TABLE `noticias_categorias` (
  `cod_categoria` int(11) NOT NULL,
  `slug` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `categoria` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `noticias_categorias`
--

INSERT INTO `noticias_categorias` (`cod_categoria`, `slug`, `categoria`, `orden`, `estado`) VALUES
(1, 'categoria-1', 'Categoria #1', 0, 1),
(2, 'categoria-2', 'Categoria #2', 1, 1),
(3, 'categoria-3', 'Categoria #3', 2, 1),
(4, 'categoria-4', 'Categoria #4', 3, 1),
(5, 'categoria-5', 'Categoria #5', 4, 1),
(6, 'categoria-6', 'Categoria #6', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social`
--

CREATE TABLE `social` (
  `cod_social` int(11) NOT NULL,
  `type` varchar(250) DEFAULT NULL,
  `links` varchar(9999) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `nombres` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `imagen` varchar(250) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `clave` varchar(250) DEFAULT NULL,
  `visitante` int(1) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nombres`, `email`, `imagen`, `usuario`, `clave`, `visitante`, `estado`) VALUES
(1, 'Update Global Markerting', 'webmasterupdate@gmail.com', 'webmaster.jpg', 'webmaster', '$2y$10$NaAna7ymXRDnp7LH1J27P.ykfmAXdFiK2Imi/KfZVXFQ8IE8Z3MPC', 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`cod_banner`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`cod_contact`);

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`cod_contenido`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`cod_contacto`);

--
-- Indices de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`cod_inmueble`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indices de la tabla `inmuebles_categorias`
--
ALTER TABLE `inmuebles_categorias`
  ADD PRIMARY KEY (`cod_categoria`);

--
-- Indices de la tabla `inmuebles_distritos`
--
ALTER TABLE `inmuebles_distritos`
  ADD PRIMARY KEY (`cod_distrito`);

--
-- Indices de la tabla `inmuebles_fotos`
--
ALTER TABLE `inmuebles_fotos`
  ADD PRIMARY KEY (`cod_foto`);

--
-- Indices de la tabla `inmuebles_lugares`
--
ALTER TABLE `inmuebles_lugares`
  ADD PRIMARY KEY (`cod_lugar`);

--
-- Indices de la tabla `metatags`
--
ALTER TABLE `metatags`
  ADD PRIMARY KEY (`cod_meta`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`cod_noticia`);

--
-- Indices de la tabla `noticias_categorias`
--
ALTER TABLE `noticias_categorias`
  ADD PRIMARY KEY (`cod_categoria`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indices de la tabla `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`cod_social`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `cod_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `cod_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `cod_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `cod_contacto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inmuebles`
--
ALTER TABLE `inmuebles`
  MODIFY `cod_inmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inmuebles_categorias`
--
ALTER TABLE `inmuebles_categorias`
  MODIFY `cod_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `inmuebles_distritos`
--
ALTER TABLE `inmuebles_distritos`
  MODIFY `cod_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `inmuebles_fotos`
--
ALTER TABLE `inmuebles_fotos`
  MODIFY `cod_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `inmuebles_lugares`
--
ALTER TABLE `inmuebles_lugares`
  MODIFY `cod_lugar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `metatags`
--
ALTER TABLE `metatags`
  MODIFY `cod_meta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `cod_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `noticias_categorias`
--
ALTER TABLE `noticias_categorias`
  MODIFY `cod_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `social`
--
ALTER TABLE `social`
  MODIFY `cod_social` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
