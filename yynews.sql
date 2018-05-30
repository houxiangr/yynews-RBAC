-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-05-30 18:40:02
-- 服务器版本： 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yynews`
--

-- --------------------------------------------------------

--
-- 表的结构 `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL,
  `access_name` varchar(50) DEFAULT NULL,
  `urls` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updata_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `userName` char(20) NOT NULL,
  `userPwd` char(41) NOT NULL,
  `is_admin` tinyint(4) DEFAULT '0',
  `role_id` int(4) DEFAULT '0',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updata_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE `categories` (
  `catId` int(10) UNSIGNED NOT NULL,
  `catName` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`catId`, `catName`) VALUES
(4, '军事新闻'),
(7, '周边新闻'),
(2, '国际新闻'),
(3, '头条新闻'),
(8, '娱乐新闻'),
(6, '科技新闻'),
(5, '财经新闻');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE `comments` (
  `commId` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `createTime` int(11) NOT NULL,
  `newsId` int(11) NOT NULL,
  `userIP` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`commId`, `content`, `createTime`, `newsId`, `userIP`) VALUES
(1, '规范的施工方的是', 1497260889, 23, '::1'),
(2, 'das', 1527695668, 16, '::1');

-- --------------------------------------------------------

--
-- 表的结构 `friend_link`
--

CREATE TABLE `friend_link` (
  `link_name` varchar(20) NOT NULL,
  `link_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `newsId` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createTime` int(11) NOT NULL,
  `catId` int(11) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `hot` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`newsId`, `title`, `content`, `createTime`, `catId`, `pic`, `hot`) VALUES
(6, '凤凰新闻', '凤凰新闻，你值得拥有', 1482853453, 3, NULL, 0),
(7, '这是一条认真的国际新闻', '全球最大游轮将首航', 1482853453, 2, NULL, 0),
(8, '南海问题', '南海仲裁案，中国表示不参与不接受，采取你爱咋咋地我就是不干的态度', 1482853454, 2, NULL, 0),
(9, '职业乞讨村', '武汉现职业乞讨村，老人称为儿女减负', 1482853454, 3, NULL, 1),
(10, '狗荡秋千', '主人把狗狗放到秋千上玩耍，狗狗笑成了。。。怎么说，就笑成了表情包里的样子', 1482853454, 3, NULL, 0),
(11, '官场地震', '广东清扬官场持续地震，三位主要领导已被查', 1482853454, 3, NULL, 0),
(12, '熊市大赚之谜', '女股民熊市大赚之谜，称多亏了xx微信群，我差点就信了！ ', 1482853454, 3, NULL, 0),
(13, '中俄坦克实力逆转', 'VT4击败T90装备泰军', 1482853454, 4, NULL, 0),
(14, '中国改善军事演习', '中国改善军事演习，设计情景比美国还危险', 1482853454, 4, NULL, 0),
(15, '曼德拉被捕情报', '美中情局特工称曾为逮捕曼德拉提供情报', 1482853454, 4, NULL, 0),
(16, '蔡英文事儿真多', '台湾欲修改公投法挑动两岸神经', 1482853454, 4, NULL, 3),
(17, 'A股直播', '沪指地量震荡站稳2800，稀土永磁股爆发', 1482853454, 5, NULL, 0),
(19, '李迅雷评投资数据', '资源错配太多年，至于为什么我打开看了看不懂', 1482853455, 5, NULL, 0),
(23, '1234', '1234', 1483877944, 4, NULL, 0),
(27, '11', '11', 1483882754, 4, '/yynews/Public/Uploads/2017-01-08/5872410220ed6.jpg', 0);

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updata_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `role_access`
--

CREATE TABLE `role_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `access_id` int(11) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userName`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`),
  ADD UNIQUE KEY `catName` (`catName`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commId`);

--
-- Indexes for table `friend_link`
--
ALTER TABLE `friend_link`
  ADD PRIMARY KEY (`link_name`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_access`
--
ALTER TABLE `role_access`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `comments`
--
ALTER TABLE `comments`
  MODIFY `commId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用表AUTO_INCREMENT `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `role_access`
--
ALTER TABLE `role_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
