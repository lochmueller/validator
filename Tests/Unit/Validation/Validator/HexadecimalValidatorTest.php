<?php declare(strict_types=1);
/**
 * HexadecimalValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\HexadecimalValidator;

/**
 * HexadecimalValidatorTest
 */
class HexadecimalValidatorTest extends AbstractValidatorTest
{


    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            'D5D5D5',
            'D5D',
        ];
        foreach ($values as $value) {
            $validator = new HexadecimalValidator();
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
            $validator = new HexadecimalValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
