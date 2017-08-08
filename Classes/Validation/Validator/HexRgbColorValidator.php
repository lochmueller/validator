<?php declare(strict_types=1);
/**
 * HexRgbColorValidator
 */
namespace TL\Validator\Validation\Validator;

/**
 * HexRgbColorValidator
 */
class HexRgbColorValidator extends AbstractRegexValidator
{

    /**
     * Get the regex for the validation
     *
     * @return string
     */
    public function getRegex(): string
    {
        return '^#([0-9A-Fa-f]{3}|[0-9A-Fa-f]{6})$';
    }

    /**
     * Get the placeholder for the validation
     *
     * @return string
     */
    public function getPlaceholder(): string
    {
        return '#aaa / #bbbbbb';
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
            $this->addError('Input is no valid HEX RGB color', 123871293);
        }
    }
}
