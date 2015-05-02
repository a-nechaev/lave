<?php
namespace Lave\Form;

use Lave\Form\Interfaces\AppInterface;
use Lave\Form\Interfaces\RequestInterface;
use Lave\Form\Interfaces\ValidatorInterface;

use Lave\Form\Traits\AppTrait;
use Lave\Form\Traits\RequestTrait;
use Lave\Form\Traits\RequestProcessTrait;
use Lave\Form\Traits\ValidatorTrait;
use Lave\Form\Traits\TValidatorProcess;

class Form extends Component implements
    AppInterface,
    ValidatorInterface,
    RequestInterface
{

    use AppTrait,
        ValidatorTrait, TValidatorProcess,
        RequestTrait, RequestProcessTrait;

    use \Lave\Form\Traits\NameTrait;
    use \Lave\Form\Traits\AttrTrait;

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