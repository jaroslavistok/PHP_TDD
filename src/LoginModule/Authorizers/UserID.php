<?php
namespace LoginModule\Authorizers;

class UserID
{
    public function __construct($id_code)
    {

    }

    public function isValid()
    {
        return true;
    }
}