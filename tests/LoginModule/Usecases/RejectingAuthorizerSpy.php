<?php
namespace LoginModule\Usecases;

use LoginModule\Authorizers\InvalidUserID;

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