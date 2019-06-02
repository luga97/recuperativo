-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2017 at 04:26 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

CREATE DATABASE IF NOT EXISTS recuperativo;

use recuperativo;


-- --------------------------------------------------------

--
-- estructura de la tabla`categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Estructura para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=latin1;



--
-- Estructura de la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Añadiendo claves primarias
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Datos iniciales para `categories`
--

INSERT INTO `categories` (`name`,`created_at`) VALUES
('Arte Moderno', NOW()),
('cultura urbana', NOW()),
('heavy metal de los 90s', NOW()),
('Lugares exoticos', NOW()),
('Piezas de artesanias', NOW());


--
-- Datos de la tabla post `posts`
--

INSERT INTO `posts` (`category_id`, `user_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(1, 1, 'Arte Moderno', 'Arte-Moderno', '<p>Arte moderno es un término propio de distintos ámbitos del mundo del arte, que pretende diferenciar una parte de la producción artística, que se identificaría con un determinado concepto de modernidad por oposición al denominado arte académico.</p>\r\n', 'modern-art.jpeg', NOW()),
(2, 1, 'Cultura urbana', 'Cultura-Urbana', '<p>La cultura urbana es la cultura de los pueblos y ciudades. El tema definitorio es la presencia de un gran número de personas muy diferentes en un espacio muy limitado, la mayoría de ellas son desconocidas entre sí.</p>\r\n', 'urban-culture.jpeg', NOW()),
(3, 1, 'Metal De los 90s', 'heavy-metal', '<p>La llegada de los noventa renovó en gran medida la denominada época dorada del heavy metal. Por un lado el glam metal comenzó a perder popularidad en los principales mercados del mundo ante el nacimiento del grunge, liderado por bandas como Nirvana, Alice in Chains , Pearl Jam y Soundgarden. Esta nueva ola de grupos estaban influenciadas por el heavy metal, pero rechazaban los excesos de muchas agrupaciones de los ochenta, como la imagen ostentosa y los virtuosos solos de guitarra.​ Además, la incursión del thrash en las listas musicales y la eclosión del llamado groove metal fueron puntos importantes de esta renovación musical.</p>\r\n', 'cassete.jpeg', NOW()),
(4, 1, 'La Avenida de los Baobabs', 'exotic-place-1', '<p>La Avenida de los Baobabs, o Callejón de los Baobabs, es un grupo prominente de baobabs de Grandidier que bordean el camino de tierra entre Morondava y Beloni Tsiribihina en la región de Menabe, en el oeste de Madagascar.</p>\r\n', 'baobabs.jpg', NOW()),
(5, 1, 'Artesania de margarita', 'artesania-margarita', '<p>El intenso mestizaje que existe en el estado Nueva esparta de su densa población no ha permitido que sus manifestaciones sociales y populares sean adulteradas por influencias foráneas y, por tanto, se conservan con una tradición de autenticidad y pureza, difícil de conseguir en otros lugares. <br> En diferentes regiones del estado se elaboran trabajos artesanales propios desde sus aborígenes, de la herencia de la culturas de los precolombinos, y de artesanos que llegaron a la isla procedentes de España (durante el tercer viaje de Cristóbal Colon). <br> A pesar de que la practica de elaborar ésta artesanía autóctona, ha ido reduciendo a lo largo del tiempo; hoy en día al pasear por sus pueblos podemos ver y disfrutar de este "producto" que nos identifica.</p>\r\n', 'artesania.jpg', NOW())
;


--
-- datos para la tabla `users`
--

INSERT INTO `users` (`name`, `email`, `username`, `password`) VALUES
('Administrador', 'admin@blog.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

