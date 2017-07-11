<?php

/**
 * MacAddressValidator
 */

namespace TL\Validator\Validation\Validator;

/**
 * MacAddressValidator
 */
class MacAddressValidator extends AbstractRegexValidator
{

    /**
     * Get the regex for the validation
     *
     * @return string
     */
    public function getRegex(): string
    {
        return '/^(([0-9A-F]{2}-){5}|([0-9A-F]{2}:){5})[0-9A-F]{2}$/i';
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
            $this->addError('Input is no valid MAC address', 123782394);
        }
    }
}
