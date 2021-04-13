-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2021 at 09:05 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `book_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_data`
--

CREATE TABLE `book_data` (
  `no` int(12) NOT NULL,
  `title` varchar(64) NOT NULL,
  `author` varchar(128) NOT NULL,
  `url` text NOT NULL,
  `memo` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_data`
--

INSERT INTO `book_data` (`no`, `title`, `author`, `url`, `memo`, `date`) VALUES
(1, '風のマジム', '原田マハ', 'https://www.amazon.co.jp/%E9%A2%A8%E3%81%AE%E3%83%9E%E3%82%B8%E3%83%A0-%E8%AC%9B%E8%AB%87%E7%A4%BE%E6%96%87%E5%BA%AB-%E5%8E%9F%E7%94%B0-%E3%83%9E%E3%83%8F/dp/4062778874', '心が洗われる。ラム酒飲みたくなる。沖縄行きたくなる。初心に返って、もっとピュアな気持ちで仕事頑張ろ、って思える。', '2021-04-06 20:17:19'),
(2, '本日はお日柄もよく', '原田マハ', 'https://www.amazon.co.jp/%E6%9C%AC%E6%97%A5%E3%81%AF%E3%80%81%E3%81%8A%E6%97%A5%E6%9F%84%E3%82%82%E3%82%88%E3%81%8F-%E5%BE%B3%E9%96%93%E6%96%87%E5%BA%AB-%E5%8E%9F%E7%94%B0%E3%83%9E%E3%83%8F/dp/4198937060', '言葉が人を作りますね、気をつけたいです。', '2021-03-29 21:28:36'),
(3, 'キネマの神様', '原田マハ', 'https://www.amazon.co.jp/%E3%82%AD%E3%83%8D%E3%83%9E%E3%81%AE%E7%A5%9E%E6%A7%98-%E6%96%87%E6%98%A5%E6%96%87%E5%BA%AB-%E5%8E%9F%E7%94%B0-%E3%83%9E%E3%83%8F/dp/4167801337', '志村けんさんが主演をつとめる予定だった映画の原作です。8月、やっと映画公開されます。ぜひ見てください。', '2021-03-29 21:48:20'),
(4, 'キャロリング', '有川浩', 'https://www.amazon.co.jp/s?k=%E6%9C%89%E5%B7%9D%E6%B5%A9&i=stripbooks&page=2&__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&qid=1617022909&ref=sr_pg_2', 'クリスマスで、なんか事件が起きて、、、あんまり覚えてない', '2021-03-29 22:03:11'),
(5, 'ビジネスの未来', '山口周', 'https://www.amazon.co.jp/%E3%83%93%E3%82%B8%E3%83%8D%E3%82%B9%E3%81%AE%E6%9C%AA%E6%9D%A5-%E3%82%A8%E3%82%B3%E3%83%8E%E3%83%9F%E3%83%BC%E3%81%AB%E3%83%92%E3%83%A5%E3%83%BC%E3%83%9E%E3%83%8B%E3%83%86%E3%82%A3%E3%82%92%E5%8F%96%E3%82%8A%E6%88%BB%E3%81%99-%E5%B1%B1%E5%8F%A3-%E5%91%A8/dp/4833423936/ref=sr_1_1?adgrpid=107903530987&dchild=1&gclid=Cj0KCQjw9YWDBhDyARIsADt6sGZmlYBuZpwTJkE1AemnFk29umYEyB6626e8jczX96HVegdnMqcFWHEaAnH1EALw_wcB&hvadid=450596036786&hvdev=c&hvlocphy=1009247&hvnetw=g&hvqmt=e&hvrand=3068582323692080606&hvtargid=kwd-1043716723427&hydadcr=11011_11045187&jp-ad-ap=0&keywords=%E3%83%93%E3%82%B8%E3%83%8D%E3%82%B9+%E3%81%AE+%E6%9C%AA%E6%9D%A5&qid=1617076797&sr=8-1', '（積ん読）次読む。。。', '2021-03-30 13:00:19'),
(6, '動かして学ぶ！Laravel開発入門', '山崎先生', 'https://www.amazon.co.jp/%E5%8B%95%E3%81%8B%E3%81%97%E3%81%A6%E5%AD%A6%E3%81%B6-Laravel%E9%96%8B%E7%99%BA%E5%85%A5%E9%96%80-NEXT-ONE-%E5%B1%B1%E5%B4%8E/dp/4798168653/ref=tmm_pap_swatch_0?_encoding=UTF8&qid=&sr=', '早く買って早く読まねば、というやる気はある。', '2021-04-06 20:17:47'),
(14, 'ログインしないと', '登録できないよ', 'hogehoge', 'ログイン', '2021-04-13 21:00:22'),
(15, 'ログインしたから', '登録できる', 'soyukoto', 'できるでしょ？', '2021-04-13 21:02:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_data`
--
ALTER TABLE `book_data`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_data`
--
ALTER TABLE `book_data`
  MODIFY `no` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
