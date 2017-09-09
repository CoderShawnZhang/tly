<?php
/**
 * TLY框架数据库模型基类
 */
namespace core\lib;
use core\lig;
class model extends \PDO
{
    public function __construct()
    {
        $database = config::all('database');
        try{
            parent::__construct($database['DSN'], $database['USERNAME'], $database['PASSWD']);
        }
        catch (\PDOException $e){
            dd($e->getMessage());
        }
    }
}