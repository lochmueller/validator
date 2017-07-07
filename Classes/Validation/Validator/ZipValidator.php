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
class ZipValidator extends AbstractValidator
{

    /**
     * Enable the Frontend validation
     *
     * @return bool|string
     */
    public function getFrontendValidator()
    {
        return true;
    }

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to Result. Examples for ZIP: '59329', 'DE-59329', 'DE 59329'
     *                              '5932', 'DE-5932', 'DE 5932'
     *
     * @param mixed $value
     *
     * @return bool
     */
    protected function isValid($value)
    {
        if (trim($value) !== '' && !preg_match('/^([A-Z]{1,2}?[- ]?)?[0-9]{4,5}$/i', trim($value))) {
            $this->addError('Invalid ZIP structure', 67354745745234);
        }
        return !$this->hasErrors();
    }
}
