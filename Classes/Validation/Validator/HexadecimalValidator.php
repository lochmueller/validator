<?php

declare(strict_types=1);
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
        return '^([0-9a-fA-F]*)$';
    }

    /**
     * Get the placeholder for the validation
     *
     * @return string
     */
    public function getPlaceholder(): string
    {
        return '';
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
            $this->addError('Input is no valid hexadecimal', 12323984);
        }
    }
}
