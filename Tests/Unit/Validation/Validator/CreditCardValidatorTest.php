<?php declare(strict_types=1);
/**
 * CreditCardValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\CreditCardValidator;

/**
 * CreditCardValidatorTest
 */
class CreditCardValidatorTest extends AbstractValidatorTest
{


    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            '5220204428461439',
            '341070054752820',
            '6762398693384243',
        ];
        foreach ($values as $value) {
            $validator = new CreditCardValidator();
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
            '676239869',
            '6762398612312321321331212398',
        ];
        foreach ($values as $value) {
            $validator = new CreditCardValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
