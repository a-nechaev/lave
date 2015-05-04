<?php
namespace Lave\Form;

use Lave\Form\Component;
use Lave\Form\Interfaces\RenderInterface;

class Decorator implements
    RenderInterface
{
    /** @var Component */
    protected $component;

    /**
     * @return string
     */
    public function render() {
        return '';
    }

    /**
     * @param Component $component
     * @return $this
     */
    public function setComponent(Component $component) {
        $this->component = $component;
        return $this;
    }

    /**
     * @return Component
     */
    public function getComponent() {
        return $this->component;
    }
}