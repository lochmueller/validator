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
        return '^[a-zA-Z]{6}[2-9a-zA-Z][0-9a-nA-Np-zP-Z]([a-zA-Z0-9]{3}|[xX]{3})?$';
    }

    /**
     * Get the placeholder for the validation
     *
     * @return string
     */
    public function getPlaceholder(): string
    {
        return 'BBBBCCLLbbb';
    }

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if ($this->isInvalidRegexEvaluation($value)) {
            $this->addError('Input is no valid BIC number', 2345245982);
        }
    }
}
