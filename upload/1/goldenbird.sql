-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Apr 24, 2013, 08:37 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `goldenbird`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `website`
-- 

CREATE TABLE `website` (
  `wId` int(10) unsigned NOT NULL auto_increment,
  `wName` varchar(255) collate utf8_unicode_ci NOT NULL default '未命名網籤',
  `wSite` varchar(255) collate utf8_unicode_ci NOT NULL,
  `wTime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `click` mediumint(8) unsigned NOT NULL default '0',
  `gId` int(64) NOT NULL default '1',
  `mId` int(255) unsigned NOT NULL default '0',
  PRIMARY KEY  (`wId`),
  KEY `gId` (`gId`),
  KEY `mId` (`mId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;

-- 
-- 列出以下資料庫的數據： `website`
-- 

INSERT INTO `website` VALUES (1, '未命名網籤', 'http://www.yahoo.com.tw', '2013-04-02 22:45:11', 0, -1, 0);
INSERT INTO `website` VALUES (2, 'yahoo', 'www.yahoo.com.tw', '2013-04-03 00:00:01', 0, 2, 0);
INSERT INTO `website` VALUES (3, '臉書', 'https://www.facebook.com.tw', '2013-04-03 16:57:33', 0, 6, 0);
INSERT INTO `website` VALUES (4, 'Android', 'www.adroid.com', '2013-04-03 17:28:57', 0, 1, 0);
INSERT INTO `website` VALUES (5, 'yam', 'www.yam.com', '2013-04-03 17:32:25', 0, 2, 0);
INSERT INTO `website` VALUES (6, 'GoldenBird', 'www.goldenbird.com.tw', '2013-04-03 17:32:58', 0, 1, 0);
INSERT INTO `website` VALUES (7, '000space免網空', 'cpanel.000space.com', '2013-04-03 17:33:56', 0, 1, 0);
INSERT INTO `website` VALUES (8, 'Google', 'https://www.google.com', '2013-04-03 17:34:32', 0, 2, 0);
INSERT INTO `website` VALUES (9, 'ETtoday 東森新聞雲', 'www.ettoday.net', '2013-04-03 17:37:53', 0, 3, 0);
INSERT INTO `website` VALUES (10, '遊戲口袋 - 遊戲世界', 'i-gameworld.com/tc/index3.html', '2013-04-03 17:42:41', 0, 4, 0);
INSERT INTO `website` VALUES (11, 'Twitter', 'https://twitter.com/', '2013-04-03 17:49:11', 0, 6, 0);
INSERT INTO `website` VALUES (12, '科技報橘', 'http://techorange.com/', '2013-04-13 16:26:12', 0, 7, 0);
INSERT INTO `website` VALUES (13, 'Fans', 'http://appnews.fanswong.com/', '2013-04-14 17:21:39', 0, 3, 0);
INSERT INTO `website` VALUES (14, 'COPY', 'www.copy.com', '2013-04-14 21:45:15', 0, 8, 0);
INSERT INTO `website` VALUES (15, 'Dropbox', 'https://www.dropbox.com/', '2013-04-14 21:46:34', 0, 8, 0);
INSERT INTO `website` VALUES (16, '卡卡洛普', 'http://www.gamme.com.tw/', '2013-04-15 21:33:54', 0, 3, 0);
INSERT INTO `website` VALUES (17, 'Citytalk城市通', 'http://www.citytalk.tw/', '2013-04-15 21:41:19', 0, 9, 0);
INSERT INTO `website` VALUES (18, '7Headlines', 'http://www.7headlines.com/signup/?next=/', '2013-04-17 12:38:51', 0, 5, 0);
INSERT INTO `website` VALUES (19, '測試', 'http://www.phsea.com.tw/forum/forum.php?mod=viewthread', '2013-04-19 09:13:17', 0, -10, 0);
INSERT INTO `website` VALUES (20, '測試2', 'http://www.phsea.com.tw', '2013-04-19 09:26:45', 0, -10, 0);
INSERT INTO `website` VALUES (21, '沿著菊島旅行論壇', 'www.phsea.com.tw/forum/forum.php?mod=viewthread', '2013-04-19 09:42:55', 0, 10, 0);
INSERT INTO `website` VALUES (22, '沿著菊島旅行', 'http://www.phsea.com.tw/nono', '2013-04-19 09:49:14', 0, -1, 0);
INSERT INTO `website` VALUES (23, '沿著菊島旅行', 'http://www.phsea.com.tw/forum/forum.php?mod=viewthread/', '2013-04-19 10:10:06', 0, -1, 0);
INSERT INTO `website` VALUES (24, '沿著菊島旅行', 'http://www.phsea.com/', '2013-04-19 10:16:02', 0, 1, 0);
INSERT INTO `website` VALUES (25, '沿著菊島旅行TW', 'http://www.phsea.com.tw/', '2013-04-19 10:18:06', 0, 1, 0);
INSERT INTO `website` VALUES (26, '測試', 'www.test.com.tw/', '2013-04-19 10:20:11', 0, 1, 0);
INSERT INTO `website` VALUES (27, '尊爵黑 星漾紅', 'http://www.it.com.cn/f/notebook/069/25/328778.htm/', '2013-04-19 11:06:54', 0, -1, 0);
INSERT INTO `website` VALUES (28, '測試001', 'http://www.test001.com.tw', '2013-04-19 11:09:21', 0, 1, 0);
INSERT INTO `website` VALUES (29, '尊爵黑 星漾紅', 'http://www.it.com.cn/f/notebook/069/25/328778.htm', '2013-04-19 11:11:13', 0, 1, 0);
INSERT INTO `website` VALUES (30, '40 top examples of JavaScript', 'http://www.creativebloq.com/web-design/examples-of-javascript-1233964', '2013-04-20 09:40:56', 0, 13, 0);
INSERT INTO `website` VALUES (31, '遊戲狂', 'http://www.gamemad.com/detail_flash.php?id=2318', '2013-04-20 11:28:00', 0, -14, 0);
INSERT INTO `website` VALUES (32, '遊戲狂', 'http://www.gamemad.com/detail_flash.php?', '2013-04-20 13:33:10', 0, -14, 0);
INSERT INTO `website` VALUES (33, '遊戲狂', 'http://www.gamemad.com/index.php', '2013-04-20 13:34:51', 0, -1, 0);
INSERT INTO `website` VALUES (34, '遊戲狂', 'http://www.gamemad.com/index.php', '2013-04-20 13:39:15', 0, 14, 0);
INSERT INTO `website` VALUES (35, '各公司薪水薪資查詢-台灣', 'http://www.ursalary.com/search.php', '2013-04-20 13:46:16', 0, 9, 0);
INSERT INTO `website` VALUES (36, '亦歌網', 'http://www.1g1g.com/', '2013-04-20 19:43:20', 0, 14, 0);
INSERT INTO `website` VALUES (37, 'YOYOgames', 'http://www.yoyogames.com/', '2013-04-20 21:51:57', 0, 14, 0);

-- --------------------------------------------------------

-- 
-- 資料表格式： `website_group`
-- 

CREATE TABLE `website_group` (
  `gId` int(255) unsigned NOT NULL auto_increment,
  `gName` varchar(16) collate utf8_unicode_ci NOT NULL default '其他',
  `gTime` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `enable` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`gId`),
  KEY `gId2` (`gId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

-- 
-- 列出以下資料庫的數據： `website_group`
-- 

INSERT INTO `website_group` VALUES (1, '其他', '2013-04-02 22:46:04', 1);
INSERT INTO `website_group` VALUES (2, '入口網站', '2013-04-03 16:17:28', 1);
INSERT INTO `website_group` VALUES (3, '新聞', '2013-04-03 16:34:05', 1);
INSERT INTO `website_group` VALUES (4, '遊戲', '2013-04-03 16:34:18', 1);
INSERT INTO `website_group` VALUES (5, 'X', '2013-04-03 17:08:30', 1);
INSERT INTO `website_group` VALUES (6, '社群', '2013-04-03 17:49:11', 1);
INSERT INTO `website_group` VALUES (7, '創新', '2013-04-13 16:26:12', 1);
INSERT INTO `website_group` VALUES (8, '雲端硬碟', '2013-04-14 21:45:15', 1);
INSERT INTO `website_group` VALUES (9, '情報', '2013-04-15 21:41:14', 1);
INSERT INTO `website_group` VALUES (10, '旅遊', '2013-04-19 09:13:15', 1);
INSERT INTO `website_group` VALUES (11, '沒用', '2013-04-19 09:34:29', -1);
INSERT INTO `website_group` VALUES (12, '科學與技術', '2013-04-20 09:40:56', -1);
INSERT INTO `website_group` VALUES (13, '科學與技術', '2013-04-20 11:28:27', 1);
INSERT INTO `website_group` VALUES (14, '娛樂', '2013-04-20 12:16:34', 1);
INSERT INTO `website_group` VALUES (15, '無聊往', '2013-04-20 12:21:51', -1);
INSERT INTO `website_group` VALUES (16, '測試', '2013-04-20 12:28:02', -1);
