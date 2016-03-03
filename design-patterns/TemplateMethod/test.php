<?php
/**
 * test.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 11:16
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\TemplateMethod;

require 'Hire.php';
require 'HireJava.php';
require 'HirePhp.php';

echo (new HireJava())->show() . PHP_EOL;
echo (new HirePhp())->show() . PHP_EOL;