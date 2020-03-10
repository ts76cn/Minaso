-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2020 年 2 月 06 日 22:41
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `minaso`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ken`
--

CREATE TABLE `ken` (
  `id` smallint(6) NOT NULL,
  `ken` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `ken`
--

INSERT INTO `ken` (`id`, `ken`) VALUES
(1, '北海道'),
(2, '青森県'),
(3, '岩手県'),
(4, '宮城県'),
(5, '秋田県'),
(6, '山形県'),
(7, '福島県'),
(8, '茨城県'),
(9, '栃木県'),
(10, '群馬県'),
(11, '埼玉県'),
(12, '千葉県'),
(13, '東京都'),
(14, '神奈川県'),
(15, '新潟県'),
(16, '富山県'),
(17, '石川県'),
(18, '福井県'),
(19, '山梨県'),
(20, '長野県'),
(21, '岐阜県'),
(22, '静岡県'),
(23, '愛知県'),
(24, '三重県'),
(25, '滋賀県'),
(26, '京都府'),
(27, '大阪府'),
(28, '兵庫県'),
(29, '奈良県'),
(30, '和歌山県'),
(31, '鳥取県'),
(32, '島根県'),
(33, '岡山県'),
(34, '広島県'),
(35, '山口県'),
(36, '徳島県'),
(37, '香川県'),
(38, '愛媛県'),
(39, '高知県'),
(40, '福岡県'),
(41, '佐賀県'),
(42, '長崎県'),
(43, '熊本県'),
(44, '大分県'),
(45, '宮崎県'),
(46, '鹿児島県'),
(47, '沖縄県');

-- --------------------------------------------------------

--
-- テーブルの構造 `member`
--

CREATE TABLE `member` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `birthday` char(8) DEFAULT NULL,
  `ken` smallint(6) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL,
  `cancel` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `last_name`, `first_name`, `birthday`, `ken`, `reg_date`, `cancel`) VALUES
(4, '001@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏001', '名001', '19950101', 1, '2017-06-01 00:00:00', NULL),
(5, '002@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏002', '名002', '19950102', 2, '2017-06-02 00:00:00', NULL),
(6, '003@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏003', '名003', '19950103', 3, '2017-06-03 00:00:00', NULL),
(7, '004@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏004', '名004', '19950104', 4, '2017-06-04 00:00:00', NULL),
(8, '005@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏005', '名005', '19950105', 5, '2017-06-05 00:00:00', NULL),
(9, '006@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏006', '名006', '19950106', 6, '2017-06-06 00:00:00', NULL),
(10, '007@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏007', '名007', '19950107', 7, '2017-06-07 00:00:00', NULL),
(11, '008@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏008', '名008', '19950108', 8, '2017-06-08 00:00:00', NULL),
(12, '009@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏009', '名009', '19950109', 9, '2017-06-09 00:00:00', NULL),
(13, '010@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏010', '名010', '19950110', 10, '2017-06-10 00:00:00', NULL),
(14, '011@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏011', '名011', '19950111', 11, '2017-06-11 00:00:00', NULL),
(15, '012@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏012', '名012', '19950112', 12, '2017-06-12 00:00:00', NULL),
(16, '013@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏013', '名013', '19950113', 13, '2017-06-13 00:00:00', NULL),
(17, '014@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏014', '名014', '19950114', 14, '2017-06-14 00:00:00', NULL),
(18, '015@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏015', '名015', '19950115', 15, '2017-06-15 00:00:00', NULL),
(19, '016@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏016', '名016', '19950116', 16, '2017-06-16 00:00:00', NULL),
(20, '017@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏017', '名017', '19950117', 17, '2017-06-17 00:00:00', NULL),
(21, '018@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏018', '名018', '19950118', 18, '2017-06-18 00:00:00', NULL),
(22, '019@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏019', '名019', '19950119', 19, '2017-06-19 00:00:00', NULL),
(23, '020@example.co.jp', '$2y$10$zWukYjKIuCRSe8OtjbfymO5sDgoUfGdlXAm75.SSzBox1ySpQpgAC', '氏020', '名020', '19950120', 20, '2017-06-20 00:00:00', NULL),
(24, 'ts76c@yahoo.co.jp', '$2y$10$ujb/GBc.4pQUYZH1FhlAGeXcfnIInmVOfBr6bVZgU.lCb60pwZ8Dy', '松橋', '大悟', '19760916', 4, '2019-12-21 23:52:23', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `minaso_yotei`
--

CREATE TABLE `minaso_yotei` (
  `id` int(11) NOT NULL,
  `date1` date NOT NULL,
  `time1` varchar(100) NOT NULL,
  `time2` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `asobi` varchar(100) NOT NULL,
  `sewanin` varchar(100) NOT NULL,
  `comment` text,
  `sankasya` text,
  `flag` int(4) NOT NULL DEFAULT '0',
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `minaso_yotei`
--

INSERT INTO `minaso_yotei` (`id`, `date1`, `time1`, `time2`, `place`, `asobi`, `sewanin`, `comment`, `sankasya`, `flag`, `timestamp`) VALUES
(1, '2020-03-19', '11時00分', '14時00分', '海岸公園冒険広場', '砂遊び', 'たかはし', '小１女の子です', 'たかはし', 0, '2020-03-19 02:00:00.000000'),
(6, '2020-01-31', '6時00分', '17時00分', '古城児童館', 'シャボン玉', '松橋', '', '松橋', 0, '2020-01-30 21:00:00.000000'),
(7, '2020-01-31', '10時00分', '14時00分', '古城児童館', 'あやとり', '鈴木', '初めてです。', '鈴木', 0, '2020-01-31 01:00:00.000000'),
(8, '2020-02-01', '8時00分', '13時00分', '古城児童館', 'ボール遊び', '松橋', '', '', 0, '2020-01-31 23:00:00.000000'),
(9, '2020-02-01', '7時00分', '15時00分', '古城児童館', 'けん玉', '渡辺', '', '', 0, '2020-01-31 22:00:00.000000'),
(10, '2020-02-04', '10時00分', '14時00分', '古城小学校', 'シーソーほか', '松橋智子', '５歳の男の子です。', '', 0, '2020-02-04 01:00:00.000000'),
(11, '2020-02-06', '16時00分', '17時00分', '海岸公園冒険広場', 'かけっこ', '武藤', '', '', 0, '2020-02-06 07:00:00.000000'),
(12, '2020-02-08', '13時00分', '15時00分', '長町公園', 'キャッチボール', '関', 'ボール、グローブあります。', '', 0, '2020-02-08 04:00:00.000000');

-- --------------------------------------------------------

--
-- テーブルの構造 `premember`
--

CREATE TABLE `premember` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `birthday` char(8) DEFAULT NULL,
  `ken` smallint(6) DEFAULT NULL,
  `link_pass` varchar(128) DEFAULT NULL,
  `reg_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `pre_user`
