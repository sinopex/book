<?php
/**
 * PaymentWechat.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/1 16:20
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Strategy;

class PaymentWechat implements IPayment
{
    public function pay($price)
    {
        return 'pay by wechat';
    }

    public function notify($url)
    {
        return 'wechat paid success';
    }
}