<?php
/**
 * Subject.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 15:27
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Observer;

abstract class Subject
{
    protected $observer_list = [];
    protected $status;

    abstract public function attach(Observer $observer);

    abstract public function detach(Observer $observer);

    abstract public function notify();

    public function getStatus()
    {
        return $this->status;
    }
}