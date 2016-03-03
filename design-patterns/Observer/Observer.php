<?php
/**
 * Observer.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 15:29
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Observer;

abstract class Observer
{
    protected $name;
    /***
     * @var Subject
     */
    protected $sub;

    public function __construct($name, Subject $sub)
    {
        $this->name = $name;
        $this->sub  = $sub;
    }

    abstract public function update();
}