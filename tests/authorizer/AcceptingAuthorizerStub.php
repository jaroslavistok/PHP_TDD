<?php
namespace Authorizer;

class AcceptingAuthorizerStub implements Authorizer
{

    /**
     * @param string $username
     * @param string $password
     * @return UserID
     */
    public function authorize($username, $password)
    {
        return new UserID(1);
    }

    public function hold($username)
    {

    }
}