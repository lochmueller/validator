<?php

declare(strict_types=1);
/**
 * LongitudeValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Number;

use TL\Validator\Validation\Validator\Number\LongitudeValidator;

/**
 * LongitudeValidatorTest
 */
class LongitudeValidatorTest extends AbstractNumberValidatorTest
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
            -8.748234,
            150.748234,
            -140.748234,
            '-8.748234',
            -16.748234,
            9
        ];
        foreach ($values as $value) {
            $validator = new LongitudeValidator();
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
            -360.000,
            190.123123
        ];
        foreach ($values as $value) {
            $validator = new LongitudeValidator();
            $validator->validate($value);
            self::assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
