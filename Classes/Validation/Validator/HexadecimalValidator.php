<?php

/**
 * HexadecimalValidator
 */

namespace TL\Validator\Validation\Validator;

/**
 * HexadecimalValidator
 */
class HexadecimalValidator extends AbstractRegexValidator
{

    /**
     * Get the regex for the validation
     *
     * @return string
     */
    public function getRegex(): string
    {
        return '/^([0-9A-F]*)$/i';
    }

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (!is_scalar($value) || !preg_match($this->getRegex(), $value)) {
            $this->addError('Input is no valid hexadecimal', 12323984);
        }
    }
}
