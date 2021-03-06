<?php

declare(strict_types=1);
/**
 * HexRgbColorValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\HexRgbColorValidator;

/**
 * HexRgbColorValidatorTest
 */
class HexRgbColorValidatorTest extends AbstractValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            '#D5D5D5',
            '#D5D',
        ];
        foreach ($values as $value) {
            $validator = new HexRgbColorValidator();
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
            190.123123,
            'ZX84Y47IL',
            '#D5D5D51',
            '#D5D5D',
            '#Z5D5D5',
            '#D5D D5',
            '#D5D-D5',
            '#D5D5',
            '#D5',
        ];
        foreach ($values as $value) {
            $validator = new HexRgbColorValidator();
            $validator->validate($value);
            self::assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
