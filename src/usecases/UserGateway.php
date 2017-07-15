<?php
namespace Usecases;

use Entities\User;

interface UserGateway
{

    /**
     * @param $id
     * @return User
     */
    public function getUser($id);
}