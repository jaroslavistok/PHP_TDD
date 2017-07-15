<?php
namespace Usecases;

use Authorizer\Authorizer;
use Authorizer\InvalidUserID;
use Authorizer\UserID;

class FakeAuthorizer implements Authorizer
{

    /**
     * @param string $username
     * @param string $password
     * @return UserID
     */
    public function authorize($username, $password)
    {
        if ($this->startsWith($username, $password))
            return new UserID(1);
        else
            return new InvalidUserID();
    }

    public function hold($username)
    {
    }

    /**
     * @param $input_string
     * @param $substring
     * @return bool|int
     */
    public function startsWith($input_string, $substring)
    {
        return strpos(strtolower($input_string), $substring) === 0;
    }
}