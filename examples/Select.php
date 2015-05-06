<?php

class Select extends \Lave\Form\Form {

    public function init() {
        $this->setDecorator(new \Lave\Form\Decorator\Form());

        $this->addAttribute(array('method'=>\Lave\Form\Request::TYPE_POST));

        $countries = array('Select country', 'Russia', 'Other');

        $control = $this->builder()->control()->createSelect();
        $control->setName('country');
        $control->setData($countries);
        $control->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->builder()->control()->createMultiSelect();
        $control->setName('country_multi');
        $control->setData($countries);
        $control->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->builder()->control()->createSubmit();
        $control->setName('submit');
        $control->setValue('submit');
        $this->addComponent($control);

    }
}