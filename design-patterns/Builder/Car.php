<?php
/**
 * Car.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 14:35
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Builder;

class Car
{
    private $components = [];

    public function addComponents($component)
    {
        array_push($this->components, $component);
    }

    public function show()
    {
        return $this->components;
    }
}