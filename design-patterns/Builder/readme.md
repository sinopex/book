## 建造者模式


> 建造者模式(Builder),又称为生成器模式,将一个复杂对象的构建与他的表示分离,使得同样的构建过程可以创建不同的表示

如果我们用了建造者模式,那么用户就只需指定需要建造的类型就可以得到他们,而具体的过程和细节就不需知道了


建造者模式组成:

- 产品类
- 抽象建造类
- 具体建造类1
- 具体建造类2
- 具体建造类3
- 指挥者类


```php
namespace designPatterns\Builder;

require 'Car.php';
require 'Builder.php';
require 'AudiBuilder.php';
require 'LexusBuilder.php';
require 'Workshop.php';

$builder = new Workshop();

//造一部奥迪汽车
$audi = $builder->create(new AudiBuiler());
//查看奥迪汽车信息
var_dump($audi->show());
echo PHP_EOL;

//接着造一部雷克萨斯
$lexus = $builder->create(new LexusBuilder());
var_dump($lexus->show());
echo PHP_EOL;
```
