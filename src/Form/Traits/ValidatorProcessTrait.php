<?php
namespace Lave\Form\Traits;

use Lave\Form\Interfaces\ValidatorInterface;

/**
 * @method ValidatorInterface[] getComponents
 */
trait ValidatorProcessTrait {

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