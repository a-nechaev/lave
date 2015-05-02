<?php
namespace Lave\Form;

use Lave\Form\Interfaces\RenderInterface;

class Decorator
    implements RenderInterface
{
    /** @var \Lave\Form\Component */
    protected $component;

    public function render() {
        return '';
    }

    /**
     * @param Component $component
     * @return $this
     */
    public function setComponent(\Lave\Form\Component $component) {
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