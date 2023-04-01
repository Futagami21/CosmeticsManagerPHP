-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2023 年 4 月 01 日 23:37
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `cosmetics_manager`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(50) NOT NULL COMMENT 'ユーザ名',
  `mail` varchar(100) NOT NULL COMMENT 'メールアドレス',
  `password` varchar(100) NOT NULL COMMENT 'パスワード',
  `created_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `admins`
--

INSERT INTO `admins` (`id`, `name`, `mail`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin_user', 'admin@test.co.jp', '$2y$10$2Gp.ny4KE/Py84XWlrYZHuM2qsQxhJy0x9BTQrK5bgXAy6YY2z8t6', '2023-03-19 05:39:12', '2023-03-19 05:39:12');

-- --------------------------------------------------------

--
-- テーブルの構造 `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(11) NOT NULL COMMENT '送信者名',
  `mail` varchar(50) NOT NULL COMMENT 'メールアドレス',
  `body` text NOT NULL COMMENT '内容',
  `created_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '送信日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mail`, `body`, `created_at`, `updated_at`) VALUES
(1, 'hogehoge1', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53'),
(2, 'hogehoge2', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53'),
(3, 'hogehoge3', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53'),
(4, 'hogehoge4', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53'),
(5, 'hogehoge5', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53'),
(6, 'hogehoge6', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53'),
(7, 'hogehoge7', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53'),
(8, 'hogehoge8', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53'),
(9, 'hogehoge9', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53'),
(10, 'hogehoge10', 'test@test.co.jp', 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', '2023-04-01 20:17:53', '2023-04-01 20:17:53');

-- --------------------------------------------------------

--
-- テーブルの構造 `cosmetics`
--

CREATE TABLE `cosmetics` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `name` varchar(50) NOT NULL COMMENT '化粧品の名前',
  `open_date` date DEFAULT NULL COMMENT '開封日',
  `get_date` date DEFAULT NULL COMMENT '入手日',
  `expiry_date` datetime DEFAULT NULL COMMENT '使用期限　計算された日付',
  `expiry` varchar(50) DEFAULT NULL COMMENT '使用期限',
  `image` varchar(50) DEFAULT NULL COMMENT '品物画像',
  `type` varchar(50) DEFAULT NULL COMMENT '化粧品の種類',
  `favorite` int(11) DEFAULT '0' COMMENT 'お気に入り(通常:0 お気に入り:1)',
  `company` varchar(50) DEFAULT NULL COMMENT 'メーカー名',
  `role` int(11) DEFAULT '0' COMMENT '閲覧範囲(登録時:0 おすすめ登録:1)',
  `comment` varchar(200) DEFAULT NULL COMMENT 'コメント ',
  `memo` varchar(200) DEFAULT NULL COMMENT 'メモ',
  `created_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '送信日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `cosmetics`
--

INSERT INTO `cosmetics` (`id`, `user_id`, `name`, `open_date`, `get_date`, `expiry_date`, `expiry`, `image`, `type`, `favorite`, `company`, `role`, `comment`, `memo`, `created_at`, `updated_at`) VALUES
(1, 1, 'hogeマスカラ', '2022-12-14', '2022-10-12', '2023-03-14 00:00:00', '3ヶ月', 'VeKy0WyslB20nyFLo1VOZARJsriDa19eqm1ACDXg.png', 'マスカラ', 1, 'hogehoge', 1, 'hoge', 'hoge', '2023-03-31 05:56:18', '2023-04-01 21:24:49'),
(2, 1, 'hogeチーク', '2022-12-14', '2022-10-12', '2023-03-14 00:00:00', '3ヶ月', 'Msl4MnKzV8xGK4SGehiOBGv7Jt3RyNXutaZwULSt.png', 'チーク', 1, 'hogehoge', 1, 'hoge', 'hoge', '2023-03-31 05:56:18', '2023-04-01 21:25:31'),
(3, 2, 'hogehoge', NULL, NULL, NULL, NULL, '1K7GzyH7oU3PYhmY1DNCCTsEwQo6AuTYcn2bwirA.png', 'マスカラ', 0, 'hogeブランド', 1, 'hogehoge', NULL, '2023-04-01 19:47:17', '2023-04-01 19:47:17'),
(4, 2, 'hogehoge', NULL, '2023-04-12', '2023-07-12 00:00:00', '3ヶ月', 'daPpUMUtgbvyyYTWERhZFN0BVd6oWiuzrDqiNWX7.png', 'チーク', 0, 'hogehoge', 1, 'hogehoge', NULL, '2023-04-01 19:48:24', '2023-04-01 19:48:24'),
(5, 2, 'hogehoge', NULL, NULL, NULL, '2年', 'default.jpg', 'ファンデーション', 0, 'hoge社', 1, 'hogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge', NULL, '2023-04-01 19:48:57', '2023-04-01 19:48:57');

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `cosmetic_id` int(11) NOT NULL COMMENT '化粧品ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `created_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '送信日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`id`, `cosmetic_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2023-04-01 19:35:36', '2023-04-01 19:35:36'),
(2, 5, 2, '2023-04-01 20:11:34', '2023-04-01 20:11:34'),
(3, 5, 1, '2023-04-01 21:30:46', '2023-04-01 21:30:46'),
(4, 1, 1, '2023-04-01 21:30:48', '2023-04-01 21:30:48'),
(5, 4, 12, '2023-04-01 22:19:30', '2023-04-01 22:19:30'),
(6, 2, 12, '2023-04-01 22:19:35', '2023-04-01 22:19:35'),
(7, 2, 14, '2023-04-01 22:43:39', '2023-04-01 22:43:39'),
(8, 4, 14, '2023-04-01 22:43:45', '2023-04-01 22:43:45'),
(9, 2, 15, '2023-04-01 23:13:36', '2023-04-01 23:13:36'),
(10, 4, 15, '2023-04-01 23:13:41', '2023-04-01 23:13:41');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_03_30_010528_create_admins_table', 0),
(2, '2023_03_30_010528_create_contacts_table', 0),
(3, '2023_03_30_010528_create_cosmetics_table', 0),
(4, '2023_03_30_010528_create_likes_table', 0),
(5, '2023_03_30_010528_create_user_tokens_table', 0),
(6, '2023_03_30_010528_create_users_table', 0),
(7, '2023_03_30_010529_add_foreign_keys_to_cosmetics_table', 0),
(8, '2023_03_30_010529_add_foreign_keys_to_user_tokens_table', 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `name` varchar(50) NOT NULL COMMENT 'ユーザ名',
  `mail` varchar(100) NOT NULL COMMENT 'メールアドレス',
  `password` varchar(100) NOT NULL COMMENT 'パスワード',
  `created_at` datetime DEFAULT NULL COMMENT '登録日時',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `mail`, `password`, `created_at`, `updated_at`) VALUES
(1, 'hoge1', '123@test.co.jp', '$2y$10$wwNnUP0rOfTDaRXA1b7SdOj.A0Gf7so0xtR2u6V2RvMu5pnOouYuq', '2023-03-20 23:51:28', '2023-03-20 23:51:28'),
(2, 'hoge2', 'akemi90@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-03-22 00:28:16', '2023-03-22 00:28:16'),
(3, 'hoge3', 'tanaka.hideki@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-03-22 00:28:16', '2023-03-22 00:28:16'),
(4, '木村 直子', 'yoko.yamaguchi@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-03-22 00:28:16', '2023-03-22 00:28:16'),
(5, '津田 くみ子', 'hsaito@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-03-22 00:28:16', '2023-03-22 00:28:16'),
(6, '青田 結衣', 'idaka.yumiko@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-03-22 00:28:16', '2023-03-22 00:28:16'),
(7, '山田 直人', 'yosuke56@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-03-22 00:28:16', '2023-03-22 00:28:16'),
(8, 'テスト用', 'test@test.co.jp', '$2y$10$8WMwtGPSTLRYd.vypWqPK.PD34Z9JJFN6lQXWs9EhlGIgtWP7FL1m', '2023-04-01 23:32:03', '2023-04-01 23:32:03');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_tokens`
--

CREATE TABLE `user_tokens` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'ユーザのID',
  `token` varchar(50) NOT NULL COMMENT 'トークン',
  `expire_at` datetime DEFAULT NULL COMMENT 'トークンの有効期限',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `cosmetics`
--
ALTER TABLE `cosmetics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cosmetic_id` (`cosmetic_id`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UNIQUE` (`token`),
  ADD KEY `user_id` (`user_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=34;

--
-- テーブルの AUTO_INCREMENT `cosmetics`
--
ALTER TABLE `cosmetics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=20;

--
-- テーブルの AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=111;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `cosmetics`
--
ALTER TABLE `cosmetics`
  ADD CONSTRAINT `cosmetics_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- テーブルの制約 `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`cosmetic_id`) REFERENCES `cosmetics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- テーブルの制約 `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
