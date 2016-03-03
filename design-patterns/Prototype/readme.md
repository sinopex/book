
##### 适用场景

一般在初始化的信息不发生变化的情况下,克隆是最好的办法,这既隐藏了对象创建的细节,又对性能是大大的提升

优点:不用重复初始化对象,而是动态的获取对象运行时的状态

```php
<?php
namespace designPatterns\Prototype;

require 'Resume.php';
require 'WorkExperience.php';

$user      = new Resume('Joke');
$user->age = 28;
$user->setWorkExperience('201410-201507', 'ABC科技有限公司');
echo $user->show();
echo PHP_EOL;

//clone user 2
$user2      = clone $user;
$user2->age = 30;
$user2->setWorkExperience('201409-201412', '中山科技');
echo $user2->show();
echo PHP_EOL;

//clone user 3
$user3       = clone $user;
$user3->name = 'Alex';
$user3->age  = 23;
$user3->setWorkExperience('201501-201512', 'DELL电脑');
echo $user3->show();
echo PHP_EOL;
?>
```