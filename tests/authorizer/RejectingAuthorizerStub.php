<?php
namespace Authorizer;

class RejectingAuthorizerStub implements Authorizer
{
    public function authorize($username, $password)
    {
        return new InvalidUserID();
    }
}