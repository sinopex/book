<?php
/**
 *
 * 公用接口类
 *
 * DbInterface.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/1 15:49
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */

namespace designPatterns\Factory;

interface DbInterface
{
    //链接数据库
    public function connect($params);

    //查询记录
    public function find($params);

    //更新记录
    public function update($params);

    //更多其他的数据库操作方法
}