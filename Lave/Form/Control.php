<?php
namespace Lave\Form;

use Lave\Form\Interfaces\AppInterface;
use Lave\Form\Interfaces\BuilderInterface;
use Lave\Form\Interfaces\RequestInterface;
use Lave\Form\Interfaces\ValidatorInterface;

use Lave\Form\Traits\AppTrait;
use Lave\Form\Traits\AttrTrait;
use Lave\Form\Traits\BuilderTrait;
use Lave\Form\Traits\LabelTrait;
use Lave\Form\Traits\NameTrait;
use Lave\Form\Traits\RequestTrait;
use Lave\Form\Traits\RequestProcessTrait;
use Lave\Form\Traits\ValidatorTrait;
use Lave\Form\Traits\ValidatorProcessTrait;
use Lave\Form\Traits\ValueTrait;

class Control extends Component implements
    AppInterface,
    ValidatorInterface,
    BuilderInterface,
    RequestInterface
{

    use AppTrait,
        BuilderTrait,
        ValidatorTrait, ValidatorProcessTrait,
        RequestTrait, RequestProcessTrait,
        AttrTrait,
        NameTrait,
        LabelTrait,
        ValueTrait;

    public function validate() {
        $success = $this->processValidator();

        $validator = $this->validator();
        $validator->setValue($this->getValue());
        if (!$validator->validate()) {
            $success = false;
        }

        return $success;
    }

    public function create(Control $control) {
        $app = $this->app();
        $control->setBuilder($app->builder());
        $control->setRequest($app->request());
        $control->setValidator(clone $app->validator());
        $control->init();
        return $control;
    }

    /**
     * @return Component|\Lave\Form\Control\Text
     */
    public function createText() {
        return $this->create(new Control\Text());
    }

    /**
     * @return Component|\Lave\Form\Control\Password
     */
    public function createPassword() {
        return $this->create(new Control\Password());
    }

    /**
     * @return Component|\Lave\Form\Control\Email
     */
    public function createEmail() {
        return $this->create(new Control\Email());
    }

    /**
     * @return Component|\Lave\Form\Control\Select
     */
    public function createSelect() {
        return $this->create(new Control\Select());
    }

    /**
     * @return Component|\Lave\Form\Control\MultiSelect
     */
    public function createMultiSelect() {
        return $this->create(new Control\MultiSelect());
    }

    /**
     * @return Component|\Lave\Form\Control\Submit
     */
    public function createSubmit() {
        return $this->create(new Control\Submit());
    }

    /**
     * @return \Lave\Form\Control\FullName
     */
    public function createFullName() {
        return $this->create(new Control\FullName());
    }


}