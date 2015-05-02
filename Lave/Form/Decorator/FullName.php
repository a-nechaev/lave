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
                $components_html .= $c->render().'<br />';
            }
        }

        return <<<HTML
<div>
    $components_html
</div>
HTML;
    }
}