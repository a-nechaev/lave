<?php
namespace Lave\Form\Decorator;
use Lave\Form\Control\Submit as SubmitInput;
use Lave\Form\Traits\AttrRenderTrait;


/**
 * Class TextDecorator
 * @package Lave\Form\Component\Input
 *
 * @method SubmitInput getComponent
 */
class Submit extends \Lave\Form\Decorator {
    use AttrRenderTrait;

    public function render() {
        $component = $this->getComponent();

        $attributes_data = $component->getAttributes();

        $attributes_data = $component->mergeAttributes(array(
            'class'=>array('btn', 'btn-default')), $attributes_data);

        $attributes_data['name'] = $component->getName();
        $attributes_data['name'] = $component->getValue();

        $attributes_data_rendered = $this->renderAttributes($attributes_data);

        return <<<HTML
<input $attributes_data_rendered />
HTML;
    }
}