<?php

/**
 * FibonacciValidator
 */

namespace TL\Validator\Validation\Validator\Number;

/**
 * FibonacciValidator
 */
class FibonacciValidator extends AbstractNumberValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (!is_numeric($value)) {
            $this->addError('The input value is not numeric', 12368114);
            return;
        }
        $sequence = [0, 1];
        $position = 1;
        while ($value > $sequence[$position]) {
            ++$position;
            $sequence[$position] = $sequence[$position - 1] + $sequence[$position - 2];
        }

        if ($sequence[$position] !== (int)$value) {
            $this->addError('The input value is not a Fibonacci number', 12361783);
        }
    }
}
