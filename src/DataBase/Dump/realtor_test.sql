-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2022 г., 18:39
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `realtor_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `confirms_emails`
--

CREATE TABLE `confirms_emails` (
  `id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `confirms_emails`
--

INSERT INTO `confirms_emails` (`id`, `token`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'b6b99f3b34528e0b62ebc548c3bf5689213ca7542b82d03cf25c8f5e2738120e', 1, 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52');

-- --------------------------------------------------------

--
-- Структура таблицы `houses`
--

CREATE TABLE `houses` (
  `id` int NOT NULL,
  `price` int NOT NULL,
  `description` varchar(4048) NOT NULL,
  `rooms` int NOT NULL,
  `adress` varchar(255) NOT NULL,
  `square` int NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `type_id` int NOT NULL,
  `status_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `houses`
--

INSERT INTO `houses` (`id`, `price`, `description`, `rooms`, `adress`, `square`, `is_new`, `type_id`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2500000, '<p>Квартира светлая, чистая и очень теплая, готова к заселению. В санузле необходим косметический ремонт.\r\n                Очень хороший дом, в подъезде всегда чисто. Спокойные и приветливые соседи.</p>\r\n                <p>В шаговой доступности:</p>\r\n                <ul>\r\n                    <li>Фитнес клуб</li>\r\n                    <li>Детский сад №47</li>\r\n                    <li>Салоны красоты</li>\r\n                    <li>Остановки общественного транспорта</li>\r\n                    <li>Продуктовые магазины</li>\r\n                    <li>Сетевые магазины</li>\r\n                    <li>Аптечные пункты</li>\r\n                </ul>', 3, 'ул. Горького, д. 3', 25, 1, 1, 3, 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(2, 3500000, '<p>Предлагаем Вашему вниманию отличную трёхкратную квартиру, в Ленинском районе! \r\n                В квартире выровнены стены и потолок, заменена проводка, ванна в кафеле, на полу линолеум. \r\n                Комнаты все раздельные, большой квадратный коридор. \r\n                Показ в удобное для Вас время, звоните записывайтесь на просмотр!</p>\r\n                ', 3, 'ул. Гончаренко, д. 85', 56, 1, 1, 1, 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(3, 2000000, '<p>Предлагается к продаже полноценная 3-х комнатная квартира 97 серии .</p>\r\n\r\n                <p>В квартире выполнена качественная предчистовая отделка . Заменены все трубы , сделана электро разводка , поставлены евроокна.</p>\r\n                \r\n                <p>Дом находиться в близи :</p>\r\n                \r\n                <p>Д/с 329, 390, 350</p>\r\n                \r\n                <p>СОШ 45 , гимназия 26.</p>\r\n                \r\n                <p>Развитая инфраструктура .</p>\r\n                \r\n                <p> По всем интересующим вопросам звоните !</p>\r\n                \r\n                <p>Без долгов и обременений !</p>\r\n                \r\n                <p>Показ в удобное для вас время !</p>\r\n                ', 3, 'ул. Пионерская , д. 11А', 40, 1, 1, 1, 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(4, 5000000, '<p>Не упустите возможность посмотреть уютную с качественным ремонтом 3 комнатную квартиру, которая уже ждет себе новых жильцов! Возможно, эта именно та квартира, которую Вы искали , расположена в капитальном малоэтажном сталинском доме в самом центре Тракторозаводского района рядом с ТРК Горки.\r\n                Особенность конструкций сталинских домов очень - надежность , наружные и несущие внутренние стены очень толстые около 90 см., благодаря чему в таких квартирах отличная шумоизоляция и теплоизоляция, зимой тепло, летом прохладно, высота потолков 3,2 метров . На протяжении многих лет такие дома считались эталоном качества и относились к категории элитного жилья. Срок службы для \"сталинок\" послевоенного периода норматив на время сноса составляет минимум 150 лет. Тишина и долговечность Вашего дома Вам обеспечены! Но! при этом Вы имеете возможность жить в центре города.\r\n                Квартира имеет безупречную планировку, 3 большие светлые комнаты, в каждой наличие балкона , изюминка квартиры: ванная комната с окном, просторная прихожая, качественный ремонт в комнатах. Окна квартиры выходят на обе стороны поэтому солнечно в течение всего светового дня, с балконов с открывается прекрасный вид на центр города, а с другой стороны на двор, утопающий в зелени и оборудованную детскую и спортивную площадку\r\n                Прекрасная инфраструктура: в ста метрах остановки общественного транспорта автобуса, троллейбуса и трамвая, в шаговой доступности популярный ТРК Горки, в шаговой доступности сетевые магазины, и в нескольких остановках ТК Алмаз, ТК Башня\". Большое количество престижных образовательных учреждений: гимназия №48 с углубленным изучением французского языка, Южноуральский Гос.Университет, школа №52, детские сады. Любимым местом отдыха горожан является, расположенный через дорогу, детский парк им. Терешковой.\r\n                С удовольствием познакомлю с квартирой в любые удобные дни по предварительной записи. Рассмотрим любые формы расчета (наличный, ипотека, государственные сертификаты) Гарантируем юридическую чистоту и безопасность сделки, при необходимости поможем бесплатно с ипотекой. Торг возможен.</p>\r\n                ', 3, 'ул. Пионерская , д. 14', 80, 1, 1, 1, 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(5, 3000000, '<p>Большая светлая квартира с хорошим ремонтом. Окна выходят во двор (в кухне-гостиной на северо-восток, в спальнях на юго-запад).</p>\r\n                <p>* По всей квартире уложен ламинат</p>\r\n                <p>* Натяжные потолки</p>\r\n                <p>*Стены оклеены светлыми обоями</p>\r\n                <p>* Широкий функциональный коридор, в прихожей сделана вместительная гардеробная. Присутствует тёплый пол.</p>\r\n                <p>*Санузел раздельный (в ванной комнате теплый пол)</p>\r\n                <p>*Балкон застеклен (с выходом из гостиной)</p>\r\n                ', 3, 'ул. Новосельская , д. 25', 76, 1, 1, 1, 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(6, 4000000, '<p>Благодаря монолитно-каркасной конструкции дома, по согласованию с надзорными органами, в квартире можно безопасно выполнять перепланировку.</p>\r\n\r\n                <p>Белый хутор расположен у берегов Шершневского водохранилища в объятьях живописной природы. Преобладающая роза ветров – юго-западная, со стороны Уральских гор. Приезжаешь в Белый хутор и словно ныряешь в необъятный воздух. Расположение микрорайона гармонично сочетает тишину загородной жизни и близость к мегаполису – ехать до центра Челябинска всего 20-25 минут.</p>\r\n                \r\n                <p>При этом жителям Белого хутора нет нужды покидать микрорайон – всё самое необходимое уже есть буквально за порогом: муниципальный детский сад и офис врача общей практики, супермаркет, аптека, офис управляющей компании и паспортный стол, студия фитнеса.</p>\r\n                \r\n                <p>До Белого хутора идет полностью асфальтированная дорога. Добираться из города Челябинска удобнее всего на маршрутном такси №136 (идет через Центр и Северо-Запад) и личном автомобиле. Также в микрорайон связан межмуниципальным маршрутом № 158, который объединяет поселки Вавиловец, Тарасовка, Шершни и Западный.</p>\r\n                ', 2, 'ул. Светлая, д. 2', 84, 1, 1, 1, 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(7, 30000, '<p>Отличная квартира для жилья, в хорошем районе, новом доме</p>', 6, 'ул. Ленина, д. 3', 205, 1, 1, 2, 1, '2022-06-13 15:36:29', '2022-06-13 15:36:29');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `path` varchar(255) NOT NULL,
  `house_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `path`, `house_id`, `created_at`, `updated_at`) VALUES
(1, 'picture1.jpg', 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(2, 'picture2.jpg', 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(3, 'picture3.jpg', 1, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(4, 'picture4.jpg', 2, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(5, 'picture5.jpg', 2, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(6, 'picture6.jpg', 2, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(7, 'picture7.jpg', 3, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(8, 'picture8.jpg', 3, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(9, 'picture9.jpg', 4, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(10, 'picture10.jpg', 4, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(11, 'picture11.jpg', 5, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(12, 'picture12.jpg', 5, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(13, 'picture13.jpg', 6, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(14, 'picture14.jpg', 6, '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(15, '128924387picture2.jpg', 7, '2022-06-13 15:36:29', '2022-06-13 15:36:29'),
(16, '1402473327picture10.jpg', 7, '2022-06-13 15:36:29', '2022-06-13 15:36:29');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `house_id` int NOT NULL,
  `manager_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '4',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `house_id`, `manager_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 4, '2022-03-02 07:56:58', '2022-03-02 07:56:58'),
(2, 1, 1, 1, 5, '2022-03-02 08:24:18', '2022-03-02 08:24:18'),
(3, 1, 1, 1, 6, '2022-03-02 08:24:26', '2022-03-02 08:24:26'),
(4, 1, 5, 1, 5, '2022-03-02 08:36:07', '2022-03-02 08:36:07'),
(5, 1, 2, 1, 6, '2022-06-13 15:32:27', '2022-06-13 15:32:27');

-- --------------------------------------------------------

--
-- Структура таблицы `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20220102042616, 'AppMigrationsCreateRolesTable', '2022-03-02 05:43:04', '2022-03-02 05:43:05', 0),
(20220122053129, 'AppMigrationsCreateTableUsers', '2022-03-02 05:43:05', '2022-03-02 05:43:07', 0),
(20220122054119, 'AppMigrationsCreateTableUsersRememberTokens', '2022-03-02 05:43:07', '2022-03-02 05:43:08', 0),
(20220127152042, 'AppMigrationsCreateTableTypes', '2022-03-02 05:43:08', '2022-03-02 05:43:09', 0),
(20220127152115, 'AppMigrationsCreateTableStatuses', '2022-03-02 05:43:09', '2022-03-02 05:43:09', 0),
(20220127161639, 'AppMigrationsCreateTableHouses', '2022-03-02 05:43:09', '2022-03-02 05:43:10', 0),
(20220128155557, 'AppMigrationsCreateTableImages', '2022-03-02 05:43:10', '2022-03-02 05:43:12', 0),
(20220203042943, 'AppMigrationsCreateTableRequests', '2022-03-02 05:43:12', '2022-03-02 05:43:12', 0),
(20220205174129, 'AppMigrationsCreateConfirmsEmailsTable', '2022-03-02 05:43:12', '2022-03-02 05:43:13', 0),
(20220301165745, 'AppMigrationsCreateOrdersTable', '2022-03-02 05:43:13', '2022-03-02 05:43:14', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `requests`
--

CREATE TABLE `requests` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `problem` varchar(516) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `requests`
--

INSERT INTO `requests` (`id`, `name`, `phone`, `problem`, `status`) VALUES
(1, 'Эльдар', '8906765423', 'Поставьте 5, пожалуйста', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(3, 'admin'),
(2, 'manager'),
(1, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int NOT NULL,
  `status` varchar(56) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Продается', '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(2, 'В аренду', '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(3, 'Закрыто', '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(4, 'В работе', '2022-06-13 14:58:29', '2022-06-13 14:58:29'),
(5, 'Принято', '2022-06-13 14:58:29', '2022-06-13 14:58:29'),
(6, 'Отклонено', '2022-06-13 14:58:43', '2022-06-13 14:58:43');

-- --------------------------------------------------------

--
-- Структура таблицы `types`
--

CREATE TABLE `types` (
  `id` int NOT NULL,
  `type` varchar(56) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `types`
--

INSERT INTO `types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Квартира', '2022-03-02 07:48:52', '2022-03-02 07:48:52'),
(2, 'Дом', '2022-03-02 07:48:52', '2022-03-02 07:48:52');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role_id` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `phone`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'login@email.ry', '$2y$10$JJE0T6vRlqyV3cvVXwO5keG.HoYtSl5fzDwvhe7lvMJhiSaIX6eFy', 'Админ', 'Админских', '89078765763', 3, '2022-03-02 07:48:52', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users_remember_tokens`
--

CREATE TABLE `users_remember_tokens` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip` varchar(18) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `expired_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `confirms_emails`
--
ALTER TABLE `confirms_emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `house_id` (`house_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `house_id` (`house_id`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Индексы таблицы `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Индексы таблицы `users_remember_tokens`
--
ALTER TABLE `users_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `confirms_emails`
--
ALTER TABLE `confirms_emails`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `types`
--
ALTER TABLE `types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users_remember_tokens`
--
ALTER TABLE `users_remember_tokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `confirms_emails`
--
ALTER TABLE `confirms_emails`
  ADD CONSTRAINT `confirms_emails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `houses`
--
ALTER TABLE `houses`
  ADD CONSTRAINT `houses_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `houses_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `houses_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`house_id`) REFERENCES `houses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_remember_tokens`
--
ALTER TABLE `users_remember_tokens`
  ADD CONSTRAINT `users_remember_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