--

CREATE TABLE `pre_user` (
  `id` int(11) NOT NULL,
  `urltoken` varchar(128) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `pre_user`
--

INSERT INTO `pre_user` (`id`, `urltoken`, `mail`, `date`, `flag`) VALUES
(54, '47cfc748b92caf29200ec5a15c7c651f4548478344ebf851c0afaaee389cc387', 'ts76cn@gmail.com', '2020-01-24 23:22:05', 1),
(64, '81599c06308fc10e3c2b2d5fadbbf7d0f599c8480aed1a28002fd39e08f60e8c', 'ts76c@yahoo.co.jp', '2020-02-04 01:22:53', 1),
(65, '84a8b22e2ce26cdba550422b1f88769278349efce684607c0b40a39bf75d2250', 'ts76c@yahoo.co.jp', '2020-02-04 01:25:02', 1),
(66, '244f38f62409c47a8f0830c9c613d52eb4781da7dbea977c8361bcc357c38489', 'ts76cn@gmai.com', '2020-02-06 06:09:12', 0),
(67, '9914cf00e34be92045671e4a29cbfc348e381359cd3769903e0b7fb307dc8a50', 'ts76cn@gmail.com', '2020-02-06 06:14:40', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `system`
--

CREATE TABLE `system` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `system`
--

INSERT INTO `system` (`id`, `username`, `password`) VALUES
(1, 'system', '$2y$10$tUVR.YCXFVdyUeVABEYmqudPhEfHyfeK8YHVw9gg/1rN17ibTMfwq');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `mail` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '2',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `mail`, `status`, `created_at`, `updated_at`) VALUES
(25, '松橋智子', '$2y$10$fO62/3JHivyYpT4hy9Qz8e9FA6y7dEPCTu4C5cl9X7seIPN8kEvW2', 'ts76c@yahoo.co.jp', 1, '2020-02-04 01:25:57', '2020-02-04 01:25:57'),
(26, '松橋大悟', '$2y$10$l8Zbse/g348X5PJ2X66FQenCTx8Ustbmzt.XixaiBWmR5XJafUZT6', 'ts76cn@gmail.com', 1, '2020-02-06 06:16:45', '2020-02-06 06:16:45');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `ken`
--
ALTER TABLE `ken`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `minaso_yotei`
--
ALTER TABLE `minaso_yotei`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `premember`
--
ALTER TABLE `premember`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `pre_user`
--
ALTER TABLE `pre_user`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- テーブルのAUTO_INCREMENT `minaso_yotei`
--
ALTER TABLE `minaso_yotei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルのAUTO_INCREMENT `premember`
--
ALTER TABLE `premember`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `pre_user`
--
ALTER TABLE `pre_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- テーブルのAUTO_INCREMENT `system`
--
ALTER TABLE `system`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルのAUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
