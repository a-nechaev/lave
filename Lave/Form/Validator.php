<?php
namespace Lave\Form;

use Lave\Form\Rule\Exist;
use Lave\Form\Rule\Email;
use Lave\Form\Rule\NoEmpty;
use Lave\Form\Traits\ValueTrait;

class Validator {

    use ValueTrait;

    protected $errors = array();

    /** @var Rule[] */
    protected $rules = array();

    /**
     * @param Rule $rule
     * @return $this
     */
    public function addRule(Rule $rule) {
        $this->rules[] = $rule;
        return $this;
    }

    /**
     * @return Rule[]
     */
    public function getRules() {
        return $this->rules;
    }

    public function validate() {
        $rules = $this->getRules();
        if (!$rules) {
            return true;
        }

        foreach ($rules as $rule) {
            $rule->setValue($this->getValue());
            if (!$rule->validate()) {
                $this->addError($rule->getError());
            }
        }

        return !$this->hasErrors();
    }

    /**
     * @return array
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * @return bool
     */
    public function hasErrors() {
        return (bool) $this->getErrors();
    }

    /**
     * @param string $error
     * @return $this
     */
    protected function addError($error) {
        $this->errors[] = $error;
        return $this;
    }

    /**
     * @return NoEmpty
     */
    public function ruleNoEmpty() {
        return new NoEmpty();
    }

    /**
     * @return Email
     */
    public function ruleEmail() {
        return new Email();
    }

    /**
     * @param array $data
     * @return Exist
     */
    public function ruleExist(array $data) {
        return new Exist($data);
    }
}