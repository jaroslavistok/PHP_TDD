<?php
namespace Entities;

class User
{
    private $name;
    private $last_login_time;
    private $login_count;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getLastLoginTime()
    {
        return $this->last_login_time;
    }

    public function setLastLoginTime($last_login_time)
    {
        $this->last_login_time = $last_login_time;
    }

    public function getLoginCount()
    {
        return $this->login_count;
    }

    public function setLoginCount($login_count)
    {
        $this->login_count = $login_count;
    }

}