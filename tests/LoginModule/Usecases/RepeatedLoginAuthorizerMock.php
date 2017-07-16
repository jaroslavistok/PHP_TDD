<?php
namespace LoginModule\Usecases;


use LoginModule\Authorizers\Authorizer;
use LoginModule\Authorizers\InvalidUserID;

class RepeatedLoginAuthorizerMock implements Authorizer
{
    private $actions = [];

    /**
     * @param string $username
     * @param string $password
     * @return InvalidUserID
     */
    public function authorize($username, $password) : InvalidUserID
    {
        $this->actions[] = "Authorize:" . $username;
        return new InvalidUserID();
    }

    public function hold($username)
    {
        $this->actions[] = "Hold:".$username;
    }

    public function verifyHeldOnThirdAttempt($username)
    {
        $expectedActions = [
            "Authorize".$username,
            "Authorize".$username,
            "Authorize".$username,
            "Hold:".$username
        ];

        return $expectedActions == $this->actions;
    }
}