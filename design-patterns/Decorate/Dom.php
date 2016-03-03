<?php
/**
 * Dom.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/2 14:12
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Decorate;

class Dom
{
    private $dom = '';

    public function __construct($dom)
    {
        $this->dom = $dom;
    }

    public function render()
    {
        return $this->dom;
    }
}