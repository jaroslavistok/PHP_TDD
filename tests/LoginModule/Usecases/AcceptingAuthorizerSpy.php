<?php
namespace LoginModule\Usecases;

use LoginModule\Authorizers\UserID;

class AcceptingAuthorizerSpy extends AuthorizerSpy
{
    public static $STUB_ID;

    public function __construct()
    {
        self::$STUB_ID = new UserID(1);
    }

    public function makeUser()
    {
        return self::$STUB_ID;
    }
}