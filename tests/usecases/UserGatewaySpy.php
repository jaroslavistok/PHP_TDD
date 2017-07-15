<?php
namespace Usecases;

use Entities\User;
use Entities\UserStub;

class UserGatewaySpy implements UserGateway
{
    private $request_id;

    /**
     * @param $id
     * @return User
     */
    public function getUser($id)
    {
        $this->request_id = $id;
        return new UserStub();
    }

    public function getRequestId()
    {
        return $this->request_id;
    }
}