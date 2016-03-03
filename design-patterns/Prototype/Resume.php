<?php
/**
 * Resume.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 10:02
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Prototype;

class Resume
{
    public $age;
    public $name;
    /***
     *
     * @var WorkExperience
     */
    private $workExperience;

    public function __construct($name)
    {
        $this->name           = $name;
        $this->workExperience = new WorkExperience();
    }

    public function setWorkExperience($timeRange, $company)
    {
        $this->workExperience->setTimeRange($timeRange);
        $this->workExperience->setCompany($company);
    }

    public function show()
    {
        return '姓名:' . $this->name . ',年龄:' . $this->age . ',工作时间:' . $this->workExperience->timeRange . ',工作单位:' . $this->workExperience->company;
    }
}