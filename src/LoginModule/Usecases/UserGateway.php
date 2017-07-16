<?php
namespace LoginModule\Usecases;


use LoginModule\Entities\User;

interface UserGateway
{

    /**
     * @param $id
     * @return User
     */
    public function getUser($id);
}