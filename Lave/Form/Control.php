<?php
namespace Lave\Form;

use Lave\Form\Interfaces\AppInterface;
use Lave\Form\Interfaces\ValidatorInterface;

use Lave\Form\Traits\AppTrait;
use Lave\Form\Traits\AttrTrait;
use Lave\Form\Traits\LabelTrait;
use Lave\Form\Traits\NameTrait;
use Lave\Form\Traits\RequestTrait;
use Lave\Form\Traits\RequestProcessTrait;
use Lave\Form\Traits\ValidatorTrait;
use Lave\Form\Traits\TValidatorProcess;
use Lave\Form\Traits\ValueTrait;

class Control extends Component implements
    AppInterface,
    ValidatorInterface
{

    use AppTrait,
        ValidatorTrait, TValidatorProcess,
        RequestTrait, RequestProcessTrait,
        AttrTrait,
        NameTrait,
        LabelTrait,
        ValueTrait;

    public function validate() {
        $fail = $this->processValidator();

        $validator = $this->validator();
        $validator->setValue($this->getValue());
        if (!$validator->validate()) {
            $fail = true;
        }

        return !$fail;
    }

    public function create(Control $control) {
        $app = $this->getApp();
        $control->setBuilder($app->getBuilder());
        $control->setRequest($app->getRequest());
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