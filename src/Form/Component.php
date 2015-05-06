<?php
namespace Lave\Form;

use Lave\Form\Interfaces\RenderInterface;

abstract class Component implements
    RenderInterface
{
    /** @var \Lave\Form\Component[] */
    protected $components = array();

    /** @var \Lave\Form\Component */
    protected $parent;

    /** @var \Lave\Form\Decorator */
    protected $decorator;

    public function init() {

    }

    public function render() {
        return $this->getDecorator()->render();
    }

    /**
     * @param Component $component
     * @return $this
     */
    public function addComponent(Component $component) {
        $component->setParent($this);
        $this->components[] = $component;
        return $this;
    }

    /**
     * @return Component[]
     */
    public function getComponents() {
        return $this->components;
    }

    /**
     * @param Component $component
     * @return $this
     */
    protected function setParent(Component $component) {
        $this->parent = $component;
        return $this;
    }

    /**
     * @return Component|null
     */
    protected function getParent() {
        return $this->parent;
    }

    /**
     * @param Decorator $decorator
     * @return $this
     */
    public function setDecorator(Decorator $decorator) {
        $decorator->setComponent($this);
        $this->decorator = $decorator;
        return $this;
    }

    /**
     * @return Decorator
     */
    public function getDecorator() {
        return $this->decorator;
    }


}