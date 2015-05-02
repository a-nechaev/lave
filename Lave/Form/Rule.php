<?php
namespace Lave\Form;

use Lave\Form\Traits\ValueTrait;

abstract class Rule {

    use ValueTrait;

    protected $error = '';


    abstract public function validate();

    /**
     * @param $key
     * @return string
     */
    protected function getMessage($key) {
        $messages = $this->getMessages();
        if (array_key_exists($key, $messages)) {
            return $messages[$key];
        }
        return 'Value is incorrect';
    }

    /**
     * @return array
     */
    abstract protected function getMessages();

    protected function setError($error) {
        $this->error = $error;
    }

    public function getError() {
        return $this->error;
    }
}