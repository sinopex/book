<?php
/**
 * Hire.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 11:11
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\TemplateMethod;

abstract class Hire
{
    abstract public function getJobTitle();

    public function show()
    {
        return '招聘' . $this->getJobTitle() . ',工作年限3年以上,本科以上学历,地点:张江科技园';
    }
}