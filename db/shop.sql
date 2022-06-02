-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2022 г., 16:36
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int UNSIGNED NOT NULL,
  `session_id` text NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`) VALUES
(176, '0a6m56tvofkl85nme4gu00ej8t021o6g', 1),
(177, '0a6m56tvofkl85nme4gu00ej8t021o6g', 2),
(178, 'gp27sv8278suesscn2d1acpd1o8pijmi', 2),
(179, 'gp27sv8278suesscn2d1acpd1o8pijmi', 2),
(181, '91erlgedmt5sipcq8arraleldkuf8s2t', 1),
(182, '91erlgedmt5sipcq8arraleldkuf8s2t', 2),
(184, 'g3g8nka8uhd3t5fek3nndj7m02hmvnhl', 1),
(185, 'g3g8nka8uhd3t5fek3nndj7m02hmvnhl', 2),
(188, 'msbtp9lqd7ikjscnmsa8aq04htrsgg4v', 2),
(189, 'rn2bjsvd6j3bp6as8p4bful7gole2p80', 1),
(190, 'rn2bjsvd6j3bp6as8p4bful7gole2p80', 2),
(191, 'rn2bjsvd6j3bp6as8p4bful7gole2p80', 3),
(192, 'un3nci82nf7r5d8i5daebi6c23dsj4dh', 4),
(193, 'un3nci82nf7r5d8i5daebi6c23dsj4dh', 3),
(194, 'krr9rf477bkrk26mk87qojrsf0ahhkrm', 6),
(195, 'krr9rf477bkrk26mk87qojrsf0ahhkrm', 5),
(196, 'fon8u758etoqohb1iglvq4h5mbimt82r', 1),
(197, 'fon8u758etoqohb1iglvq4h5mbimt82r', 2),
(198, 'p3bqou6vdeluij71lu5n97q5cphdqorr', 2),
(199, 'p3bqou6vdeluij71lu5n97q5cphdqorr', 1),
(200, 'ekk90tmhjh25qdl949fbs8c0t8bvkvtl', 1),
(201, 'fqm8vc56cv3r6s8ierf7srk02a14ne5k', 2),
(202, 'fqm8vc56cv3r6s8ierf7srk02a14ne5k', 1),
(203, 'keffmbd94m5sn1bugh74rgse0g9s3pp4', 2),
(204, 'keffmbd94m5sn1bugh74rgse0g9s3pp4', 1),
(205, 'bf81ser5ldkjkpatpl1cvb34jq4fvke1', 1),
(206, 'bf81ser5ldkjkpatpl1cvb34jq4fvke1', 2),
(207, 'i90abjr85510dbhrjk59avb9d6sj7pdp', 3),
(208, 'i90abjr85510dbhrjk59avb9d6sj7pdp', 4),
(209, 'i90abjr85510dbhrjk59avb9d6sj7pdp', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `session_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `numberPhone` varchar(255) NOT NULL,
  `sum` varchar(255) NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Заказ оформлен'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `numberPhone`, `sum`, `status`) VALUES
