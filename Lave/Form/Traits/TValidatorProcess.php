<?php
namespace Lave\Form\Traits;

use Lave\Form\Interfaces\IValidator;

/**
 * @method IValidator[] getComponents
 */
trait TValidatorProcess {

    /**
     * @return bool
     */
    protected function processValidator() {
        $components = $this->getComponents();
        if (!$components) {
            return true;
        }


        $success = true;
        foreach ($components as $component) {
            if (!$component->validate()) {
                $success = false;
            }
        }

        return $success;
    }
}