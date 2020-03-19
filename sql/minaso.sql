-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2020 年 3 月 19 日 10:50
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `minaso`
--

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

-- --------------------------------------------------------

--
-- テーブルの構造 `system`
--

CREATE TABLE `system` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `minaso_yotei`
--
ALTER TABLE `minaso_yotei`
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
-- テーブルのAUTO_INCREMENT `minaso_yotei`
--
ALTER TABLE `minaso_yotei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- テーブルのAUTO_INCREMENT `pre_user`
--
ALTER TABLE `pre_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- テーブルのAUTO_INCREMENT `system`
--
ALTER TABLE `system`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルのAUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
