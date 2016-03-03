<?php
/**
 * ExpObserver.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 15:40
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Observer;

class ExpObserver extends Observer
{
    public function update()
    {
        echo '增加用户经验,理由:' . $this->sub->getStatus();
        echo PHP_EOL;
    }
}