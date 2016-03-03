## 模板方法模式

> 模板方法模式,定义一个操作中的算法的骨架,而将一些步骤延迟到子类中.模板方法使得子类可以不改变一个算法的结构即可重定义该算法的某些特定步骤.

把不变的行为搬移到超类,去除子类中的重复代码来体现它的优势.

```php
<?php
namespace designPatterns\TemplateMethod;

require 'Hire.php';
require 'HireJava.php';
require 'HirePhp.php';

echo (new HireJava())->show() . PHP_EOL;
echo (new HirePhp())->show() . PHP_EOL;
```