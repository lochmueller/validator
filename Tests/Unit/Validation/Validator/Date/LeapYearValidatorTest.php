<?php declare(strict_types=1);
/**
 * LeapYearValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Date;

use TL\Validator\Validation\Validator\Date\LeapYearValidator;

/**
 * LeapYearValidatorTest
 */
class LeapYearValidatorTest extends AbstractDateValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            '1904',
            2004,
            2104,
            2112,
            2008,
            2016,
            1916,
            2116,
        ];
        foreach ($values as $value) {
            $validator = new LeapYearValidator();
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
            3601.001,
            190.123123,
            'ZX84Y47IL',
            '2005',
            2006,
            2009,
            2019,
            1905,
        ];
        foreach ($values as $value) {
            $validator = new LeapYearValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
