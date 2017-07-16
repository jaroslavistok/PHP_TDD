<?php

namespace LoginModule\Usecases;

use LoginModule\Entities\User;
use LoginModule\Entities\UserStub;

class UserGatewayStub implements UserGateway
{
    /**
     * @param $id
     * @return User
     */
    public function getUser($id)
    {
        return new UserStub();
    }
}