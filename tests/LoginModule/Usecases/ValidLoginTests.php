<?php
namespace LoginModule\Usecases;
use LoginModule\Entities\UserStub;

class ValidLoginTests extends \PHPUnit\Framework\TestCase
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

    public function setUp()
    {
        $this->interactor = new LoginInteractorImplementation();
        $this->presenter_spy  = new LoginPresenterSpy();
        $this->interactor->setPresenter($this->presenter_spy);
        $this->authorizer_spy = new AcceptingAuthorizerSpy();
        $this->gateway_spy = new UserGatewaySpy();
        $this->interactor->setAuthorizer($this->authorizer_spy);
        $this->interactor->setUserGateway($this->gateway_spy);
    }

    public function testNormalLogin()
    {
        $request = new LoginRequest();
        $request->username = "username";
        $request->password = "password";

        $this->interactor->login($request);

        $this->assertThat($this->authorizer_spy->getUsername(), $this->equalTo("username"));
        $this->assertThat($this->authorizer_spy->getPassword(), $this->equalTo('password'));
        $this->assertThat($this->gateway_spy->getRequestId(), $this->equalTo(AcceptingAuthorizerSpy::$STUB_ID));

        $response = $this->presenter_spy->getInvokedResponse();
        $this->assertThat($response->name, $this->equalTo(UserStub::STUB_NAME));
        $this->assertThat($response->last_login_time, $this->equalTo(UserStub::STUB_TIME));
        $this->assertThat($response->login_count, $this->equalTo(UserStub::STUB_LOGIN_COUNT));
    }





}