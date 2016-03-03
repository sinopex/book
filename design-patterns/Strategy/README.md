```php
<?php
/**
 * index.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/1 16:17
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Strategy;

$payment = new Payment(Payment::PAY_TYPE_ALIPAY);
echo $payment->pay(100);
```