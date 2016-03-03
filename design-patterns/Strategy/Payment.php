<?php
/**
 * Payment.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/1 16:19
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Strategy;

class Payment
{
    /***
     * @var IPayment
     */
    private $payment;

    const PAY_TYPE_WECHAT = 1;
    const PAY_TYPE_ALIPAY = 2;

    public function __construct($pay_type)
    {
        switch (intval($pay_type)) {
            case self::PAY_TYPE_ALIPAY:
                $this->payment = new PaymentAlipay();
                break;
            case self::PAY_TYPE_WECHAT:
                $this->payment = new PaymentWechat();
                break;
            default:
                throw new \Exception('支付方式错误');
        }
    }

    public function pay($price)
    {
        return $this->payment->pay($price);
    }
}