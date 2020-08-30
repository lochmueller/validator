<?php

declare(strict_types=1);
/**
 * AbstractValidatorTest
 */
namespace TL\Validator\Unit\Validation\Validator\Date;

use TL\Validator\Unit\Validation\Validator\AbstractValidatorTest;
use TL\Validator\Validation\Validator\Date\AbstractDateValidator;

/**
 * AbstractValidatorTest
 */
abstract class AbstractDateValidatorTest extends AbstractValidatorTest
{
    /**
     * Build up a Date Validator and set the getNow method to a static default date:
     * 23.04.2017 12:00:00
     *
     * @param string $validtorClass
     * @param array $options
     * @param string $staticDate
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|AbstractDateValidator
     */
    protected function buildValidatorMock($validtorClass, $options = [], $staticDate = '23.04.2017 12:00:00')
    {
        $stub = $this->getMockBuilder($validtorClass)
            ->setConstructorArgs([$options])
            ->setMethods(['getNow'])
            ->getMock();
        $stub->method('getNow')
            ->willReturn(new \DateTime($staticDate));
        return $stub;
    }
}
