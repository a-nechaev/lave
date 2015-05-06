<?php
namespace Lave\Form\Rule;

use Lave\Form\Rule;

class Email extends Rule {

    const VALUE_WRONG = 'value_wrong';

    public function validate() {
        $value = $this->getValue();
        if (!is_string($value)) {
            $this->setError($this->getMessage(static::VALUE_WRONG));
            return false;
        }

        if (empty($value)) {
            return true;
        }

        if (strlen($value) < 3 ||
            filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            $this->setError($this->getMessage(static::VALUE_WRONG));
            return false;
        }

        return true;
    }

    protected function getMessages() {
        return array(
            static::VALUE_WRONG => 'E-mail is not valid'
        );
    }
}