<?php

/**
 * OddValidatorTest
 */

namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\OddValidator;

/**
 * OddValidatorTest
 */
class OddValidatorTest extends AbstractValidatorTest
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
