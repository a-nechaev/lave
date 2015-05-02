<?php
namespace Lave\Form\Control;

use Lave\Form\Control;
use Lave\Form\Decorator\Submit as SubmitDecorator;

class Submit extends Control {

    public function init() {
        parent::init();
        $this->setDecorator(new SubmitDecorator());
    }

}
