<?php
namespace Lave\Form\Control;

use Lave\Form\Control;

class MultiSelect extends Select {

    protected $data = array();

    public function init() {
        parent::init();

        $this->addAttribute(array('multiple'=>'multiple'));
    }
}