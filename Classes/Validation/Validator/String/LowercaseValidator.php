<?php

/**
 * LowercaseValidator
 */

namespace TL\Validator\Validation\Validator\String;

/**
 * LowercaseValidator
 */
class LowercaseValidator extends AbstractStringValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (!is_scalar($value)) {
            $this->addError('The input value is no scalar value', 12367813);
            return;
        }
        if ($value !== mb_strtolower($value, mb_detect_encoding($value))) {
            $this->addError('The input value is not upper case', 249833435);
        }
    }
}
