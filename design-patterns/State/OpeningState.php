<?php
/**
 * OpeningState.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/4 10:54
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\State;

/**
 * 在电梯门开启的状态下能做什么事情
 */
class OpeningState extends LiftState {

    /**
     * 开启当然可以关闭了，我就想测试一下电梯门开关功能
     *
     */
    public function close() {
        //状态修改
        $this->_context->setLiftState(Context::$closingState);
        //动作委托为CloseState来执行
        $this->_context->getLiftState()->close();
    }

    //打开电梯门
    public function open() {
        echo 'lift open...', PHP_EOL;
    }
    //门开着电梯就想跑，这电梯，吓死你！
    public function run() {
        //do nothing;
    }

    //开门还不停止？
    public function stop() {
        //do nothing;
    }

}