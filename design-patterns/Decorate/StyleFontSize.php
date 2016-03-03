<?php
/**
 * StyleFontSize.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/2 14:32
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Decorate;

class StyleFontSize extends Style
{
    public function render()
    {
        $base = parent::render();

        return '<span style="font-size:15px;">' . $base . '</span>';
    }
}