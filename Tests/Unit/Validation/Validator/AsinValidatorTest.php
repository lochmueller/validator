<?php

declare(strict_types=1);
/**
 * AsinValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\AsinValidator;

/**
 * AsinValidatorTest
 */
class AsinValidatorTest extends AbstractValidatorTest
{
    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            'B0185E3D2O',
            'B99absdasd',
            '1236157232',
            '123615723X',
        ];
        foreach ($values as $value) {
            $validator = new AsinValidator();
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
            '4565CXYZ67',
            '999absdasd',
            '123615723Y',
        ];
        foreach ($values as $value) {
            $validator = new AsinValidator();
            $validator->validate($value);
            self::assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
