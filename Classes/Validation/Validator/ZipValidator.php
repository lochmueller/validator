<?php
/**
 * ZIP validator
 *
 * @author     Ercüment Topal
 * @author     Tim Lochmüller
 */

namespace TL\Validator\Validation\Validator;

/**
 * Zip validator
 *
 * @author     Ercüment Topal
 */
class ZipValidator extends AbstractRegexValidator
{

    /**
     * Get the regex for the validation
     *
     * @return string
     */
    public function getRegex(): string
    {
        return '/^([A-Z]{1,2}?[- ]?)?[0-9]{4,5}$/i';
    }

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to Result. Examples for ZIP: '59329', 'DE-59329', 'DE 59329'
     *                              '5932', 'DE-5932', 'DE 5932'
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (!is_scalar($value) || !preg_match($this->getRegex(), $value)) {
            $this->addError('Invalid ZIP structure', 67354745745234);
        }
    }
}
