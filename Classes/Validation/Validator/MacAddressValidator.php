<?php

declare(strict_types=1);
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
        return '^(([0-9A-Fa-f]{2}-){5}|([0-9A-Fa-f]{2}:){5})[0-9A-Fa-f]{2}$';
    }

    /**
     * Get the placeholder for the validation
     *
     * @return string
     */
    public function getPlaceholder(): string
    {
        return 'xx:xx:xx:xx:xx:xx';
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
            $this->addError('Input is no valid MAC address', 123782394);
        }
    }
}
