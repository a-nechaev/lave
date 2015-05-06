<?php
namespace Lave\Form\Rule;

use Lave\Form\Rule;

class NoEmpty extends Rule {

    const VALUE_EMPTY = 'value_empty';

    public function validate() {
        $value = $this->getValue();
        if (empty($value) && $value !== false) {
            $this->setError($this->getMessage(static::VALUE_EMPTY));
            return false;
        }

        if (is_array($value) && count($value) == 1 && array_shift($value) == '') {
            $this->setError($this->getMessage(static::VALUE_EMPTY));
            return false;
        }

        return true;
    }

    protected function getMessages() {
         return array(
            static::VALUE_EMPTY=>'The value is empty'
        );
    }
}