create database if not exists ycc default charset utf8;

use ycc;

-- 作品集
CREATE TABLE IF NOT EXISTS works_collect (
	`id` INT unsigned primary key auto_increment COMMENT '主键id',
	`name` varchar(32) NOT NULL DEFAULT '' COMMENT '作品集名称',
	`type` TINYINT unsigned NOT NULL DEFAULT 0 COMMENT '作品集类型 0写作 1摄影 2音频 3视频',
	`desc` varchar(32) NOT NULL DEFAULT '' COMMENT '作品集介绍',

	`uid` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建人 用户表主键id',
	`view_num` INT unsigned NOT NULL DEFAULT 0 COMMENT '浏览次数',
	`works_num` INT unsigned NOT NULL DEFAULT 0 COMMENT '作品数量',
	`collect_num` INT unsigned NOT NULL DEFAULT 0 COMMENT '收藏数量',

	`create_time` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建时间'

)ENGINE=Innodb DEFAULT CHARSET=uft8;

-- 作品
CREATE TABLE IF NOT EXISTS works (
	`id` INT unsigned primary key auto_increment COMMENT '主键id',
	`name` varchar(32) NOT NULL DEFAULT '' COMMENT '作品名称',
	`type` TINYINT unsigned NOT NULL DEFAULT 0 COMMENT '作品类型 0写作 1摄影 2音频 3视频',
	`desc` varchar(32) NOT NULL DEFAULT '' COMMENT '作品介绍',

	`collect_id` INT unsigned NOT NULL DEFAULT 0 COMMENT '作品集主键id',
	`file_id` INT unsigned NOT NULL DEFAULT 0 COMMENT '文件表主键id',
	`article_id` INT unsigned NOT NULL DEFAULT 0 COMMENT '文章表主键id',
	`uid` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建人 用户表主键id',

  `view_num` INT unsigned NOT NULL DEFAULT 0 COMMENT '浏览次数',
	`collect_num` INT unsigned NOT NULL DEFAULT 0 COMMENT '收藏数量',
	`is_del` tinyint unsigned NOT NULL DEFAULT 0 COMMENT '是否删除 0否 1是',
  -- 公共
	`create_time` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建时间'


)ENGINE=Innodb DEFAULT CHARSET=uft8;

-- 文章表
CREATE TABLE IF NOT EXISTS article (
  `id` INT unsigned primary key auto_increment COMMENT '主键id',
	`name` varchar(32) NOT NULL DEFAULT '' COMMENT '文章标题',
	`desc` varchar(32) NOT NULL DEFAULT '' COMMENT '作品介绍',
	`content` text NOT NULL DEFAULT '' COMMENT '文章内容',
	`uid` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建人 用户表主键id',
  -- 公共
	`create_time` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建时间',
	`update_time` INT unsigned NOT NULL DEFAULT 0 COMMENT '修改时间'

)ENGINE=Innodb DEFAULT CHARSET=uft8;

-- 用户表
CREATE TABLE IF NOT EXISTS `user` (
	`id` INT unsigned primary key auto_increment COMMENT '主键id',
	`username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
	`phone_no` varchar(15) NOT NULL DEFAULT '' COMMENT '电话号码',
	`password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
	`nickname` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
	`status` tinyint unsigned NOT NULL DEFAULT 0 COMMENT '用户状态 0未激活 1已激活 2冻结',

	`openid` varchar(255) NOT NULL DEFAULT '' COMMENT '微信openid',

  -- 公共
	`create_time` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建时间'

)ENGINE=Innodb DEFAULT CHARSET=uft8;

-- 文件表
CREATE TABLE IF NOT EXISTS `files` (
	`id` INT unsigned primary key auto_increment COMMENT '主键id',
	`type` TINYINT unsigned NOT NULL DEFAULT 0 COMMENT '作品类型 0写作 1摄影 2音频 3视频',
  `save_url` varchar(255) NOT NULL DEFAULT '' COMMENT '作品保存路径',

  -- 公共
	`create_time` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建时间'

)ENGINE=Innodb DEFAULT CHARSET=uft8;

-- 评论表
CREATE TABLE IF NOT EXISTS `comment` (
	`id` INT unsigned primary key auto_increment COMMENT '主键id',
  `content` text NOT NULL DEFAULT '' COMMENT '评论内容',

  `wid` INT unsigned NOT NULL DEFAULT 0 COMMENT '作品主键id',
  `uid` INT unsigned NOT NULL DEFAULT 0 COMMENT '用户主键id 为0匿名评论',
  `pid` INT unsigned NOT NULL DEFAULT 0 COMMENT '评论表主键id 为0顶级评论 为1为评论1的评论',

  `is_good` tinyint unsigned NOT NULL DEFAULT 0 COMMENT '是否是精选评论 0否 1是',
  `is_del` tinyint unsigned NOT NULL DEFAULT 0 COMMENT '是否删除 0否 1是',

  -- 公共
	`create_time` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建时间'

)ENGINE=Innodb DEFAULT CHARSET=uft8;

-- 点赞、关注、转发、收藏
CREATE TABLE IF NOT EXISTS `like` (
	`id` INT unsigned primary key auto_increment COMMENT '主键id',
  `content` text NOT NULL DEFAULT '' COMMENT '评论内容',

  `wid` INT unsigned NOT NULL DEFAULT 0 COMMENT '作品主键id',
  `type` tinyint unsigned NOT NULL DEFAULT 0 COMMENT '类型 0点赞 1转发 2收藏 3关注',
  `uid` INT unsigned NOT NULL DEFAULT 0 COMMENT '被点赞..用户主键id',
  `by_uid` INT unsigned NOT NULL DEFAULT 0 COMMENT '点赞..用户主键id',

  -- 公共
	`create_time` INT unsigned NOT NULL DEFAULT 0 COMMENT '创建时间'

)ENGINE=Innodb DEFAULT CHARSET=uft8;





