<?php
/**
 * LogObserver.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 15:35
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Observer;

class LogObserver extends Observer
{
    public function update()
    {
        date_default_timezone_set('PRC');
        echo date('Y-m-d H:i:s') . ',记录:' . $this->sub->getStatus();
        echo PHP_EOL;
    }
}