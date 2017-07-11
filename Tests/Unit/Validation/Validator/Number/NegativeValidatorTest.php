<?php

/**
 * NegativeValidatorTest
 */

namespace TL\Validator\Unit\Validation\Validator\Number;

use TL\Validator\Validation\Validator\Number\NegativeValidator;

/**
 * NegativeValidatorTest
 */
class NegativeValidatorTest extends AbstractNumberValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            -120.12313,
            -54,
            -56,
            -102334154,
        ];

        foreach ($values as $value) {
            $validator = new NegativeValidator();
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
            1,
            '2',
            5,
            55,
            102334155,
            123123.123123,
            0
        ];
        foreach ($values as $value) {
            $validator = new NegativeValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}