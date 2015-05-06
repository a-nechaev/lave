<?php
namespace Lave\Form;

use Lave\Form\Interfaces\AppInterface;
use Lave\Form\Interfaces\BuilderInterface;
use Lave\Form\Interfaces\RequestInterface;
use Lave\Form\Interfaces\ValidatorInterface;

use Lave\Form\Traits\AppTrait;
use Lave\Form\Traits\AttrTrait;
use Lave\Form\Traits\BuilderTrait;
use Lave\Form\Traits\NameTrait;
use Lave\Form\Traits\RequestTrait;
use Lave\Form\Traits\RequestProcessTrait;
use Lave\Form\Traits\ValidatorTrait;
use Lave\Form\Traits\ValidatorProcessTrait;

class Form extends Component implements
    AppInterface,
    ValidatorInterface,
    BuilderInterface,
    RequestInterface
{

    use AppTrait,
        BuilderTrait,
        ValidatorTrait, ValidatorProcessTrait,
        RequestTrait, RequestProcessTrait,
        NameTrait,
        AttrTrait;

    public function validate() {
        return $this->processValidator();
    }

    public function create(Form $form) {
        $app = $this->app();
        $form->setBuilder($app->builder());
        $form->setRequest($app->request());
        $form->setValidator($app->validator());
        $form->init();
        return $form;
    }

}