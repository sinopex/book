<?php
/**
 * Context.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/4 10:52
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\State;

class Context
{
    //电梯所有状态
    static $openingState  = null;
    static $closingState  = null;
    static $runningState  = null;
    static $stoppingState = null;

    //定义当前电梯状态
    /***
     * @var LiftState
     */
    private $_liftState;

    public function __construct()
    {
        self::$openingState  = new OpeningState();
        self::$closingState  = new ClosingState();
        self::$runningState  = new RunningState();
        self::$stoppingState = new StoppingState();
    }

    public function getLiftState()
    {
        return $this->_liftState;
    }

    public function setLiftState(LiftState $liftState)
    {
        $this->_liftState = $liftState;
        $this->_liftState->setContext($this);
    }

    public function open(){
        $this->_liftState->open();
    }

    public function close(){
        $this->_liftState->close();
    }

    public function run(){
        $this->_liftState->run();
    }

    public function stop(){
        $this->_liftState->stop();
    }
}