<?php

class Registration extends \Lave\Form\Form {

    public function init() {
        $this->setDecorator(new \Lave\Form\Decorator\Form());

        $this->addAttribute(array('method'=>\Lave\Form\Request::TYPE_POST));

        $control = $this->getBuilder()->control()->createText();
        $control->setName('login');
        $control->setLabel('Login');
        $control->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->getBuilder()->control()->createEmail();
        $control->setName('email');
        $control->setLabel('E-mail');
        $control->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->getBuilder()->control()->createPassword();
        $control->setName('password');
        $control->setLabel('Password');
        $control->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->getBuilder()->control()->createFullName();
        $control->setName('full_name');
        $control->setLabel('Full name');
        $control->first_name->validator()->addRule($control->validator()->ruleNoEmpty());
        $control->last_name->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->getBuilder()->control()->createSubmit();
        $control->setName('submit');
        $control->setValue('Registration');
        $this->addComponent($control);

    }

}