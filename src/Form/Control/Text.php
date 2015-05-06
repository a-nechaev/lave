<?php
namespace Lave\Form\Control;

use Lave\Form\Control;
use Lave\Form\Decorator\Text as TextDecorator;

class Text extends Control {

    public function init() {
        parent::init();
        $this->setDecorator(new TextDecorator());
    }

    public function render() {
        return $this->getDecorator()->render();
    }
}