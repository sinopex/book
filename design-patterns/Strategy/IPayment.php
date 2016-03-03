<?php
/**
 * IPayment.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/1 16:18
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */

namespace designPatterns\Strategy;

interface IPayment
{
    public function pay($price);

    public function notify($url);
}