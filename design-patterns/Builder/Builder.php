<?php
/**
 * Builder.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 14:37
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Builder;

interface  Builder
{
    /**
     *
     * 发动机引擎
     *
     * @return mixed
     */
    public function addEngine();

    /***
     *
     * 产地
     *
     * @return mixed
     */
    public function addCountry();

    /***
     *
     * 品牌
     *
     * @return mixed
     */
    public function addBrand();

    /**
     *
     * 返回建造的车辆
     *
     * @return mixed
     */
    public function getCar();
}