<?php
/**
 * Created by PhpStorm.
 * User: zhanghongbo
 * Date: 17/9/9
 * Time: 下午2:16
 */
namespace core\lib;
class config
{

    public static $conf = array();
    /**
     * 1 判断配置文件是否存在
     * 2 判断配置是否存在
     * 3 缓存配置
     */
    public static function get($name,$file){
        if(isset(self::$conf[$name])){
            return self::$conf[$name];
        }else {
            $path = TLY . '/core/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('找不到该配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    /**
     * 加载整个配置文件
     */
    public static function all($file){
        if(isset(self::$conf[$file])){
            dd(self::$conf[$file]);
            return self::$conf[$file];
        }else{
            $path = TLY.'/core/config/'.$file.'.php';
            if(is_file($path)){
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            }else{
                throw new \Exception('找不到配置文件'.$file);
            }
        }
    }
}