<?php

class Login extends \Lave\Form\Form {

    public function init() {
        $this->setDecorator(new \Lave\Form\Decorator\Form());

        $this->addAttribute(array('method'=>\Lave\Form\Request::TYPE_POST));

        $control = $this->builder()->control()->createEmail();
        $control->setName('email');
        $control->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->builder()->control()->createPassword();
        $control->setName('password');
        $control->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->builder()->control()->createSubmit();
        $control->setName('submit');
        $control->setValue('Login');
        $this->addComponent($control);
    }

}