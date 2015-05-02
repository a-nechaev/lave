<?php
namespace Lave\Form\Decorator;
use Lave\Form\Control\Submit as SubmitInput;


/**
 * Class TextDecorator
 * @package Lave\Form\Component\Input
 *
 * @method SubmitInput getComponent
 */
class Submit extends \Lave\Form\Decorator {
    public function render() {
        $component = $this->getComponent();

        $name = $component->getName();
        $value = $component->getValue();

        return <<<HTML
<input type="submit" name="{$name}" value="{$value}" />
HTML;
    }
}