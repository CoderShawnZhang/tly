<?php
/**
 * 框架启动文件
 */
namespace core;

use core\lib\log;

class tly
{

    public static $classMap = array();

    public $assign;
    /**
     * 框架入口
     */
    public static function run()
    {
        log::init();
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
            log::log('Controller:'.$controller.'  -  '.'Action:'.$action,'route');
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

    public function assign($name,$value){
        $this->assign[$name] = $value;
    }

    public function display($file){
        $file = APP.'/views/'.$file;
        if(is_file($file)){
            extract($this->assign);//将数组打散成单独变量
            include $file;
        }
    }
}