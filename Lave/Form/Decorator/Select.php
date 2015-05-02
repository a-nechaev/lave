<?php
namespace Lave\Form\Decorator;
use Lave\Form\Control\Select as SelectControl;
use Lave\Form\Traits\TAttrRender;


/**
 * @method SelectControl getComponent
 *
 */
class Select extends \Lave\Form\Decorator {

    use TAttrRender;

    public function render() {

        $component = $this->getComponent();

        $attributes_data = $component->getAttributes();

        $attributes_data['name'] = $component->getAbsoluteName();

        if (isset($attributes_data['multiple'])) {
            $attributes_data['name'] .= '[]';
        }

        $attributes_data_rendered = $this->renderAttributes($attributes_data);

        $options = $this->getDataHtml($component->getData(), $component->getValue());

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
<select {$attributes_data_rendered}>
$options
</select>
{$errors_html}
HTML;
    }

    private function getDataHtml($data, $key_selected=null) {
        if (!$data) {
            return '';
        }

        if (!is_array($key_selected)) {
            $key_selected = array($key_selected);
        }

        $data_html = '';
        foreach ($data as $key=>$value) {
            $attributes = array();
            if (is_array($value) && isset($value['value'])) {
                if (isset($value['attributes'])) {
                    $attributes = $value['attributes'];
                }
                $value = $value['value'];
            }

            if (empty($attributes['value'])) {
                $attributes['value'] = $key;
            }

            if (in_array($key, $key_selected)) {
                $attributes['selected'] = 'selected';
            }

            $attributes_rendered = $this->renderAttributes($attributes);
            $data_html .= <<<HTML
<option $attributes_rendered>$value</option>
HTML;
            $data_html .= PHP_EOL;
        }

        return $data_html;
    }
}