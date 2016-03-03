<?php
/**
 * test.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 15:43
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
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
