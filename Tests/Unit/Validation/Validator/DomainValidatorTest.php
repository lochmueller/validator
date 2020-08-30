<?php

declare(strict_types=1);
/**
 * DomainValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\DomainValidator;

/**
 * DomainValidatorTest
 */
class DomainValidatorTest extends AbstractValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            'fruit-lab.de',
            'www.fruit-lab.de',
            'hdnet.de',
        ];
        foreach ($values as $value) {
            $validator = new DomainValidator();
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
            //'webmaster@fruit-lab.de', @todo !!!!
            new \stdClass(),
            -360.000,
            190.123123,
            'X9:50:Z9:Y7:58:I4:18',
            '676239869',
            '6762398612312321321331212398',
        ];
        foreach ($values as $value) {
            $validator = new DomainValidator();
            $validator->validate($value);
            self::assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
