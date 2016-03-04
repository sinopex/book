<?php
/**
 * ClosingState.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/4 10:43
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\State;

/**
 * 电梯门关闭以后，电梯可以做哪些事情
 */
class ClosingState extends LiftState {

    //电梯门关闭，这是关闭状态要实现的动作
    public function close() {
        echo 'lift close...', PHP_EOL;

    }
    //电梯门关了再打开，逗你玩呢，那这个允许呀
    public function open() {
        $this->_context->setLiftState(Context::$openingState);  //置为门敞状态
        $this->_context->getLiftState()->open();
    }

    //电梯门关了就跑，这是再正常不过了
    public function run() {
        $this->_context->setLiftState(Context::$runningState); //设置为运行状态；
        $this->_context->getLiftState()->run();
    }

    //电梯门关着，我就不按楼层

    public function stop() {
        $this->_context->setLiftState(Context::$stoppingState);  //设置为停止状态；
        $this->_context->getLiftState()->stop();
    }

}