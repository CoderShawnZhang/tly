<?php
/**
 * 路由解析
 */

namespace core\lib;

class route
{
    /**
     * @var 路由控制器
     */
    public $controller;

    /**
     * @var 路由方法
     */
    public $action;

    /**
     * 路由解析
     *
     * route constructor.
     */
    public function __construct()
    {
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('/',trim($path,'/'));
            if(isset($pathArr[0])){
                $this->controller = $pathArr[0];//存在控制器u
                unset($pathArr[0]);//卸载控制器
            }
            if(isset($pathArr[1])){
                $this->action = $pathArr[1];//存在方法
                unset($pathArr[1]);//卸载方法
            }else{
                $this->action = 'index';
            }

            //解析路由参数
            $params = count($pathArr) + 2;
            $i = 2;
            while ($i < $params){
                if(isset($pathArr[$i+1])){
                    $_GET[$pathArr[$i]] = $pathArr[$i+1];
                }
                $i = $i+2;
            }
        }else{
            $this->controller = 'index';
            $this->action = 'index;';
        }
    }
}