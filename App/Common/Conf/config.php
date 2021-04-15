<?php
/*
 * 公共配置文件
 * @author     Zhao
 * @Created  2020/05/18
 */
return array(

	// 显示页面Trace信息
	'SHOW_PAGE_TRACE' => true,
	/* URL设置 */
	'URL_CASE_INSENSITIVE'  =>  true,   // 默认false 表示URL区分大小写 true则表示不区分大小写
	'URL_MODEL'             =>  1,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
	// 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式
	//当前网址
	'SITE_URL'        => "http://" . $_SERVER['HTTP_HOST'],
    'URL_HTML_SUFFIX' =>  '',  // URL伪静态后缀设置
	//404页面
	'ERROR_PAGE'      => "http://" . $_SERVER['HTTP_HOST']."/index.php/Home/error",
	/* 数据库设置 */
	'DB_TYPE'         => 'mysqli',     // 数据库类型
	'DB_HOST'         => 'localhost', // 服务器地址
	'DB_NAME'         => 'demo',          // 数据库名
	'DB_USER'         => 'root',      // 用户名
	'DB_PWD'          => '',          // 密码
	'DB_PORT'         => '',        // 端口
	'DB_PREFIX'       => 'think_',    // 数据库表前缀

	/* 邮箱设置 */
	"MAIL_HOST"       => "smtp.qq.com",     //设置126邮箱服务
	"MAIL_SMTPAUTH"   => true,               //设置需要验证
	"MAIL_USERNAME"   => "", //发件人使用邮箱
	"MAIL_PASSWORD"   => "",   //设置发件人密码
	"MAIL_FROM"       => "", // 发件人邮箱
	"MAIL_FROM_NAME"  => "admin",            //发送者名称

	//上传图片访问路径
	'IMG_URL'         =>  __ROOT__."/Public/Uploads/Picture/",

	//上传文件物理路径
	'UPLOAD_PATH'     => "./Public/Uploads/",



	//后台职位管理中的TAG标签
	'TRADE'           => '2',//行业的标签ID
	'PAYID'           => '3',//月薪范围标签ID
	'EID'             => '4',//学历标签ID
	//企业列表页中的TAG标签
	'SIZEID'          => '42',//企业规模标签ID
	'ATTRID'          => '49',//企业性质标签ID

	'YEARID'          => 5,//工作年限标签ID

	//模块id
	'NEWS'            => 8, //广告模块ID
	'JOB'             => 9, //职位模块ID
	'COMPANY'         => 10,//企业模块ID
	'TITLE_PREFIX'    => '/title_',  //标题图片前缀
);
