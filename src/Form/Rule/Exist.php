<?php
namespace Lave\Form\Rule;

use Lave\Form\Rule;

class Exist extends Rule {

    protected $data = array();

    public function __construct(array $data) {
        $this->setData($data);
    }

    const VALUE_WRONG = 'value_wrong';

    public function validate() {
        $value = $this->getValue();
        if (empty($value)) {
            return true;
        }


        $data = $this->getData();

        if (is_array($value)) {
            foreach ($value as $v) {
                if (!in_array($v, $data)) {
                    $this->setError($this->getMessage(static::VALUE_WRONG));
                    return false;
                }
            }
            return true;
        }

        if (!in_array($value, $data)) {
            $this->setError($this->getMessage(static::VALUE_WRONG));
            return false;
        }

        return true;
    }

    protected function getMessages() {
        return array(
            static::VALUE_WRONG => 'The value is incorrect'
        );
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data) {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getData() {
        return $this->data;
    }

}