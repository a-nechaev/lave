<?php
namespace Lave\Form\Rule;

use Lave\Form\Base;

class ExistTest extends Base {

    /** @var  Exist */
    protected $rule;

    protected function setUp() {
        $this->rule = new Exist(array(1,2,3));
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
            array(1, true),
            array(array(1,2), true),
            array(4, false),
            array('', true),
            array('test', false),
            array(array(''), false),
            array(array('1'), true),
            array(array('1', '2'), true),
            array(array('', '2'), false),
        );
    }
}