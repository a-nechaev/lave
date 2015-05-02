<?php
namespace Lave\Form\Test\Rule;

use Lave\Form\Rule\Email;
use Lave\Form\Test\Base;

class EmailTest extends Base {

    /** @var  Email */
    protected $rule;

    protected function setUp() {
        $this->rule = new Email();
    }
    /**
     * @dataProvider validateProvider
     * @param $value
     * @param $result
     */
    public function testValidate($value, $result) {
        $this->rule->setValue($value);
        $this->assertEquals($this->rule->validate(), $result);
    }

    public function validateProvider() {
        return array(
            array('a@aa.com', true),
            array('a@a', false),
            array('a#@a.com', true),
            array('почта@домен.рф', false),
            array(array(), false),
        );
    }
}