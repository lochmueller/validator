<?php declare(strict_types=1);
/**
 * FibonacciValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Number;

use TL\Validator\Validation\Validator\Number\FibonacciValidator;

/**
 * FibonacciValidatorTest
 */
class FibonacciValidatorTest extends AbstractNumberValidatorTest
{

    /**
     * @test
     */
    public function testValidValues()
    {
        $values = [
            1,
            '2',
            5,
            55,
            102334155,
        ];

        foreach ($values as $value) {
            $validator = new FibonacciValidator();
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
            120.12313,
            54,
            56,
            102334154,
        ];
        foreach ($values as $value) {
            $validator = new FibonacciValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }
    }
}
