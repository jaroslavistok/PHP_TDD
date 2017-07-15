<?php

namespace Usecases;

use Entities\User;
use Entities\UserStub;

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