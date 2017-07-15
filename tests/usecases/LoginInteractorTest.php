<?php
namespace Usecases;

class LoginInteractorTest
{
    private $interactor;
    private $authorizer;
    private $gateway;
    private $presenter_spy;

    public function before()
    {
        $this->interactor = new LoginInteractorImplementation();
        $this->presenter_spy = new LoginPresenterSpy();
        $this->interactor->setPresenter($this->presenter_spy);
    }


}