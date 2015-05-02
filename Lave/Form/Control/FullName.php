<?php
namespace Lave\Form\Control;

use Lave\Form\Control;
use Lave\Form\Decorator\FullName as FullNameDecorator;

class FullName extends Control {


    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';

    /** @var Text */
    public $first_name;

    /** @var Text */
    public $last_name;

    public function init() {
        parent::init();
        $this->setDecorator(new FullNameDecorator());

        $this->first_name = $this->getBuilder()->control()->createText();
        $this->first_name->setName(static::FIRST_NAME);
        $this->first_name->addAttribute(array('placeholder'=>'First name'));
        $this->addComponent($this->first_name);

        $this->last_name = $this->getBuilder()->control()->createText();
        $this->last_name->setName(static::LAST_NAME);
        $this->last_name->addAttribute(array('placeholder'=>'Last name'));
        $this->addComponent($this->last_name );
    }

    public function setValue(array $value) {

        $first_name = '';
        $last_name = '';
        if (isset($value[static::FIRST_NAME])) {
            $first_name = $value[static::FIRST_NAME];
        }

        if (isset($value[static::LAST_NAME])) {
            $last_name = $value[static::LAST_NAME];
        }

        $this->first_name->setValue($first_name);
        $this->last_name->setValue($last_name);

        return $this;
    }

    public function render() {
        return $this->getDecorator()->render();
    }

}