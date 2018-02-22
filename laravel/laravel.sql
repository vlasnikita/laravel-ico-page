-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 25 2018 г., 16:32
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- База данных: `ethereum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_languages`
--

CREATE TABLE `laravel_languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abbr` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `script` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `native` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `default` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `laravel_languages`
--

INSERT INTO `laravel_languages` (`id`, `name`, `app_name`, `flag`, `abbr`, `script`, `native`, `active`, `default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'English', 'english', 'uploads/en.png', 'en', 'Latn', 'English', 1, 1, NULL, NULL, NULL),
(2, 'Russian', 'russian', 'uploads/ru.png', 'ru', 'Latn', 'Русский', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_migrations`
--

CREATE TABLE `laravel_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_news`
--

CREATE TABLE `laravel_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `confirmed` set('yes','no') NOT NULL DEFAULT 'no',
  `deleted` set('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_pages`
--

CREATE TABLE `laravel_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `template` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `extras` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_password_resets`
--

CREATE TABLE `laravel_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_permissions`
--

CREATE TABLE `laravel_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `laravel_permissions`
--

INSERT INTO `laravel_permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'access_backend', '2017-03-23 18:13:51', '2017-03-23 18:13:51'),
(2, 'access_moderator', '2017-03-23 18:13:51', '2017-03-23 18:13:51'),
(3, 'access_author', '2017-03-23 18:13:51', '2017-03-23 18:13:51');

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_permission_roles`
--

CREATE TABLE `laravel_permission_roles` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `laravel_permission_roles`
--

INSERT INTO `laravel_permission_roles` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_permission_users`
--

CREATE TABLE `laravel_permission_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `laravel_permission_users`
--

INSERT INTO `laravel_permission_users` (`user_id`, `permission_id`) VALUES
(4, 1),
(7, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_roles`
--

CREATE TABLE `laravel_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `laravel_roles`
--

INSERT INTO `laravel_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2017-03-23 12:50:45', '2017-03-23 12:50:45'),
(2, 'moderator', '2017-04-10 06:56:04', '2017-04-10 06:56:04'),
(3, 'author', '2017-04-10 06:56:22', '2017-04-10 06:56:22');

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_role_users`
--

CREATE TABLE `laravel_role_users` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `laravel_role_users`
--

INSERT INTO `laravel_role_users` (`role_id`, `user_id`) VALUES
(1, 4),
(2, 7),
(3, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_settings`
--

CREATE TABLE `laravel_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `laravel_settings`
--

INSERT INTO `laravel_settings` (`id`, `key`, `name`, `description`, `value`, `field`, `active`, `created_at`, `updated_at`) VALUES
(1, 'setting_title', 'Website title', 'This is the name of your Website', '', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 1, NULL, NULL),
(2, 'setting_image', 'Website image URL', 'This image url will be placed in \"og:image\" meta tag', '', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"url\"}', 1, NULL, NULL),
(3, 'setting_short_title', 'Website short title', 'Users will see this text in browser', '', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 1, NULL, NULL),
(4, 'setting_description', 'Description', 'Meta tag Description', '', '{\"name\":\"value\",\"label\":\"Value\",\"type\":\"text\"}', 1, NULL, NULL),
(5, 'setting_keywords', 'Keywords', 'Meta tag keywords', '', '{\"name\":\"value\",\"label\":\"Value\", \"title\":\"Motto value\" ,\"type\":\"textarea\"}', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_social_accounts`
--

CREATE TABLE `laravel_social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `laravel_users`
--

CREATE TABLE `laravel_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eth_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `laravel_users`
--

INSERT INTO `laravel_users` (`id`, `name`, `surname`, `email`, `eth_wallet`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', '', 'admin@gmail.com', '0x3f5ce5fbfe3e9af3971dd833d26ba9b5c936f0be', '$2y$10$Axxn.bynPqRK1Bty5kBvA.4MWpkx6TRKUbtL4d6N/hPxkwRIHUFdW', 'SAYrpWyykPsmbzaPBNodehQAl0e67o0TXJsKBm9dyBFkvF1KE0bmwTNE2CRC', '2017-03-23 15:04:08', '2017-04-25 11:40:56'),
(7, 'moderator', '', 'moder@gmail.com', NULL, '$2y$10$Axxn.bynPqRK1Bty5kBvA.4MWpkx6TRKUbtL4d6N/hPxkwRIHUFdW', 'Ttsl27whvKhYGwAubuKSFEtBtXaJGvBTUiwu6GFBd021t1XoWE9eU78sFm4Y', '2017-04-10 05:12:24', '2017-04-25 08:42:18'),
(8, 'author', '', 'author@gmail.com', NULL, '$2y$10$Axxn.bynPqRK1Bty5kBvA.4MWpkx6TRKUbtL4d6N/hPxkwRIHUFdW', 'aA2m4A2Vp8sONCMzJtmAe7bn4N9O1tvo0z9GGBKmqqBh0hTGbM5YsuogM4wh', '2017-04-10 05:14:09', '2017-04-25 08:43:04');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `laravel_languages`
--
ALTER TABLE `laravel_languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `laravel_migrations`
--
ALTER TABLE `laravel_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `laravel_news`
--
ALTER TABLE `laravel_news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `laravel_pages`
--
ALTER TABLE `laravel_pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `laravel_password_resets`
--
ALTER TABLE `laravel_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `laravel_permissions`
--
ALTER TABLE `laravel_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Индексы таблицы `laravel_permission_roles`
--
ALTER TABLE `laravel_permission_roles`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_roles_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `laravel_permission_users`
--
ALTER TABLE `laravel_permission_users`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `permission_users_permission_id_foreign` (`permission_id`);

--
-- Индексы таблицы `laravel_roles`
--
ALTER TABLE `laravel_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Индексы таблицы `laravel_role_users`
--
ALTER TABLE `laravel_role_users`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_users_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `laravel_settings`
--
ALTER TABLE `laravel_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `laravel_users`
--
ALTER TABLE `laravel_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `laravel_languages`
--
ALTER TABLE `laravel_languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `laravel_migrations`
--
ALTER TABLE `laravel_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `laravel_news`
--
ALTER TABLE `laravel_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `laravel_pages`
--
ALTER TABLE `laravel_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `laravel_permissions`
--
ALTER TABLE `laravel_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `laravel_roles`
--
ALTER TABLE `laravel_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `laravel_settings`
--
ALTER TABLE `laravel_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `laravel_users`
--
ALTER TABLE `laravel_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `laravel_permission_roles`
--
ALTER TABLE `laravel_permission_roles`
  ADD CONSTRAINT `permission_roles_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `laravel_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `laravel_roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `laravel_permission_users`
--
ALTER TABLE `laravel_permission_users`
  ADD CONSTRAINT `permission_users_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `laravel_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `laravel_users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `laravel_role_users`
--
ALTER TABLE `laravel_role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `laravel_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `laravel_users` (`id`) ON DELETE CASCADE;
COMMIT;
