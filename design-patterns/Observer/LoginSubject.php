<?php
/**
 * LoginSubject.php
 *
 * @User    : wsj6563@gmail.com
 * @Date    : 16/3/3 15:31
 * @Encoding: UTF-8
 * @Created by PhpStorm.
 */
namespace designPatterns\Observer;

class LoginSubject extends Subject
{
    public function attach(Observer $observer)
    {
        array_push($this->observer_list, $observer);
    }

    public function detach(Observer $observer)
    {
        foreach ($this->observer_list as $i => $o) {
            if ($o == $observer) {
                unset($this->observer_list[$i]);
            }
        }
    }

    public function notify()
    {
        foreach ($this->observer_list as $observer) {
            $observer->update();
        }
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}