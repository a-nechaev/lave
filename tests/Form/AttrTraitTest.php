<?php

namespace Lave\Form;

use Lave\Form\Traits\AttrTrait;

class AttrDummyTrait {
    use AttrTrait;
}

class AttrTraitTest extends Base {

    /**
     * @dataProvider mergeAttrProvider
     */
    public function testMergeAttributes($first, $second, $third) {
        $attr_dummy_trait = new AttrDummyTrait();

        $result = $attr_dummy_trait->mergeAttributes($second, $first);

        $this->assertEquals($result, $third);
    }

    public function mergeAttrProvider() {
        return array(
            array(
                array('class'=>'white'),
                array('class'=>'red'),
                array('class'=>'red')
            ),
            array(
                array('class'=>'white'),
                array('class'=>array('red')),
                array('class'=>array('red', 'white'))
            ),
            array(
                array('class'=>array('white')),
                array('class'=>array('red')),
                array('class'=>array('white', 'red'))
            )
        );
    }
}