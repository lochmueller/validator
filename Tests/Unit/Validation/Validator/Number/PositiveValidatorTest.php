<?php

declare(strict_types=1);
/**
 * PositiveValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Number;

use TL\Validator\Validation\Validator\Number\PositiveValidator;

/**
 * PositiveValidatorTest
 */
class PositiveValidatorTest extends AbstractNumberValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            1,
            '2',
            5,
            55,
            102334155,
            123123.123123,
        ];

        foreach ($values as $value) {
            $validator = new PositiveValidator();
            $validator->validate($value);
            self::assertFalse($validator->hasErrors(), 'Check value: ' . var_export($value, true));
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
            -120.12313,
            -54,
            -56,
            -102334154,
            0
        ];
        foreach ($values as $value) {
            $validator = new PositiveValidator();
            $validator->validate($value);
            self::assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
