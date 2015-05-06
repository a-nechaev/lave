<?php

namespace Lave\Form\Decorator;
use Lave\Form\Control\Text as TextInput;
use Lave\Form\Traits\AttrRenderTrait;

/**
 * @method TextInput getComponent
 */
class Text extends \Lave\Form\Decorator {

    use AttrRenderTrait;

    public function render() {

        $component = $this->getComponent();

        $attributes_data = $component->getAttributes();

        $attributes_data = $component->mergeAttributes(array('class'=>array('form-control')), $attributes_data);

        $attributes_data['name'] = $component->getAbsoluteName();
        $attributes_data['value'] = $component->getValue();

        $attributes_data_rendered = $this->renderAttributes($attributes_data);

        $label_html = '';
        $label = $component->getLabel();
        if ($label) {
            $label_html = <<<HTML
<label class="control-label">$label</label>
HTML;
        }

        $validator = $component->validator();
        $errors = $validator->getErrors();
        $errors_class = '';
        $errors_html = '';
        if ($errors) {
            $errors_class = 'has-error';
            $errors_html = array();
            foreach ($errors as $error) {
                $errors_html[] = <<<HTML
<small class="help-block">$error</small>
HTML;
            }
            $errors_html = implode('', $errors_html);
        }

        return <<<HTML
<div class="form-group $errors_class">
    $label_html
    <input {$attributes_data_rendered} />
    {$errors_html}
</div>


HTML;

    }
}