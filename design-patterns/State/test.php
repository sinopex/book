<?php
/**
 * test.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/4 11:04
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
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