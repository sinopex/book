<?php
/**
 * StyleFontBolder.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/2 14:33
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Decorate;

class StyleFontBolder extends Style
{
    public function render()
    {
        $base = parent::render();

        return '<span style="font-weight:bolder;">' . $base . '</span>';
    }
}