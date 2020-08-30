<?php

declare(strict_types=1);
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
        return '^B\d{2}\w{7}|\d{9}(X|\d)$';
    }

    /**
     * Get the placeholder for the validation
     *
     * @return string
     */
    public function getPlaceholder(): string
    {
        return 'Bxxyyyyyyy / xxxxxxxxxX';
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
            $this->addError('Input is no valid ASIN number', 2374835917);
        }
    }
}
