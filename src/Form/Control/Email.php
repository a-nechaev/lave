<?php
namespace Lave\Form\Control;

use Lave\Form\Control\Text as TextControl;

class Email extends TextControl {

    public function init() {
        parent::init();

        $this->addAttribute(array('type'=>'email'));

        $validator = $this->validator();
        $validator->addRule($validator->ruleEmail());
    }
}