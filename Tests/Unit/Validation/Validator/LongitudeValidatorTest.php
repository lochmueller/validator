<?php

/**
 * LongitudeValidatorTest
 */

namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\LongitudeValidator;

/**
 * LongitudeValidatorTest
 */
class LongitudeValidatorTest extends AbstractValidatorTest
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
            9
        ];
        foreach ($values as $value) {
            $validator = new LongitudeValidator();
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
            190.123123
        ];
        foreach ($values as $value) {
            $validator = new LongitudeValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
