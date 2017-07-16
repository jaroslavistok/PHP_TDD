<?php
namespace LoginModule\Authorizers;

interface Authorizer {
    /**
     * @param string $username
     * @param string $password
     * @return UserID
     */
    public function authorize($username, $password);
    public function hold($username);
}