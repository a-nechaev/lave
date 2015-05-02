<?php
namespace Lave\Form\Control;

use Lave\Form\Control;
use Lave\Form\Decorator\Select as SelectDecorator;

class Select extends Control {

    protected $data = array();

    public function init() {
        parent::init();
        $this->setDecorator(new SelectDecorator());

    }

    public function validate() {
        $validator = $this->validator();
        $validator->addRule($validator->ruleExist(array_keys($this->getData())));

        return parent::validate();
    }

    public function render() {
        return $this->getDecorator()->render();
    }

    /**
     * @param $key
     * @param $value
     * @param array $attributes
     * @return $this
     */
    public function addOption($key, $value, $attributes=array()) {
        $this->data[$key] = array('value'=>$value, 'attributes'=>$attributes);
        return $this;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data) {
        if (!$data) {
            return $this;
        }

        foreach ($data as $key=>$value) {
            $this->addOption($key, $value);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getData() {
        return $this->data;
    }
}