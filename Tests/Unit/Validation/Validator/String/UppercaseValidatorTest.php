<?php

declare(strict_types=1);
/**
 * UppercaseValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\String;

use TL\Validator\Validation\Validator\String\UppercaseValidator;

/**
 * UppercaseValidatorTest
 */
class UppercaseValidatorTest extends AbstractStringValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            'ICH BIN IMMER GROSS',
            'DEUTSCHLAND',
            'BERLIN',
            // 'GROß',
        ];
        foreach ($values as $value) {
            $validator = new UppercaseValidator();
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
            'Ich bin eine grosse WELT',
            'Das ist ein Test',
            'ich bin komplett klein'
        ];
        foreach ($values as $value) {
            $validator = new UppercaseValidator();
            $validator->validate($value);
            self::assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
