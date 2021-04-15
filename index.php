<?php
/*
 * @author    Xixi Zhao
 * @filename index.php
 * @Created  2020/05/12 12:59
 */

define("APP_DEBUG",true);
//定义应用路径
define("APP_PATH","./App/");
//配置应用状态home
//define('APP_STATUS','home');
//定义缓存目录
define('RUNTIME_PATH',"./Runtime/");

require("./ThinkPHP/ThinkPHP.php");