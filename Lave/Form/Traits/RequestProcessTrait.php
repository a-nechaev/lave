<?php
namespace Lave\Form\Traits;

use Lave\Form\Component;
use Lave\Form\Request;

/**
 *
 * @method RequestProcessTrait[] getComponents
 * @method string getAbsoluteName
 * @method Component setValue($value)
 * @method Request request
 *
 */
trait RequestProcessTrait {

    public function processRequest($method) {

        $change = false;
        $components = $this->getComponents();
        if ($components) {
            foreach ($components as $c) {
                if (method_exists($this, 'processRequest') && $c->processRequest($method)) {
                    $change = true;
                }
            }
        }

        $name = $this->getAbsoluteName();
        if (!$name) {
            return true;
        }

        $request = $this->request();
        if (!is_null($value = $request->get($name, $method))) {
            $this->setValue($value);
            $change = true;
        }

        return $change;
    }
}