-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 11 2023 г., 07:48
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `spoti`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` enum('single','ordinal','compilation') COLLATE utf8mb4_general_ci NOT NULL,
  `og_image` blob,
  `genre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id`, `title`, `type`, `og_image`, `genre`) VALUES
(30, 'Today i win', 'single', 0x3149536a38786d53307a555a6b53673277627837736658634c66634674304b424b564333425a6f712e6a7067, 'Jazz'),
(31, 'Maybe later', 'ordinal', 0x38614e706a73564e70674d6e376c646966366b4c4c4c49317546703369584d6761754831744157742e6a7067, 'Jazz'),
(32, 'So tired', 'ordinal', 0x655a5a6b4c7541614a4964564e767831355043446c61675a3065495839424e4245616543394668332e6a7067, 'Rock\'n\'roll'),
(33, 'God bless you', 'ordinal', 0x6d4b45426c387448686a4776795031336c6a3268576c6c57626959534d49534b7464454a387261752e6a7067, 'Jazz'),
(34, 'I nate higgers', 'ordinal', 0x524254796848377a684c3532376554425367617452426c726f4b33316f7761776659626535304b412e6a7067, 'Nu metal'),
(35, 'Weekand man', 'ordinal', 0x534c78714d30767a31556342633936774d35716d41783046476f70504e79547630704e65327475782e6a7067, 'Rock\'n\'roll'),
(36, 'Diaries of a Hero', 'ordinal', 0x69673877454c78445345617030596d4649474a4b6936616b6272376f6256387a7a4b70637a7670692e706e67, 'Hard rock'),
(37, 'Diaries of a Hero', 'ordinal', 0x6751774e6d76533050434c716e6167346c5a6b4755305a746e4547514e6e624c78416775625146722e706e67, 'Hard rock'),
(38, 'Diaries of a Hero', 'ordinal', NULL, 'Hard rock'),
(39, 'Diaries of a Hero', 'ordinal', NULL, 'Hard rock'),
(40, 'Diaries of a Hero', 'ordinal', NULL, 'Hard rock'),
(41, '123', 'single', NULL, 'Jazz'),
(42, 'aboba@afsd', 'single', NULL, 'Jazz');

-- --------------------------------------------------------

--
-- Структура таблицы `albums-artists`
--

CREATE TABLE `albums-artists` (
  `artist_id` int UNSIGNED NOT NULL,
  `album_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `albums-artists`
--

INSERT INTO `albums-artists` (`artist_id`, `album_id`) VALUES
(1, 41),
(1, 42),
(2, 31),
(2, 32),
(2, 35),
(4, 30),
(4, 33),
(4, 34),
(6, 36),
(6, 37),
(6, 38),
(6, 39),
(6, 40);

-- --------------------------------------------------------

--
-- Структура таблицы `artists`
--

CREATE TABLE `artists` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `artists`
--

