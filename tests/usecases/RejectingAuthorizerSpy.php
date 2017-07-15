<?php
namespace Usecases;

use Authorizer\Authorizer;
use Authorizer\InvalidUserID;
use Authorizer\UserID;

class RejectingAuthorizerSpy extends AuthorizerSpy
{
    /**
     * @return InvalidUserID
     */
    public function makeUser() : InvalidUserID
    {
        return new InvalidUserID();
    }
}