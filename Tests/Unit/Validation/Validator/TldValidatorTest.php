<?php declare(strict_types=1);
/**
 * TldValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\TldValidator;

/**
 * TldValidatorTest
 */
class TldValidatorTest extends AbstractValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            'de',
            'uk',
            'vu',
            'museum',
            'nrw',
            'ch',
        ];
        foreach ($values as $value) {
            $validator = new TldValidator();
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
            190.123123,
            'google.de',
            'huhuhuhu',
        ];
        foreach ($values as $value) {
            $validator = new TldValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
