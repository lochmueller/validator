<?php

declare(strict_types=1);
/**
 * AgeValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Date;

use TL\Validator\Validation\Validator\Date\AgeValidator;

/**
 * AgeValidatorTest
 */
class AgeValidatorTest extends AbstractDateValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            '23.04.2035 13:00:00',
            '24.04.2035 11:59:59',
        ];
        foreach ($values as $value) {
            $validator = $this->buildValidatorMock(AgeValidator::class);
            $validator->validate($value);
            self::assertFalse($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }

        $values = [
            '23.04.2020 12:00:01',
            '23.04.2021 11:59:59',
        ];
        foreach ($values as $value) {
            $validator = $this->buildValidatorMock(AgeValidator::class, ['age' => 3]);
            $validator->validate($value);
            self::assertFalse($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }

        // 23.04.2017 12:00:00
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
            '24.04.2000 11:00:00',
            '27.04.2017 18:00:00',
        ];
        foreach ($values as $value) {
            $validator = $this->buildValidatorMock(AgeValidator::class);
            $validator->validate($value);
            self::assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
