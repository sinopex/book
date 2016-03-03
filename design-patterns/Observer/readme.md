## 观察者模式

> 观察者模式,又称做发布-订阅模式,它定义了一种一对多的依赖关系,让多个观察者对象同事监听某一个主题对象.这个主题对象在状态发生改变时,会通知所有观察者对象,是它们能够自动更新自己.


观察者模式组成要素

- Subject,抽象通知类,它把所有对观察者对象的引用保存在一个聚集里,每个主题都可以有任何数量的贯彻着.抽象主题提供一个接口,可以增加和删除观察者对象
- Observer,抽象观察者,为所有定义的具体观察者定义一个接口,在得到主题的通知时更新自己.
- ConcreteSubject,具体主题或具体通知者,将有关状态存入具体观察者对象,在具体主题的内部状态发生改变时,为所有登记的观察者对象发出通知.
- ConcreteObserver,具体观察者,实现抽象观察者角色所要求的更新接口,以便使本身的状态与主题的状态相协调

```php
<?php
namespace designPatterns\Observer;

require 'Subject.php';
require 'LoginSubject.php';
require 'Observer.php';
require 'ExpObserver.php';
require 'LogObserver.php';
require 'MessageObserver.php';

$subject = new LoginSubject();
$subject->attach(new LogObserver('log', $subject));
$subject->attach(new MessageObserver('message', $subject));
$subject->attach(new ExpObserver('exp', $subject));

$subject->setStatus('用户登录');

$subject->notify();

```