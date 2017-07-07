<?php
/**
 * Check a valid IBAN
 *
 * @author     Tim Lochmüller
 */

namespace TL\Validator\Validation\Validator;

/**
 * Check a valid IBAN
 *
 * @author     Tim Lochmüller
 */
class IbanValidator extends AbstractRegexValidator
{

    /**
     * Get the regex for the validation
     *
     * @return string
     */
    public function getRegex(): string
    {
        return '/^[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}$/';
    }

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     * @return bool
     */
    protected function isValid($value)
    {
        $value = (string)$value;
        // check "required" via NotEmpty
        if ($value === '') {
            return true;
        }

        if (!preg_match($this->getRegex(), $value)) {
            $this->addError('Input is no valid IBAN number', 123671381);
        }
        return !$this->hasErrors();
    }
}
