<?php
namespace Lave\Form\Traits;

use Lave\Form\Component;

/**
 * Class TName
 * @package Lave\Form\Traits
 *
 * @method Component getParent
 */
trait NameTrait {
    /** @var  string  */
    protected $name;

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAbsoluteName() {
        $name = array();
        $parent = $this->getParent();
        if ($parent && method_exists($parent, 'getAbsoluteName')) {
            $name[] = $parent->getAbsoluteName();
        }

        $name[] = $this->getName();

        return implode('_', $name);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}