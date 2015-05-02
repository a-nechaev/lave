<?php
namespace Lave\Form\Test;

use Lave\Form\Validator;

class ValidatorTest extends Base {

    public function testRules() {
        $validator = new Validator();
        $validator->addRule($validator->ruleNoEmpty());

        $validator->setValue('');

        $this->assertEquals('', $validator->getValue());

        $this->assertFalse($validator->validate());

        $this->assertTrue($validator->hasErrors());


    }
}