INSERT INTO `artists` (`id`, `name`, `img_url`) VALUES
(1, 'Louis Armstrong', NULL),
(2, 'Royal Republic', NULL),
(4, 'Aboba arara', NULL),
(5, 'Artist', 0x443a5c4f5350616e656c5c75736572646174615c74656d705c75706c6f61645c706870363835432e746d70),
(6, 'Diaries of a Hero', 0x443a5c4f5350616e656c5c75736572646174615c74656d705c75706c6f61645c7068704642332e746d70),
(7, '123', NULL),
(9, '1234', NULL),
(10, 'asdfasf', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `genre` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mood` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`genre`, `mood`) VALUES
('123', '123'),
('1231', '12334'),
('3twerfsdf', 'fsdfsdff'),
('Alternative metal', 'Грустное'),
('Blues', 'Грустное'),
('Hard rock', 'Бодрое'),
('Jazz', 'Спокойное'),
('Metal', 'Бодрое'),
('Nu metal', 'Бодрое'),
('Rock\'n\'roll', 'Веселое');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 28, 'api', '4eaf926dc277794eed0e43eadc67bfa8d80b00c195b5a6286b7ebca1f0612f30', '[\"*\"]', '2023-06-24 05:13:43', NULL, '2023-06-24 04:57:48', '2023-06-24 05:13:43'),
(46, 'App\\Models\\User', 32, 'api', 'd66e98109f20141fc904465813c628c6215aea8149ecdcd4384e407fabbca7d1', '[\"*\"]', NULL, NULL, '2023-06-28 01:15:22', '2023-06-28 01:15:22'),
(56, 'App\\Models\\User', 30, 'api', '096f1e313fa83a3720c2c30324b087437e0905043bd819717aff552677304e6c', '[\"*\"]', NULL, NULL, '2023-06-29 05:39:20', '2023-06-29 05:39:20'),
(58, 'App\\Models\\User', 33, 'api', '9efd6ee8839651ac11d2e1655db7f6c26c886a26cbf75222cf709430d2ff030b', '[\"*\"]', '2023-07-01 02:51:11', NULL, '2023-07-01 02:51:00', '2023-07-01 02:51:11'),
(64, 'App\\Models\\User', 56, 'api', '84375d93ae1e432e938d05e41222161e492d302973268c89dccb067e72a2470a', '[\"*\"]', NULL, NULL, '2023-07-02 09:50:33', '2023-07-02 09:50:33'),
(72, 'App\\Models\\User', 49, 'api', '4dee8a0c3d07f30c1ae46334e7b6b6974944f17280c48b857fd1dba1f8143d36', '[\"*\"]', NULL, NULL, '2023-07-02 10:45:47', '2023-07-02 10:45:47'),
(82, 'App\\Models\\User', 46, 'api', 'c1a9ffdc1ec37d5777f30d31765984c6f80d1425962aa297dda39df21828eb37', '[\"*\"]', NULL, NULL, '2023-07-06 01:57:22', '2023-07-06 01:57:22'),
(110, 'App\\Models\\User', 29, 'api', 'fa0c37f72b6a24635124dca0246d0e7d821796ea9be04f3f2dbc4b86386f747c', '[\"*\"]', '2023-07-10 00:42:55', NULL, '2023-07-06 07:46:43', '2023-07-10 00:42:55'),
(112, 'App\\Models\\User', 31, 'api', '71fd3c0e245411cf9cb44e2b51d04e14449866f524d7a03875e817ee3473d5cd', '[\"*\"]', '2023-07-10 22:35:14', NULL, '2023-07-10 20:15:50', '2023-07-10 22:35:14');

-- --------------------------------------------------------

--
-- Структура таблицы `playlists`
--

CREATE TABLE `playlists` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `title` varchar(40) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `playlists`
--

INSERT INTO `playlists` (`id`, `user_id`, `title`) VALUES
(5, 29, 'asfasjkfhakljsga'),
(6, 30, 'Любимые треки'),
(7, 31, 'Любимые треки'),
(12, 33, 'Новый плейлист'),
(13, 33, 'Новый плейлист'),
(14, 33, 'Новый плейлист'),
(15, 33, 'Новый плейлист'),
(16, 33, 'Новый плейлист'),
(17, 29, 'Новый плейлист'),
(18, 29, 'Новый плейлист'),
(19, 29, 'Новый плейлист'),
(23, 38, 'Любимые треки'),
(25, 40, 'Любимые треки'),
(26, 41, 'Любимые треки'),
(27, 42, 'Любимые треки'),
(28, 43, 'Любимые треки'),
(30, 45, 'Любимые треки'),
(31, 46, 'Любимые треки'),
(32, 47, 'Любимые треки'),
(33, 48, 'Любимые треки'),
(34, 49, 'Любимые треки'),
(35, 50, 'Любимые треки'),
(36, 51, 'Любимые треки'),
(37, 52, 'Любимые треки'),
(38, 53, 'Любимые треки'),
(39, 54, 'Любимые треки'),
(40, 55, 'Любимые треки'),
(41, 56, 'Любимые треки'),
(42, 57, 'Любимые треки'),
(43, 58, 'Любимые треки'),
(44, 59, 'Любимые треки'),
(45, 60, 'Любимые треки'),
(46, 61, 'Любимые треки'),
(47, 62, 'Любимые треки'),
(48, 63, 'Любимые треки'),
(49, 64, 'Любимые треки'),
(50, 65, 'Любимые треки'),
(51, 66, 'Любимые треки'),
(52, 67, 'Любимые треки'),
(53, 68, 'Любимые треки'),
(54, 69, 'Любимые треки'),
(55, 70, 'Любимые треки'),
(56, 71, 'Любимые треки'),
(57, 72, 'Любимые треки'),
(60, 31, 'Абоба'),
(62, 31, 'Новый плейлист'),
(63, 31, 'Новый плейлист'),
(64, 31, 'Новый плейлист'),
(65, 31, 'Новый плейлист'),
(66, 29, 'Новый плейлист'),
(68, 31, 'Новый плейлист'),
(73, 29, '123'),
(74, 29, '123'),
(75, 29, '123'),
(78, 73, 'Любимые треки'),
(79, 74, 'Любимые треки'),
(80, 75, 'Любимые треки');

-- --------------------------------------------------------

--
-- Структура таблицы `playlists-tracks`
--

CREATE TABLE `playlists-tracks` (
  `playlist_id` int UNSIGNED NOT NULL,
  `track_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `playlists-tracks`
--

INSERT INTO `playlists-tracks` (`playlist_id`, `track_id`) VALUES
(7, 7),
(7, 24),
(60, 20),
(62, 20),
(63, 20),
(64, 15),
(64, 20),
(64, 22);

-- --------------------------------------------------------

--
-- Структура таблицы `tracks`
--

CREATE TABLE `tracks` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `storage_dir` blob NOT NULL,
  `album_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `storage_dir`, `album_id`) VALUES
(7, 'Can\'t fight the disco', 0x53413031524c495a4e6858494d59684d375a68364e3959316b457941304757596e656f76426674622e6d7033, 35),
(8, 'Summertime', 0x587837554f4e676d4a5571555452704c6d637a50775937374d6b705a4d457a363035513230396b6b2e6d7033, 33),
(9, 'Go down Moses', 0x74696b736e55424d4f6f796530507a6661453575536e6362364e35374553525a67787644493748642e6d7033, 33),
(10, 'Ateraxia', 0x41764f496a34307179484252434e436161784f6f52424757554e6a635470325a466c46756b7038652e6d7033, 36),
(11, 'Brother', 0x6950504848516933646130327a693842526b6b58364d45743936596e365948313446314d663554582e6d7033, 36),
(12, 'Get Away', 0x44674233376a4c46544b476232365466734635315943464b71376f56514b6b4c417a716e334832462e6d7033, 36),
(13, 'Highchool Funeral', 0x7549446753375a4572746358397463685a657159784f425a33695950525736375a5441516e484f4f2e6d7033, 32),
(14, 'Highchool Funeral', 0x42396c443461367075707149334245706c4f47347134505657466a73787a73795a535462546a6d512e6d7033, 34),
(15, 'Intro', 0x4e3431335677444666705365787030376234727a4a33493943525745477a485446667562616946572e6d7033, 34),
(16, 'j5', 0x5975634f385746475741584a314956306748534e4b504432453644424e4334734e673269445961412e6d7033, 35),
(17, 'Neruda', 0x74556c5574753541386d486c6c65764c414565666a5331394172676b6e6e564d717536424b79616a2e6d7033, 34),
(18, 'Manimal', 0x7355784438694573626769486275723778674842786e664d743353493473467065394a78386953752e6d7033, 36),
(19, 'Manimal', 0x35524b6777595136385a57763049713939634b47564e7850664c545338777045684c357a576751442e6d7033, 32),
(20, 'Scarwhores', 0x556b4b4f4e476e654e586261546236727751337a794e56356476704b664e7658716876696d4572412e6d7033, 32),
(21, 'Scarwhores', 0x4c4e4e643852336d6a61504373714d574c717a617233706a79455a533647445765437249334f35772e6d7033, 32),
(22, 'Solitude', 0x645a797045554732594a3364645a3966524768536f5479384148567278746a425071736c6b43666f2e6d7033, 34),
(23, 'Victims of Chaos', 0x764d4d5851597853546a436c4730443061667631656d6c696f4939725531316178696e656b5170432e6d7033, 34),
(24, 'Throne', 0x4832356d5574746265483750744341354a4b4545437779507063736d4a5a4d7532766a6b58755a472e6d7033, 32);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `img_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `first_name`, `last_name`, `img_url`, `role`) VALUES
(29, 'алексей', 'asdfqw1e2341q11n11211@ad1', '$2y$10$mMhkjnqBdNe3KpSGHpAB7eHrl8A44BPgua4AzhHcB2NLbaQcDLOxK', 'aboba', 'aboba1', NULL, 'admin'),
(30, 'aboba', 'abob@ad1', '$2y$10$BTVGxKn1Qv9ZUGs4nRGqDeMTw82iV1hJzOz8IVsCC07y/vkWSZUWm', 'aboba', 'aboba', NULL, 'user'),
(31, 'aboba', 'aboba@ad1', '$2y$10$M1o9QoKnT/FXQ3zgXRKcEuhz8LU2jI24wTg.anZ1yXwUufNjspvli', 'aboba', 'aboba', NULL, 'admin'),
(33, 'user', 'user@ad1', '$2y$10$E/O01q9osvo7BqF6L0yFMu1PTPLrWZ/b5nQspUkBGfa1t5obxy6Re', 'aboba', 'aboba', NULL, 'user'),
(38, '1231', '12345@gmail.com', '$2y$10$Sy2L32tlhplvTZqdT4QXkuzazBZcz.CZnKcoErRYErOWSaPuv4uNa', '123', '123', NULL, 'user'),
(40, '124', '124123@gmail.com', '$2y$10$elVU.c4ouHQHSZXDzTlsZOSCDVXyPW2IiVxy5y4bYota2mHJjfYhm', '12', '2', NULL, 'user'),
(41, '123', '1231242335@gmail.com', '$2y$10$CBssF4mkg0yunMbKn.Hz7euY4uc0VuxdyE0vNo62ofZ5Fk5ZeUDMy', '123', '123', NULL, 'user'),
(42, 'assadf', '123@gahf', '$2y$10$EJyuqUKWh.lnBXGh8VdQDeNrJt2iudKMoaAgjmbD2oiN5.HJ4XjW6', 'asdf', 'asdfasf', NULL, 'user'),
(43, '123', '123124231235@gmail.com', '$2y$10$MZ77XTB39LCLrRgS93V7oO9U/GjrlQ6M3TlAbyzj9DjAssae0rHdu', '123', '123', NULL, 'user'),
(45, 'sadfasdf', '14135dsfs@agds', '$2y$10$gDV2yW/zMSIy1GFHI4sDue1mct5Xt7LbV7.4zPds89n6HgEQKYW3i', 'sadfsa', 'sadfsa', NULL, 'user'),
(46, '234', '1231242352@g2mail.com', '$2y$10$a8fzf.WsQQ.7M259lfSVx.md9Cr2PDjJVCVZxu9GwTEqdNxKZqTMO', '234', '234', NULL, 'user'),
(47, '3453', 'asdf@gs', '$2y$10$bBkxc5NIZuTTAsN1Fj9UVu/PpMO3LPnHvJaslDpSI7CdDOBnOjzF2', '534', '534', NULL, 'user'),
(48, 'sfdd', 'safasf@gasg', '$2y$10$.F1YU5OO00w9WnINWocIj.dGWEAG.vgRJ5yxX.LEUJdofJ2kt.GwW', 'sfsd', 'fsdf', NULL, 'user'),
(49, 'sfdd', 'saf1asf@gasg', '$2y$10$LNzz/BydIGDjTMU4FFITEuI7Rbd4.yIZTYa2v7O.NqPdcCzUcXrTu', 'sfsd', 'fsdf', NULL, 'user'),
(50, 'dfgd', '123@gasg.fgh', '$2y$10$dtZY6LjYktW1kZIm14KObuGgbZ9QprckPXw93irqiyH/eN7RGSPXe', 'gdfg', 'dfgd', NULL, 'user'),
(51, 'sd', '123ssfas@gagdds', '$2y$10$uh.rGEWeu98TFZ.lOlEp3uIoAkkOE5nxEiZWQhHrYpGGWX/zx5niW', 'dsf', 'sdf', NULL, 'user'),
(52, '123', '12312423512@g2mail.com', '$2y$10$dutxO9A92pz7srSo2uA4W.NpkF7BKJDmihABcEKh3w9IJhA/NbYXW', '123', '123', NULL, 'user'),
(53, '123', '1231242123352@g2mail.com', '$2y$10$eFRuTIbLX0ZfkPQpSzv7YOkpgCD6CBkpm/Qw.5Djs5rsmTk1QZoo6', '123', '123', NULL, 'user'),
(54, 'sgfd', '123sdf@g2mail.com', '$2y$10$rVIL.Tc4TbUTCp6J5GOav.Xkkzx2kbphQyAJC6hOB.sEMvnpeGh2y', 'dgf', 'fd', NULL, 'user'),
(55, 'sgfd', '123sd42f@g2mail.com', '$2y$10$3LYnE3tMxtqWWjcqASUJZ.0Z4l53pY1yKzMT9e0qdVPiJVt/ycHlG', 'dgf', 'fd', NULL, 'user'),
(56, 'dsf', '123@gmail.comzd', '$2y$10$lWFYpY5tREVrBRUnko3B7u.LzzswbvP7SLRdNbJY0XDS.4USjkUfy', 'sdf', 'sdf', NULL, 'user'),
(57, '123', 'saf1asas21f@gasg', '$2y$10$18WDZnXLRR5tRjXDA1naR.bpvjdg6/iDY6KwR7EukCJvWtlN21PEq', '123', '123', NULL, 'user'),
(58, 'x', '12312423zzxzxvc52@g2mail.com', '$2y$10$GidpuMlcF2HVbMgd810qT.nouU.d8cMdEfZ.u5TEsV9BKY14ZhcaS', 'zcvxzvc', 'zxcv', NULL, 'user'),
(59, 'fsd', 'sdW@gscxvzv', '$2y$10$JqqOytSzjggOZk5S26NGXO7CeV3y9HCsd4WmgDNXuSloXUtCyyaSi', 'fds', 'sdf', NULL, 'user'),
(60, 'zxc', 'dsfsd@gvxc13', '$2y$10$HgAGLwu7nDL/yGPMKfOEZ.Z5iwbbqbArONzY5twUeOqFj7oJ1540W', 'dsf', 'sdf', NULL, 'user'),
(61, 'dsf', '123df@gmail.comzd', '$2y$10$2SP2ctdeBHdvvC3Ea2VJZ.9/2LLGxytGgFcAduOqXxeHnQ.ZoHMp.', 'sdf', 'sdf', NULL, 'user'),
(62, '123', 'df@bcncv', '$2y$10$FV0xiRMxm82GmJzg6oSAMeLg9JMXXi8h8hGc.egsxZ5fDMIRteaxO', '123', '123', NULL, 'user'),
(63, '123', 'df234@bcncv', '$2y$10$RST0vcwY0yaxTeByWb0yiOtIoC.tT4rF2zABuCXj/fNBR51Mctq0i', '123', '123', NULL, 'user'),
(64, '123', '123213@gmail.comzd', '$2y$10$UAFjSSec9h.CM0s72NFXo.QNmm.scgAyFrTSvChNApra/YA2NZUbK', '123', '123', NULL, 'user'),
(65, '123', 'saf1as123f@gasg', '$2y$10$RAc0YZf22dK9UV2ClSt72.Sltd1ItnLPQGQZGxAmMDew3LbfQKYmm', '123', '123', NULL, 'user'),
(66, 'dg', '1231242dsg352@g2mail.com', '$2y$10$qLrU.TCVx4u28KTC2iB2ceCVq6/YfRgGAsyJQC0HOLtbEGcxcNNpK', 'dfsg', 'dsfg', NULL, 'user'),
(67, '123', '1256853@gmail.comzd', '$2y$10$nLulLbVcUlKU2k7c0lsR6udnaUIjZ2NKjrnpRlSgA2v4ttjK/lyTq', '123123', '123', NULL, 'user'),
(68, '123', 'sfazcz@gna1', '$2y$10$WqI17ubT4FAI8KHncxKEUOLw/ZDG.XaEShuKwqL86EzVLp0ya8Day', '123', '123', NULL, 'user'),
(69, '123', '123sdf@gmail.com', '$2y$10$vTXx7xBySloQIQ8HVrcIh.fudd.EZIulyz3OV6gXzxMIogEfNMKh.', '123', '123', NULL, 'user'),
(70, '123', '123srdf@gmail.com', '$2y$10$sRL3Ux3ztcS43NOpPvagxuvWSsqiULSHlZbAfLJyEgH/kR0.eia1.', '123', '123', NULL, 'user'),
(71, '123', 'vamoo@gam.com', '$2y$10$XusWghwlSv9sjZNlL/JVb.UHn.Pl5Xxk1GNNAsI2ID2TpOyM0f8Sy', '123', '1231', NULL, 'user'),
(72, 'rw', '1231242352q@g2mail.com', '$2y$10$cwLyOOfxv/Ooxw6KKGFsB.RcC9q/0/B7ZyFAQwwIiUDyrzd5pQq8S', 'rwer', 'wer', NULL, 'user'),
(73, '123', '123@fafdsa.pcv', '$2y$10$agb.5gb3N6YKZpj1zQObLeIEnI7lpQqwJpL7IQ8pS1Y.gO9T6F4aW', '123', '123', NULL, 'user'),
(74, 'aboba@afsd', 'aboba@afsd', '$2y$10$jAojtVkxnfQWsXmUWiByOeonluelFsLXYzHs4WMWfLquoHNEQP3/.', 'aboba@afsd', 'aboba@afsd', NULL, 'user'),
(75, 'aboba@afsd', 'aboba@afsd123', '$2y$10$PprTfMUP7Pc9JxNnOTaS8uyQXGvYGEFMtWdUxch9R.La5sUHCDyUG', 'aboba@afsd', 'aboba@afsd', NULL, 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre` (`genre`);

--
-- Индексы таблицы `albums-artists`
--
ALTER TABLE `albums-artists`
  ADD PRIMARY KEY (`artist_id`,`album_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Индексы таблицы `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `playlists-tracks`
--
ALTER TABLE `playlists-tracks`
  ADD PRIMARY KEY (`playlist_id`,`track_id`),
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `track_id` (`track_id`);

--
-- Индексы таблицы `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT для таблицы `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genres` (`genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `albums-artists`
--
ALTER TABLE `albums-artists`
  ADD CONSTRAINT `albums-artists_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `albums-artists_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `playlists-tracks`
--
ALTER TABLE `playlists-tracks`
  ADD CONSTRAINT `playlists-tracks_ibfk_2` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playlists-tracks_ibfk_3` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `tracks_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
