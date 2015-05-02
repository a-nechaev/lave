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

        $attributes_data['name'] = $component->getAbsoluteName();
        $attributes_data['value'] = $component->getValue();

        $attributes_data_rendered = $this->renderAttributes($attributes_data);


        $validator = $component->validator();
        $errors = $validator->getErrors();
        $errors_html = '';
        if ($errors) {
            foreach ($errors as $error) {
                $errors_html .= <<<HTML
<span style="color:red;">$error</span>
HTML;
            }
            $errors_html = '<br />'.$errors_html;
        }

        return <<<HTML
<input {$attributes_data_rendered} />
{$errors_html}
HTML;
    }
}