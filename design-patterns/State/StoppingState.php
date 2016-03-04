<?php
/**
 * StoppingState.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/4 10:54
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\State;


/**
 * 在停止状态下能做什么事情
 */
class StoppingState extends LiftState {

    //停止状态关门？电梯门本来就是关着的！
    public function close() {
        //do nothing;
    }

    //停止状态，开门，那是要的！
    public function open() {
        $this->_context->setLiftState(Context::$openingState);
        $this->_context->getLiftState()->open();
    }
    //停止状态再跑起来，正常的很
    public function run() {
        $this->_context->setLiftState(Context::$runningState);
        $this->_context->getLiftState()->run();
    }
    //停止状态是怎么发生的呢？当然是停止方法执行了
    public function stop() {
        echo 'lift stop...', PHP_EOL;
    }

}