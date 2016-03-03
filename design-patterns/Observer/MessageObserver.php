<?php
/**
 * MessageObserver.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 15:42
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Observer;

class MessageObserver extends Observer
{
    public function update()
    {
        echo '推送消息:' . $this->sub->getStatus();
        echo PHP_EOL;
    }
}