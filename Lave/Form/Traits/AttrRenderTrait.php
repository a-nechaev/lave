<?php
namespace Lave\Form\Traits;

trait AttrRenderTrait {

    /**
     * @return string
     */
    public function renderAttributes(array $data) {

        if (!$data) {
            return '';
        }


        $output = array();
        foreach ($data as $attr_name => $attr_value) {
            $output[] = $this->renderAttribute($attr_name, $attr_value);
        }

        return implode(' ', $output);
    }

    private function renderAttribute($name, $value) {
        $output = $name;
        if ($value) {
            $separator = '; ';
            if ($name == 'class') {
                $separator = ' ';
            }
            $output .= '="'.$this->renderAttributeValue($value, $separator).'"';
        }

        return $output;
    }

    private function renderAttributeValue($value, $separator='; ') {
        if (is_array($value)) {
            $values = array();
            foreach($value as $i=>$v) {
                if (is_numeric($i)) {
                    $values[] = $v;
                    continue;
                }
                $values[] = $i.':'.$v;
            }
            return implode($separator, $values);
        }

        return $value;
    }
}