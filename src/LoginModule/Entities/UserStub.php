<?php

namespace LoginModule\Entities;

class UserStub extends User
{
    public const STUB_TIME = "00:00";
    public const STUB_NAME = "name name";
    public const STUB_LOGIN_COUNT = 99;

    public function getLoginCount()
    {
        return UserStub::STUB_LOGIN_COUNT;
    }

    public function getLastLoginTime()
    {
        return UserStub::STUB_TIME;
    }

    public function getName()
    {
        return UserStub::STUB_NAME;
    }
}