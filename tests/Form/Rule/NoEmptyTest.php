<?php
namespace Lave\Form\Rule;

use Lave\Form\Base;

class NoEmptyTest extends Base {

    /** @var  \Lave\Form\Rule\NoEmpty */
    protected $rule;

    protected function setUp() {
        $this->rule = new \Lave\Form\Rule\NoEmpty();
    }
    /**
     * @dataProvider validateProvider
     */
    public function testValidate($value, $result) {
        $this->rule->setValue($value);
        $this->assertEquals($this->rule->validate(), $result);
    }

    public function validateProvider() {
        return array(
            array(null, false),
            array(false, true),
            array(0.1, true),
            array('', false),
            array('test', true),
            array(array(''), false),
            array(array('1'), true),
            array(array('1', '2'), true),
            array(array('', '2'), true),
        );
    }
}