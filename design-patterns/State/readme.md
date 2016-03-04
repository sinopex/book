## 状态模式

> 状态模式(State)又称状态对象模式,主要解决的是当控制一个对象状态转换的条件表达式过于复杂时的情况.状态模式允许一个对象在其内部状态改变的时候改变其行为,把状态的判断逻辑转移到表示不同的一系列类当中,从而把复杂的逻辑判断简单化.

**一句话表述** 状态模式把所研究的对象的行为包装在不同的状态对象里,每一个状态对象都属于一个抽象状态类的一个子类.状态模式的意图是让一个对象在其内部状态改变的时候,其行为也随之改变.


**状态模式组成要素**

- 抽象状态(State):定义一个接口,用以封装环境对象的一个特定的状态所对应的行为
- 具体状态(ConcreteState):每一个具体状态类都实现了环境(Context)的一个状态所对应的行为
- 环境(Context):定义客户端所感兴趣的接口,并且保留一个具体状态类的实例.


**状态模式优点**

- 它将于特定状态相关的行为局部化,并且将不同状态的行为分割开来
- 它使得状态转化显示化
- State对象可以被共享

**状态模式缺点**

- 状态模式的使用必然会增加系统类和对象的个数
- 状态模式的结构与实现都较为复杂,如果使用不当讲导致程序结构和代码的混乱

```php
namespace designPatterns\State;

require 'LiftState.php';
require 'ClosingState.php';
require 'OpeningState.php';
require 'RunningState.php';
require 'StoppingState.php';
require 'Context.php';

$context = new Context();
$context->setLiftState(new ClosingState());
$context->open();
$context->close();
$context->run();
$context->stop();
```

