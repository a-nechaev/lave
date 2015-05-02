<?php
namespace Lave\Form\Traits;

use Lave\Form\Validator;

trait TValidator {

    /** @var Validator */
    protected $validator;

    /**
     * @param Validator $validator
     * @return $this
     */
    public function setValidator(Validator $validator) {
        $this->validator = $validator;
        return $this;
    }

    /**
     * @return Validator
     */
    public function validator() {
        if (!is_null($this->validator)) {
            return $this->validator;
        }

        $this->setValidator(new Validator());
        return $this->validator();
    }
}