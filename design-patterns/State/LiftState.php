<?php
/**
 * LiftState.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/4 10:39
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\State;

abstract class LiftState
{
    /***
     * @var Context
     */
    protected $_context;

    public function setContext(Context $context)
    {
        $this->_context = $context;
    }

    /***
     *
     * 电梯开门操作
     *
     * @return mixed
     */
    public abstract function open();

    /***
     *
     * 电梯关门操作
     *
     * @return mixed
     */
    public abstract function close();

    /***
     *
     * 电梯运行操作
     *
     * @return mixed
     */
    public abstract function run();

    /***
     *
     * 电梯停运操作
     *
     * @return mixed
     */
    public abstract function stop();
}