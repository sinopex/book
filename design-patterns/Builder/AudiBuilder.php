<?php
/**
 * AudiBuiler.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 14:41
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */

namespace designPatterns\Builder;

class AudiBuiler implements Builder
{
    /****
     *
     * @var Car
     */
    private $car;

    public function __construct()
    {
        $this->car = new Car();
    }

    public function addEngine()
    {
        $this->car->addComponents(['engine' => 'V8']);
    }

    public function addBrand()
    {
        $this->car->addComponents(['brand' => 'Audi']);
    }

    public function addCountry()
    {
        $this->car->addComponents(['country' => 'Germany']);
    }

    public function getCar()
    {
        return $this->car;
    }
}