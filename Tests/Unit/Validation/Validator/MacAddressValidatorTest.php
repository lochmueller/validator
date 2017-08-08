<?php declare(strict_types=1);
/**
 * MacAddressValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\MacAddressValidator;

/**
 * MacAddressValidatorTest
 */
class MacAddressValidatorTest extends AbstractValidatorTest
{


    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            '50-F0-D3-2A-48-0A',
            '50:F0:D3:2A:48:0A',
            '50:f0:d3:2a:48:0a',
            '50-f0-d3-2a-48-0a',
        ];
        foreach ($values as $value) {
            $validator = new MacAddressValidator();
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
            '123.21.32.12',
            'X9:50:Z9:Y7:58:I4:18',
            '50-F0-D3-2A-48',
            '50-F0-D3-2A-48-48-48',
            '50:F0:D3-2A-48:0A',
            'X9-50-Z9-Y7-58-I4',
            'X9:50:Z9:Y7:58:I4',
            'x9:50:z9:y7:58:i4',
        ];
        foreach ($values as $value) {
            $validator = new MacAddressValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
