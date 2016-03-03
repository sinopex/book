<?php
/**
 * Workshop.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 14:50
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Builder;

class Workshop
{
    /***
     * @param Builder $builder
     * @return Car
     */
    public function create(Builder $builder)
    {
        $builder->addBrand();
        $builder->addCountry();
        $builder->addEngine();

        return $builder->getCar();
    }
}