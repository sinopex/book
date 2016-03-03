<?php
/**
 * LexusBuilder.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 14:44
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Builder;

class LexusBuilder implements Builder
{
    /**
     * @var Car
     */
    private $car;

    public function __construct()
    {
        $this->car = new Car;
    }

    public function addCountry()
    {
        $this->car->addComponents(['country' => 'Japan']);
    }

    public function addEngine()
    {
        $this->car->addComponents(['engine' => 'DSP']);
    }

    public function addBrand()
    {
        $this->car->addComponents(['brand' => 'Lexus']);
    }

    public function getCar()
    {
        return $this->car;
    }
}