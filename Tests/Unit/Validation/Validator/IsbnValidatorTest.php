<?php

/**
 * IsbnValidatorTest
 */

namespace TL\Validator\Unit\Validation\Validator;

use TL\Validator\Validation\Validator\LongitudeValidator;

/**
 * IsbnValidatorTest
 */
class IsbnValidatorTest extends AbstractValidatorTest
{


    /**
     * @test
     */
    public function testValidValues()
    {
        /*$values = [
            'ISBN-13: 978-1-4028-9462-6',
        ];
        foreach ($values as $value) {
            $validator = new LongitudeValidator();
            $validator->validate($value);
            $this->assertFalse($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }*/
    }

    /**
     * @test
     */
    public function testInvalidValues()
    {
        /*$values = [
            '61661-6546-987',
            'ISBN: 1284233-2-1-1',
        ];
        foreach ($values as $value) {
            $validator = new LongitudeValidator();
            $validator->validate($value);
            $this->assertTrue($validator->hasErrors(), 'Check value: ' . var_export($value, true));
        }*/
    }
}
