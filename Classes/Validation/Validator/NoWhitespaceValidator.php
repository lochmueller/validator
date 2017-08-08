<?php declare(strict_types=1);
/**
 * NoWhitespaceValidator
 */
namespace TL\Validator\Validation\Validator;

/**
 * NoWhitespaceValidator
 */
class NoWhitespaceValidator extends AbstractValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (strpos($value, ' ') !== false) {
            $this->addError('There are whitespaces in the given string', 1238123);
        }
    }
}
