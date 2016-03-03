<?php
/**
 * StyleColor.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/2 14:25
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Decorate;

class StyleColor extends Style
{
    public function render()
    {
        $base = parent::render();
        return '<span style="color:red;">'.$base.'</span>';
    }
}