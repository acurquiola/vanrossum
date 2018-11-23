-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2018 a las 13:36:26
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vanrossum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('usuario','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `tipo`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pablo', 'pablo', 'admin', NULL, '$2y$10$32UikcoSApn8G.MZH3vzTuT7qJk/xbLcCKzzLYePLlLzsE42ZYflq', NULL, NULL, NULL),
(2, 'Ana', 'ana', 'usuario', NULL, '$2y$10$lNfhH27UNHyaC1UOfm7V7.l9taZ1OvwlZ.gCW9hT9lnI9SaZwuZP.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `nombre`, `file`, `created_at`, `updated_at`) VALUES
(1, 'Códigos Postales', 'codigo_postal1.xlsx', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `orden`, `created_at`, `updated_at`) VALUES
(1, '¿Cómo comprar?', 'aa', NULL, NULL),
(2, 'Formas de Pago', 'bb', NULL, NULL),
(3, 'Envíos', 'cc', NULL, NULL),
(4, 'Información General', 'dd', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacions`
--

CREATE TABLE `clasificacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clasificacions`
--

INSERT INTO `clasificacions` (`id`, `nombre`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'Eventos', 'aa', NULL, NULL),
(2, 'Novedades', 'bb', NULL, NULL),
(3, 'Productos', 'cc', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

CREATE TABLE `codigos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ubicacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `envio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` enum('telefono','direccion','email','facebook','instagram','mapa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `tipo`, `descripcion`, `status`, `created_at`, `updated_at`) VALUES
(1, 'direccion', 'Av. Elcano 3979, Ciudad de Buenos Aires, Argentina', 1, NULL, NULL),
(2, 'telefono', '011-4554-5787', 1, NULL, NULL),
(3, 'email', 'info@distvr.com.ar', 1, NULL, NULL),
(4, 'facebook', 'https://es-la.facebook.com/pages/category/Shopping---Retail/Distribuidora-Van-Rossum-207160942655875/', 1, NULL, NULL),
(5, 'instagram', 'www.instagram.com', 1, NULL, NULL),
(6, 'mapa', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13139.400716057837!2d-58.4607169!3d-34.5826573!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xde541d8bf5fb116f!2sDistribuidora+Van+Rossum+S.R.L.!5e0!3m2!1ses!2sar!4v1541433383144\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `desde_id` int(10) UNSIGNED NOT NULL,
  `hasta_id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED NOT NULL,
  `descuento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(10) UNSIGNED NOT NULL,
  `mision` text COLLATE utf8mb4_unicode_ci,
  `vision` text COLLATE utf8mb4_unicode_ci,
  `valores` text COLLATE utf8mb4_unicode_ci,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `mision`, `vision`, `valores`, `file_image`, `created_at`, `updated_at`) VALUES
(1, 'Somos una empresa lider en asesoramiento, comercialización y distribución de productos químicos. \n							 	  Proveemos de insumos y productos de alta tecnología y calidad, seleccionando los mejores proveedores y ofreciendo a nuestros clientes bienestar al satisfacer sus necesidades a través de un excelente servicio, facilidades de crédito y precios competit', 'Expandir el liderazgo en la comercialización de productos del sector a nivel Nacional y con participación en mercados internacionales.', 'Contamos con un equipo humano comprometido con el mejoramiento continuo, trabajando en un ambiente organizacional positivo y proactivo, de alto rendimiento.', 'empresa__empresa.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.jpg',
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `familia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `nombre`, `file_image`, `orden`, `nivel`, `familia_id`, `created_at`, `updated_at`) VALUES
(1, 'Ninguna', NULL, 'aa', '0', 1, NULL, NULL),
(2, 'Esencia', 'familias__familia2.jpg', 'aa', '1', 1, NULL, NULL),
(3, 'Aceites', 'familias__familia3.jpg', 'bb', '1', 1, NULL, NULL),
(4, 'Esencias', 'familias__familia4.jpg', 'cc', '1', 1, NULL, NULL),
(5, 'Jabón', 'familias__familia5.jpg', 'dd', '1', 1, NULL, NULL),
(6, 'Productos Químicos', 'familias__familia6.jpg', 'ee', '1', 1, NULL, NULL),
(7, 'Insumos', 'familias__familia7.jpg', 'ff', '1', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `id` int(10) UNSIGNED NOT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.jpg',
  `producto_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacions`
--

CREATE TABLE `informacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `informacions`
--

INSERT INTO `informacions` (`id`, `nombre`, `orden`, `file_image`, `created_at`, `updated_at`) VALUES
(1, 'Esencia', 'aa', 'home__informacions1.png', NULL, NULL),
(2, 'Aceites', 'bb', 'home__informacions2.png', NULL, NULL),
(3, 'Jabones', 'cc', 'home__informacions3.png', NULL, NULL),
(4, 'Productos Químicos', 'dd', 'home__informacions4.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logos`
--

CREATE TABLE `logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ubicacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `logos`
--

INSERT INTO `logos` (`id`, `ubicacion`, `file_image`, `created_at`, `updated_at`) VALUES
(1, 'navbar', 'logos__logo-principal.png', NULL, NULL),
(2, 'footer', 'logos__logo-footer.png', NULL, NULL),
(3, 'favicon', 'logos__favicon.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metadatos`
--

CREATE TABLE `metadatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `seccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `metadatos`
--

INSERT INTO `metadatos` (`id`, `seccion`, `keyword`, `descripcion`, `url`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'Página principal', '/', NULL, NULL),
(2, 'Quiénes Somos', 'empresa', 'Descripción de la empresa', '/empresa', NULL, NULL),
(3, 'Productos', 'productos', 'Catálogo de Productos', '/productos', NULL, NULL),
(4, 'Novedades', 'novedades', 'Publicación de las novedades que brinda la empresa.', '/novedades', NULL, NULL),
(5, 'Destacados', 'productos destacados', 'Sección de productos destacados.', '/destacados', NULL, NULL),
(6, 'Carrito', 'carrito', 'Carrito de Compras', '/carrito', NULL, NULL),
(7, 'Contacto', 'contacto', 'Zona de contacto', '/contacto', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(431, '2014_10_12_000000_create_users_table', 1),
(432, '2014_10_12_100000_create_password_resets_table', 1),
(433, '2018_11_05_150618_create_datos_table', 1),
(434, '2018_11_05_150731_create_logos_table', 1),
(435, '2018_11_05_153326_create_metadatos_table', 1),
(436, '2018_11_05_172127_create_admins_table', 1),
(437, '2018_11_07_190826_create_empresas_table', 1),
(438, '2018_11_07_190856_create_sliders_table', 1),
(439, '2018_11_08_122335_create_familias_table', 1),
(440, '2018_11_08_143642_create_productos_table', 1),
(441, '2018_11_08_144436_create_unidads_table', 1),
(442, '2018_11_08_145108_create_presentacions_table', 1),
(443, '2018_11_08_145136_create_descuentos_table', 1),
(444, '2018_11_09_194054_create_categorias_table', 1),
(445, '2018_11_12_130020_create_preguntas_table', 1),
(446, '2018_11_12_134543_create_clasificacions_table', 1),
(447, '2018_11_12_134709_create_novedads_table', 1),
(448, '2018_11_12_182018_create_informacions_table', 1),
(449, '2018_11_13_184916_create_textos_table', 1),
(450, '2018_11_15_132358_create_archivos_table', 1),
(451, '2018_11_15_133207_create_codigos_table', 1),
(452, '2018_11_21_135553_create_galerias_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedads`
--

CREATE TABLE `novedads` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clasificacion_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `novedads`
--

INSERT INTO `novedads` (`id`, `titulo`, `file_image`, `texto`, `orden`, `clasificacion_id`, `created_at`, `updated_at`) VALUES
(1, 'Nuevos presentaciones de Aceite de Coco', 'novedades__novedad1.jpg', 'Somos una empresa lider en asesoramiento, comercialización y distribución de productos químicos. \n							 	  Proveemos de insumos y productos de alta tecnología y calidad, seleccionando los mejores proveedores y ofreciendo a nuestros clientes bienestar al satisfacer sus necesidades a través de un excelente servicio, facilidades de crédito y precios competit', 'aa', 1, NULL, NULL),
(2, 'Nuevos presentaciones de Aceite de Coco', 'novedades__novedad1.jpg', 'Somos una empresa lider en asesoramiento, comercialización y distribución de productos químicos. \n							 	  Proveemos de insumos y productos de alta tecnología y calidad, seleccionando los mejores proveedores y ofreciendo a nuestros clientes bienestar al satisfacer sus necesidades a través de un excelente servicio, facilidades de crédito y precios competit', 'bb', 2, NULL, NULL),
(3, 'Nuevos presentaciones de Aceite de Coco', 'novedades__novedad1.jpg', 'Somos una empresa lider en asesoramiento, comercialización y distribución de productos químicos. \n							 	  Proveemos de insumos y productos de alta tecnología y calidad, seleccionando los mejores proveedores y ofreciendo a nuestros clientes bienestar al satisfacer sus necesidades a través de un excelente servicio, facilidades de crédito y precios competit', 'cc', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(10) UNSIGNED NOT NULL,
  `pregunta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respuesta` text COLLATE utf8mb4_unicode_ci,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `respuesta`, `orden`, `categoria_id`, `created_at`, `updated_at`) VALUES
(1, '¿Ea magna ex anim adipisicing?', 'Ex esse ad dolore dolore elit aliquip adipisicing eiusmod id cillum do nulla dolore cupidatat officia ex deserunt aute ea dolor culpa irure proident culpa nulla aliquip nostrud enim in officia laboris ut occaecat.', 'aa', 1, NULL, NULL),
(2, '¿Ea magna ex anim adipisicing?', 'Ex esse ad dolore dolore elit aliquip adipisicing eiusmod id cillum do nulla dolore cupidatat officia ex deserunt aute ea dolor culpa irure proident culpa nulla aliquip nostrud enim in officia laboris ut occaecat.', 'bb', 2, NULL, NULL),
(3, '¿Ea magna ex anim adipisicing?', 'Ex esse ad dolore dolore elit aliquip adipisicing eiusmod id cillum do nulla dolore cupidatat officia ex deserunt aute ea dolor culpa irure proident culpa nulla aliquip nostrud enim in officia laboris ut occaecat.', 'cc', 1, NULL, NULL),
(4, '¿Ea magna ex anim adipisicing?', 'Ex esse ad dolore dolore elit aliquip adipisicing eiusmod id cillum do nulla dolore cupidatat officia ex deserunt aute ea dolor culpa irure proident culpa nulla aliquip nostrud enim in officia laboris ut occaecat.', 'dd', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacions`
--

CREATE TABLE `presentacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `cantidad` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unidad_id` int(10) UNSIGNED NOT NULL,
  `producto_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.jpg',
  `familia_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `orden`, `descripcion`, `file_image`, `familia_id`, `created_at`, `updated_at`) VALUES
(1, 'Aceite de Coco', 'PQ1501', 'aa', 'El aceite de coco es conocido por sus propiedades protectoras, hidratantes y purificantes. \n								 Puedes añadirlo en la formulación de cremas que nutran la piel. El aceite de coco para el pelo es uno de los productos más usados como aditivo para hacer champús, mascarillas o sérum.', 'productos__producto1.jpg', 2, NULL, NULL),
(2, 'Aceite de Almendras Puro', 'PQ1502', 'bb', 'El aceite de coco es conocido por sus propiedades protectoras, hidratantes y purificantes. \n								 Puedes añadirlo en la formulación de cremas que nutran la piel. El aceite de coco para el pelo es uno de los productos más usados como aditivo para hacer champús, mascarillas o sérum.', 'productos__producto2.jpg', 2, NULL, NULL),
(3, 'Aceite de Aloe Vera', 'PQ1503', 'cc', 'El aceite de coco es conocido por sus propiedades protectoras, hidratantes y purificantes. \n								 Puedes añadirlo en la formulación de cremas que nutran la piel. El aceite de coco para el pelo es uno de los productos más usados como aditivo para hacer champús, mascarillas o sérum.', 'productos__producto3.jpg', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'no-image.jpg',
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `file_image`, `titulo`, `descripcion`, `seccion`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'sliders__slider1.jpg', 'ALTA TECNOLOGÍA Y CALIDAD', 'Venta mayorista y minorista de insumos químicos', 'home', 'aa', NULL, NULL),
(2, 'sliders__slider2.jpg', '', '', 'empresa', 'aa', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `textos`
--

CREATE TABLE `textos` (
  `id` int(10) UNSIGNED NOT NULL,
  `home_titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_subtitulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `textos`
--

INSERT INTO `textos` (`id`, `home_titulo`, `home_subtitulo`, `created_at`, `updated_at`) VALUES
(1, 'Descubrí Van Rossum', 'Empresa líder en el rubro', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidads`
--

CREATE TABLE `unidads` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `unidads`
--

INSERT INTO `unidads` (`id`, `nombre`, `abreviacion`, `created_at`, `updated_at`) VALUES
(1, 'Kilogramo', 'Kg', NULL, NULL),
(2, 'Litro', 'L', NULL, NULL),
(3, 'Centímetro Cúbico', 'cm3', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cliente', 'cliente', NULL, '$2y$10$FfwKuA/zTdtyNUbH/DobveShL5a0M5P6.Yd796WUhuXiCiNwMAK7C', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clasificacions`
--
ALTER TABLE `clasificacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `descuentos_desde_id_foreign` (`desde_id`),
  ADD KEY `descuentos_hasta_id_foreign` (`hasta_id`),
  ADD KEY `descuentos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `familias_familia_id_foreign` (`familia_id`);

--
-- Indices de la tabla `galerias`
--
ALTER TABLE `galerias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galerias_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `informacions`
--
ALTER TABLE `informacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metadatos`
--
ALTER TABLE `metadatos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedads`
--
ALTER TABLE `novedads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novedads_clasificacion_id_foreign` (`clasificacion_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_username_index` (`username`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preguntas_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `presentacions`
--
ALTER TABLE `presentacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presentacions_unidad_id_foreign` (`unidad_id`),
  ADD KEY `presentacions_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_familia_id_foreign` (`familia_id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `textos`
--
ALTER TABLE `textos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidads`
--
ALTER TABLE `unidads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clasificacions`
--
ALTER TABLE `clasificacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informacions`
--
ALTER TABLE `informacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `metadatos`
--
ALTER TABLE `metadatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=453;

--
-- AUTO_INCREMENT de la tabla `novedads`
--
ALTER TABLE `novedads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `presentacions`
--
ALTER TABLE `presentacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `textos`
--
ALTER TABLE `textos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `unidads`
--
ALTER TABLE `unidads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD CONSTRAINT `descuentos_desde_id_foreign` FOREIGN KEY (`desde_id`) REFERENCES `presentacions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `descuentos_hasta_id_foreign` FOREIGN KEY (`hasta_id`) REFERENCES `presentacions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `descuentos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `familias`
--
ALTER TABLE `familias`
  ADD CONSTRAINT `familias_familia_id_foreign` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `galerias`
--
ALTER TABLE `galerias`
  ADD CONSTRAINT `galerias_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `novedads`
--
ALTER TABLE `novedads`
  ADD CONSTRAINT `novedads_clasificacion_id_foreign` FOREIGN KEY (`clasificacion_id`) REFERENCES `clasificacions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `presentacions`
--
ALTER TABLE `presentacions`
  ADD CONSTRAINT `presentacions_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `presentacions_unidad_id_foreign` FOREIGN KEY (`unidad_id`) REFERENCES `unidads` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_familia_id_foreign` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
