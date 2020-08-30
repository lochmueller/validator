<?php

declare(strict_types=1);
/**
 * LowercaseValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\String;

use TL\Validator\Validation\Validator\String\LowercaseValidator;

/**
 * LowercaseValidatorTest
 */
class LowercaseValidatorTest extends AbstractStringValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            'ich bin eine kleine welt',
            'ich bin eine welt mit 12312937123913 zahlen',
            'groß',
        ];
        foreach ($values as $value) {
            $validator = new LowercaseValidator();
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
            'ICH BIN KOMPLETT GROSS'
        ];
        foreach ($values as $value) {
            $validator = new LowercaseValidator();
            $validator->validate($value);
            self::assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
