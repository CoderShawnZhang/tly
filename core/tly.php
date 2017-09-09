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
        $controller = $route->controller;
        $action = $route->action;
        $controllerFile = APP.'/controller/'.$controller.'Controller.php';
        $controllerClass = '\\'.MODULE.'\controller\\'.$controller.'controller';
        if(is_file($controllerFile)){
            include $controllerFile;
            $routeObj = new $controllerClass();//实例化控制器
            $routeObj->$action();//调用控制器方法
        }else{
            throw new \Exception('找不到控制器');
        }
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