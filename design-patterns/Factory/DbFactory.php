<?php
/**
 *
 *
 * 工厂方法
 *
 * DbFactory.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/1 16:02
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Factory;

class DbFactory
{

    private $db = null;

    const DB_MYSQL  = 1;
    const DB_ORACLE = 2;
    const DB_MSSQL  = 3;

    public function getInstance($db_type)
    {
        switch (intval($db_type)) {
            case self::DB_MYSQL:
                $this->db = new DbMysql();
                break;
            case self::DB_MSSQL:
                $this->db = new DbMssql();
                break;
            case self::DB_ORACLE:
                $this->db = new DbOracle();
                break;
            default:
                throw new \Exception('参数操作');
        }

        return $this->db;
    }
}