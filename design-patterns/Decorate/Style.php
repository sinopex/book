<?php
/**
 * Style.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/2 14:17
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Decorate;

class Style extends Dom
{
    public function __construct($dom = '')
    {
        parent::__construct($dom);
    }

    /***
     * @var Dom
     */
    protected $component;

    public function decorate(Dom $component)
    {
        $this->component = $component;

        return $this;
    }

    public function render()
    {
        if ($this->component != null) {
            return $this->component->render();
        }

        return '';
    }
}