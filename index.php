<?php
/**
 * 框架的入口文件
 * 1:定义常量
 * 2:加载函数库
 * 3:启动框架
 */
//error_reporting();
/*1*/
define('TLY',realpath(''));
define('CORE',TLY.'/core');
define('APP',TLY.'/app');
define('MODULE','app');
define('DEBUG',true);

if (DEBUG) {
   ini_set('display_error','On');
} else {
    ini_set('display_error','Off');
}

/*2*/
include CORE.'/common/function.php';//加载函数库
include CORE.'/tly.php';

spl_autoload_register('\core\tly::load');//new一个类时不存在会触发load该方法

/*3*/
\core\tly::run();//启动框架