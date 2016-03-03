<?php
/**
 * HirePhp.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 11:14
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\TemplateMethod;

class HirePhp extends Hire
{
    public function getJobTitle()
    {
        return 'PHP高级工程师';
    }
}