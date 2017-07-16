<?php
namespace LoginModule\Authorizers;

class InvalidUserID extends UserID
{
    public function __construct()
    {
        parent::__construct(-1);
    }

    public function isValid()
    {
        return false;
    }
}