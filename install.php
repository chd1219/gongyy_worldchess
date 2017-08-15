<?php
$sql = "
        
CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_category` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属帐号',
 `name` varchar(50) NOT NULL COMMENT '分类名称',
 `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
 `ico` varchar(255) DEFAULT NULL COMMENT '分类图标',
 `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
 `addtime` int(10) DEFAULT NULL COMMENT '添加时间',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='课程分类表';

--
-- 转存表中的数据 `ims_gongyy_wechess_category`
--

INSERT INTO `ims_gongyy_worldchess_category` (`id`, `uniacid`, `name`, `parentid`, `ico`, `displayorder`, `addtime`) VALUES
(1, 5, '象棋开局', 0, 'images/5/2017/02/NTzCxz5XT5CjjOPpoO5MemtPJ6nPEP.png', 90, 1473514173),
(2, 5, '象棋中局', 0, 'images/5/2017/02/X2ufQ2z0Kn2n5J2TN2QNQ5JjzrFnqJ.png', 80, 1473514206),
(3, 5, '象棋残局', 0, 'images/5/2017/02/p6260yz72i7yY66Fy6dYTwi5Yv5n7I.png', 70, 1473514237),
(4, 5, '全局拆解', 0, 'images/5/2017/02/dgP7X5J92yNAoqQaZkAAq2xazaiJ5Q.png', 50, 1473514313),
(5, 5, '象棋赛事', 0, 'images/5/2017/02/UwjZACcCRF7ZYv4aU0EzrFm8f4Y8Rf.png', 60, 1485920240),
(6, 5, '古谱残局', 0, 'images/5/2017/02/qQhHv9vHH07hEVtZdqzV9O4dz4D8TH.png', 40, 1485920283),
(7, 5, '棋谱学习', 0, 'images/5/2017/02/yL63LjU4jbEB2J1e8S183BJbSB3l1U.png', 30, 1485920336),
(8, 5, '象棋杀着', 0, 'images/5/2017/02/Z72jZe833836w623ESb3is296sSj3S.png', 20, 1485920358),
(9, 5, '自战对局', 0, 'images/5/2017/02/i2mE2uRfa85Reer8m9R2m0ZDOe5ezk.png', 10, 1485920387);

-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_chess` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `uniacid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL DEFAULT '-1',
  `redplayerid` int(11) NOT NULL DEFAULT '0',
  `reduid` int(11) NOT NULL DEFAULT '0',
  `redopenid` varchar(255) DEFAULT NULL,
  `redname` varchar(60) DEFAULT NULL,
  `blackplayerid` int(11) NOT NULL DEFAULT '0',
  `blackuid` int(11) NOT NULL DEFAULT '0',
  `blackopenid` varchar(255) DEFAULT NULL,
  `blackname` varchar(60) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `chessdata` longtext,
  `title` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `chesstime` int(11) DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) DEFAULT NULL,
  `iszhiding` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1置顶',
  `isjinghua` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1精华',
  `ishot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1热门',
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1审核通过1未审核-1未通过',
  `clicksum` int(10) unsigned NOT NULL DEFAULT '0',
  `collectsum` int(10) unsigned NOT NULL DEFAULT '0',
  `sharesum` int(10) unsigned NOT NULL DEFAULT '0',
  `prizesum` int(8) DEFAULT NULL,
  `treadsum` int(8) DEFAULT NULL,
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_collect` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) DEFAULT NULL,
  `chessid` int(11) NOT NULL DEFAULT '0',
  `filename` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_comments_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(5) NOT NULL,
  `chessid` int(11) NOT NULL COMMENT '内容id',
  `openid` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `commentdate` varchar(20) NOT NULL,
  `commenttext` text NOT NULL,
  `level` int(5) DEFAULT '1' COMMENT '1为评论，2为回复',
  `parentid` int(11) NOT NULL,
  `pcid` int(11) NOT NULL,
  `pcrid` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1默认审核通过',
  `prizesum` int(10) NOT NULL DEFAULT '0',
  `comment` int(11) NOT NULL DEFAULT '0' COMMENT '被回复总数',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(5) NOT NULL,
  `chessid` int(11) NOT NULL COMMENT '内容id',
  `openid` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `commentdate` varchar(20) NOT NULL,
  `commenttext` text NOT NULL,
  `prizesum` int(10) NOT NULL DEFAULT '0',
  `comment` int(11) NOT NULL DEFAULT '0' COMMENT '被回复总数',
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_feedback` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `uniacid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) DEFAULT NULL,
  `nickname` varchar(20) NOT NULL,
  `description` varchar(300) NOT NULL COMMENT '问题描述',
  `photo` varchar(255) NOT NULL COMMENT '问题图片',
  `score` int(1) NOT NULL DEFAULT '0' COMMENT '应用评分',
  `contact` varchar(30) NOT NULL COMMENT '联系方式',
  `createtime` int(11) NOT NULL DEFAULT '0',
  `issolved` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0未解决1解决',
  `solvedname` varchar(10) NOT NULL COMMENT '问题解决人',
  `solvedtime` int(11) NOT NULL COMMENT '解决时间',
  `record` varchar(100) NOT NULL COMMENT '问题记录',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_credit_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acid` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL COMMENT '订单id',
  `uid` int(11) DEFAULT NULL COMMENT '会员编号',
  `openid` varchar(100) DEFAULT NULL COMMENT '粉丝编号',
  `log_type` tinyint(1) NOT NULL COMMENT '日志类型 1.充值日志  2.兑换vip日志,3赠送积分cfy',
  `change_type` tinyint(1) DEFAULT NULL COMMENT '变动类型 1.增加 2.减少',
  `number` int(11) DEFAULT NULL COMMENT '变动数额',
  `after_total` int(11) DEFAULT NULL COMMENT '变动后剩余数额',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1321 DEFAULT CHARSET=utf8 COMMENT='积分日志表';

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_credit_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `acid` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `ordersn` varchar(100) DEFAULT NULL COMMENT '订单编号',
  `uid` int(11) DEFAULT NULL COMMENT '会员编号',
  `openid` varchar(100) DEFAULT NULL COMMENT '粉丝编号',
  `credit_number` int(11) DEFAULT NULL COMMENT '充值积分数',
  `change_ratio` decimal(10,2) DEFAULT NULL COMMENT '积分比例',
  `total_amount` decimal(10,2) DEFAULT NULL COMMENT '应付金额',
  `status` tinyint(1) DEFAULT '0' COMMENT '订单状态 -1.已取消 0.未付款 1.已支付',
  `payment_type` varchar(50) DEFAULT NULL COMMENT '支付方式',
  `payment_time` int(10) DEFAULT NULL COMMENT '支付时间',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COMMENT='积分充值订单表';

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_follow` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) DEFAULT NULL,
  `playerid` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=612 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_operation_log` (
   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '1.新增',
  `desc` varchar(500) DEFAULT NULL,
  `addtime` int(10) DEFAULT NULL,
   PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_player` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL,
  `playername` varchar(40) DEFAULT NULL,
  `letter` char(1) DEFAULT NULL,
  `playerlevel` varchar(40) NOT NULL DEFAULT '业余棋手',
  `chesssum` int(11) NOT NULL DEFAULT '0',
  `followsum` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '2',
  `uid` int(11) NOT NULL DEFAULT '0',
  `openid` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `playerdes` text,
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=313 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_prize` (
   `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(5) NOT NULL,
  `chessid` int(11) NOT NULL COMMENT '内容id',
  `uid` int(11) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `prizedate` varchar(20) NOT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '0',
  `type` tinyint(2) DEFAULT '0' COMMENT '0为赞，1为踩',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=476 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_setting` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(11) NOT NULL DEFAULT '0',
  `sitename` varchar(60) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `isfollow` tinyint(1) NOT NULL DEFAULT '0',
  `followdescription` varchar(200) NOT NULL,
  `istemplate` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1开启模板',
  `chess_add_info` varchar(255) NOT NULL DEFAULT '' COMMENT '新增棋谱模板',
  `player_add_info` varchar(255) NOT NULL DEFAULT '' COMMENT '新增棋手模板',
  `collect_update_info` varchar(255) NOT NULL DEFAULT '' COMMENT '收藏更新模板',
  `follow_update_info` varchar(255) NOT NULL DEFAULT '' COMMENT '关注更新模板',
  `publish_read_info` varchar(255) NOT NULL DEFAULT '' COMMENT '棋谱浏览更新',
  `publish_share_info` varchar(255) NOT NULL DEFAULT '' COMMENT '棋谱分享更新模板',
  `credit1_ratio` decimal(10,2) DEFAULT '0.00',
  `manageopenid` varchar(255) DEFAULT NULL,
  `manage` text NOT NULL,
  `vip_service` text,
  `vipdesc` text,
  `updatetime` int(11) NOT NULL DEFAULT '0',
  `addtime` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_prize_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uniacid` int(5) NOT NULL,
  `chessid` int(11) NOT NULL COMMENT '内容id',
  `commentid` int(11) NOT NULL,
  `pcid` int(11) NOT NULL,
  `pcrid` int(11) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `prizedate` varchar(20) NOT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0为评论，1为回复',
   PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=429 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_user` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uniacid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `parentid` int(11) NOT NULL DEFAULT '0',
  `flowsum` int(11) NOT NULL DEFAULT '0',
  `collectsum` int(11) NOT NULL DEFAULT '0',
  `publishsum` int(11) NOT NULL DEFAULT '0',
  `updatetime` int(11) DEFAULT '0',
  `vip` tinyint(1) NOT NULL DEFAULT '0' COMMENT '身份 0.普通用户  1.vip用户',
  `vip_validity` int(10) NOT NULL DEFAULT '0' COMMENT 'vip过期时间',
  `status` int(1) NOT NULL DEFAULT '1',
  `addtime` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=381 DEFAULT CHARSET=utf8;

	CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_user_setting` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(8) NOT NULL,
  `openid` varchar(50) NOT NULL,
  `chess_add_info` tinyint(2) NOT NULL DEFAULT '0' COMMENT '新增棋谱，通知1',
  `player_add_info` tinyint(2) NOT NULL DEFAULT '0' COMMENT '新增棋手通知1',
  `collect_update_info` tinyint(2) NOT NULL DEFAULT '1' COMMENT '收藏更新',
  `follow_update_info` tinyint(2) NOT NULL DEFAULT '1' COMMENT '关注更新',
  `publish_read_info` tinyint(2) NOT NULL DEFAULT '1' COMMENT '浏览更新',
  `publish_share_info` tinyint(1) NOT NULL DEFAULT '1' COMMENT '分享更新',
  `addtime` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ims_gongyy_worldchess_credit1_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `acid` int(11) NOT NULL,
  `uniacid` int(11) NOT NULL,
  `orderid` varchar(100) DEFAULT NULL COMMENT '订单id',
  `uid` int(11) DEFAULT NULL COMMENT '会员编号',
  `openid` varchar(100) DEFAULT NULL COMMENT '粉丝编号',
  `change_type` tinyint(1) DEFAULT NULL COMMENT '变动类型 1.增加 2.减少',
  `number` int(11) DEFAULT NULL COMMENT '变动数额',
  `after_total` int(11) DEFAULT NULL COMMENT '变动后剩余数额',
  `addtime` int(10) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='积分日志表' AUTO_INCREMENT=1 ;
";
pdo_run($sql);