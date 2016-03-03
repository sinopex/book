<?php
/**
 * HireJava.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 11:15
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\TemplateMethod;

class HireJava extends Hire
{
    public function getJobTitle()
    {
        return 'Java架构师';
    }
}