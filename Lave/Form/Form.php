<?php
namespace Lave\Form;

use Lave\Form\Interfaces\IApp;
use Lave\Form\Interfaces\IRequest;
use Lave\Form\Interfaces\IValidator;

use Lave\Form\Traits\TApp;
use Lave\Form\Traits\TRequest;
use Lave\Form\Traits\TRequestProcess;
use Lave\Form\Traits\TValidator;
use Lave\Form\Traits\TValidatorProcess;

class Form extends Component implements
    IApp,
    IValidator,
    IRequest
{

    use TApp,
        TValidator, TValidatorProcess,
        TRequest, TRequestProcess;

    use \Lave\Form\Traits\TName;
    use \Lave\Form\Traits\TAttr;

    public function validate() {
        return $this->processValidator();
    }

    public function create(Form $form) {
        $app = $this->getApp();
        $form->setBuilder($app->getBuilder());
        $form->setRequest($app->getRequest());
        $form->setValidator($app->validator());
        $form->init();
        return $form;
    }

}