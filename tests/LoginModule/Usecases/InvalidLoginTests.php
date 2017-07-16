<?php
namespace LoginModule\Usecases;
use LoginModule\Authorizers\RejectingAuthorizerStub;
use LoginModule\Entities\UserStub;

class InvalidLoginTests extends \PHPUnit\Framework\TestCase
{
    /**
     * @var LoginInteractorImplementation $interactor
     */
    private $interactor;

    /**
     * @var LoginPresenterSpy
     */
    private $presenter_spy;

    /**
     * @var AcceptingAuthorizerSpy
     */
    private $authorizer_spy;

    /**
     * @var UserGatewaySpy
     */
    private $gateway_spy;

    private $authorizer;
    private $user_gateway;

    public function setUp()
    {
        $this->interactor = new LoginInteractorImplementation();
        $this->presenter_spy  = new LoginPresenterSpy();
        $this->interactor->setPresenter($this->presenter_spy);

        $this->authorizer_spy = new RejectingAuthorizerStub();
        $this->gateway_spy = new UserGatewayStub();
        $this->interactor->setAuthorizer($this->authorizer_spy);
        $this->interactor->setUserGateway($this->gateway_spy);
    }

    public function testWhenLoginFails_loginFailureMessageIsPresented()
    {
        $request = new LoginRequest();
        $request->username = "bad_username";
        $request->password = "bad_password";

        $this->interactor->login($request);

        $invokedResponse = $this->presenter_spy->getInvokedResponse();
        $this->assertThat($invokedResponse->message, $this->equalTo(LoginInteractor::LOGIN_FAILURE_MESSAGE));
    }





}