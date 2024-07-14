DROP TABLE IF EXISTS `pre__ad_category`;
CREATE TABLE `pre__ad_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '名称',
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '描述',
  `sort` int(10) DEFAULT '100' COMMENT '排序',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态，1-启用',
  `edit_time` int(10) DEFAULT '0' COMMENT '更新时间',
  `edit_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '更新IP',
  `add_time` int(10) DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '添加IP',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='tags主表';

DROP TABLE IF EXISTS `pre__ad_content`;
CREATE TABLE `pre__ad_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `category_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `type` tinyint(1) DEFAULT NULL COMMENT '1-图片，2-链接，3-代码',
  `content` text CHARACTER SET utf8mb4 COMMENT '内容',
  `start_time` int(10) DEFAULT '0' COMMENT '开始时间',
  `end_time` int(10) DEFAULT '0' COMMENT '结束时间',
  `remark` mediumtext CHARACTER SET utf8mb4 COMMENT '备注',
  `sort` int(10) DEFAULT '100' COMMENT '排序',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态，1-启用',
  `edit_time` int(10) DEFAULT '0' COMMENT '更新时间',
  `edit_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '更新IP',
  `add_time` int(10) DEFAULT '0' COMMENT '添加时间',
  `add_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '添加IP',
  `url` text COLLATE utf8mb4_unicode_ci COMMENT '链接',
  `target` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self' COMMENT '跳转方式，_self-自身，_blank-跳出',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='tags主表';
