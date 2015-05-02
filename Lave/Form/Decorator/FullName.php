<?php
namespace Lave\Form\Decorator;
use Lave\Form\Component;


/**
 * @method \Lave\Form\Control\FullName getComponent
 */
class FullName extends \Lave\Form\Decorator {
    public function render() {
        $component = $this->getComponent();

        /** @var Component[] $components */
        $components = $component->getComponents();
        $components_html = '';
        if ($components) {
            foreach ($components as $c) {
                $component_html = $c->render();
                $components_html .= <<<HTML
<div class="col-xs-4">
    $component_html
</div>
HTML;
            }
        }

        $label_html = '';
        $label = $component->getLabel();
        if ($label) {
            $label_html = <<<HTML
<label>$label</label>
HTML;
        }


        return <<<HTML
<div class="form-group">
    $label_html
    <div class="row">
        $components_html
    </div>
</div>
HTML;
    }
}