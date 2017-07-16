<?php
namespace LoginModule\Authorizers;

class RejectingAuthorizerStub implements Authorizer
{
    public function authorize($username, $password)
    {
        return new InvalidUserID();
    }

    public function hold($username)
    {

    }
}