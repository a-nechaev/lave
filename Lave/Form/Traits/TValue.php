<?php
namespace Lave\Form\Traits;

trait TValue {

    /** @var  mixed  */
    protected $value;

    /**
     * @return mixed
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setValue($value) {
        $this->value = $value;
        return $this;
    }
}