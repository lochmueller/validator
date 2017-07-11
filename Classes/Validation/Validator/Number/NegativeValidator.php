<?php

/**
 * NegativeValidator
 */

namespace TL\Validator\Validation\Validator\Number;

/**
 * NegativeValidator
 */
class NegativeValidator extends AbstractNumberValidator
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
            $this->addError('The given input is no valid number', 2137681);
            return;
        }

        if ((float)$value >= 0.0) {
            $this->addError('The given input is no negative number', 123781923);
        }
    }
}
