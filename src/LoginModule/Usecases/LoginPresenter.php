<?php
namespace LoginModule\Usecases;


interface LoginPresenter
{
    public function presentResponse(LoginResponse $response);
}