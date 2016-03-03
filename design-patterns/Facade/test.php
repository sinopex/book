<?php
/**
 * test.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 13:55
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Facade;

require 'User.php';
require 'UserExp.php';
require 'UserPoint.php';

var_dump((new User())->getInfo());