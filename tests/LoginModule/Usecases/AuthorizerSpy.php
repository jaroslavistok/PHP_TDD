<?php
namespace LoginModule\Usecases;
use LoginModule\Authorizers\Authorizer;
use LoginModule\Authorizers\UserID;

abstract class AuthorizerSpy implements Authorizer
{
    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $held_username
     */
    private $held_username = null;

    /**
     * @param string $username
     * @param string $password
     * @return UserID
     */
    public function authorize($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        return $this->makeUser();
    }

    /**
     * @return UserID
     */
    public abstract function makeUser();

    public function hold($username)
    {
        // TODO: Implement hold() method.
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getHeldUsername(): ?string
    {
        return $this->held_username;
    }


}