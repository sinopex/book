<?php
/**
 * PaymentAlipay.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/1 16:22
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Strategy;

class PaymentAlipay implements IPayment
{
    public function pay($price)
    {
        return 'pay by alipay';
    }

    public function notify($url)
    {
        return 'alipay paid success';
    }
}