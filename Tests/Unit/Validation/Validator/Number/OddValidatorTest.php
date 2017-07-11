<?php

/**
 * OddValidatorTest
 */

namespace TL\Validator\Unit\Validation\Validator\Number;

use TL\Validator\Unit\Validation\Validator\AbstractValidatorTest;
use TL\Validator\Validation\Validator\Number\OddValidator;

/**
 * OddValidatorTest
 */
class OddValidatorTest extends AbstractNumberValidatorTest
{


    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            8.748234,
            '8.748234',
            16.748234,
            9,
            111111,
            333333
        ];
        foreach ($values as $value) {
            $validator = new OddValidator();
            $validator->validate($value);
            $this->assertFalse($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }

    /**
     * @test
     */
    public function testInvalidValues()
    {
        $values = [
            'Text',
            new \stdClass(),
            -360.000,
            190,
            6
        ];
        foreach ($values as $value) {
            $validator = new OddValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
