<?php
namespace Lave\Form\Traits;

trait AttrTrait {

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

    public function mergeAttributes(array $data, $attributes = null) {
        if (is_null($attributes)) {
            $attributes = $this->getAttributes();
        }

        foreach ($data as $key=>$val) {
            if (!array_key_exists($key, $attributes)) {
                $attributes[$key] = $val;
                continue;
            }

            if (is_array($attributes[$key]) && is_array($val)) {
                $attributes[$key] = array_merge($attributes[$key], $val);
                continue;
            }

            if (is_array($val) && !is_array($attributes[$key])) {
                $val[] = $attributes[$key];
                $attributes[$key] = $val;
                continue;
            }

            $attributes[$key] = $val;
        }

        return $attributes;
    }


}