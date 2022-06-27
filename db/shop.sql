-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 27 2022 г., 16:37
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
  `product_id` int NOT NULL,
  `quantity` int UNSIGNED DEFAULT '1',
  `product_sum` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`, `quantity`, `product_sum`) VALUES
(313, '8emlr2nhkasv45hbba691ma5ubhjmlcb', 2, 1, 50),
(315, '8emlr2nhkasv45hbba691ma5ubhjmlcb', 3, 1, 40),
(316, 'mbsn95ltrnlsj0v5tbdiuhceoenp2ckl', 1, 2, 172),
(317, 'mbsn95ltrnlsj0v5tbdiuhceoenp2ckl', 2, 3, 150),
(318, 'mbsn95ltrnlsj0v5tbdiuhceoenp2ckl', 3, 1, 40),
(319, 'fp1g46mdq7445li68hh5ooaq7gci3j2k', 2, 2, 100),
(320, 'fp1g46mdq7445li68hh5ooaq7gci3j2k', 3, 2, 80),
(323, '9op2tkqgds55r58uv85ra7o6lkrv05rj', 1, 2, 172),
(324, '9op2tkqgds55r58uv85ra7o6lkrv05rj', 2, 1, 50),
(325, '9op2tkqgds55r58uv85ra7o6lkrv05rj', 3, 2, 80),
(326, 'l6o60udr1ft2tq6496roma650le619op', 1, 1, 86),
(327, 'l6o60udr1ft2tq6496roma650le619op', 2, 1, 50),
(328, 'uove47ec0ui04q86d9mpppimc5cg5ets', 1, 1, 86),
(329, 'uove47ec0ui04q86d9mpppimc5cg5ets', 2, 1, 50),
(330, 'n9fc6uvnehq2l92kq1lr5eg0ttt9udj7', 3, 1, 40),
(331, 'n9fc6uvnehq2l92kq1lr5eg0ttt9udj7', 2, 1, 50),
(332, 'n9fc6uvnehq2l92kq1lr5eg0ttt9udj7', 1, 1, 86),
(333, 'pt951th8oc7d5lv94fda8092leeebbdn', 1, 1, 86),
(334, 'pt951th8oc7d5lv94fda8092leeebbdn', 2, 2, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `session_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `firstName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `numberPhone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `city` varchar(100) NOT NULL,
  `sum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Заказ оформлен'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `login`, `firstName`, `email`, `numberPhone`, `city`, `sum`, `status`) VALUES
(80, '8emlr2nhkasv45hbba691ma5ubhjmlcb', 'userAnn', 'Анна', 'ann@mail.ru', '0987', 'Москва', '90', 'Заказ готов'),
(81, 'mbsn95ltrnlsj0v5tbdiuhceoenp2ckl', 'uigui', 'Петр', 'petr@yandex.ru', '000', 'MIOIhiohio', '362', 'Заказ собирается'),
(82, '9op2tkqgds55r58uv85ra7o6lkrv05rj', NULL, 'Ангелина', 'asas@lkl', '3686', 'Москва', '302', 'Заказ собирается'),
(85, 'n9fc6uvnehq2l92kq1lr5eg0ttt9udj7', 'userNew', 'Олег', 'qssqs@fbfs.ru', '3686', 'Волгоград', '176', 'Заказ оформлен'),
(86, 'clvh4kalvgcd522enuuvjuob3rl290d4', 'userAnn', 'Анна', 'ann@mail.ru', '0987', 'Москва', '0', 'Заказ оформлен');

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
(11, '11.jpg', 'Leather crossbody bag', 'Made from genuine Goat leather. This bag is hand crafted by artisans working with leather for decades. Push Button lock under main buckle for easy access.', 90);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `feedback` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `login` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `feedback`, `login`) VALUES
(33, 'Ann', 'It is very good', NULL),
(36, 'sds', 'Good ', NULL),
(37, 'Ангелина:', 'очень круто!!!! Надя Умничка!!!!!', NULL),
(38, 'Vladislav', 'Моя Надюша просто гений! люблю её!!!', NULL),
(40, 'Анна', 'Great selection of clothing items affordable prices for quality clothes', 'userAnn'),
(45, 'Надежда', '12332', 'admin'),
(52, 'Анна', 'Good', 'userAnn'),
(57, 'Анна', '123', 'userAnn');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `hash` varchar(255) NOT NULL,
  `numberPhone` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `hash`, `numberPhone`, `firstName`, `lastName`, `email`, `city`) VALUES
(1, 'admin', '123', '$2y$10$cNN5NpJoAyvxBixNvzLsJuXU4aFb1E5cKzV3aTMjnSqkJJfvzK8JK', NULL, 'Надежда', '', '', ''),
(17, 'user', '111', '$2y$10$ATQYBHokBoH/qQ9DDhf7wuTWWnzwiGF/4z1Vp7Lcphe/PrOLKlcBu', '55433', '', '', '', ''),
(18, 'userAnn', '000', '$2y$10$6JaMMCQvGmu5UOjXQbN25u8iXJTxkrS9uaLmchCQXD0PsVPBfJBPW', '0987', 'Анна', 'Иванова', 'ann@mail.ru', 'Москва'),
(19, 'uigui', '222', '$2y$10$p5G5L.9KeGDFRYEBYhB7J.W0jnuf.XJfyeqtQhy8xsGkCS18DpyLy', '000', 'Петр', 'Иванов', 'petr@yandex.ru', 'MIOIhiohio'),
(20, 'userNew', '123', '$2y$10$A3PR5SCUqLOIw241Ck9LTuQ.e.j/NqI/GgEQn.xa7FY1FyeLpzlTe', '3686', 'Олег', 'Иванов', 'qssqs@fbfs.ru', 'Волгоград');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
