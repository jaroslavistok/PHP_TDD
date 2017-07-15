<?php
namespace Usecases;

use Authorizer\UserID;

class AcceptingAuthorizerSpy extends AuthorizerSpy
{
    public static $STUB_ID;

    public function __construct()
    {
        self::$STUB_ID = new UserID(1);
    }

    protected function makeUser()
    {
        return self::$STUB_ID;
    }
}