<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/9/9
 * Time: 下午3:29
 */
namespace core\lib;

class log
{
    static $class;
    /**
     * 1 确定日志的存储方式
     *
     * 2 写日志
     */

    public static function init(){
        //确定存储方式
        $drive = config::get('DRIVE','log');

        $class = 'core\lib\drive\log\\'.$drive;//驱动类

        self::$class = new $class();
    }

    public static function log($message,$file='log'){
        self::$class->log($message,$file);
    }
}