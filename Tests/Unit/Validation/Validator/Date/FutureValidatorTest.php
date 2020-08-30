<?php

declare(strict_types=1);
/**
 * FutureValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Date;

use TL\Validator\Validation\Validator\Date\FutureValidator;

/**
 * FutureValidatorTest
 */
class FutureValidatorTest extends AbstractDateValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            '23.04.2017 12:00:01',
            '23.04.2017 23:59:59',
            '25.04.2017',
            '23.04.2019 12:00:00',
        ];
        foreach ($values as $value) {
            $validator = $this->buildValidatorMock(FutureValidator::class);
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
            '23.04.2017 12:00:00',
            '23.04.2017 11:59:58',
            '22.04.2017 12:00:00',
            '22.04.2017',
            '23.04.2014 12:00:00',
        ];
        foreach ($values as $value) {
            $validator = $this->buildValidatorMock(FutureValidator::class);
            $validator->validate($value);
            self::assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