(42, 'msbtp9lqd7ikjscnmsa8aq04htrsgg4v', '55433', '50', 'Заказ готов'),
(43, 'rn2bjsvd6j3bp6as8p4bful7gole2p80', '123456', '176', 'новый заказ'),
(44, 'un3nci82nf7r5d8i5daebi6c23dsj4dh', '0987', '58', 'Заказ собирается'),
(45, 'krr9rf477bkrk26mk87qojrsf0ahhkrm', '111', '50', 'новый заказ'),
(46, 'fon8u758etoqohb1iglvq4h5mbimt82r', '111', '136', 'новый заказ'),
(47, 'p3bqou6vdeluij71lu5n97q5cphdqorr', '000', '136', 'новый заказ'),
(48, 'ekk90tmhjh25qdl949fbs8c0t8bvkvtl', '000', '86', 'новый заказ'),
(49, 'fqm8vc56cv3r6s8ierf7srk02a14ne5k', '111', '136', 'Заказ оформлен'),
(50, 'keffmbd94m5sn1bugh74rgse0g9s3pp4', '111', '136', 'Заказ оформлен'),
(51, 'msbtp9lqd7ikjscnmsa8aq04htrsgg4v', '55433', '50', 'Заказ оформлен'),
(63, 'bf81ser5ldkjkpatpl1cvb34jq4fvke1', '55433', '136', 'Заказ оформлен'),
(64, 'i90abjr85510dbhrjk59avb9d6sj7pdp', '000', '78', 'Заказ оформлен');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `image`, `title`, `description`, `price`) VALUES
(1, '01.jpg', 'Men fashion gray shoes', 'Often confused with the Oxford, the Derby is a close shoe relative, but not the same type of men’s shoe. Rather than having a closed lacing system like the Oxford, the Derby sports an open lacing system with the flaps being sewn under the vamp and not connected at front of the shoe. This style of stitching makes the flaps capable of movement and when laced the shoe looks as if it’s broken up into segments (top, side, back, etc.) Originally a sporting shoe, the Derby was used in more relaxed environments like hunting. Although a Derby could be worn in formal settings, it is more casual than an Oxford and could arguably make for a more comfortable, functional fit.', 86),
(2, '02.jpg', 'Shirt with insertion lace trims', 'The nice shirt to wear with jeans.\r\nCrafted in a boxy shape, the Rose is designed with lace inserts, shoulder pleats and branded buttons down the front. The finer details of this shirt are completed with lace trims on the collar and sleeves. Pure understated elegance!\r\nWear to a late brunch or dinner date.', 50),
(3, '03.jpg', 'Mid-rise slim cropped fit jeans', 'Cropped just above the ankle, these jeans sit between the waist and hips the waist for a flattering wear. An everyday hero, style with a T-shirt and blazer to elevate your off-duty look.', 40),
(4, '04.jpg', 'Black and white sport cap', 'A lightweight stretch cap with 5 panel construction designed to be worn on and off the water. Featuring a durable and fast drying outer fabric and laser cut holes for added ventilation. Easily adjustable to fit your head size, keeping you comfortable and sun protected all day long.', 18),
(5, '05.jpg', 'Green baby romper', 'Summer Newborn Baby Girls Rompers Set Flare Sleeve Solid Print Lace Design Bodysuit Jumpsuit With Headband for 0-24 Months (Green). 3+ day shipping.', 20),
(6, '06.jpg', 'Red dangle earrings', 'Check out our red drop earrings selection for the very best in unique or custom, handmade pieces from our dangle & drop earrings shops.', 30),
(7, '07.jpg', 'Chrono watch ', 'Chronographs keep time in the same as any other watch, building tension on a mainspring that slowly releases to move the gears and keep time.', 120),
(8, '08.jpg', 'Baby shoes with laces', 'Check out our lace baby shoes selection for the very best in unique or custom, handmade pieces from our shoes shops.', 30),
(9, '09.jpg', 'Basic hooded sweatshirt in pink', 'Id habitant tempor aliquam vulputate enim velit tincidunt sed. Urna sed facilisis nulla feugiat amet venenatis. Id suspendisse ut quis tellus aliquam pellentesque neque, semper donec.', 16),
(10, '10.jpg', 'Skinny push-up jeans', 'The skinny push up jeans and the slim push up jeans are made for you. They will lengthen your shape and raise your buttocks. Choose high-waisted slim or skinny push-up jeans if you have a thin waist or an hourglass shape.', 40),
(11, '11.jpg', 'Leather crossbody bag', 'Made from genuine Goat leather. This bag is hand crafted by artisans working with leather for decades. Push Button lock under main buckle for easy access.', 90),
(50, '26.jpg', 'Пицца', 'Описание', 125),
(52, '27.jpg', 'батон', 'описание', 40);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `feedback`) VALUES
(1, 'Anna', 'Great quality clothes, staff very polite and always ready to help!'),
(2, 'Mary', '\r\nExcellent service! Quality items at very affordable prices attractive prices. can always be found for\r\nsomething interesting and original!'),
(3, 'Olga', ' Excellent service and product quality on the highest level!'),
(4, 'Alex', 'Good '),
(5, 'Dmitry', 'Very good!'),
(6, 'Vlad', 'Great selection of clothing items affordable prices for quality clothes'),
(26, 'Kostya', 'beautig');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`) VALUES
(1, 'admin', '123', '$2y$10$VyxxhNTNLIDYlnHkrE1GrumVEuZRAvTKS5wtCM9P5m5mYe9mcrKIC');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image` (`image`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
