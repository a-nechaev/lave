<?php
namespace Lave\Form;

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