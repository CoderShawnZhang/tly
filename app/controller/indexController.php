<?php
/**
 * 控制器
 */

namespace app\controller;
use core\lib\config;
use core\lib\model;
use core\tly;

class indexController extends tly
{
    public function index(){
        /*
        $model = new model();
        dd($model);
        $sql = "select * from article";
        $res = $model->query($sql);
//        dd($res->fetchAll());

        */
//        $conf = config::get('CONTROLLER','route');

        $data = 'Hellow world';
        $this->assign('data',$data);
        $this->assign('title','这是title');
        $this->display('index.html');
    }
}