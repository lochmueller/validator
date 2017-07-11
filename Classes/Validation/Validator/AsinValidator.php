<?php

/**
 * AsinValidator
 */

namespace TL\Validator\Validation\Validator;

/**
 * AsinValidator
 */
class AsinValidator extends AbstractRegexValidator
{

    /**
     * Get the regex for the validation
     *
     * @return string
     */
    public function getRegex(): string
    {
        return '/^B\d{2}\w{7}|\d{9}(X|\d)$/';
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
            $this->addError('Input is no valid ASIN number', 2374835917);
        }
    }
}
