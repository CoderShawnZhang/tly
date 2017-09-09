<?php
/**
 * 框架启动文件
 */
namespace core;

class tly
{
    public static $classMap = array();
    /**
     * 框架入口
     */
    public static function run()
    {
        //启动路由解析
        $route = new \core\lib\route();
//        dd($route);
    }

    /**
     * 自动加载类
     */
    public static function load($class)
    {
        //new \core\route();
        //$class = '\core\route';
        //TLY.'/core/route.php';

        if(isset($classMap[$class])){
            return true;
        }else {
            $class = str_replace('\\', '/', $class);
            $file = TLY.'/'.$class.'.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}