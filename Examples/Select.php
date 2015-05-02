<?php

class Select extends \Lave\Form\Form {

    public function init() {
        $this->setDecorator(new \Lave\Form\Decorator\Form());

        $this->addAttribute(array('method'=>\Lave\Form\Request::TYPE_POST));

        $countries = array('Select country', 'Russia', 'Other');

        $control = $this->getBuilder()->control()->createSelect();
        $control->setName('country');
        $control->setData($countries);
        $control->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->getBuilder()->control()->createMultiSelect();
        $control->setName('country_multi');
        $control->setData($countries);
        $control->validator()->addRule($control->validator()->ruleNoEmpty());
        $this->addComponent($control);

        $control = $this->getBuilder()->control()->createSubmit();
        $control->setName('submit');
        $control->setValue('submit');
        $this->addComponent($control);

    }
}