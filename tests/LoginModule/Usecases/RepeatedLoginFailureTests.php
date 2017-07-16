<?php
namespace LoginModule\Usecases;
use LoginModule\Authorizers\RejectingAuthorizerStub;
use LoginModule\Entities\UserStub;

class RepeatedLoginFailureTests extends \PHPUnit\Framework\TestCase
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


    private $user_gateway_stub;

    public function setUp()
    {
        $this->interactor = new LoginInteractorImplementation();
        $this->presenter_spy  = new LoginPresenterSpy();
        $this->interactor->setPresenter($this->presenter_spy);

        $this->authorizer_spy = new RejectingAuthorizerSpy();
        $this->user_gateway_stub = new UserGatewayStub();
        $this->interactor->setAuthorizer($this->authorizer_spy);
        $this->interactor->setUserGateway($this->user_gateway_stub);
    }

    public function testThreeStrikesAndYouAreOut()
    {
        $request = new LoginRequest();
        $request->username = "username";
        $request->password = "bad_password";

        $this->interactor->login($request);
        $this->assertThat($this->authorizer_spy->getHeldUsername(), $this->isNull());

        $this->interactor->login($request);
        $this->assertThat($this->authorizer_spy->getHeldUsername(), $this->isNull());

        $this->interactor->login($request);
        $this->assertThat($this->authorizer_spy->getHeldUsername(), $this->equalTo("username"));
    }





}