<?php
namespace Lave\Form\Control;

use Lave\Form\Control\Text as TextControl;

class Password extends TextControl {

    public function init() {
        parent::init();

        $this->addAttribute(array('type'=>'password'));
    }
}