-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2021 a las 21:23:21
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electrocom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_modelo` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `puntaje` int(11) NOT NULL,
  `punteados` int(11) NOT NULL,
  `nombre_usuario` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_usuario`, `id_modelo`, `contenido`, `puntaje`, `punteados`, `nombre_usuario`) VALUES
(117, 15, 7, 'Comfortable enough.. not more.. not less..', 3, 0, 'Kratos'),
(120, 17, 7, 'The best experience, good bass.. i\'d rather them on white but are great anyway', 4, 0, 'Magnolia'),
(121, 17, 9, 'Sound quality could be improved', 3, 0, 'Magnolia'),
(122, 17, 12, 'Works great for my new headphones', 5, 0, 'Magnolia'),
(123, 18, 13, 'The 16GB RAM version is as powerful as I expected!', 5, 0, 'Felipe'),
(124, 18, 5, 'Though the audio is neat, the battery really needs to last longer', 2, 0, 'Felipe'),
(125, 18, 7, 'Cool for its price.. recomended for gamers ;)', 4, 0, 'Felipe'),
(126, 7, 5, 'Tested. The model will improve in its next release', 3, 0, 'iamroot'),
(128, 7, 12, 'Personal opinion: incredibly durable for multiple devices. If you have a smartwatch, this is a need', 4, 0, 'iamroot'),
(129, 7, 14, 'Brand new in the market, remarcable performance', 4, 0, 'iamroot');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_m` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `id_producto`, `nombre_m`, `descripcion`, `foto`) VALUES
(5, 7, 'Mi Sports Bluetooth Earphones Youth Edition', 'Estos auriculares tienen Buetooth 4.1 y una batería de 120 mAh que otorga un total de 9 horas de uso. La experiencia auditiva siempre es mejor si tenemos un controlador para ello y, como no podía ser de otra forma, los Youth Edition cuentan con uno de tres botones claro y sencillo. Con solo un peso de 13.6 gramos se convierten en la generación más ligera. Todo ello unido a su bajo coste y su comodidad hacen de estos auriculares, quizá, los más interesantes de la familia.', 'mi-sports-bluetooth-earphones-300x300.jpg'),
(7, 7, 'Mi Bluetooth Foldable Headset', 'Los Xiaomi Mi Bluetooth Headphones  son unos auriculares que ofrecen un gran aislamiento acústico gracias a su sonido envolvente, sin que ello signifique renunciar a un elegante diseño y su confort. Se cargan a través de un puerto Micro USB (dos horas y media de carga completa, suficiente para 10 horas según Xiaomi) y su peso es de apenas 230 gramos. En el exterior del altavoz izquierdo hay un panel de control que funciona por tacto y, a menos que lo miremos en detalle, se mimetiza con el diseño. Desde allí se puede pausar la música responder llamadas o activar el micrófono. También se pueden adelantar o retroceder pistas si estamos escuchando música. Cuidado de todos modos: el panel puede resultar un poco sensible y a veces apurarnos a repetir la orden crea confusión en el sistema y en lugar de pausar la canción, por ejemplo, pasa a la siguiente pista. Para , subir o bajar el volumen hay dos teclas en la parte inferior del mismo altavoz izquierdo.', 'mi-bluetooth-foldable-headset-5-300x300.jpg'),
(9, 7, 'Mi Dual Driver Earphones (minijack)', 'Siguiendo en la línea de productos magníficos en lo que a relación calidad/precio se refiere, Xiaomi vuelve con los Mi Dual Driver Earphones (minijack), unos auriculares que proporcionan un sonido excelente gracias a la tecnología «Hi-Res Audio» que incorpora en su interior. Su construcción metálica proporciona muy buenas sensaciones de uso y una gran elegancia. A lo largo del recorrido de su cable, encontraremos el panel de control que nos permitirá reproducir/pausar música, subir/bajar volumen y contestar/colgar llamadas. Con una longitud de 1.25 metros será suficiente para guardar nuestro dispositivo en el bolsillo o bolso y enfundarnos los auriculares cómodamente. Estos auriculares firmados por Xiaomi optan la tecnología de sonido estéreo y un sistema dual de creación de sonido que funciona mediante una bovina de graves dinámica y un altavoz de cerámica para sonidos de alta frecuencia. Sin duda, una característica que sitúa a estos auriculares varios escalones por encima de los de 5-10 euros.', 'mi-dual-driver-earphones-minijack-300x300.jpeg'),
(10, 9, 'Mi 10000mAh Power Bank (Wireless) Youth Edition', 'Se trata de una powerbank o batería externa que admite carga inalámbrica y cableada. Admite hasta 10W en carga inalámbrica y 18W en su salida USB-A. Su interfaz de carga es USB-C con una potencia máxima de entrada de 18w, acortando así los tiempos de carga (4 horas para alcanzar la carga completa). Mencionar que es compatible con el estandar inalámbrico Qi. Su capacidad es de 10000 mAh, entre dos y cuatro cargas de smartphone en función de la capacidad del dispositivo. Algo importante es que permite utilizar la carga inalámbrica de forma simultánea a la cableada sin pérdidas en la velocidad de carga de ninguno de los dos dispositivos. En cuanto al diseño, Xiaomi sigue fiel a su estilo minimalista, de líneas suaves. Pesa 230gr y está disponible en 2 colores, blanco y negro.', 'Mi-10000mAh-Power-Bank-Wireless-Youth-Edition-300x300.jpg'),
(12, 9, 'Mi 10000mAh Power Bank (Wireless)', 'La Mi 10000mAh Mi Power Bank (Wireless) es la batería portátil inalámbrica de Xiaomi. Si diseño mantiene la línea de todos los productos del gigante chino, es decir, un diseño liso, con bordes redondeados con un acabado mate para otorgar la mayor elegancia posible. Tiene una capacidad de 10.000 mAh y está disponible tan solo en color negro. Con ella podremos cargar hasta tres dispositivos al mismo tiempo gracias a sus dos puertos de salida.', 'mi-10000mah-mi-power-bank-wireless-300x300.jpg'),
(13, 10, 'Mi Gaming Notebook (2019)', 'Xiaomi ha venido para quedarse en muchos mercados, pero sin duda uno en los que más proyección internacional está teniendo es el de los portátiles y teléfonos. En este caso vamos a analizar un portátil potente y ligero, con la firma del diseño minimalista en sus entrañas. Se trata del Mi Gaming Notebook del año 2019. De forma predeterminada, se encuentran tres configuraciones disponibles. Dos de ellas incluyen un procesador Intel Core i7 de novena generación (i7-9750H), mientras que el fabricante ha incorporado a la línea de portátiles una opción más recortada con un Intel Core i5 de novena generación (i5-9300H). Para más información sobre qué significan estos símbolos y palabras extrañas, se recomienda visitar el Top de ordenadores portátiles Xiaomi que puedes encontrar en Xiaomipedia.  Las dos versiones más potentes se diferencian en la tarjeta gráfica, incluyendo el más potente la NVIDIA GeForce RTXTM 2060 (6 GB DDR6 dedicados) y la versión intermedia una tarjeta NVIDIA GeForce GTX 1660 Ti (6 GB DDR6 dedicados). Las que incluyen los procesadores más potentes vienen con 16 GB de RAM (en dos unidades de 8 GB), mientras que la versión más recortada incluye la mitad. Todas ellas con tecnología DDR4 de 2666 MHz.', 'mi-gaming-notebook-2019-300x274.jpg'),
(14, 10, 'Mi Notebook Ruby', 'El Mi NoteBook Ruby es un ordenador portátil más de la familia Xiaomi que incorpora una pantalla Full HD de 15.6 pulgadas (178 º de ángulos de visión) y se ejecuta en la décima versión de Windows con un procesador Intel Core i7-8550U Quad-Core que convierte la velocidad en algo habitual. Tendremos una única versión de 8 GB de RAM y 512 GB de almacenamiento SSD, incorporando además una cámara de 1 Mpx. Existen versiones menos potentes con procesadores i5 de octava generación, con más o menos RAM (tiene dos huecos) y con más o menos capacidad de disco sólido o incluso mecánico (se recomienda la versión con doble disco en este caso, pero siempre será mejor un disco sólido que uno mecánico). Respecto al sonido, incluye 2 altavoces de 3 W cada uno. La pantalla tiene un ángulo máximo de apertura de 135 º y pesa 2.18 kg con la batería puesta. Sus dimensiones son 38.2 x 25.3 x 1.99 cm. A día de hoy (octubre de 2019) se encuentra con la distribución americana del teclado, esto es, sin la tecla Ñ.', 'mi-notebook-ruby-300x300.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `items` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `items`) VALUES
(7, 'Auriculares', 1),
(9, 'Powerbanks', 0),
(10, 'Notebooks', 0),
(15, 'Smartphones', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `edad` tinyint(3) NOT NULL,
  `contraseña` tinytext NOT NULL,
  `es_administrador` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `edad`, `contraseña`, `es_administrador`) VALUES
(7, 'iamroot', 'soyel@dmin.com', 1, '$2y$10$bPmz9mI.9QQE//mChun5puXgMKJKd2tIn8UwmYl245fCaYenWCH4.', 1),
(15, 'Kratos', 'god@war.com', 127, '$2y$10$jf9OGxRXgDApFY1wbqUWRenQ43TfkXKT53PZ8oF5diMQrC3.XEysG', 0),
(17, 'Magnolia', 'magnoli@gmail.com', 30, '$2y$10$aNj7HeMluiJcDh0FafVSseDkoD7ruSza.tRutueF/UTkgYGCJjr/y', 0),
(18, 'Felipe', 'feli14@gmail.com', 23, '$2y$10$cZYYt0Bk1p61UuX0HEs9nePP.c.d7w8lkFq7U2MtNf1KLqg7N5wgy', 0),
(20, 'Ralph', 'r4l@gmail.com', 46, '$2y$10$FQYzyQ11VMv9VASQldV5nuMmOaEG0dAQXiefosolPPIoudRAdAmcm', 0),
(21, 'Hermione', 'hg@howrds', 15, '$2y$10$jp7cUv.NPZjSsyBUaYi6IultwNDkYPuKQGdfcrd8VAAkxAKFrYE12', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_modelo` (`id_modelo`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
