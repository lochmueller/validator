<?php declare(strict_types=1);
/**
 * LatitudeValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Number;

use TL\Validator\Validation\Validator\Number\LatitudeValidator;

/**
 * LatitudeValidatorTest
 */
class LatitudeValidatorTest extends AbstractNumberValidatorTest
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
            89.748234,
            -16.748234,
            -89.748234,
            9
        ];
        foreach ($values as $value) {
            $validator = new LatitudeValidator();
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
            -91.000,
            91.123123,
            200.123123,
            -900.000,
        ];
        foreach ($values as $value) {
            $validator = new LatitudeValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
