<?php declare(strict_types=1);
/**
 * EvenValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Number;

use TL\Validator\Validation\Validator\Number\EvenValidator;

/**
 * EvenValidatorTest
 */
class EvenValidatorTest extends AbstractNumberValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            8,
            '10',
            18,
            18.00,
            8,
            -360.000
        ];
        foreach ($values as $value) {
            $validator = new EvenValidator();
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
            190.123123,
            191,
            '193',
        ];
        foreach ($values as $value) {
            $validator = new EvenValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
