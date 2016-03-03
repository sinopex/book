<?php
/**
 * WorkExperience.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 10:16
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Prototype;

class WorkExperience
{
    public $timeRange = '';
    public $company   = '';

    public function setTimeRange($timeRange)
    {
        $this->timeRange = $timeRange;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }
}