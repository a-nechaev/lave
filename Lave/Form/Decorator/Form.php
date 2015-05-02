<?php
namespace Lave\Form\Decorator;

use Lave\Form\Component;
use Lave\Form\Decorator;
use Lave\Form\Traits\TAttr;
use Lave\Form\Traits\TAttrRender;

/**
 * @method TAttr|Component getComponent
 */

class Form extends Decorator {

    use TAttrRender;

    public function render() {
        $component = $this->getComponent();

        $attributes_data = $component->getAttributes();
        $attributes_data_rendered = $this->renderAttributes($attributes_data);

        $output = '<form '.$attributes_data_rendered.'>'.PHP_EOL;

        $components = $component->getComponents();
        if (!$components) {
            return '';
        }

        foreach ($components as $component) {
            $output .= <<<HTML
<div style="padding:10px;">
    {$component->render()}
</div>
HTML;
            $output .= PHP_EOL;

        }

        $output .= '</form>'.PHP_EOL;

        return $output;
    }
}