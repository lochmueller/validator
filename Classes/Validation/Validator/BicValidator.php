<?php
/**
 * Check a valid BIC
 *
 * @author     Tim Lochmüller
 */

namespace TL\Validator\Validation\Validator;

/**
 * Check a valid BIC
 *
 * @author     Tim Lochmüller
 */
class BicValidator extends AbstractRegexValidator
{

    /**
     * Get the regex for the validation
     *
     * @return string
     */
    public function getRegex(): string
    {
        return '/^[a-z]{6}[2-9a-z][0-9a-np-z]([a-z0-9]{3}|x{3})?$/i';
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
            $this->addError('Input is no valid BIC number', 2345245982);
        }
        return !$this->hasErrors();
    }
}
