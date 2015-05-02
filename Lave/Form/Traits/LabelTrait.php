<?php
namespace Lave\Form\Traits;

trait LabelTrait {
    /** @var  string  */
    protected $label;

    /**
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel($label) {
        $this->label = $label;
        return $this;
    }

}