<?php
namespace Usecases;

class LoginPresenterSpy implements LoginPresenter
{
    /**
     * @var LoginResponse $invoked_response
     */
    private $invoked_response;

    public function presentResponse(LoginResponse $response)
    {
        $this->invoked_response = $response;
    }

    public function getInvokedResponse() : LoginResponse
    {
        return $this->invoked_response;
    }
}