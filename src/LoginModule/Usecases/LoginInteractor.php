<?php
namespace LoginModule\Usecases;

interface LoginInteractor
{
    public const LOGIN_FAILURE_MESSAGE = "Invalid login";
    public const LOGIN_SUCCESS_MESSAGE = "Welcome";

    public function login(LoginRequest $request);
}