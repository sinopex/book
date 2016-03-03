<?php
/**
 * User.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 13:52
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Facade;

class User
{
    public function getInfo()
    {
        return [
            'point' => (new UserPoint())->getUserPoint(),
            'exp'   => (new UserExp())->getUserExp(),
        ];
    }
}