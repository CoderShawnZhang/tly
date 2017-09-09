<?php
/**
 * 文件存储日志
 */
namespace core\lib\drive\log;

use core\lib\config;class file
{
    public $path;#日志存储位置
    public function __construct()
    {
        $conf = config::get('option','log');
        $this->path = $conf['path'];
    }

    /**
     * 写入日志
     *
     * @param $name
     * @param string $file
     */
    public function log($message,$file='log'){
        /**
         *  1 确定文件存储位置是否存在
         *     新建目录
         *  2 写入日志
         */
        if(!is_dir($this->path.date('YmdH'))){
            mkdir($this->path.date('YmdH'),'0777',true);
        }
        $content = '';
        if(is_array($message)){
            $content = date('Y-m-d H:i:s').'    '.json_encode($message).PHP_EOL;
        }elseif (is_string($message)){
            $content = date('Y-m-d H:i:s').'    '.$message.PHP_EOL;
        }else{
            $content = date('Y-m-d H:i:s').'    '.$message.PHP_EOL;
        }
        return file_put_contents($this->path.date('YmdH').'/'.$file.'.php',$content,FILE_APPEND);
    }
}