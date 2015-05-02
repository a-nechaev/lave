<?php
namespace Lave\Form\Traits;

trait TAttr {

    /** @var  array  */
    protected $attributes = array();

    /**
     * @return array
     */
    public function getAttributes() {
        return $this->attributes;
    }

    public function getAttribute($name) {
        $attributes = $this->getAttributes();
        if (array_key_exists($name, $attributes)) {
            return $attributes[$name];
        }

        return null;
    }


    /**
     * @param array $attrs
     * @return $this
     */
    public function setAttributes(array $data) {
        $this->attributes = $data;
        return $this;
    }

    public function addAttribute(array $data) {
        $attrs = $this->getAttributes();
        $attrs = array_merge($attrs, $data);
        $this->setAttributes($attrs);
    }

}