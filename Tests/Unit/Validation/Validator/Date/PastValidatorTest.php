<?php declare(strict_types=1);
/**
 * PastValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Date;

use TL\Validator\Validation\Validator\Date\PastValidator;

/**
 * PastValidatorTest
 */
class PastValidatorTest extends AbstractDateValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            '23.04.2017 11:00:00',
            '23.04.2017 11:59:59',
            '22.04.2017',
            '23.04.2015 12:00:00',
            '22.04.2017 18:00:00',
        ];
        foreach ($values as $value) {
            $validator = $this->buildValidatorMock(PastValidator::class);
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
            '23.04.2017 13:00:00',
            '23.04.2017 12:00:01',
            '23.04.2017 12:00:00',
            '24.04.2017',
            '24.04.2017 11:00:00',
            '27.04.2017 18:00:00',
        ];
        foreach ($values as $value) {
            $validator = $this->buildValidatorMock(PastValidator::class);
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
