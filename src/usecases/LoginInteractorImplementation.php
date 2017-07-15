<?php
namespace Usecases;

use Authorizer\Authorizer;
use Entities\User;

class LoginInteractorImplementation implements LoginInteractor
{
    /**
     * @var Authorizer $authorizer
     */
    private $authorizer;

    /**
     * @var UserGateway $user_gateway
     */
    private $user_gateway;

    /**
     * @var LoginPresenter $presenter
     */
    private $presenter;


    private $login_attempt_counter;


    /**
     * @param LoginPresenter $presenter
     */
    public function setPresenter(LoginPresenter $presenter)
    {
        $this->presenter = $presenter;
    }

    /**
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        $response = new LoginResponse();

        $user_id = $this->authorizer->authorize($request->username, $request->password);

        if (!$user_id->isValid()){
            $response->message = LoginInteractor::LOGIN_FAILURE_MESSAGE;

            if ($this->countInvalidLoginAttempts($request->username) >= 3){
                $this->authorizer->hold($request->username);
            }
        } else {
            $response->message = LoginInteractor::LOGIN_SUCCESS_MESSAGE;

            $user = $this->user_gateway->getUser($user_id);
            $response->name = $user->getName();
            $response->last_login_time = $user->getLastLoginTime();
            $response->login_count = $user->getLoginCount();
        }

        $this->presenter->presentResponse($response);
    }

    /**
     * @param string $username
     * @return int
     */
    public function countInvalidLoginAttempts($username)
    {
        $login_attempts = $this->login_attempt_counter[$username];
        if ($login_attempts == null)
            $login_attempts = 0;
        $login_attempts++;
        $this->login_attempt_counter[$username] = $login_attempts;
        return $login_attempts;
    }

    /**
     * @param Authorizer $authorizer
     */
    public function setAuthorizer(Authorizer $authorizer)
    {
        $this->authorizer = $authorizer;
    }

    /**
     * @param UserGateway $user_gateway
     */
    public function setUserGateway(UserGateway $user_gateway)
    {
        $this->user_gateway = $user_gateway;
    }
}
